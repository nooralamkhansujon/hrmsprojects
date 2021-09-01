
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
                    <h4 class="modal-title" id="myModalLabel1">Edit Holiday Type</h4>
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
                                        :checked="form.status"
                                    />
                                    <label class="custom-control-label" for="status">
                                    Status
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div class="row">

                             <div class="col-md-6 form-group">
                                <label for="description">Description</label>
                                <textarea name="remarks"
                                    class="form-control"
                                    v-model="form.description"
                                    id="description"
                                    placeholder="Enter Description" rows="5" cols="5"></textarea>
                            </div>
                         </div>
                        <button
                            type="submit"
                            :disabled="isClicked"
                            @click.prevent="updateHolidayType"
                            class="btn btn-primary"
                            >
                            {{ isClicked ? "Please Wait..." : "Edit HolidayType" }}
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
import HolidayTypeApi from '../../../../api/HolidayTypeApi';
import Form from '../utilites/Form.js'
import ResetForm from '../utilites/ResetForm.js'
import setHolidayTypeDetails from '../utilites/setHolidayTypeDetails';

export default {
  props:['editHolidayType_id'],
  data(){
    return {
        isClicked:false,
        form:{
            id:"",
            holiday_type:"",
            description:"",
            status:false
        },
        errors:[]
    }
  },
  computed:{
      hideModal(){
          this.$emit('hideHolidayTypeEditModal',{bool:false});
      },
  },
  methods:{
    updateHolidayType(){
        this.isClicked = true;
        HolidayTypeApi.updateHolidayType(Form(this.form),this.form.id)
            .then(({data})=>{
                this.isClicked = false;
                ResetForm(this.form);
                this.hideModal ///hide the edit leave modal
                Swal.fire('success',data.success,'success'); //then show success message

            })
            .catch(error=>{
                this.isClicked = false;
                console.log(error);
                if(error?.response?.data?.error){
                    Swal.fire('Error!',error.response.data.error,'error');
                }
            })
    },
    getHolidayType()
    {
        HolidayTypeApi.getHolidayTypeDetails(this.editHolidayType_id)
            .then(({data:{holidayTypeDetails}})=>{
                console.log(holidayTypeDetails);
                setHolidayTypeDetails(this.form,holidayTypeDetails);
            });
    }
  },
    mounted(){
        this.getHolidayType();
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
