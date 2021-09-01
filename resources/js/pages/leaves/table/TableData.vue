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
    editLeave(leave_id){
        this.$emit('showEditLeaveModal',{bool:true,leave_id});
    },
    deleteLeave(leave_id){
        if(confirm("Are You Sure! You Want to Delete this Post?")){
            this.$emit("deleteLeave",leave_id)
        }
    },
    showLeave(leave_id){
        console.log(leave_id)
        this.$emit('showViewModal',{bool:true,leave_id});
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
        <td>{{ row?.employee_name }}</td>
        <td>{{ row?.date_from }}</td>
        <td>{{ row?.date_to }}</td>
        <td>{{ row?.days }}</td>
        <td>{{ row?.reason.substr(0,20) }}</td>
        <td>{{ row?.remarks.substr(0,30) }}</td>
        <td>
          <span
            class="badge rounded-pill"
            :class="[row?.status != true ? 'bg-danger' : 'bg-success']"
          >
            {{ row?.status == true ? "Active" : "Inactive" }}</span
          >
        </td>
        <td class="d-flex justify-content-center align-items-center">
             <a class="btn btn-sm btn-primary ml-1" href="#" title="Show Leave"
                @click.prevent="showLeave(row?.id)">
                    <vue-feather type="eye" class="mr-50"></vue-feather>
            </a>
            <a class="btn btn-sm btn-success ml-1" href="#" title="Edit Leave"
                @click.prevent="editLeave(row?.id)">
                    <vue-feather type="edit-2" class="mr-50"></vue-feather>
            </a>
             <a
                class="btn btn-sm btn-danger ml-1"
                href="javascript:void(0);"
                @click.prevent="deleteLeave(row?.id)" title="Delete Leave"
                >
                <vue-feather type="trash" class="mr-50"></vue-feather>
            </a>
        </td>
      </tr>
    </tbody>
  </table>
</template>
