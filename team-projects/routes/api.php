<?php

use Illuminate\Http\Request;
use Helpdesk\Person;
use Helpdesk\User;
use Helpdesk\Problem;
use Helpdesk\SerialNumber;
use Helpdesk\Hardware;
use Helpdesk\ProblemType;
use Helpdesk\ProblemHardware;
use Helpdesk\ProblemSoftware;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| these are the API routes for the application
| they require authentication using laravel passport
| currently only implemented using internal cookie
| if desired to extend to public api in future, token based auth would need to be used (already included in passport)
|
*/

//This route returns the current user object, this is not expected to be particularly useful, instead see /person below
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//This route returns the currently logged in person object
Route::middleware('auth:api')->get('/person', function (Request $request) {
    return Person::find($request->user()->username);
});

//Route to get problems as required by splash page
Route::middleware('auth:api')->get('/splash', function (Request $request) {
    $problemsRaw = Problem::orderBy('edited', 'desc')->get(); //get all problems ordered by edited time (descending)
    $problems = []; //array to be returned

    //for every problem:
    foreach($problemsRaw as $problem){
        //add to problems array (to be returned) an array containing:
        array_push($problems, [
            'date' => $problem->edited, //edited time
            'ID' => $problem->id, //problem id
            'problemType' => $problem->typeString(), //problem type (hardware / software string)
            'solved' => $problem->solved, //boolean solved flag
        ]);
    }

    return $problems; //return the array of formatted problems
});

//This route is a test for passing parameters
Route::middleware('auth:api')->get('/test', function (Request $request) {
    return $request->input('test');
});

//get problem type list
Route::middleware('auth:api')->get('/problemTypes', function (Request $request) {
    $typesRaw = Helpdesk\ProblemType::all();
    $types = [];

    foreach($typesRaw as $type){
        //add to array (to be returned):
        array_push($types,
            $type->name //problem type
        );
    }

    return $types;
});

//get software list
Route::middleware('auth:api')->get('/software', function (Request $request) {
    $typesRaw = Helpdesk\Software::all();
    $types = [];

    foreach($typesRaw as $type){
        //add to array (to be returned):
        array_push($types,
            $type->name //problem type
        );
    }

    return $types;
});

//Route to get problems as required by splash page
Route::middleware('auth:api')->get('/hardware', function (Request $request) {
    $typesRaw = Helpdesk\SerialNumber::all(); //get all hardware
    $types = []; //array to be returned

    //for every problem:
    foreach($typesRaw as $type){
        //add to problems array (to be returned) an array containing:
        array_push($types, [
            'serial' => $type->serial_no, //edited time
            'type' => $type->hardware->type, //problem id
            'make' => $type->hardware->make
        ]);
    }

    return $types; //return the array of formatted problems
});

//Route to get problems as required by splash page
Route::middleware('auth:api')->get('/personnel', function (Request $request) {
    $typesRaw = Helpdesk\Person::all();
    $types = [];

    //for every problem:
    foreach($typesRaw as $type){
        //add to array (to be returned) an array containing:
        array_push($types, [
            'name' => $type->first_name,
            'ID' => $type->id,
            'job_title' => $type->job_title,
            'department' => $type->department->name,
            'telephone' => $type->tel_no
        ]);
    }

    return $types; //return the array of formatted problems
});

//Route to get problems as required by splash page
Route::middleware('auth:api')->get('/experts', function (Request $request) {
    $problem = $request->input('type');
    $problemTypes = Helpdesk\ProblemType::where('name', $problem)->get();
    $problemType = $problemTypes[0];

//    return $problem;

    $typesRaw = $problemType->specialists;
    $types = [];

    //for every problem:
    foreach($typesRaw as $type){
        //add to array (to be returned) an array containing:
        array_push($types, [
            'name' => $type->first_name,
            'id' => $type->id,
            'tasks' => count($type->problems),
        ]);
    }

    return $types; //return the array of formatted problems
});

//Route to get problems as required by splash page
Route::middleware('auth:api')->get('/currentProblems', function (Request $request) {
    $typesRaw = Helpdesk\Problem::all()->sortByDesc('edited');
    $types = [];

    //for every problem:
    foreach($typesRaw as $type){
        //add to array (to be returned) an array containing:
        if ($type->typeString() == "Software") {
            array_push($types, [
                'id' => $type->id,
                'isSoftware' => 1,
                'software' => optional(Helpdesk\Software::find($type->problemSoftware->software))->name,
                'OS' => $type->problemSoftware->os,
                'type' => $type->problemType->name,
                'desc' => $type->description,
                'sol' => $type->solution,
                'solved' => $type->solved,
                'expert' => $type->specialist
            ]);
        } else {
            array_push($types, [
                'id' => $type->id,
                'isSoftware' => 0,
                'hardwareSerial' => $type->problemHardware->serial_no,
                'type' => $type->problemType->name,
                'desc' => $type->description,
                'sol' => $type->solution,
                'solved' => $type->solved,
                'expert' => $type->specialist
            ]);
        }
    }

    return $types; //return the array of formatted problems
});


