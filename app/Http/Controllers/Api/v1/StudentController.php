<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreUpdateStudentFormRequest;

class  StudentController extends Controller
{

    private $student; 
    private $totalPage = 10;

    public function __construct(Student $student){
        $this->student =  $student;
    }

    public function index(Request $request){
        
        $students =  $this->student->getResults($request->all(), $this->totalPage);

        return response()->json($students);

    }

    public function show($id){
        
        $student = $this->student->find($id);
        
        if(!$student)
            return response()->json(['error' => 'Not Found'], 404 );
        
        
        return response()->json($student);

    }

    
    public function store(StoreUpdateStudentFormRequest $request){
      
        $student = $this->student->create($request->all());
        
        return response()->json($student, 201);

    }
  

    public function update(Request $request, $id){
       
        $student = $this->student->find($id);
        if(!$student)
            return response()->json(['error' => 'Not Found'], 404 );
        

        $student->update($request->all());
        
        return response()->json($student);

    }
  
  

    public function destroy($id){
       
        $student = $this->student->find($id);
        if(!$student)
            return response()->json(['error' => 'Not Found'], 404 );
        

        $student->delete();
        
        return response()->json([], 204);

    }



    public function payments($id){
        
        $student = $this->student->with('payments')->paginate($id);

        if(!$student)
            return response()->json(['error' => 'Not Found'], 404 );
 

        return response()->json($student);

    }


    public function essays($id){
        
        $student = $this->student->with('essays')->paginate($id);
      
        if(!$student)
            return response()->json(['error' => 'Not Found'], 404 );
      
        return response()->json($student);

    }


}
