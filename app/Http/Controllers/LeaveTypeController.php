<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveTypeRequest;
use App\Models\LeaveType;
use Exception;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{

    // Leave type List view method
    public function index(){
        $leaveTypeList = LeaveType::orderBy('id','desc')->get();
        return response()->json(compact('leaveTypeList'));
    }//end method

    //Leave type Single View method
    public function show($id){
        $leaveTypeDetails = LeaveType::where('id',$id)->first();
        return response()->json(compact('leaveTypeDetails'));
    }//end method

    //Leave Type ADD method
    public function store(LeaveTypeRequest $request){

        $leaveTypeData = $this->getData($request);
        try{
            LeaveType::create($leaveTypeData);
            return response()->json(['success'=>"LeaveType has been Successfully Added"]);
        }
        catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    }//end method


    // Leave Type Delete method
    public function destroy($leaveType_id){
        try{
            LeaveType::where('id',$leaveType_id)->first()->delete();
            return response()->json(['success'=>"LeaveType has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method

    // Leave Type Delet method
    public function  update(LeaveTypeRequest $request,$leaveType_id){
        $leaveType  = LeaveType::find($leaveType_id);
        // dd($request->all());
        try{
            $leaveTypeData = $this->getData($request);
            // dd($leaveTypeData);
            $leaveType->update($leaveTypeData);
            return response()->json(['success'=>"LeaveType has been updated successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method

    // get Request data for add or update
    private function getData(Request $request){
        return array(
            'leave_type'      => $request->input('leave_type'),
            'description'     => $request->input('description'),
            'status'          => json_decode($request->input('status')) == true?1:0
        );
    } //end method
}
