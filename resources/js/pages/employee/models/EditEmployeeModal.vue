<template>
     <section>
      <div class="row">
        <div class="col-12">
          <!-- Basic trigger modal -->
          <div class="basic-modal">
            <!-- add modal Modal -->
            <div

              class="edit_custom_modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="myModalLabel1"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal_content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Edit Employee</h4>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                      @click.prevent="hideModal"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="employee_id">Employee ID</label>
                                <input
                                    type="text"
                                    v-model="form.employee_id"
                                    name="employee_id"
                                    id="employee_id"
                                    class="form-control"
                                    placeholder="Enter Employee ID"
                                />
                           </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="employee_name">Employee Name</label>
                                <input
                                    type="text"
                                    v-model="form.employee_name"
                                    name="employee_name"
                                    id="employee_name"
                                    class="form-control"
                                    placeholder="johndoe"
                                />
                           </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">Employee Department</label>

                                <select
                                    class="form-control"
                                    v-model="form.department_id"
                                    name="department_id"
                                    id="department_id"
                                >
                                    <option  disabled>Select Department</option>
                                    <option
                                    v-for="(department, index) in departmentList"
                                    :key="index" :selected="department_id == department.id ? 'selected':''"
                                    :value="department.id"
                                    >
                                    {{ department.department_name }}
                                    </option>
                                </select>
                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                    <label class="form-label" for="designation"
                                        >Employee Designation</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.designation"
                                        id="designation"
                                        name="designation"
                                        class="form-control"
                                        placeholder="Enter Designation"
                                    />
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-checkbox mt-2">
                                    <input
                                    class="custom-control-input"
                                    type="checkbox"
                                    v-model="form.employee_status"
                                    id="employee_status"
                                    name="employee_status"
                                    tabindex="3"
                                    :checked="form.employee_status == 1?true:false"
                                    />
                                    <label class="custom-control-label" for="employee_status">
                                    Employee Status
                                    </label>
                                </div>
                            </div>
                             <div class="form-group col-md-4">
                                <label class="form-label" for="employee_type">
                                Employee Type
                                </label>
                                <input
                                class="form-control"
                                type="text"
                                v-model="form.employee_type"
                                id="employee_type"
                                name="employee_type"
                                tabindex="3"
                                />
                            </div>

                       </div>
                        <!-- Employee Type and Basie salary -->
                       <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="basic_salary">Basic Salary</label>
                                <input
                                    type="text"
                                    v-model="form.basic_salary"
                                    name="basic_salary"
                                    id="basic_salary"
                                    class="form-control"
                                    placeholder="Enter Basic Salary"
                                />
                            </div>
                            <div class="form-group col-md-4">
                            <label class="form-label" for="gross_salary">gross Salary</label>
                            <input
                                type="text"
                                v-model="form.gross_salary"
                                name="gross_salary"
                                id="gross_salary"
                                class="form-control"
                                placeholder="Enter Gross Salary"
                            />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="tin">Tin Number</label>
                                <input
                                    type="text"
                                    v-model="form.tin"
                                    name="tin"
                                    id="tin"
                                    class="form-control"
                                    placeholder="Enter Tin Number"
                                />
                            </div>

                       </div>
                       <!-- end of basic salary and gross salary fields -->
                    <!-- mobile number and emergency mobile number  -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="employee_image">Employee Image</label>
                            <input
                                type="file"
                                name="employee_image"
                                @change="AddEmployeeImage"
                                id="employee_image"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="mobile_number"> Mobile Number </label>
                            <input
                                type="integer"
                                v-model="form.mobile_number"
                                name="mobile_number"
                                id="mobile_number"
                                class="form-control"
                                placeholder="Enter mobile number"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="emergency_mobile_number"
                                >Emergency Mobile Number</label
                            >
                            <input
                                type="integer"
                                v-model="form.emergency_mobile_number"
                                name="emergency_mobile_number"
                                id="emergency_mobile_number"
                                class="form-control"
                                placeholder="Emergency mobile number"
                            />
                        </div>
                    </div>
                    <!-- email and Joining date -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label" for="email"> Email </label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter Email"
                            />
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="joining_date">Joining Date</label>
                            <input
                                v-model="form.joining_date"
                                type="text"
                                name="joining_date"
                                class="form-control flatpickr-basic flatpickr-input"
                                placeholder="YYYY-MM-DD"
                                readonly="readonly"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="father_name"> Father Name </label>
                            <input
                                v-model="form.father_name"
                                type="text"
                                name="father_name"
                                id="father_name"
                                class="form-control"
                                placeholder="Enter Father Name"
                            />
                        </div>
                    </div>
                    <!-- father and mother -->
                    <!-- nid_number and religion -->
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="form-label" for="mother_name">Mother Name</label>
                            <input
                                v-model="form.mother_name"
                                type="text"
                                id="mother_name"
                                name="mother_name"
                                class="form-control"
                                placeholder="Mother Name"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="nid"> National id Number </label>
                            <input
                                v-model="form.nid_number"
                                type="text"
                                name="nid"
                                id="nid"
                                class="form-control"
                                placeholder="National Id Number"
                            />
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label" for="religion">Religion</label>
                            <select class="custom-select" id="religion" name="religion" v-model="form.religion">
                                <option selected>Select Religion</option>
                                <option value="islam">Islam</option>
                                <option value="hinduism">Hinduism</option>
                                <option value="buddhism">Buddhism</option>
                                <option value="christianity">Christianity</option>
                            </select>
                        </div>
                    </div>
                    <!-- blood_group and gender -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group d-flex justify-content-start flex-column">
                                <label class="form-label"  for="blood_group"> Blood Group </label>
                                <select
                                    class="custom-select"
                                    id="blood_group"
                                    name="blood_group"
                                    v-model="form.blood_group"
                                >
                                    <option selected="">Select Blood Group</option>
                                    <option value="A">A+</option>
                                    <option value="B">B+</option>
                                    <option value="AB">AB+</option>
                                    <option value="O">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label" for="gender">Gender</label>
                            <select v-model="form.gender" class="custom-select" name="gender" id="gender">
                                <option selected="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="form-label" for="bank_name"> Bank Name </label>
                        <input
                            v-model="form.bank_name"
                            type="text"
                            name="bank_name"
                            id="bank_name"
                            class="form-control"
                            placeholder="Bank Name"
                        />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                        <label class="form-label" for="bank_account_number"
                            >Bank Account Number</label
                        >
                        <input
                            v-model="form.bank_account_number"
                            type="text"
                            name="bank_account_number"
                            id="bank_account_number"
                            class="form-control"
                            placeholder="Bank Name"
                        />
                        </div>
                        <div class="col-md-4 form-group">
                        <label class="form-label" for="permanent_address"
                            >Permanent Address</label
                        >
                        <textarea
                            v-model="form.permanent_address"
                            class="form-control"
                            id="permanent_address"
                            name="permanent_address"
                            rows="3"
                            placeholder="Permanent Address"
                        ></textarea>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label" for="present_address">present Address</label>
                            <textarea
                                v-model="form.present_address"
                                class="form-control"
                                id="present_address"
                                name="present_address"
                                rows="3"
                                placeholder="present Address"
                            >
                            </textarea>
                       </div>

                    </div>

                <div class="row">

                    <div class="form-group col-md-12">
                        <label class="form-label" for="weekly_off_day">Weekly Off day </label>
                        <select
                            v-model="form.weekly_off_day"
                            class="custom-select"
                            name="weekly_off_day"
                            id="customSelect"
                        >
                            <option selected="">Select day</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                        </select>
                    </div>


                </div>
                      <button
                        type="submit"
                        :disabled="isClicked"
                        @click.prevent="updateEmployee"
                        class="btn btn-primary"
                      >
                        {{ isClicked ? "Please Wait..." : "Edit Employee" }}
                      </button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success"   @click.prevent="hideModal" >
                      close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Basic trigger modal end -->
        </div>
      </div>
    </section>
