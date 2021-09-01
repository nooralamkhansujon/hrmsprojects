<template>
    <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Employee Details</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'ViewEmployee' }">Employee List</router-link>
              </li>
              <li class="breadcrumb-item active">Employee Experience Details</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <button type="button" class="btn btn-success waves-effect waves-float waves-light">
        Edit Education
      </button>
  </div>
  </div>
  <div class="content-body">

   <div class="card">
        <div class="card-header d-flex justify-content-between" style="font-size:25px;">
            <p>Employee {{employeeExperienceDetails?.employee_name}} Experience  Details</p>
            <img width="200" class="border-rounded" :src="employeeExperienceDetails?.employee_image" />
        </div>

        <div class="card-body">
            <table class="table table-bordered" v-if="hasExperience">
                <tr>
                    <th>Employee ID</th>
                    <td>{{employeeExperienceDetails?.employee_ref_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{employeeExperienceDetails?.employee_name}}</td>
                </tr>
                <tr>
                    <th>Employee Eucation Level</th>
                    <td>{{employeeExperienceDetails?.education_level}}</td>
                </tr>
                <tr>
                    <th>Employee Major Group</th>
                    <td>{{employeeExperienceDetails?.major_group}}</td>
                </tr>
                <tr>
                    <th>Employee Institute</th>
                    <td>{{employeeExperienceDetails?.institute}}</td>
                </tr>
                <tr>
                    <th>Employee Country</th>
                    <td>{{employeeExperienceDetails?.country}}</td>
                </tr>
                <tr>
                    <th> Result Type</th>
                    <td>{{employeeExperienceDetails?.result_type}}</td>
                </tr>
                <tr>
                    <th>Employee Result</th>
                    <td>{{employeeExperienceDetails?.result}}</td>
                </tr>
                <tr>
                    <th>Employee Passing Year</th>
                    <td>{{employeeExperienceDetails?.passing_year}}</td>
                </tr>
                <tr>
                    <th>Employee Duration</th>
                    <td>{{employeeExperienceDetails?.duration}}</td>
                </tr>
                <tr>
                    <th>Employee Achievement</th>
                    <td>{{employeeExperienceDetails?.achievement}}</td>
                </tr>
            </table>
            <p v-else style="color:red;text-align:center;font-size:25px;">Experience Not Found</p>
        </div>
   </div>
  </div>
</template>

<script>
import EmployeeApi from '../../api/Employee'
export default {
   props:['employee_id'],
   data(){
       return {
           employeeExperienceDetails:{}
       }
   },
   computed:{
      hasExperience(){
          return Object.keys(this.employeeExperienceDetails).length > 0;
      }
   },
   methods:{
        async getSingleExperienceOfEmployee(){
            try{
                const {data } = await EmployeeApi.getEmployeeExperienceDetails(this.employee_id);
                this.employeeExperienceDetails = data.experinceDetails;
            }
            catch(error){
              console.log(error.response);
            }

        }
   },
   created(){
       console.log(this.employee_id);
       this.getSingleExperienceOfEmployee();
   }
}
</script>
