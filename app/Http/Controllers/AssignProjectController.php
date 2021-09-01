<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignProjectRequest;
use App\Models\AssignProject;
use Illuminate\Http\Request;

class AssignProjectController extends Controller
{

     // TrainingProgram List view method
     public function index(){
        $trainingProgram = AssignProject::orderBy('id','desc')->get();
        return response()->json(compact('trainingProgram'));
    }//end method

    //TrainingProgram Single View method
    public function show($id){
        $trainingProgramDetails = AssignProject::where('id',$id)->first();
        return response()->json(compact('trainingProgramDetails'));
    }//end method

    //TrainingProgram ADD method
    public function store(AssignProjectRequest $request){

        $trainingInviteData = $this->getData($request);
        try{
            TrainingInvite::create($trainingInviteData);
            return response()->json(['success'=>"LeaveType has been Successfully Added"]);
        }
        catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    }//end method


    // TrainingProgram  Delete method
    public function destroy($trainingProgram_id){
        try{
            TrainingInvite::where('id',$trainingProgram_id)->first()->delete();
            return response()->json(['success'=>"TrainingProgram has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method

    // TrainingProgram Delet method
    public function  update(AssignProjectRequest $request,$assignProject){
        $trainingProgram  = AssignProjectRequest::find($assignProject);
        // dd($request->all());
        try{
            $trainingProgramData = $this->getData($request);
            // dd($trainingProgramData);
            $trainingProgram->update($trainingProgramData);
            return response()->json(['success'=>"Training Program has been updated successfully!"]);
        }catch(\Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method

    // get Request data for add or update
    private function getData(Request $request){
        return array(
            'employee_id'          => $request->input('training_program'),
            'training_program_id'  => $request->input('training_program_id'),
            'date_from'            => $request->input('date_from'),
            'date_to'              => $request->input('date_to'),
            'description'          => $request->input('description'),
            'status'               => json_decode($request->input('status')) == true?1:0
        );
    } //end method
}