</template>


<script>
import GetDepartment from '../../../mixins/GetDepartment';
import EmployeeApi from '../../../api/Employee';
import SetEmployeeDetails from '../utilities/SetEmployeeDetails';
import Form from '../utilities/FormData';
import Swal from 'sweetalert2';
export default {
    props:['employee_id'],
    data(){
        return {
            form: {
                id:"",
                employee_id:"",
                employee_name: "",
                employee_type:"",
                employee_status: "",
                department_id: "",
                designation: "",
                basic_salary: "",
                gross_salary: "",
                tin: "",
                employee_image: "",
                mobile_number: "",
                emergency_mobile_number: "",
                email: "",
                joining_date: "",
                father_name: "",
                mother_name: "",
                nid_number: "",
                religion: "",
                blood_group: "",
                gender: "",
                bank_name: "",
                bank_account_number: "",
                weekly_off_day: "",
                permanent_address: "",
                present_address: "",

            },
            isClicked:false
        }
    },
    mixins: [GetDepartment],
    mounted(){
        this.getDepartment();
        this.getEmployeeDetails();
    },
    computed:{
        hideModal(){
            this.$emit('hideEmployeeEditModal',{bool:false});
        }
    },
    methods:{
        getEmployeeDetails(){
            EmployeeApi.getEmployeeDetails(this.employee_id)
                       .then(({data})=>{
                           const {employee} = data;
                           SetEmployeeDetails(this.form,employee);
                       })
                       .catch(error=>{
                           console.log(error.response);
                       });
        },
        updateEmployee(){
            this.isClicked = true
            EmployeeApi.updateEmployee(Form(this.form),this.form.id)
                .then(({data})=>{
                    this.isClicked= false;
                    Swal.fire("Success",data.success,'success');
                    this.$emit('hideEmployeeEditModal',{bool:false,formsuccess:true});
                })
                .catch(error=>{
                    this.isClicked= false;
                    console.log(error);
                })
        },
        AddEmployeeImage(event){
            this.form.employee_image = event.target.files[0];
        }
    }
}
</script>


<style scoped>
    .edit_custom_modal{
        position:fixed;top:0;right:0;left:0;bottom:0;
        background:rgba(0,0,0,0.3);
        z-index:99;
        height:100vh;
        overflow-y: scroll;
        width:100vw;
    }
    .modal-dialog{
        z-index:1000000 ;
        width:80%;
        text-align: center;
        position:relative;
        left:-10%;

    }
    #modal_content{
        width:1000px !important;
        /* width:100% */

    }
</style>
