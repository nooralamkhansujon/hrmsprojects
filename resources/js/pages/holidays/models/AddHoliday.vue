
<template>
     <section>
      <div class="row">
        <div class="col-12">
          <!-- Basic trigger modal -->
          <div class="basic-modal">
            <!-- add modal Modal -->
            <div
              class="edit_custom_modal"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal_content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Add Holiday</h4>
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
                            <div class="form-group col-md-6">
                                <label class="form-label" for="holiday_type_id">Holiday Type</label>
                                <select
                                    v-model="form.holiday_type_id"
                                    class="custom-select"
                                    name="holiday_type_id"
                                    id="holiday_type_id"
                                >
                                    <option selected="">Select Holiday Type</option>
                                    <option :value="holidayType.id" v-for="holidayType in holidayTypeList" :key="holidayType.id" >{{holidayType.holiday_type.toUpperCase()}}</option>
                                </select>
                                 <span class="text-danger" v-if="errors['holiday_type_id']"
                                v-text="errors['holiday_type_id'][0]"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="joining_date">Date From</label>
                                <input
                                    v-model="form.date_from"
                                    type="text"
                                    name="date_from"
                                    class="form-control flatpickr-basic flatpickr-input"
                                    placeholder="YYYY-MM-DD"
                                    readonly="readonly"
                                />
                                <span class="text-danger" v-if="errors['date_from']"
                                v-text="errors['date_from'][0]"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="date_from">Date To</label>
                                <input
                                    v-model="form.date_to"
                                    type="text"
                                    name="date_to"
                                    class="form-control flatpickr-basic flatpickr-input"
                                    placeholder="YYYY-MM-DD"
                                    readonly="readonly"
                                />
                                <span class="text-danger" v-if="errors['date_to']"
                                v-text="errors['date_to'][0]"></span>
                            </div>
                             <div class="col-md-6 form-group">
                                <label for="days">Days</label>
                                <input
                                    v-model="setDays"
                                    type="text"
                                    name="days"
                                    class="form-control"
                                    placeholder="DD"
                                    readonly="readonly"
                                />
                                <span class="text-danger" v-if="errors['days']"
                                v-text="errors['days'][0]"></span>
                            </div>
                        </div>
                        <!-- nid_number and religion -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks"
                                    class="form-control"
                                    v-model="form.remarks"
                                    placeholder="Enter Remarks"></textarea>
                                <span class="text-danger" v-if="errors['remarks']"
                                v-text="errors['remarks'][0]"></span>
                            </div>
                             <div class="col-md-6 form-group">
                                <label for="reason">Reason</label>
                                <textarea name="reason"
                                    class="form-control"
                                    v-model="form.reason"
                                    placeholder="Enter Reason"></textarea>
                                <span class="text-danger" v-if="errors['reason']"
                                v-text="errors['reason'][0]"></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input
                                        class="custom-control-input"
                                        type="checkbox"
                                        v-model="form.status"
                                        id="status"
                                        name="status"
                                        tabindex="3"
                                        />
                                        <label class="custom-control-label" for="status">
                                        Status
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button
                            type="submit"
                            :disabled="isClicked"
                            @click.prevent="AddHoliday"
                            class="btn btn-primary"
                            >
                            {{ isClicked ? "Please Wait..." : "Add Holiday" }}
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

import Swal from 'sweetalert2';
import HolidayApi from '../../../api/HolidayApi';
import Form from '../utilites/Form.js'
import ResetForm from '../utilites/ResetForm.js'
import HolidayTypeApi from '../../../api/HolidayTypeApi';
import FormPickers from '../../../core/form-pickers.js';
import SetDays from '../../../mixins/SetDays'
export default {
    data(){
        return {
            isClicked:false,
            form:{
                id:"",
                holiday_type_id:"",
                date_from:"",
                date_to:"",
                days:"",
                reason:"",
                remarks:"",
                status:false
            },
            holidayTypeList:[],
            errors:[]
        }
    },
    computed:{
        hideModal(){
            this.$emit('hideHolidayAddModal',{bool:false});
        },
    },
    mixins:[SetDays],
    methods:{
        AddHoliday(){
            this.isClicked = true;
            HolidayApi.addHoliday(Form(this.form))
                .then(({data:{success}})=>{
                    this.isClicked = false;
                    ResetForm(this.form);
                    this.hideModal ///hide the edit leave modal
                    Swal.fire('success',success,'success'); //then show success message

                })
                .catch(error=>{
                    this.isClicked = false;
                    console.log(error);
                    if(error?.response?.status == 422){
                        this.errors = error.response.data.errors
                    }
                    else{
                        Swal.fire('Error!',error.response.data.error,'error');
                    }
                })
        },

        getHolidayTypeList(){
            HolidayTypeApi.getHolidayTypes()
                .then(({data:{holidayTypeList}})=>{
                     this.holidayTypeList = holidayTypeList;
                })
        }


    },
    mounted(){
        FormPickers();
       this.getHolidayTypeList()
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
