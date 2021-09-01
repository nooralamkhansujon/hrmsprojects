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
                    <h4 class="modal-title" id="myModalLabel1">View Leave Details</h4>
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
                    <div class="card">
                            <div class="card-header d-flex justify-content-between" style="font-size:25px;">
                                <p>Employee <strong>{{leaveDetails?.employee_name}}</strong> Leave  Details</p>
                                <img width="200" class="border-rounded" :src="leaveDetails?.employee_image" />
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered" v-if="hasLeave">
                                    <tr>
                                        <th>Employee Name</th>
                                        <td>{{leaveDetails?.employee_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Employee Leave Type</th>
                                        <td>{{leaveDetails?.leave_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Date From </th>
                                        <td>{{leaveDetails?.date_from}}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Date To</th>
                                        <td>{{leaveDetails?.date_to}}</td>
                                    </tr>
                                    <tr>
                                        <th> Total Leave Days</th>
                                        <td>{{leaveDetails?.days}}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Reason</th>
                                        <td>{{leaveDetails?.reason}}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Remarks</th>
                                        <td>{{leaveDetails?.remarks}}</td>
                                    </tr>
                                    <tr>
                                        <th>Leave Status</th>
                                        <td>
                                            <span  class="badge rounded-pill"
                                             :class="[leaveDetails?.status != true ? 'bg-danger' : 'bg-success']">
                                               {{leaveDetails?.status != true ? "InActive":"Active"}}
                                            </span>

                                        </td>
                                    </tr>
                                </table>
                                <p v-else style="color:red;text-align:center;font-size:25px;">No Leave Data Found</p>
                            </div>
                    </div>
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
import LeaveApi from '../../../api/LeaveApi';
export default {
    props:['leave_id'],
    data(){
        return {
           leaveDetails:{}
        }
    },
    mounted(){
      this.getLeaveDetails();
      console.log(this.leave_id + 'from view leave details');
    },
    computed:{
        hideModal(){
            this.$emit('hideLeaveShowModal',{bool:false});
        },
        hasLeave(){
            return Object.keys(this.leaveDetails).length > 0 ;
        }
    },
    methods:{
        getLeaveDetails(){
            LeaveApi.getLeaveDetails(this.leave_id)
                    .then(({data})=>{
                        const {leaveDetails} = data;
                        this.leaveDetails  = leaveDetails;
                    })
                    .catch(error=>{
                        console.log(error.response);
                    });
        },

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
