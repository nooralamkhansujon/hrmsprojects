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
              <li class="breadcrumb-item active">Employee Training Details</li>
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
        Edit Training
      </button>
    </div>
  </div>
  <div class="content-body">

   <div class="card">
        <div class="card-header d-flex justify-content-between" style="font-size:25px;">
            <p>Employee {{employeeTrainingDetails?.employee_name}} Training  Details</p>
            <img width="200" class="border-rounded" :src="employeeTrainingDetails?.employee_image" />
        </div>

        <div class="card-body">
            <table class="table table-bordered" v-if="hasTraining">
                <tr>
                    <th>Employee ID</th>
                    <td>{{employeeTrainingDetails?.employee_ref_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{employeeTrainingDetails?.employee_name}}</td>
                </tr>
                <tr>
                    <th>Training Title</th>
                    <td>{{employeeTrainingDetails?.training_title}}</td>
                </tr>
                <tr>
                    <th>Training Topices Covered</th>
                    <td>{{employeeTrainingDetails?.topics_covered}}</td>
                </tr>
                <tr>
                    <th>Training Institute</th>
                    <td>{{employeeTrainingDetails?.institute}}</td>
                </tr>
                <tr>
                    <th>Training Type</th>
                    <td>{{employeeTrainingDetails?.training_type}}</td>
                </tr>
                <tr>
                    <th> Training Country</th>
                    <td>{{employeeTrainingDetails?.country}}</td>
                </tr>
                <tr>
                    <th>Training Location</th>
                    <td>{{employeeTrainingDetails?.location}}</td>
                </tr>
                <tr>
                    <th>Training Training Year </th>
                    <td>{{employeeTrainingDetails?.training_year}}</td>
                </tr>
            </table>
            <p v-else style="color:red;text-align:center;font-size:25px;">Training Not Found</p>
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
           employeeTrainingDetails:{}
       }
   },
   computed:{
      hasTraining(){
          return Object.keys(this.employeeTrainingDetails).length > 0;
      }
   },
   methods:{
        async getSingleTrainingOfEmployee(){
            try{
                const {data } = await EmployeeApi.getEmployeeTrainingDetails(this.employee_id);
                this.employeeTrainingDetails = data.trainingDetails;
                console.log(data)
            }
            catch(error){
              console.log(error.response);
            }

        }
   },
   mounted(){
       console.log(this.employee_id);
       this.getSingleTrainingOfEmployee();
   }
}
</script>
