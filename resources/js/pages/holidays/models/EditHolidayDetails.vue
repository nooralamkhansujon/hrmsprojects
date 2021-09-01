
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
                    <h4 class="modal-title" id="myModalLabel1">Edit Holiday</h4>
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
                                <label class="form-label" for="leave_type">Holiday Type</label>
                                <select
                                    v-model="form.holiday_type_id"
                                    class="custom-select"
                                    name="holiday_type_id"
                                    id="holiday_type_id"
                                >
                                    <option selected="">Select Holiday Type</option>
                                    <option :value="holidayType.id"
                                    v-for="holidayType in holidayTypeList" :selected="holidayType.id === form.holiday_type_id" :key="holidayType.id" >{{holidayType.holiday_type.toUpperCase()}}</option>
                                </select>
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
                            </div>
                             <div class="col-md-6 form-group">
                                <label for="reason">Reason</label>
                                <textarea name="reason"
                                    class="form-control"
                                    v-model="form.reason"
                                    placeholder="Enter Reason"></textarea>
                            </div>
                        </div>
                        <div class="row">
                             <div class="form-group col-md-3">
                                <div class="custom-control custom-checkbox mt-2">
                                    <input
                                    class="custom-control-input"
                                    type="checkbox"
                                    v-model="form.status"
                                    id="status"
                                    name="status"
                                    tabindex="3"
                                    :checked="form.status"
                                    />
                                    <label class="custom-control-label" for="status">
                                    Status
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button
                            type="submit"
                            :disabled="isClicked"
                            @click.prevent="updateHoliday"
                            class="btn btn-primary"
                            >
                            {{ isClicked ? "Please Wait..." : "Update Holiday" }}
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
import Form from '../utilites/Form';
import ResetForm from '../utilites/ResetForm';
import SetHolidayDetails from '../utilites/SetHolidayDetails';
import FormPickers from '../../../core/form-pickers.js'
import HolidayApi from '../../../api/HolidayApi';
import HolidayTypeApi from '../../../api/HolidayTypeApi';
import SetDays from '../../../mixins/SetDays';
export default {
  props:['editHolidayId'],
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
            this.$emit('hideHolidayEditModal',{bool:false});
        },
  },
  mixins:[SetDays],
  methods:{
    updateHoliday(){
        this.isClicked = true;
        HolidayApi.updateHoliday(Form(this.form),this.form.id)
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
                if(error?.response?.data?.error){
                    Swal.fire('Error!',error.response.data.error,'error');
                }
            });
    },
    getHolidayTypes(){
        HolidayTypeApi.getHolidayTypes()
        .then(({data:{holidayTypeList}})=>{
            this.holidayTypeList= holidayTypeList;
            console.log(holidayTypeList);
        })
        .catch(error=>{
            console.log(error);
        })
    },
    getHolidayDetails(){
        HolidayApi.getHolidayDetails(this.editHolidayId)
            .then(({data:{holidayDetails}})=>{
                console.log(holidayDetails)
                SetHolidayDetails(this.form,holidayDetails)
            })
            .catch(error=>{
                console.log(error?.response);
                console.log(error);
            });
    },
  },
    mounted(){
        FormPickers();
        this.getHolidayDetails();
        this.getHolidayTypes();
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
