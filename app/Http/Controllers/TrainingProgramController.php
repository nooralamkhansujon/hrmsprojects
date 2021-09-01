<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingProgramRequest;
use App\Models\TrainingProgram;
use Exception;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
     // TrainingProgram List view method
     public function index(){
        $trainingProgram = TrainingProgram::orderBy('id','desc')->get();
        return response()->json(compact('trainingProgram'));
    }//end method

    //TrainingProgram Single View method
    public function show($id){
        $trainingProgramDetails = TrainingProgram::where('id',$id)->first();
        return response()->json(compact('trainingProgramDetails'));
    }//end method

    //TrainingProgram ADD method
    public function store(TrainingProgramRequest $request){

        $trainingProgramData = $this->getData($request);
        try{
            TrainingProgram::create($trainingProgramData);
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
            TrainingProgram::where('id',$trainingProgram_id)->first()->delete();
            return response()->json(['success'=>"TrainingProgram has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method

    // TrainingProgram Delet method
    public function  update(TrainingProgramRequest $request,$trainingProgram_id){
        $trainingProgram  = TrainingProgram::find($trainingProgram_id);
        // dd($request->all());
        try{
            $trainingProgramData = $this->getData($request);
            // dd($trainingProgramData);
            $trainingProgram->update($trainingProgramData);
            return response()->json(['success'=>"Training Program has been updated successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method

    // get Request data for add or update
    private function getData(Request $request){
        return array(
            'training_program'     => $request->input('training_program'),
            'description'          => $request->input('description'),
            'status'               => json_decode($request->input('status')) == true?1:0
        );
    } //end method
}
