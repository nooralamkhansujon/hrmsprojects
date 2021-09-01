<?php

use App\Http\Controllers\AssignProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HolidayTypeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainingInviteController;
use App\Http\Controllers\TrainingProgramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();

});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout',[LogoutController::class,'logout']);

    ///employee routes
    Route::prefix('employees')->group(function () {
        Route::post('/store',[EmployeeController::class,'store']);
        Route::post('/update/{employee}',[EmployeeController::class,'update']);
        Route::get('/list',[EmployeeController::class,'index']);
        Route::get('/{id}',[EmployeeController::class,'show']);
        Route::get('/education/{employee_id}',[EmployeeController::class,'showEmployeeEducation']);
        Route::get('/experience/{employee_id}',[EmployeeController::class,'showEmployeeExperice']);
        Route::get('/promotion/{employee_id}',[EmployeeController::class,'showEmployeePromotion']);
        Route::get('/training/{employee_id}',[EmployeeController::class,'showEmployeeTraining']);
    });


    //leaves list
    Route::prefix('leaves')->group(function () {
        Route::get('/list',[LeaveController::class,'index']);
        Route::get('/show/{leave}',[LeaveController::class,'show']);
        Route::post('/add',[LeaveController::class,'store']);
        Route::post('/update/{leave}',[LeaveController::class,'update']);
        Route::delete('/delete/{leave}',[LeaveController::class,'destroy']);
    });
    // end of leave list route


    // leave type list
    Route::get('/leave_type/list',[LeaveTypeController::class,'index']);
    Route::prefix('leaveTypes')->group(function () {
        Route::get('/show/{leaveType}',[LeaveTypeController::class,'show']);
        Route::post('/add',[LeaveTypeController::class,'store']);
        Route::post('/update/{leaveType}',[LeaveTypeController::class,'update']);
        Route::delete('/delete/{leaveType}',[LeaveTypeController::class,'destroy']);
    }); //end leavetype routes


    //Holiday list
    Route::prefix('holidays')->group(function () {
        Route::get('/list',[HolidayController::class,'index']);
        Route::get('/show/{holiday}',[HolidayController::class,'show']);
        Route::post('/store',[HolidayController::class,'store']);
        Route::post('/update/{holiday}',[HolidayController::class,'update']);
        Route::delete('/delete/{holiday}',[HolidayController::class,'destroy']);
    });
    // end of leave list route

    //HolidayType list
    Route::prefix('holidayTypes')->group(function () {
        Route::get('/list',[HolidayTypeController::class,'index']);
        Route::get('/show/{holidaytype}',[HolidayTypeController::class,'show']);
        Route::post('/store',[HolidayTypeController::class,'store']);
        Route::post('/update/{holidaytype}',[HolidayTypeController::class,'update']);
        Route::delete('/delete/{holidaytype}',[HolidayTypeController::class,'destroy']);
    });
    // end of holidaytype list route


    //departments routes
    Route::prefix('department')->group(function () {
        Route::get('/list',[DepartmentController::class,'index']);
        Route::get('/show/{id}',[DepartmentController::class,'show']);
        Route::post('/store',[DepartmentController::class,'store']);
        Route::post('/update/{id}',[DepartmentController::class,'update']);
        Route::delete('/destroy/{id}',[DepartmentController::class,'destroy']);
    }); //end department routes

     //TrainingProgram list
     Route::prefix('training_programs')->group(function () {
        Route::get('/list',[TrainingProgramController::class,'index']);
        Route::get('/show/{training_program}',[TrainingProgramController::class,'show']);
        Route::post('/store',[TrainingProgramController::class,'store']);
        Route::post('/update/{training_program}',[TrainingProgramController::class,'update']);
        Route::delete('/delete/{training_program}',[TrainingProgramController::class,'destroy']);
    });
    // end of TrainingProgram list route

     //TrainingProgram list
     Route::prefix('training_invites')->group(function () {
        Route::get('/list',[TrainingProgramController::class,'index']);
        Route::get('/show/{training_invite}',[TrainingProgramController::class,'show']);
        Route::post('/store',[TrainingProgramController::class,'store']);
        Route::post('/update/{training_invite}',[TrainingProgramController::class,'update']);
        Route::delete('/delete/{training_invite}',[TrainingProgramController::class,'destroy']);
    });
    // end of TrainingProgram list route

     //TrainingInvites list
     Route::prefix('clients')->group(function () {
        Route::get('/list',[ClientController::class,'index']);
        Route::get('/show/{client}',[ClientController::class,'show']);
        Route::post('/store',[ClientController::class,'store']);
        Route::post('/update/{client}',[ClientController::class,'update']);
        Route::delete('/delete/{client}',[ClientController::class,'destroy']);
    });
    // end of Training invites list route

     //projects list
     Route::prefix('projects')->group(function () {
        Route::get('/list',[ProjectController::class,'index']);
        Route::get('/show/{project}',[ProjectController::class,'show']);
        Route::post('/store',[ProjectController::class,'store']);
        Route::post('/update/{project}',[ProjectController::class,'update']);
        Route::delete('/delete/{project}',[ProjectController::class,'destroy']);
    });
    // end of projects list route

     //assign_projects list
     Route::prefix('assign_projects')->group(function () {
        Route::get('/list',[AssignProjectController::class,'index']);
        Route::get('/show/{assign_project_id}',[AssignProjectController::class,'show']);
        Route::post('/store',[AssignProjectController::class,'store']);
        Route::post('/update/{assign_project_id}',[AssignProjectController::class,'update']);
        Route::delete('/delete/{assign_project_id}',[AssignProjectController::class,'destroy']);
    });
    // end of assign_projects list route

});



Route::post('/login',[LoginController::class,'login']);
