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
              <li class="breadcrumb-item active">Employee Education Details</li>
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
            <p>Employee {{employeeEducationDetails?.employee_name}} Education  Details</p>
            <img width="200" class="border-rounded" :src="employeeEducationDetails?.employee_image" />
        </div>

        <div class="card-body">
            <table class="table table-bordered" v-if="hasEducation">
                <tr>
                    <th>Employee ID</th>
                    <td>{{employeeEducationDetails?.employee_ref_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{employeeEducationDetails?.employee_name}}</td>
                </tr>
                <tr>
                    <th>Employee Eucation Level</th>
                    <td>{{employeeEducationDetails?.education_level}}</td>
                </tr>
                <tr>
                    <th>Employee Major Group</th>
                    <td>{{employeeEducationDetails?.major_group}}</td>
                </tr>
                <tr>
                    <th>Employee Institute</th>
                    <td>{{employeeEducationDetails?.institute}}</td>
                </tr>
                <tr>
                    <th>Employee Country</th>
                    <td>{{employeeEducationDetails?.country}}</td>
                </tr>
                <tr>
                    <th> Result Type</th>
                    <td>{{employeeEducationDetails?.result_type}}</td>
                </tr>
                <tr>
                    <th>Employee Result</th>
                    <td>{{employeeEducationDetails?.result}}</td>
                </tr>
                <tr>
                    <th>Employee Passing Year</th>
                    <td>{{employeeEducationDetails?.passing_year}}</td>
                </tr>
                <tr>
                    <th>Employee Duration</th>
                    <td>{{employeeEducationDetails?.duration}}</td>
                </tr>
                <tr>
                    <th>Employee Achievement</th>
                    <td>{{employeeEducationDetails?.achievement}}</td>
                </tr>
            </table>
            <p v-else style="color:red;text-align:center;font-size:25px;">No Education Data Found</p>
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
           employeeEducationDetails:{}
       }
   },
    computed:{
        hasEducation(){
          return Object.keys(this.employeeEducationDetails).length > 0;
        }
   },
   methods:{
        async getSingleEductionOfEmployee(){
            try{
                const {data } = await EmployeeApi.getEmployeeEducationDetails(this.employee_id);
                this.employeeEducationDetails = data.educationDetails;
            }
            catch(error){
              console.log(error.response);
            }

        }
   },
   mounted(){
       console.log(this.employee_id);
       this.getSingleEductionOfEmployee();
   }
}
</script>
