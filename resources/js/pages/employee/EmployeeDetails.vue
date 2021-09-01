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
              <li class="breadcrumb-item active">Employee Details</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="content-header-right text-md-right col-md-5 col-12 d-flex end mb-2">
      <button type="button" class="btn btn-primary waves-effect waves-float waves-light">
        Export Excel
      </button>
    </div> -->
  </div>
  <div class="content-body">

   <div class="card">
        <div class="card-header d-flex justify-content-between" style="font-size:25px;">
            <p>Employee {{employeeDetails.employee_name}}  Details</p>
            <img width="200" class="border-rounded" :src="employeeDetails.employee_image" />
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Employee ID</th>
                    <td>{{employeeDetails.employee_id}}</td>
                </tr>
                <tr>
                    <th>Employee Name</th>
                    <td>{{employeeDetails.employee_name}}</td>
                </tr>
                <tr>
                    <th>Employee Department</th>
                    <td>{{employeeDetails.employee_department}}</td>
                </tr>
                <tr>
                    <th>Employee designation</th>
                    <td>{{employeeDetails.designation}}</td>
                </tr>
                <tr>
                    <th>Employee type</th>
                    <td>{{employeeDetails.employee_type}}</td>
                </tr>
                <tr>
                    <th>Basic Salary</th>
                    <td>{{employeeDetails.basic_salary}}</td>
                </tr>
                <tr>
                    <th>Gross Salary</th>
                    <td>{{employeeDetails.gross_salary}}</td>
                </tr>
                <tr>
                    <th>TIN</th>
                    <td>{{employeeDetails.tin}}</td>
                </tr>

                <tr>
                    <th> mobile_number</th>
                    <td>{{employeeDetails.mobile_number}}</td>
                </tr>
                <tr>
                    <th>Emergency Mobile Number</th>
                    <td>{{employeeDetails.emergency_mobile_number}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{employeeDetails.email}}</td>
                </tr>
                <tr>
                    <th>Joining Date</th>
                    <td>{{employeeDetails.joining_date}}</td>
                </tr>
                <tr>
                    <th>Father Name</th>
                    <td>{{employeeDetails.father_name}}</td>
                </tr>
                <tr>
                    <th>Mother Name</th>
                    <td>{{employeeDetails.mother_name}}</td>
                </tr>
                <tr>
                    <th>Nid Number</th>
                    <td>{{employeeDetails.nid_number}}</td>
                </tr>
                <tr>
                    <th>Religion</th>
                    <td>{{employeeDetails.religion}}</td>
                </tr>
                <tr>
                    <th>Blood_group</th>
                    <td>{{employeeDetails.blood_group}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{employeeDetails.gender}}</td>
                </tr>
                <tr>
                    <th>Bank Name</th>
                    <td>{{employeeDetails.bank_name}}</td>
                </tr>
                <tr>
                    <th>Bank Account Number</th>
                    <td>{{employeeDetails.bank_account_number}}</td>
                </tr>
                <tr>
                    <th>Weekly Off Day</th>
                    <td>{{employeeDetails.weekly_off_day}}</td>
                </tr>
                <tr>
                    <th>Permanent_address</th>
                    <td>{{employeeDetails.permanent_address}}</td>
                </tr>
                <tr>
                    <th>Present Address</th>
                    <td>{{employeeDetails.present_address}}</td>
                </tr>
            </table>
        </div>
   </div>
  </div>
</template>

<script>
import EmployeeApi from '../../api/Employee'
export default {
   props:['id'],
   data(){
       return {
           employeeDetails:{}
       }
   },
   methods:{
        async getSingleEmployee(){
            try{
                const {data } = await EmployeeApi.getEmployeeDetails(this.id);
                this.employeeDetails = data.employee;
                console.log(this.employeeDetails);
            }
            catch(error){
              console.log(error.response);
            }

        }
   },
   mounted(){
       console.log(this.id);
       this.getSingleEmployee();
   }
}
</script>
