<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Essay;
use App\Http\Requests\StoreUpdateEssayFormRequest;
use Illuminate\Support\Facades\Storage;

class EssayController extends Controller
{
    private $essay; 
    private $totalPage = 10;
    private $uploadPath = 'essays';

    public function __construct(Essay $essay){
        $this->essay =  $essay;
    }

    public function index(Request $request){
        
        $essays =  $this->essay->getResults($request->all(), $this->totalPage);

        return response()->json($essays);

    }

    public function show($id){
        
        $essay = $this->essay->find($id);
        
        if(!$essay)
            return response()->json(['error' => 'Not Found'], 404 );
        
        
        return response()->json($essay);

    }

    
    public function store(StoreUpdateEssayFormRequest $request){
      
        $data = $request->all();
        

        // check if file exists in request then make a upload
        if($request->hasFile('file') && $request->file('file')->isValid()){
     
            $name = kebab_case($request->title);
            $extension = $request->file->extension();
 
            $nameFile = "{$name}.{$extension}";
            $data['file'] = $nameFile;
 
            $upload = $request->file->storeAs($this->uploadPath, $nameFile);

            if(!$upload)
                return response()->json(['error' => 'upload fail'],500);
        }
  
         $essay = $this->essay->create($data);


        
        return response()->json($essay, 201);

    }
  

    public function update(Request $request, $id){
       
        $essay = $this->essay->find($id);

        if(!$essay)
            return response()->json(['error' => 'Not Found'], 404 );
        
        $data = $request->all();
        
        if($request->hasFile('file') && $request->file('file')->isValid()){
            // if exists old file then delete
            if($essay->file){
                if(Storage::exists("essays/{$essay->file}"))
                    Storage::delete("essays/{$essay->file}");
            }

            $name = kebab_case($request->title);
            $extension = $request->file->extension();
    
            $nameFile = "{$name}.{$extension}";
            $data['file'] = $nameFile;
    
            $upload = $request->file->storeAs($this->uploadPath, $nameFile);

            if(!$upload)
                return response()->json(['error' => 'upload fail'],500);
        }

        $essay->update($data);
        
        return response()->json($essay);

    }
  
  

    public function destroy($id){
       
        $essay = $this->essay->find($id);
        if(!$essay)
            return response()->json(['error' => 'Not Found'], 404 );
        
        if($essay->file){
            if(Storage::exists("essays/{$essay->file}"))
                Storage::delete("essays/{$essay->file}");
        }
    

        $essay->delete();
        
        return response()->json([], 204);

    }


    public function annotations($id){
        
        $essay = $this->essay->with('annotations')->paginate($id);

        if(!$essay)
            return response()->json(['error' => 'Not Found'], 404 );
 

        return response()->json($essay);

    }

}
