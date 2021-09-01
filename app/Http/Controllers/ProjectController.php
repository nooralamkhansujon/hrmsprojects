<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

     // Projects List view method
     public function index(){
        $projects = Project::orderBy('id','desc')->get();
        return response()->json(compact('projects'));
    }//end method

    //Project Single View method
    public function show(Project $project){
        return response()->json(compact('project'));
    }//end method

    //project ADD method
    public function store(ProjectRequest $request){

        $projectData = $this->getData($request);
        try{
            Project::create($projectData);
            return response()->json(['success'=>"Project has been Successfully Added"]);
        }
        catch(\Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    }//end method


    // project  Delete method
    public function destroy(Project $project){
        try{
            $project->delete();
            return response()->json(['success'=>"Project has been Deleted successfully!"]);
        }catch(\Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }

    } //end method

    // project Delet method
    public function  update(ProjectRequest $request,$project_id){
        $project  = Project::find($project_id);
        // dd($request->all());
        try{
            $projectData = $this->getData($request);
            // dd($trainingProgramData);
            $project->update($projectData);
            return response()->json(['success'=>"Project has been updated successfully!"]);
        }catch(\Exception $e){
            dump($e->getMessage());
            return response()->json(['error'=>"Some Error Occured Please Try Again!"],500);
        }
    } // end method

    // get Request data for add or update
    private function getData(Request $request){
        return array(
            'project_name'            => $request->input('project_name'),
            'project_description'     => $request->input('project_description'),
            'project_code'            => $request->input('project_code'),
            'client_id'               => $request->input('client_id'),
        );
    } //end method
}
