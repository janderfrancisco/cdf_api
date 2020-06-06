<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Annotation;
use App\Http\Requests\StoreUpdateAnootationFormRequest;



class AnnotationController extends Controller
{
    private $annotation; 
    private $totalPage = 10;

    public function __construct(Annotation $annotation){
        $this->annotation =  $annotation;
    }

    public function index(Request $request){
        
        $annotations =  $this->annotation->paginate($this->totalPage);

        return response()->json($annotations);

    }

    public function show($id){
        
        $annotation = $this->annotation->find($id);
        
        if(!$annotation)
            return response()->json(['error' => 'Not Found'], 404 );
        
        
        return response()->json($annotation);

    }

    
    public function store(StoreUpdateAnnotationFormRequest $request){
      
        $annotation = $this->annotation->create($request->all());
        
        return response()->json($annotation, 201);

    }
  

    public function update(Request $request, $id){
       
        $annotation = $this->annotation->find($id);

        if(!$annotation)
            return response()->json(['error' => 'Not Found'], 404 );
        
        $annotation->update($request->all());
        
        return response()->json($annotation);

    }
  
  

    public function destroy($id){
       
        $annotation = $this->annotation->find($id);
        
        if(!$annotation)
            return response()->json(['error' => 'Not Found'], 404 );

        $annotation->delete();
        
        return response()->json([], 204);

    }



}
