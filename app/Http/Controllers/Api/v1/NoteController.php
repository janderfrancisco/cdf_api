<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Http\Requests\StoreUpdateNoteFormRequest;


class NoteController extends Controller
{
    private $note; 
    private $totalPage = 10;

    public function __construct(Note $note){
        $this->note =  $note;
    }

    public function index(Request $request){
        
        $notes =  $this->note->paginate($this->totalPage);

        return response()->json($notes);
        
    }

    public function show($id){
        
        $note = $this->note->find($id);
        
        if(!$note)
            return response()->json(['error' => 'Not Found'], 404 );
 
        return response()->json($note);

    }

    
    public function store(StoreUpdateAnnotationFormRequest $request){
      
        $note = $this->note->create($request->all());
    
        return response()->json($note, 201);

    }
  

    public function update(Request $request, $id){
       
        $note = $this->note->find($id);

        if(!$note)
            return response()->json(['error' => 'Not Found'], 404 );

        $note->update($request->all());
        
        return response()->json($note);

    }
  
  

    public function destroy($id){
       
        $note = $this->note->find($id);

        if(!$note)
            return response()->json(['error' => 'Not Found'], 404 );

        $note->delete();
        
        return response()->json([], 204);

    }
}
