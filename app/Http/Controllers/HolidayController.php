<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Http\Resources\HolidayReasource;
use App\Models\Holiday;
use Exception;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
   //Holiday  list view
    public function index(){
        $holidayList = HolidayReasource::collection(Holiday::with(['holidayType'])->get());
        return response()->json(compact('holidayList'));
    } // end method

    // Holiday single view
    public function show($id){
        $singleHoliday  = Holiday::with(['holidayType'])->where('id',$id)->first();
        $holidayDetails = new HolidayReasource($singleHoliday);
        return response()->json(compact('holidayDetails'));
    }//end method

    //Holiday add  method
    public function store(HolidayRequest $request){
        if($request->days < 1 ){
            return response()->json(['error'=>"Days Must be greather then 0"],500);
        }
        $holidayData = $this->getData($request);
        try{
            Holiday::create($holidayData);
            return response()->json(['success'=>"Holiday has been Successfully Added"]);
        }
        catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method


    //Employee update  method
    public function update(HolidayRequest $request,$holiday_id){
        $holiday  = Holiday::find($holiday_id);
        if(!$holiday){
            return response()->json(['error'=>"Holiday Data Not Found"],404);
        }
        if($request->days < 1 ){
            return response()->json(['error'=>"Days Must be At least 1"],500);
        }
        try{
            $holidayData = $this->getData($request);
            $holiday->update($holidayData);
            return response()->json(['success'=>"Holiday has been updated successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }



    }//end method

    // get request data for add or update as refactor
    private function getData(Request $request){
        $holidayData = array(
            'holiday_type_id'   => $request->input('holiday_type_id'),
            'date_from'       => $request->input('date_from'),
            'date_to'         => $request->input('date_to'),
            'days'            => $request->input('days'),
            'reason'          => $request->input('reason'),
            'remarks'         => $request->input('remarks'),
            'status'          => json_decode($request->input('status')) == true?1:0
        );
        return $holidayData;
    }//end method

    // get active leave list
    public function getHolidayActiveList(){
        $holidayActiveList = Holiday::where('status',1)->get();
        return response()->json(compact('holidayActiveList'));
    }// end method

    // Employee leave delete method
    public function destroy($holiday_id){
        try{
            Holiday::where('id',$holiday_id)->first()->delete();
            return response()->json(['success'=>"Holiday has been Deleted successfully!"]);
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } // end method
}
