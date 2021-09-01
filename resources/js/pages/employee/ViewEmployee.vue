<template>
  <div class="content-header row">
    <div class="content-header-left col-md-7 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Employee List</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
              </li>
              <li class="breadcrumb-item active">Employee List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header-right text-md-right col-md-5 col-12 d-flex justify-content-end mb-2">
      <button type="button" class="btn btn-primary mr-2 waves-effect waves-float waves-light">
        Export Excel
      </button>
      <router-link :to="{name:'AddEmployee'}" class="btn btn-success waves-effect waves-float waves-light">
         Add Employee
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
        @showEditModal="ShowEditEmployeeModal"
        :entries="filteredEntries"
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
  <EditEmployeeModal :employee_id="editEmployeeId" @hideEmployeeEditModal="hideEmployeeEditModal"  v-if="showEmployeeEditModal"/>
</template>

<script>

import TableData from './table/TableData.vue';
import { $array } from "alga-js";
import EmployeeApi from '../../api/Employee';
import EditEmployeeModal from './models/EditEmployeeModal.vue'
export default {
  components:{
    TableData,EditEmployeeModal
  },
  data(){
    return {
       columns: [
        { name: "employee_id", text: "Employee Id" },
        { name: "employee_name", text: "Employee Name" },
         { name: "employee_image", text: "Employee Image" },
        { name: "employee_department", text: "Employee Department" },
        { name: "designation", text: "Designation" },
        { name: "mobile_number", text: "Mobile Number" },
        { name: "joining_date", text: "Joining Date" },
        { name: "employee_status", text: "Employee status" },
        { name: "action", text: "Action" },
      ],
      employeeList:[],
      filteredEntries:[],
      showEntries:[5,10,15,25,50,100,200],
      currentEntries:10,
      currentPage:1,
      allPages:1,
      searchEntries:[],
      searchInput:"",
      showEmployeeEditModal:false,//for showing edit employee modal
      editEmployeeId:0 //for storing edit employee modal
    }
  },
  computed:{
    showPagination() {
      return $array.pagination(this.allPages, this.currentPage, 2);
    },
    showInfo(){
        return $array.pageInfo(
        this.getCurrentEmployeeList(),
        this.currentPage,
        this.currentEntries
      );
      //=> { from: 11, to: 12, of: 12 }
    },
    getColumns(){
       return this.columns.map(column=>{
           return column.name;
       })
    }

   },
  methods:{
    async getEmployees(){
        try{
            const {data} = await EmployeeApi.getEmployees();
            this.employeeList = data.employees;
            this.paginateData(this.employeeList);
        }catch(error){
           console.log(error);
        }
    },

    ///paginate entries for paginate data
    paginateEntries(){
        //check if searchInput is given
        if(this.searchInput.length >=1 ){
            // this.searchEntries = $array.search(this.searchInput)(this.employeeList);
            this.searchEntries = $array.searchBy(this.searchInput)(this.employeeList, this.getColumns)
            this.paginateData(this.searchEntries);
        }
        //else get value from original employee list and then paginate
        else{
            this.paginateData(this.employeeList);
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
    getCurrentEmployeeList(){
       return this.searchEntries.length == 0 && this.searchInput.length == 0 ? this.employeeList:this.searchEntries;
    },
    // end of table pagination code
    ShowEditEmployeeModal(employee_and_bool){
        this.showEmployeeEditModal = employee_and_bool.editModal;
        this.editEmployeeId = employee_and_bool.employee_id;
    },
    hideEmployeeEditModal(obj){
        this.showEmployeeEditModal = obj.bool;
        if(obj?.formsuccess){
            this.getEmployees();
            this.getColumns
        }
    }

  },
   mounted() {
      this.getEmployees();
      this.getColumns
   },
};
</script>

<style scoped>
.basic-datatable-card {
  width: 100%;
  overflow-x: scroll;
}
</style>
