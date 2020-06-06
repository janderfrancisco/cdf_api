<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Http\Requests\StoreUpdatePlanFormRequest;


class PlanController extends Controller
{
    private $plan; 
    private $totalPage = 10;

    public function __construct(Plan $plan){
        $this->plan =  $plan;
    }

    public function index(Request $request){
        
        $plans =  $this->plan->paginate($this->totalPage);

        return response()->json($plans);

    }

    public function show($id){
        
        $plan = $this->plan->find($id);
        
        if(!$plan)
            return response()->json(['error' => 'Not Found'], 404 );
 
        return response()->json($plan);

    }

    
    public function store(StoreUpdatePlanFormRequest $request){
      
        $plan = $this->plan->create($request->all());
    
        return response()->json($plan, 201);

    }
  

    public function update(Request $request, $id){
       
        $plan = $this->plan->find($id);

        if(!$plan)
            return response()->json(['error' => 'Not Found'], 404 );

        $plan->update($request->all());
        
        return response()->json($plan);

    }
  
  

    public function destroy($id){
       
        $plan = $this->plan->find($id);

        if(!$plan)
            return response()->json(['error' => 'Not Found'], 404 );

        $plan->delete();
        
        return response()->json([], 204);

    }
}
