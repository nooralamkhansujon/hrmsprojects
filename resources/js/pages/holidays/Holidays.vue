<template>
  <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Holiday List</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item active">Holiday List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
        <a  @click.prevent="setShowAddHolidayModal" class="btn btn-success waves-effect waves-float waves-light">
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
        @showViewModal="setShowHolidayModal"
        @showEditHolidayModal="setShowEditHolidayModal"
        @deleteHoliday="deleteHoliday"
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
  <ShowHoliday @hideHolidayShowModal="hideHolidayShowModal"  :holiday_id="holiday_id" v-if="showHolidayModal" />

  <EditHolidayDetails @hideHolidayEditModal="hideHolidayEditModal"  :editHolidayId="editHolidayId" v-if="showEditHolidayModal" />

  <AddHoliday @hideHolidayAddModal="hideHolidayAddModal"  :holiday_id="holiday_id" v-if="showAddHolidayModal" />
</template>

<script>

import TableData from './table/TableData.vue';
import { $array } from "alga-js";
import HolidayApi from '../../api/HolidayApi';
import ShowHoliday from './models/ShowHoliday.vue';
import EditHolidayDetails from './models/EditHolidayDetails.vue';
import AddHoliday from './models/AddHoliday.vue';
import Swal from 'sweetalert2';
export default {
  components:{
    TableData,ShowHoliday,EditHolidayDetails,AddHoliday
  },
  data(){
    return {
       columns: [
            { name: "holiday_id", text: "Holiday Id" },
            { name: "holiday_type", text: "Holiday Type" },
            { name: "date_from", text: "Date From" },
            { name: "date_to", text: "Date To" },
            { name: "days", text: "Days" },
            { name: "reason", text: "Reason" },
            { name: "remarks", text: "Remarks" },
            { name: "status", text: "Holiday status" },
            { name: "action", text: "Action" },
      ],
      holidayList:[],
      filteredEntries:[],
      showEntries:[5,10,15,25,50,100,200],
      currentEntries:10,
      currentPage:1,
      allPages:1,
      searchEntries:[],
      searchInput:"",
      editHolidayId:0, //for storing edit Leaves modal
      holiday_id:0, //for showing leave details
      showAddHolidayModal:false,
      showEditHolidayModal:false,
      showHolidayModal:false,
    }
  },
  computed:{
    showPagination() {
      return $array.pagination(this.allPages, this.currentPage, 2);
    },
    showInfo(){
        return $array.pageInfo(
        this.getCurrentHolidayList(),
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
    async getHolidays(){
        try{
            const {data:{holidayList}}   = await HolidayApi.getHolidays();
            this.holidayList = holidayList;
            console.log(holidayList);
            this.paginateData(this.holidayList);
        }catch(error){
           console.log(error);
        }
    },

    ///paginate entries for paginate data
    paginateEntries(){
        //check if searchInput is given
        if(this.searchInput.length >=1 ){
            this.searchEntries = $array.searchBy(this.searchInput)(this.holidayList, this.getColumns)
            this.paginateData(this.searchEntries);
        }
        //else get value from original Leaves list and then paginate
        else{
            this.paginateData(this.holidayList);
        }

    },
    //paginate entries.......
    paginateData(data) {
        //paginates entries from total list
        this.filteredEntries = $array.paginate(data, this.currentPage, this.currentEntries);
        //get pages according current entries
        this.allPages = $array.pages(data, this.currentEntries);

    },

    //get current paginate page
    paginateEvent(page){
        this.currentPage  = page;
        this.paginateEntries();
    },//end method

    //set current page =1 when searching is occured
    searchEvent(){
        this.currentPage = 1;
        this.paginateEntries();
    },//end method

    // getcurrentHolidaylist since we have searchEntries list also that's why we need to get current list according to searching or not searching
    getCurrentHolidayList(){
       return this.searchEntries.length == 0 && this.searchInput.length == 0 ? this.holidayList:this.searchEntries;
    },//end method

    //set holidaymodal true to show modal
    setShowHolidayModal({holiday_id,bool}){
        console.log(holiday_id);
        this.holiday_id           = holiday_id;
        this.showHolidayModal     = bool;
    },//end method

    //set holidaymodal false to hide modal
    hideHolidayShowModal({bool}){
        this.showHolidayModal = bool;
    },//end method

    //set show edit holiday modal true to edit holiday
    setShowEditHolidayModal({bool,holiday_id}){
        this.editHolidayId         = holiday_id;
        this.showEditHolidayModal  = bool;
    },//end method

    //set holiday  edit modal false to hide modal
    hideHolidayEditModal({bool}){
        this.showEditHolidayModal = bool;
        this.getHolidays();
    },//end method

    //to delete holiday modal this method will be called
    deleteHoliday(holiday_id){
        HolidayApi.deleteHoliday(holiday_id)
            .then(({data:{success}})=>{
                console.log(success);
                Swal.fire('Success!',success,'success');
                this.getHolidays();
            })
            .catch(error=>{
                console.log(error.response);
                Swal.fire('Error!',error.response.data.error,'error');
            })
    },//end method
    setShowAddHolidayModal(){
      this.showAddHolidayModal = true;
    },
    hideHolidayAddModal({bool}){
        this.showAddHolidayModal = bool;
        this.getHolidays()
    }

  },
   mounted() {
      this.getHolidays();
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
