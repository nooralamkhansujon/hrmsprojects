<template>
  <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Leaves List</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item active">Leaves List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <router-link :to="{name:'AddLeave'}" class="btn btn-success waves-effect waves-float waves-light">
         Add Leave
      </router-link>
    </div>
  </div>
  <div class="content-body">
     <div class="d-flex justify-content-between my-3 mx-3">
        <div class="d-flex justify-content-center">
            <span style="font-size: 20px" class="mx-1">Show</span>
            <select
                v-model.trim="currentEntries"
                @change="paginateEntries()"
                class="form-control px:width-15"
            >
                <option v-for="sh in showEntries" :key="sh" :value="sh">
                {{ sh }}
                </option>
            </select>
            <span class="ml-1" style="font-size: 20px">entries</span>
        </div>
        <div class="end:flex">
            <input
                type="search"
                class="input px:width-25"
                placeholder="Search"
                v-model="searchInput"
                @keyup="searchEvent"
            />
        </div>
    </div>
     <table-data
        :entries="filteredEntries"
        @showViewModal="setShowLeaveModal"
        @showEditLeaveModal="setShowEditLeaveModal"
        @deleteLeave="deleteLeave"
        :columns="columns"
        class="basic-datatable-card"
    ></table-data>
    <div class="between:flex my-3 mx-3">
        <div style="font-size: 20px; font-weight: bold" class="text-secondary">
        Show {{ showInfo.from }} to {{ showInfo.to }} of {{ showInfo.of }} entries
        </div>
        <div class="end:flex">
            <ul class="pagination:nav">
                <li :class="['nav-item', { disabled: currentPage == 1 }]">
                    <a
                        href="#"
                        class="nav-link"
                        @click.prevent="(currentPage = 1), paginateEntries()"
                    >
                        First
                   </a>
                </li>
                <li :class="['nav-item', { disabled: currentPage == 1 }]">
                    <a
                        href="#"
                        class="nav-link"
                        @click.prevent="
                        currentPage < 1 ? (currentPage = 1) : (currentPage -= 1),
                            paginateEntries()
                        "
                    >
                    Prev
                   </a>
                </li>
                <li
                class="nav-item"
                v-for="pagi in showPagination"
                :key="pagi"
                :class="{ ellipsis: pagi === '...', active: pagi === currentPage }"
                >
                <a href="#" @click.prevent="paginateEvent(pagi)" class="nav-link">{{
                    pagi
                }}</a>
                </li>
                <li :class="['nav-item', { disabled: currentPage == allPages }]">
                <a
                    href="#"
                    class="nav-link"
                    @click.prevent="
                    currentPage > allPages
                        ? (currentPage = allPages)
                        : (currentPage += 1),
                        paginateEntries()
                    "
                >
                    Next
                </a>
                </li>
                <li :class="['nav-item', { disabled: currentPage == allPages }]">
                <a
                    href="#"
                    class="nav-link"
                    @click.prevent="(currentPage = allPages), paginateEntries()"
                >
                    Last
                </a>
                </li>
            </ul>
        </div>
    </div>
  </div>
  <ViewLeaveDetails @hideLeaveShowModal="hideLeaveShowModal"  :leave_id="leave_id" v-if="showViewModal" />
  <EditLeaveDetails @hideLeaveEditModal="hideLeaveEditModal"  :leave_id="editLeaveId" v-if="showEditModal" />
</template>

<script>

