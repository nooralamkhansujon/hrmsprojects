<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayTypeRequest;
use App\Models\HolidayType;
use Exception;
use Illuminate\Http\Request;

class HolidayTypeController extends Controller
{
     // Holiday type List view method
     public function index(){
        $holidayTypeList = HolidayType::orderBy('id','desc')->get();
        return response()->json(compact('holidayTypeList'));
    }//end method

    //Holiday type Single View method
    public function show($id){
        $holidayTypeDetails = HolidayType::where('id',$id)->first();
        return response()->json(compact('holidayTypeDetails'));
    }//end method

    //Holiday Type ADD method
    public function store(HolidayTypeRequest $request){

        $holidayTypeData = $this->getData($request);
        try{
            HolidayType::create($holidayTypeData);
            return response()->json(['success'=>"holidayType has been Successfully Added"]);
        }
        catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    }//end method


    // Holiday Type Delete method
    public function destroy($holidayType_id){
        try{
            HolidayType::where('id',$holidayType_id)->first()->delete();
            return response()->json(['success'=>"holidayType has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method

    // Holiday Type Delet method
    public function  update(HolidayTypeRequest $request,$holidayType_id){
        $holidayType  = HolidayType::find($holidayType_id);
        // dd($request->all());
        try{
            $holidayTypeData = $this->getData($request);
            // dd($holidayTypeData);
            $holidayType->update($holidayTypeData);
            return response()->json(['success'=>"holidayType has been updated successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method

    // get Request data for add or update
    private function getData(Request $request){
        return array(
            'holiday_type'      => $request->input('holiday_type'),
            'description'     => $request->input('description'),
            'status'          => json_decode($request->input('status')) == true?1:0
        );
    } //end method
}
