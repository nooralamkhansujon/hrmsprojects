<template>
      <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">HolidayType List </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item active">HolidayType List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <a  @click.prevent="setShowAddHolidayTypeModal" class="btn btn-success waves-effect waves-float waves-light">
         Add HolidayType
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
        @showViewModal="setShowHolidayTypeModal"
        @showEditHolidayTypeModal="setShowEditHollidayTypeModal"
        @deleteHolidayType="deleteHolidayType"
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
  <AddHolidayType @hideHolidayTypeAddModal="hideHolidayTypeAddModal" v-if="showAddHolidayTypeModal"/>
  <EditHolidayType @hideHolidayTypeEditModal="hideHolidayTypeEditModal" :editHolidayType_id="editHolidayType_id" v-if="showEditHollidayTypeModal"/>

   <ShowHolidayType :holidayType_id="holidayType_id" @hideHolidayTypeShowModal="hideHolidayTypeShowModal" v-if="showHolidayTypeModal"/>
</template>

<script>
import HolidayTypeApi from '../../../api/HolidayTypeApi';
import AddHolidayType from './modals/AddHolidayType.vue'
import EditHolidayType from './modals/EditHolidayType.vue'
import ShowHolidayType from './modals/ShowHolidayType.vue'
import TableData from './table/TableData.vue';
import { $array } from "alga-js";
import Swal from 'sweetalert2'
export default {
    components:{
       AddHolidayType,EditHolidayType,ShowHolidayType,TableData
    },
    data(){
       return {
            columns: [
                { name: "holiday_type_id", text: "Holiday Type Id" },
                { name: "holiday_type", text: "Holiday Type" },
                { name: "description", text: "Description" },
                { name: "status", text: "Status" },
                { name: "action", text: "Action" },
            ],
            showAddHolidayTypeModal:false,
            showEditHollidayTypeModal:false,
            showHolidayTypeModal:false,
            isClicked:false,
            form:{
                holiday_type:"",
                description:"",
                status:false
            },
            holidayTypeList:[],
            filteredEntries:[],
            showEntries:[5,10,15,25,50,100,200],
            currentEntries:10,
            currentPage:1,
            allPages:1,
            searchEntries:[],
            searchInput:"",
            editHolidayType_id:0, //for storing edit HolidayType modal
            holidayType_id:'', //for showing HolidayType details
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
    },
    methods:{
        async getHolidayTypes(){
                try{
                    const {data:{holidayTypeList}}    = await HolidayTypeApi.getHolidayTypes();
                    this.holidayTypeList              = holidayTypeList;
                    console.log(holidayTypeList);
                    //pagiante list data
                    this.paginateData(this.holidayTypeList);
                }catch(error){
                   console.log(error);
                }
        },

         ///paginate entries for paginate data
        paginateEntries(){
            //check if searchInput is given
            if(this.searchInput.length >=1 ){
                // this.searchEntries = $array.search(this.searchInput)(this.leaveList);
                this.searchEntries = $array.searchBy(this.searchInput)(this.holidayTypeList, this.getColumns)
                this.paginateData(this.searchEntries);
            }
            //else get value from original Leaves list and then paginate
            else{
                this.paginateData(this.holidayTypeList);
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
            return this.searchEntries.length == 0 && this.searchInput.length == 0 ? this.holidayTypeList:this.searchEntries;
        },

        deleteHolidayType(holidayType_id){
            console.log(holidayType_id + " from holiday type list ");
            HolidayTypeApi.deleteHolidayType(holidayType_id)
                .then(({data:{success}})=>{
                    console.log(success);
                    Swal.fire('Success!',success,'success');
                    this.getHolidayTypes();
                })
                .catch(error=>{
                    console.log(error);
                    if(error?.response?.status == 500){
                        Swal.fire('Error!',error.response.data.error,'error');
                    }
                })
        },

        setShowAddHolidayTypeModal(){
            this.showAddHolidayTypeModal = true;
        },
        hideHolidayTypeAddModal({bool}){
            this.showAddHolidayTypeModal = bool;
            this.getHolidayTypes();
        },

        setShowHolidayTypeModal({bool,holidayType_id}){
            this.showHolidayTypeModal = bool;
            this.holidayType_id       = holidayType_id;
        },
        hideHolidayTypeShowModal({bool}){
            this.showHolidayTypeModal = bool;
        },

        setShowEditHollidayTypeModal({bool,holidayType_id}){
            this.showEditHollidayTypeModal = bool
            this.editHolidayType_id        = holidayType_id
        },
        hideHolidayTypeEditModal({bool}){
            this.showEditHollidayTypeModal = bool;
            this.getHolidayTypes();
        },


    },
    mounted(){
        this.getHolidayTypes();
    }
}
</script>


