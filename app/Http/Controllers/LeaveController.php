<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use App\Http\Resources\LeaveResource;
use App\Models\Leave;
use Exception;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //Employee leave list view
    public function index(){
        $leaveList = LeaveResource::collection(Leave::with(['leave_type','employee'])->get());
        return response()->json(compact('leaveList'));
    } // end method

    // employe single leave view
    public function show($id){
        $leave = Leave::with(['leave_type','employee'])->where('id',$id)->first();
        $leaveDetails = new LeaveResource($leave);
        // dd($leaveDetails);
        return response()->json(compact('leaveDetails'));
    }//end method

    //Employee add leave method
    public function store(LeaveRequest $request){
        if($request->days < 1 ){
            return response()->json(['error'=>"Days Must be At least 1"],500);
        }
        $leavedata = $this->getData($request);
        try{
            Leave::create($leavedata);
            return response()->json(['success'=>"Leave has been Successfully Added"]);
        }
        catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method


    //Employee update leave method
    public function update(LeaveRequest $request,$leave){
        $leave  = Leave::find($leave);
        if(!$leave){
            return response()->json(['error'=>"Leave Data Not Found"],404);
        }
        if($request->days < 1 ){
            return response()->json(['error'=>"Days Must be At least 1"],500);
        }
        try{
            $leaveData = $this->getData($request);
            $leave->update($leaveData);
            return response()->json(['success'=>"Leave has been updated successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }



    }//end method

    // get request data for add or update as refactor
    private function getData(Request $request){
        $leaveData = array(
            'leave_type_id'   => $request->input('leave_type_id'),
            'employee_id'     => $request->input('employee_id'),
            'date_from'       => $request->input('date_from'),
            'date_to'         => $request->input('date_to'),
            'days'            => $request->input('days'),
            'reason'          => $request->input('reason'),
            'remarks'         => $request->input('remarks'),
            'status'          => json_decode($request->input('status')) == true?1:0
        );
        return $leaveData;
    }//end method

    // get active leave list
    public function getLeaveList(){
        $leaveList = Leave::where('status',1)->get();
        return response()->json(compact('leaveList'));
    }// end method

    // Employee leave delete method
    public function destroy($leave_id){
        try{
            Leave::where('id',$leave_id)->first()->delete();
            return response()->json(['success'=>"Leave has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } // end method

}