import TableData from './table/TableData.vue';
import { $array } from "alga-js";
import LeaveApi from '../../api/LeaveApi';
import ViewLeaveDetails from './models/ViewLeaveDetails.vue';
import EditLeaveDetails from './models/EditLeaveDetails.vue';
import Swal from 'sweetalert2';
export default {
  components:{
    TableData,ViewLeaveDetails,EditLeaveDetails
  },
  data(){
    return {
       columns: [
        { name: "leave_id", text: "Leave Id" },
        { name: "leave_type", text: "Leave Type" },
        { name: "employee_name", text: "Employee Name" },
        { name: "date_form", text: "Date form" },
        { name: "date_to", text: "Date To" },
        { name: "days", text: "Days" },
        { name: "reason", text: "Reason" },
        { name: "remarks", text: "Remarks" },
        { name: "status", text: "Leave status" },
        { name: "action", text: "Action" },
      ],
      leaveList:[],
      filteredEntries:[],
      showEntries:[5,10,15,25,50,100,200],
      currentEntries:10,
      currentPage:1,
      allPages:1,
      searchEntries:[],
      searchInput:"",
      showLeaveEditModal:false,//for showing edit Leaves modal
      editLeaveId:0, //for storing edit Leaves modal
      leave_id:0, //for showing leave details
      showLeaveViewModal:false
    }
  },
  computed:{
    showPagination() {
      return $array.pagination(this.allPages, this.currentPage, 2);
    },
    showInfo(){
        return $array.pageInfo(
        this.getCurrentLeavesList(),
        this.currentPage,
        this.currentEntries
      );
      //=> { from: 11, to: 12, of: 12 }
    },
    getColumns(){
       return this.columns.map(column=>{
           return column.name;
       })
    },
    showViewModal(){
        return this.showLeaveViewModal
    },
    showEditModal(){
        return this.showLeaveEditModal
    }

   },
  methods:{
    async getLeaves(){
        try{
            const {data}  = await LeaveApi.getLeaves();
            this.leaveList = data.leaveList;
            console.log( data.leaveList);
            this.paginateData(this.leaveList);
        }catch(error){
           console.log(error);
        }
    },

    ///paginate entries for paginate data
    paginateEntries(){
        //check if searchInput is given
        if(this.searchInput.length >=1 ){
            // this.searchEntries = $array.search(this.searchInput)(this.leaveList);
            this.searchEntries = $array.searchBy(this.searchInput)(this.leaveList, this.getColumns)
            this.paginateData(this.searchEntries);
        }
        //else get value from original Leaves list and then paginate
        else{
            this.paginateData(this.leaveList);
        }

    },
    //paginate entries.......
    paginateData(data) {
         //paginates entries from total list
        this.filteredEntries = $array.paginate(data, this.currentPage, this.currentEntries);
        //get pages according current entries
        this.allPages = $array.pages(data, this.currentEntries);

    },
    paginateEvent(page){
        this.currentPage  = page;
        this.paginateEntries();
    },
    searchEvent(){
        this.currentPage = 1;
        this.paginateEntries();
    },
    getCurrentLeavesList(){
       return this.searchEntries.length == 0 && this.searchInput.length == 0 ? this.leaveList:this.searchEntries;
    },
    // end of table pagination code

    setShowLeaveModal(leave_bool_obj){
        console.log(leave_bool_obj);
        this.leave_id           = leave_bool_obj.leave_id;
        this.showLeaveViewModal = leave_bool_obj.bool;
    },
    hideLeaveShowModal(leave_bool){
        this.showLeaveViewModal = leave_bool.bool;
    },
    setShowEditLeaveModal(leave_bool_obj){
        this.editLeaveId        = leave_bool_obj.leave_id;
        this.showLeaveEditModal = leave_bool_obj.bool;
    },
    hideLeaveEditModal(leave_bool){
        this.showLeaveEditModal = leave_bool.bool;
        this.getLeaves();
    },
    deleteLeave(leave_id){
        LeaveApi.deleteLeave(leave_id)
            .then(({data})=>{
                console.log(data);
                Swal.fire('Success!',data.success,'success');
                this.getLeaves();
            })
            .catch(error=>{
                console.log(error.response);
                Swal.fire('Error!',error.response.data.error,'error');
            })
    }


  },
   mounted() {
      this.getLeaves();
    //   this.getColumns
   },
};
</script>

<style scoped>
.basic-datatable-card {
  width: 100%;
  overflow-x: scroll;
}
</style>
