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
              <li class="breadcrumb-item active">Employee Promotion Details</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   <div class="content-header-right text-md-right col-md-5 col-12 d-flex end mb-2 justify-content-end">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <button type="button" class="btn btn-success waves-effect waves-float waves-light">
        Edit Promotion
      </button>
  </div>
  </div>
  <div class="content-body">

   <div class="card">
        <div class="card-header d-flex justify-content-between" style="font-size:25px;">
            <p>Employee {{employeePromotionDetails?.employee_name}} Promotion  Details</p>
            <img width="200" class="border-rounded" :src="employeePromotionDetails?.employee_image" />
        </div>

        <div class="card-body">
            <table class="table table-bordered" v-if="hasPromotion">
                <tr>
                    <th>Employee ID</th>
                    <td>{{employeePromotionDetails?.employee_ref_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{employeePromotionDetails?.employee_name}}</td>
                </tr>
                <tr>
                    <th>Employee Promotion Date</th>
                    <td>{{employeePromotionDetails?.promotion_date}}</td>
                </tr>
                <tr>
                    <th>Employee Previous Designation</th>
                    <td>{{employeePromotionDetails?.previous_designation}}</td>
                </tr>
                <tr>
                    <th>Employee new designation</th>
                    <td>{{employeePromotionDetails?.new_designation}}</td>
                </tr>
                <tr>
                    <th>Employee new_degree</th>
                    <td>{{employeePromotionDetails?.new_degree}}</td>
                </tr>
                <tr>
                    <th> Previous Promotion Date</th>
                    <td>{{employeePromotionDetails?.previous_promotion_date}}</td>
                </tr>
                <tr>
                    <th>Previous Basic</th>
                    <td>{{employeePromotionDetails?.previous_basic}}</td>
                </tr>
                <tr>
                    <th>Employee New basic</th>
                    <td>{{employeePromotionDetails?.new_basic}}</td>
                </tr>
                <tr>
                    <th>Employee Previous Gross</th>
                    <td>{{employeePromotionDetails?.previous_gross}}</td>
                </tr>
                <tr>
                    <th>Employee Increment Amount</th>
                    <td>{{employeePromotionDetails?.increment_amount}}</td>
                </tr>
                <tr>
                    <th>Promotion Effect Date</th>
                    <td>{{employeePromotionDetails?.effect_date}}</td>
                </tr>
                <tr>
                    <th>Promotion Refference No</th>
                    <td>{{employeePromotionDetails?.refference_no}}</td>
                </tr>
                <tr>
                    <th>Promotion Approved</th>
                    <td>{{employeePromotionDetails?.approved == 1 ? "accept":"reject"}}</td>
                </tr>
            </table>
            <p v-else style="color:red;text-align:center;font-size:25px;">Promotion Not Found</p>
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
           employeePromotionDetails:{}
       }
   },
   computed:{
        hasPromotion(){
          return Object.keys(this.employeePromotionDetails).length > 0;
        }
   },
   methods:{
        async getSinglePromotionOfEmployee(){
            try{
                const {data } = await EmployeeApi.getEmployeePromotionDetails(this.employee_id);
                this.employeePromotionDetails = data.promotioneDetails;
            }
            catch(error){
              console.log(error.response);
            }

        }
   },
   mounted(){
       console.log(this.employee_id);
       this.getSinglePromotionOfEmployee();
   }
}
</script>
