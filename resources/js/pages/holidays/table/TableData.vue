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
    editHoliday(holiday_id){
        console.log(holiday_id+"from holidays data table")
        this.$emit('showEditHolidayModal',{bool:true,holiday_id});
    },
    deleteHoliday(holiday_id){
        if(confirm("Are You Sure! You Want to Delete this Post?")){
            this.$emit("deleteHoliday",holiday_id)
        }
    },
    showHoliday(holiday_id){
        console.log(holiday_id+"from holiday_id")
        this.$emit('showViewModal',{bool:true,holiday_id});
    }
  },
};
</script>

<template>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th v-for="th in tHeader" :key="th.name" :style="{width:th.name == 'action'?'35%':'8%' }">
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
        <td align="center">{{ row.id }}</td>
        <td>{{ row?.holiday_type }}</td>
        <td>{{ row?.date_from }}</td>
        <td>{{ row?.date_to }}</td>
        <td>{{ row?.days }}</td>
        <td>{{ row?.reason.substr(0,30) }}</td>
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
            <a class="btn btn-sm btn-primary ml-1" href="#"
                @click.prevent="editHoliday(row?.id)">
                    <vue-feather type="edit-2" class="mr-50"></vue-feather>

            </a>
             <a class="btn btn-sm btn-primary ml-1" href="#" title="Show Holiday"
                @click.prevent="showHoliday(row?.id)">
                    <vue-feather type="eye" class="mr-50"></vue-feather>
            </a>
             <a
                class="btn btn-sm btn-danger ml-1"
                href="javascript:void(0);"
                @click.prevent="deleteHoliday(row?.id)" title="Delete Holiday"
                >
                <vue-feather type="trash" class="mr-50"></vue-feather>
            </a>


        </td>
      </tr>
    </tbody>
  </table>
</template>
