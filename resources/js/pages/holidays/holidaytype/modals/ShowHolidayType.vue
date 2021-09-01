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
                    <h4 class="modal-title" id="myModalLabel1">View Holiday Type Details</h4>
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
                                <p>Holiday Type Details</p>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered" v-if="hasHolidayType">
                                    <tr>
                                        <th>HolidayType Id </th>
                                        <td>{{holidayTypeDetails?.id}}</td>
                                    </tr>
                                    <tr>
                                        <th>HolidayType</th>
                                        <td>{{holidayTypeDetails?.holiday_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>HolidayType Description</th>
                                        <td>{{holidayTypeDetails?.description}}</td>
                                    </tr>

                                    <tr>
                                        <th>HolidayType Status</th>
                                        <td>
                                            <span  class="badge rounded-pill"
                                             :class="[holidayTypeDetails?.status != true ? 'bg-danger' : 'bg-success']">
                                               {{holidayTypeDetails?.status != true ? "InActive":"Active"}}
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
import HolidayTypeApi from '../../../../api/HolidayTypeApi';
export default {
    props:['holidayType_id'],
    data(){
        return {
           holidayTypeDetails:{}
        }
    },
    mounted(){
      this.getholidayTypeDetails();
      console.log(this.holidayType_id + 'from view holidayType details');
    },
    computed:{
        hideModal(){
            this.$emit('hideHolidayTypeShowModal',{bool:false});
        },
        hasHolidayType(){
            return Object.keys(this.holidayTypeDetails).length > 0 ;
        }
    },
    methods:{
        getholidayTypeDetails(){
            HolidayTypeApi.getHolidayTypeDetails(this.holidayType_id)
                .then(({data:{holidayTypeDetails}})=>{
                    this.holidayTypeDetails  = holidayTypeDetails;
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