Route::middleware('auth:api')->get('/submitNewSoft', function (Request $request) {
    $data = json_decode($request->input('array'), TRUE);

    foreach($data as $problemRaw){

        $problem = Helpdesk\Problem::create([
            'completed' => $problemRaw['completed'] ?? null,
            'created' => $problemRaw['created'] ?? null,
            'description' => $problemRaw['desc'] ?? null,
            'solution' => $problemRaw['sol'] ?? null,
            'solved' => (int)$problemRaw['solved'] ?? 0,
            'type' => Helpdesk\ProblemType::where('name', $problemRaw['type'])->first()->id,
            'specialist' => $problemRaw['expert'] ?? null
        ]);

        $problemSoftware = Helpdesk\ProblemSoftware::create([
            'id' => $problem->id,
            'os' => $problemRaw['OS'] ?? null,
            'software' => optional(Helpdesk\Software::where('name', $problemRaw['software'])->first())->id
        ]);
    }

    return "ok";
});

Route::middleware('auth:api')->get('/submitNewHard', function (Request $request) {
    $data = json_decode($request->input('array'), TRUE);

    foreach($data as $problemRaw){

        $problem = Helpdesk\Problem::create([
            'completed' => $problemRaw['completed'] ?? null,
            'created' => $problemRaw['created'] ?? null,
            'description' => $problemRaw['desc'] ?? null,
            'solution' => $problemRaw['sol'] ?? null,
            'solved' => (int)$problemRaw['solved'] ?? 0,
            'type' => Helpdesk\ProblemType::where('name', $problemRaw['type'])->first()->id,
            'specialist' => $problemRaw['expert'] ?? null
        ]);

        $problemHardware = Helpdesk\ProblemHardware::create([
            'id' => $problem->id,
            'serial_no' => optional(Helpdesk\SerialNumber::find($problemRaw['hardwareSerial']))->serial_no,
            'hardware' => optional(Helpdesk\SerialNumber::find($problemRaw['hardwareSerial']))->hardware_id
        ]);
    }

    return "ok";
});

Route::middleware('auth:api')->get('/submitOldSoft', function (Request $request) {
    $data = json_decode($request->input('array'), TRUE);
    
    foreach($data as $problemRaw){
        
        $problem = Helpdesk\Problem::find($problemRaw['ID']);
        $problemSoftware = Helpdesk\ProblemSoftware::find($problemRaw['ID']);
        
        $problem->edited = $problemRaw['edited'] ?? null;
        $problem->completed = $problemRaw['completed'] ?? null;
        $problem->created = $problemRaw['created'] ?? null;
        $problem->description = $problemRaw['desc'] ?? null;
        $problem->solution = $problemRaw['sol'] ?? null;
        $problem->solved = (int)$problemRaw['solved'] ?? 0;
        $problem->type = Helpdesk\ProblemType::where('name', $problemRaw['type'])->first()->id;
        $problem->specialist = $problemRaw['expert'] ?? null;
        
        $problemSoftware->os = $problemRaw['OS'] ?? null;
        $problemSoftware->software = optional(Helpdesk\Software::where('name', $problemRaw['software'])->first())->id;
        
        $problem->save(); 
        $problemSoftware->save();
    }

    return "ok";
});

Route::middleware('auth:api')->get('/submitOldHard', function (Request $request) {
    $data = json_decode($request->input('array'), TRUE);
    
    foreach($data as $problemRaw){
        
        $problem = Helpdesk\Problem::find($problemRaw['ID']);
        $problemHardware = Helpdesk\ProblemHardware::find($problemRaw['ID']);
        
        $problem->edited = $problemRaw['edited'] ?? null;
        $problem->completed = $problemRaw['completed'] ?? null;
        $problem->created = $problemRaw['created'] ?? null;
        $problem->description = $problemRaw['desc'] ?? null;
        $problem->solution = $problemRaw['sol'] ?? null;
        $problem->solved = (int)$problemRaw['solved'] ?? 0;
        $problem->type = Helpdesk\ProblemType::where('name', $problemRaw['type'])->first()->id;
        $problem->specialist = $problemRaw['expert'] ?? null;
        
        $problemHardware->serial_no = optional(Helpdesk\SerialNumber::find($problemRaw['hardwareSerial']))->serial_no;
        $problemHardware->hardware = optional(Helpdesk\SerialNumber::find($problemRaw['hardwareSerial']))->hardware_id;
        
        $problem->save(); 
        $problemHardware->save();
    }

    return "ok";
});

