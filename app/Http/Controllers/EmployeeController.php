<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EducationResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\TrainingResource;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Promotion;
use App\Models\Reference;
use App\Models\Relative;
use App\Models\Training;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class EmployeeController extends Controller
{

    //Employee list view  method
    public function index(){
        $employees = EmployeeResource::collection(Employee::with(['experiences','department'])->get());
        return response()->json(compact('employees'));
    } // end method

    //Employee Single view method
    public function show($id){
        try{
            $employee = new EmployeeResource(Employee::findOrFail($id));
            return response()->json(compact('employee'));
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Employee Not found "],404);
        }

    }// end method


    // Employee Education View method
    public function showEmployeeEducation($employee_id){
        try{
            $educationDetails = new EducationResource(Education::where('employee_id',$employee_id)->first());
            return response()->json(compact('educationDetails'));
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Education  Not found "],404);
        }
    }//end method


    //Employee Experience view method
    public function showEmployeeExperice($employee_id){
        try{
            $experinceDetails = new ExperienceResource(Experience::where('employee_id',$employee_id)->first());
            return response()->json(compact('experinceDetails'));
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Experience  Not found "],404);
        }
    }//end method

    // Employee Promotion view method
    public function showEmployeePromotion($employee_id){
        try{
            $promotioneDetails = new PromotionResource(Promotion::where('employee_id',$employee_id)->first());
            return response()->json(compact('promotioneDetails'));
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Promotion  Not found "],404);
        }
    }// end method

    // Employee Training view method
    public function showEmployeeTraining($employee_id){
        try{
            $trainingDetails = new TrainingResource(Training::where('employee_id',$employee_id)->first());
            // dd($trainingDetails);
            return response()->json(compact('trainingDetails'));
        }catch(Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Training  Not found "],404);
        }
    }// end method

    // Employee Add method
    public function store(EmployeeRequest $request){
            // dd($request->all());
            // array:73 [
            //     "employee_name" => null
            //     "employee_status" => null
            //     "employee_department" => null
            //     "employee_designation" => null
            //     "basic_salary" => null
            //     "gross_salary" => null
            //     "tin" => null
            //     "employee_image" => null
            //     "mobile_number" => "01725760300"
            //     "emergency_mobile_number" => null
            //     "email" => "fahimkhanmpi373950@gmail.com"
            //     "joining_date" => null
            //     "father_name" => null
            //     "mother_name" => null
            //     "nid_number" => null
            //     "religion" => null
            //     "blood_group" => null
            //     "gender" => null
            //     "bank_name" => null
            //     "bank_account_number" => null
            //     "weekly_off_day" => null
            //     "permanent_address" => "kulaura moulvibazar"
            //     "present_address" => null
            //     "education__eduction_level" => null
            //     "education__major_group" => null
            //     "education__institute" => null
            //     "education__country" => null
            //     "education__result_type" => null
            //     "education__result" => null
            //     "education__passing_year" => null
            //     "education__duration" => null
            //     "education__achievement" => null
            //     "training__training_title" => null
            //     "training__topics_covered" => null
            //     "training__institute" => null
            //     "training__training_type" => null
            //     "training__country" => "Bangladesh"
            //     "training__location" => null
            //     "training__training_year" => null
            //     "training__duration" => null
            //     "experience__company_name" => null
            //     "experience__department" => null
            //     "experience__position_held" => null
            //     "experience__responsibility" => null
            //     "experience__experience_area" => null
            //     "experience__from_date" => null
            //     "experience__to_date" => null
            //     "experience__company_address" => null
            //     "relative__name" => null
            //     "relative__relation_type" => null
            //     "relative__occupation" => null
            //     "relative__gender" => null
            //     "relative__address" => "kulaura moulvibazar"
            //     "relative__contact_number" => null
            //     "reference__name" => "nooralam khan"
            //     "reference__organization" => null
            //     "reference__relation" => null
            //     "reference__address" => null
            //     "reference__email" => null
            //     "reference__phone_number" => null
            //     "promotion__employee_number" => null
            //     "promotion__promotion_date" => null
            //     "promotion__previous_designation" => null
            //     "promotion__new_designtion" => null
            //     "promotion__previous_grade" => null
            //     "promotion__new_degree" => null
            //     "promotion__previous_promotion_date" => null
            //     "promotion__previous_basic" => null
            //     "promotion__new_basic" => null
            //     "promotion__previous_gross" => null
            //     "promotion__new_gross" => null
            //     "promotion__increment_amount" => null
            //     "promotion__effect_date" => null
            //   ]
        if($request->hasFile('employee_image') && $request->employee_image->isValid()){
            $image_ext = $request->employee_image->getClientOriginalExtension();
            $image_new_name = time().'employee'.'.'.$image_ext;
            $request->employee_image->move(public_path('images/employees'),$image_new_name);
        }

        try{
            DB::beginTransaction();
            $employeeData = array(
                'employee_name'           => $request->input('employee_name'),
                'employee_id'             => Str::random(20),
                'employee_status'         => $request->input('employee_status') == true ? 1:0,
                'employee_department'     => $request->input('employee_department'),
                'employee_type'           => $request->input('employee_type'),
                'designation'             => $request->input('employee_designation'),
                'basic_salary'            => $request->input('basic_salary'),
                'gross_salary'            => $request->input('gross_salary'),
                'tin'                     => $request->input('tin'),
                'employee_image'          => $image_new_name,
                'mobile_number'           => $request->input('mobile_number'),
                'emergency_mobile_number' => $request->input('emergency_mobile_number'),
                'email'                   => $request->input('email'),
                'joining_date'            => $request->input('joining_date'),
                'father_name'             => $request->input('father_name'),
                'mother_name'             => $request->input('mother_name'),
                'nid_number'              => $request->input('nid'),
                'religion'                => $request->input('religion'),
                'blood_group'             => $request->input('blood_group'),
                'gender'                  => $request->input('gender'),
                'bank_name'               => $request->input('bank_name'),
                'bank_account_number'     => $request->input('bank_account_number'),
                'weekly_off_day'          => $request->input('weekly_off_day'),
                'permanent_address'       => $request->input('permanent_address'),
                'present_address'         => $request->input('present_address')
            );
            $employee = Employee::create($employeeData);

            //add education data
            $educationData = array(
                'education_level'    => $request->input('education__eduction_level'),
                'major_group'        => $request->input('education__major_group'),
                'institute'          => $request->input('education__institute'),
                'country'            => $request->input('education__country'),
                'result_type'        => $request->input('education__result_type'),
                'result'             => $request->input('education__result'),
                'passing_year'       => $request->input('education__passing_year'),
                'duration'           => $request->input('education__duration'),
                'achievement'        => $request->input('education__achievement'),
                'employee_id'        => $employee->id
            );
            Education::create($educationData);

            //addd traing to database
            // $training_duration  = $request->input('training__duration');
            // $traing_duration
            $trainingData = array(
                "training_title" => $request->input('training__training_title'),
                "topics_covered" => $request->input('training__topics_covered'),
                "institute"      => $request->input('training__institute'),
                "training_type"  => $request->input('training__training_type'),
                "country"        => $request->input('training__country'),
                "location"       => $request->input('training__location'),
                "training_year"  => $request->input('training__training_year'),
                "duration"       => $request->input('training__duration'),
                'employee_id'    => $employee->id
            );
            Training::create($trainingData);
            //add experience data
            $experienceData = array(
                "company_name"     => $request->input('experience__company_name'),
                "department"       => $request->input('experience__department'),
                "position_held"    => $request->input('experience__position_held'),
                "responsibility"   => $request->input('experience__responsibility'),
                "experience_area"  => $request->input('experience__experience_area'),
                "from_date"        => $request->input('experience__from_date'),
                "to_date"          => $request->input('experience__to_date'),
                "company_address"  => $request->input('experience__company_address'),
                'employee_id'      => $employee->id
            );

           Experience::create($experienceData);

            ///reference section
            $referenceData = array(
                "name"          => $request->input('reference__name'),
                "organization"  => $request->input('reference__organization'),
                "relation"      => $request->input('reference__relation'),
                "address"       => $request->input('reference__address'),
                "email"         => $request->input('reference__email'),
                "phone_number"  => $request->input('reference__phone_number'),
                "employee_id"   => $employee->id,
            );

            Reference::create($referenceData);
            // end of reference section

            ///reference section
            $relativeData = array(
                "name"            => $request->input('relative__name'),
                "relation_type"   => $request->input('relative__relation_type'),
                "occupation"      => $request->input('relative__occupation'),
                "gender"          => $request->input('relative__gender'),
                "address"         => $request->input('relative__address'),
                "contact_number"  => $request->input('relative__contact_number'),
                "employee_id"     => $employee->id,
            );

            Relative::create($relativeData);

            // add promotion data
            $promotionData = array(
                "employee_number"            => $request->has('promotion__employee_number')? $request->input('promotion__employee_number'):null,
                "promotion_date"             => $request->has('promotion__promotion_date')? $request->input('promotion__promotion_date'):null,
                "previous_designation"       => $request->has('promotion__previous_designation')? $request->input('promotion__previous_designation'):null,
                "new_designtion"             => $request->has('promotion__new_designtion')? $request->input('promotion__new_designtion'):null,
                "previous_grade"             => $request->has('promotion__previous_grade')? $request->input('promotion__previous_grade'):null,
                "new_degree"                 => $request->has('promotion__new_degree')? $request->input('promotion__new_degree'):null,
                "previous_promotion_date"    => $request->has('promotion__previous_promotion_date')? $request->input('promotion__previous_promotion_date'):null,
                "previous_basic"             => $request->has('promotion__previous_basic')? $request->input('promotion__previous_basic'):null,
                "new_basic"                  => $request->has('promotion__new_basic')? $request->input('promotion__new_basic'):null,
                "previous_gross"             => $request->has('promotion__previous_gross')? $request->input('promotion__previous_gross'):null,
                "new_gross"                  => $request->has('promotion__new_gross')? $request->input('promotion__new_gross'):null,
                "increment_amount"           => $request->has('promotion__increment_amount')? $request->input('promotion__increment_amount'):null,
                "effect_date"                => $request->has('promotion__effect_date')? $request->input('promotion__effect_date'):null,
                'refference_no'              => Str::random(40),
                'approved'                   => 0
            );
            Promotion::create($promotionData);
            DB::commit();
            return response()->json(['success'=>"New Employee has been Registered Successfully"]);

        }catch(Exception $e){
            dump($e->getMessage());
           DB::rollBack();
           return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } //end method


    // Employee update method
    public function update(EmployeeRequest $request,Employee $employee){

        if($request->hasFile('employee_image') && $request->employee_image->isValid()){
            $image_ext = $request->employee_image->getClientOriginalExtension();
            $image_new_name = time().'employee'.'.'.$image_ext;
            $request->employee_image->move(public_path('images/employees'),$image_new_name);
        }
        else{
            $image_new_name = $employee->employee_image;
        }

        try{
            $employeeData = array(
                'employee_name'           => $request->input('employee_name'),
                'employee_id'             => $request->input('employee_id'),
                'employee_status'         => $request->input('employee_status') == true ? 1:0,
                'employee_department'     => $request->input('department_id'),
                'employee_type'           => $request->input('employee_type'),
                'designation'             => $request->input('designation'),
                'basic_salary'            => $request->input('basic_salary'),
                'gross_salary'            => $request->input('gross_salary'),
                'tin'                     => $request->input('tin'),
                'employee_image'          => $image_new_name,
                'mobile_number'           => $request->input('mobile_number'),
                'emergency_mobile_number' => $request->input('emergency_mobile_number'),
                'email'                   => $request->input('email'),
                'joining_date'            => $request->input('joining_date'),
                'father_name'             => $request->input('father_name'),
                'mother_name'             => $request->input('mother_name'),
                'nid_number'              => $request->input('nid_number'),
                'religion'                => $request->input('religion'),
                'blood_group'             => $request->input('blood_group'),
                'gender'                  => $request->input('gender'),
                'bank_name'               => $request->input('bank_name'),
                'bank_account_number'     => $request->input('bank_account_number'),
                'weekly_off_day'          => $request->input('weekly_off_day'),
                'permanent_address'       => $request->input('permanent_address'),
                'present_address'         => $request->input('present_address')
            );
            $employee->update($employeeData);
            return response()->json(['success'=>"Employee Details has been Updated Successfully"]);

        }catch(Exception $e){
            dump($e->getMessage());
           return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method
}
