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
                    <h4 class="modal-title" id="myModalLabel1">View Holiday Details</h4>
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
                                <p>Holiday Details</p>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered" v-if="hasHoliday">
                                    <tr>
                                        <th>Holiday Id </th>
                                        <td>{{HolidayDetails?.id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Holiday Type</th>
                                        <td>{{HolidayDetails?.holiday_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date From</th>
                                        <td>{{HolidayDetails?.date_from}}</td>
                                    </tr>

                                    <tr>
                                        <th>Date To</th>
                                        <td>{{HolidayDetails?.date_to}}</td>
                                    </tr>

                                    <tr>
                                        <th>Days</th>
                                        <td>{{HolidayDetails?.days}}</td>
                                    </tr>
                                    <tr>
                                        <th>Holiday Reason</th>
                                        <td>{{HolidayDetails?.reason}}</td>
                                    </tr>

                                    <tr>
                                        <th>Holiday Remarks</th>
                                        <td>{{HolidayDetails?.remarks}}</td>
                                    </tr>


                                    <tr>
                                        <th>Holiday Status</th>
                                        <td>
                                            <span  class="badge rounded-pill"
                                             :class="[HolidayDetails?.status != true ? 'bg-danger' : 'bg-success']">
                                               {{HolidayDetails?.status != true ? "InActive":"Active"}}
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
import HolidayApi from '../../../api/HolidayApi';
export default {
    props:['holiday_id'],
    data(){
        return {
           HolidayDetails:{}
        }
    },
    mounted(){
      this.getHolidayDetails();
      console.log(this.holiday_id + 'from view leave details');
    },
    computed:{
        hideModal(){
            this.$emit('hideHolidayShowModal',{bool:false});
        },
        hasHoliday(){
            return Object.keys(this.HolidayDetails).length > 0 ;
        }
    },
    methods:{
        getHolidayDetails(){
            HolidayApi.getHolidayDetails(this.holiday_id)
                .then(({data:{holidayDetails}})=>{
                    this.HolidayDetails  = holidayDetails;
                })
                .catch(error=>{
                    console.log(error?.response);
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
