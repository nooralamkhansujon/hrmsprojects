
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
                    <h4 class="modal-title" id="myModalLabel1">Add Holiday Type</h4>
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
                                <label class="form-label" for="holiday_type">Holiday Type</label>
                                <input
                                    v-model="form.holiday_type"
                                    class="form-control"
                                    name="holiday_type"
                                    id="holiday_type"
                                />
                                <span class="text-danger" v-if="errors['holiday_type']"
                                v-text="errors['holiday_type'][0]"></span>
                            </div>
                            <div class="form-group col-md-3">
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
                         <div class="row">

                             <div class="col-md-6 form-group">
                                <label for="remarks">Description</label>
                                <textarea name="remarks"
                                    class="form-control"
                                    v-model="form.description"
                                    placeholder="Enter Description" rows="5" cols="5"></textarea>
                                <span class="text-danger" v-if="errors['description']"
                                v-text="errors['description'][0]"></span>
                            </div>
                         </div>
                        <button
                            type="submit"
                            :disabled="isClicked"
                            @click.prevent="AddHolidayType"
                            class="btn btn-primary"
                            >
                            {{ isClicked ? "Please Wait..." : "Add LeaveType" }}
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
import Form from '../utilites/Form.js'
import ResetForm from '../utilites/ResetForm.js'
import HolidayTypeApi from '../../../../api/HolidayTypeApi';
export default {
    data(){
        return {
            isClicked:false,
            form:{
                holiday_type:"",
                description:"",
                status:false
            },
            errors:[]
        }
    },
    computed:{
        hideModal(){
            this.$emit('hideHolidayTypeAddModal',{bool:false});
        },
    },
    methods:{
        AddHolidayType(){
            this.isClicked = true;
            HolidayTypeApi.addHolidayType(Form(this.form))
                .then(({data:{success}})=>{
                    this.isClicked = false;
                    ResetForm(this.form);
                    this.hideModal ///hide the edit leave modal
                    Swal.fire('success',success,'success'); //then show success message

                })
                .catch(error=>{
                    this.isClicked = false;
                    console.log(error.response);
                    if(error?.response?.status == 422){
                        this.errors = error.response.data.errors
                    }
                    else{
                        Swal.fire('Error!',error.response.data.error,'error');
                    }
                })
        },


    },
    mounted(){

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
