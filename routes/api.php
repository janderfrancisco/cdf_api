<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 /*
$this->get('students', 'Api\StudentController@index');
$this->post('students', 'Api\StudentController@store');
$this->put('students/{id}', 'Api\StudentController@update');
$this->delete('students/{id}', 'Api\StudentController@delete');
*/
$this->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function (){
   
    $this->apiResource('students', 'StudentController');
    $this->get('students/{id}/payments', 'StudentController@payments');
    $this->get('students/{id}/essays', 'StudentController@essays');

    $this->apiResource('essay', 'EssayController');
    $this->apiResource('annotation', 'AnnotationController');
    $this->apiResource('note', 'NoteController');
    $this->apiResource('plan', 'PlanController');


});


$this->group(['prefix' => 'v2', 'namespace' => 'Api\v2'], function (){
   
     

});


/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/