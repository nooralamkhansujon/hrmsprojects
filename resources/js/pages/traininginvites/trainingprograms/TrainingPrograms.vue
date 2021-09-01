<template>
      <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">LeaveType List </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item active">LeaveType List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <a  @click.prevent="setShowAddLeaveTypeModal" class="btn btn-success waves-effect waves-float waves-light">
         Add LeaveType
      </a>
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
        @showViewModal="setShowLeaveTypeModal"
        @showEditLeaveTypeModal="setShowEditLeaveTypeModal"
        @deleteLeaveType="deleteLeaveType"
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
  <AddLeaveTypeModal @hideLeaveAddModal="hideAddLeaveTypeModal" v-if="showAddModal"/>
  <EditLeaveTypeModal @hideLeaveEditModal="hideEditLeaveTypeModal" :editLeaveTypeId="editLeaveTypeId" v-if="showEditModal"/>
   <ShowLeaveTypeModal :leaveType_id="leaveType_id" @hideLeaveTypeShowModal="hideLeaveTypeModal" v-if="showViewModal"/>
</template>

<script>
import LeaveTypeApi from '../../../api/LeaveTypeApi';
import AddLeaveTypeModal from './models/AddLeaveType.vue'
import EditLeaveTypeModal from './models/EditLeaveType.vue'
import ShowLeaveTypeModal from './models/ShowLeaveType.vue'
import TableData from './table/TableData.vue';
import { $array } from "alga-js";
import Swal from 'sweetalert2'
export default {
    components:{
       AddLeaveTypeModal,EditLeaveTypeModal,ShowLeaveTypeModal,TableData
    },
    data(){
       return {
            columns: [
                { name: "leave_type_id", text: "Leave Type Id" },
                { name: "leave_type", text: "Leave Type" },
                { name: "description", text: "Description" },
                { name: "status", text: "Status" },
                { name: "action", text: "Action" },
            ],
            showAddLeaveTypeModal:false,
            showEditLeaveTypeModal:false,
            showLeaveTypeModal:false,
            isClicked:false,
            form:{
                leave_type:"",
                description:"",
                status:false
            },
            leaveTypeList:[],
            filteredEntries:[],
            showEntries:[5,10,15,25,50,100,200],
            currentEntries:10,
            currentPage:1,
            allPages:1,
            searchEntries:[],
            searchInput:"",
            editLeaveTypeId:0, //for storing edit Leaves modal
            leaveType_id:'', //for showing leave details
       }
    },
    computed:{
        showPagination() {
           return $array.pagination(this.allPages, this.currentPage, 2);
        },
        showInfo(){
            return $array.pageInfo(
            this.getCurrentLeaveTypesList(),
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

        showEditModal(){
            return this.showEditLeaveTypeModal
        },
        showViewModal(){
            return this.showLeaveTypeModal
        },
        showAddModal(){
            return this.showAddLeaveTypeModal;
        }



    },
    methods:{
        async getLeaveTypes(){
                try{
                    const {data}  = await LeaveTypeApi.getLeaveTypes();
                    this.leaveTypeList = data.leaveTypeList;
                    console.log( data.leaveTypeList);
                    this.paginateData(this.leaveTypeList);
                }catch(error){
                   console.log(error);
                }
        },
         ///paginate entries for paginate data
        paginateEntries(){
            //check if searchInput is given
            if(this.searchInput.length >=1 ){
                // this.searchEntries = $array.search(this.searchInput)(this.leaveList);
                this.searchEntries = $array.searchBy(this.searchInput)(this.leaveTypeList, this.getColumns)
                this.paginateData(this.searchEntries);
            }
            //else get value from original Leaves list and then paginate
            else{
                this.paginateData(this.leaveTypeList);
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
        getCurrentLeaveTypesList(){
            return this.searchEntries.length == 0 && this.searchInput.length == 0 ? this.leaveTypeList:this.searchEntries;
        },
        setShowLeaveTypeModal(leaveTypeAndBool){
            this.showLeaveTypeModal = leaveTypeAndBool.bool;
            this.leaveType_id       = leaveTypeAndBool.leaveType_id;
        },

        deleteLeaveType(leaveType_id){
            console.log(leaveType_id + " from leave type list ");
            LeaveTypeApi.deleteLeaveType(leaveType_id)
                .then(({data})=>{
                    console.log(data);
                    Swal.fire('Success!',data.success,'success');
                    this.getLeaveTypes();
                })
                .catch(error=>{
                    console.log(error);
                    Swal.fire('Error!',error.response.data.error,'error');
                })
        },

        setShowAddLeaveTypeModal(){
            this.showAddLeaveTypeModal = true;
        },
        hideLeaveTypeModal(obj){
            this.showLeaveTypeModal = obj.bool;
        },

        setShowEditLeaveTypeModal(leaveTypeAndBool){
            this.showEditLeaveTypeModal = leaveTypeAndBool.bool;
            this.editLeaveTypeId        = leaveTypeAndBool.leaveType_id;
        },
        hideEditLeaveTypeModal(obj){
            this.showEditLeaveTypeModal = obj.bool;
            this.getLeaveTypes();
        },
        hideAddLeaveTypeModal(obj){
            this.showAddLeaveTypeModal = obj.bool;
            this.getLeaveTypes();
        }

    },
    mounted(){
        this.getLeaveTypes();
    }
}
</script>


