<script>
export default {
  props: {
    columns: Array,
    entries: Array,
  },
  data() {
    return {

    };
  },
  computed: {
    tHeader() {
      return this.columns;
    },
    tBody() {
      return this.entries;
    },
  },
  methods: {
    editLeaveType(leaveType_id){
        this.$emit('showEditLeaveTypeModal',{bool:true,leaveType_id});
    },
    deleteLeaveType(leaveType_id){
        if(confirm("Are You Sure! You Want to Delete this Post?")){
            this.$emit("deleteLeaveType",leaveType_id)
        }
    },
    showLeaveType(leaveType_id){
        console.log(leaveType_id)
        this.$emit('showViewModal',{bool:true,leaveType_id});
    }
  },
};
</script>

<template>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th v-for="th in tHeader" :key="th.name" :style="{width:th.name == 'action'?'20%':'5%' }">
          <div class="d-flex justify-content-center">
            <span class="text-dark">{{ th.text }}</span>
            <span>
              <vue-feather
                size="20"
                type="chevron-down"
                class="ml-2 text-secondary"
              ></vue-feather>
            </span>
          </div>
        </th>
      </tr>
    </thead>
    <tbody style="font-size: 20px">
      <tr v-for="row in tBody" :key="row.id">
        <td align="center">{{ row.id}}</td>
        <td>{{ row?.leave_type }}</td>
        <td>{{ row?.description.substr(0,30)+"..." }}</td>
        <td>
          <span
            class="badge rounded-pill"
            :class="[row?.status != 1 ? 'bg-danger' : 'bg-success']"
          >
            {{ row?.status == 1 ? "Active" : "Inactive" }}</span
          >
        </td>
        <td class="d-flex justify-content-center align-items-center">
             <a class="btn btn-sm btn-primary ml-1" href="#" title="Show Leave Type"
                @click.prevent="showLeaveType(row?.id)">
                    <vue-feather type="eye" class="mr-50"></vue-feather>
            </a>
            <a class="btn btn-sm btn-success ml-1" href="#" title="Edit Leave Type"
                @click.prevent="editLeaveType(row?.id)">
                    <vue-feather type="edit-2" class="mr-50"></vue-feather>
            </a>
             <a
                class="btn btn-sm btn-danger ml-1"
                href="javascript:void(0);"
                @click.prevent="deleteLeaveType(row?.id)" title="Delete Leave Type"
                >
                <vue-feather type="trash" class="mr-50"></vue-feather>
            </a>
        </td>
      </tr>
    </tbody>
  </table>
</template>
