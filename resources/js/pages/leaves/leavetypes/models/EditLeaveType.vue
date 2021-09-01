
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
                    <h4 class="modal-title" id="myModalLabel1">Edit Leave</h4>
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
                                <label class="form-label" for="leave_type">Leave Type</label>
                                <input
                                    v-model="form.leave_type"
                                    class="form-control"
                                    name="leave_type"
                                    id="leave_type"
                                />
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

                             <div class="col-md-12 form-group">
                                <label for="remarks">Description</label>
                                <textarea name="remarks"
                                    class="form-control"
                                    v-model="form.description"
                                    placeholder="Enter Description" rows="5" cols="5"></textarea>
                            </div>
                         </div>
                        <button
                            type="submit"
                            :disabled="isClicked"
                            @click.prevent="updateLeaveType"
                            class="btn btn-primary"
                            >
                            {{ isClicked ? "Please Wait..." : "Edit LeaveType" }}
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
import LeaveTypeApi from '../../../../api/LeaveTypeApi';
import Form from '../utilites/Form.js'
import ResetForm from '../utilites/ResetForm.js'
import SetLeaveTypeDetails from '../utilites/SetLeaveTypeDetails';

export default {
  props:['editLeaveTypeId'],
  data(){
    return {
        isClicked:false,
        form:{
            id:"",
            leave_type:"",
            description:"",
            status:false

        },
    }
  },
  computed:{
      hideModal(){
          this.$emit('hideLeaveEditModal',{bool:false});
      },
  },
  methods:{
    updateLeaveType(){
        this.isClicked = true;
        LeaveTypeApi.updateLeaveType(Form(this.form),this.form.id)
            .then(({data})=>{
                this.isClicked = false;
                ResetForm(this.form);
                this.hideModal ///hide the edit leave modal
                Swal.fire('success',data.success,'success'); //then show success message

            })
            .catch(error=>{
                this.isClicked = false;
                console.log(error);
                Swal.fire('Error!',error.response.data.error,'error');
            })
    },
    getLeaveType()
    {
        LeaveTypeApi.getLeaveType(this.editLeaveTypeId)
            .then(({data})=>{
                console.log(data);
                const {leaveTypeDetails} = data;
                SetLeaveTypeDetails(this.form,leaveTypeDetails);
            });
    }
  },
    mounted(){
        this.getLeaveType();
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
        width:500px !important;
        /* width:100% */

    }
</style>
