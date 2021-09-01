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
    editEmployee(employee_id){
        this.$emit('showEditModal',{editModal:true,employee_id});
    }
  },
};
</script>

<template>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th v-for="th in tHeader" :key="th.name" :style="{width:th.name == 'action'?'35%':'5%' }">
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
        <td align="center">{{ row.employee_id?.substr(0,10) }}</td>
        <td>{{ row?.employee_name }}</td>
        <td>
            <img width="80" :src="row.employee_image"/>
        </td>
        <td>{{ row?.employee_department }}</td>
        <td>{{ row?.designation }}</td>
        <td>{{ row?.mobile_number }}</td>
        <td>{{ row?.joining_date }}</td>
        <td>
          <span
            class="badge rounded-pill"
            :class="[row?.employee_status != 1 ? 'bg-danger' : 'bg-success']"
          >
            {{ row?.employee_status == 1 ? "Active" : "Inactive" }}</span
          >
        </td>
        <td class="d-flex justify-content-between align-items-center">
            <a class="btn btn-sm btn-primary ml-1" href="#"
                @click.prevent="editEmployee(row?.id)">
                    <vue-feather type="edit-2" class="mr-50"></vue-feather>

            </a>
             <a
                    class="btn btn-sm btn-danger ml-1"
                    href="javascript:void(0);"
                    @click.prevent=""
                >
                    <vue-feather type="trash" class="mr-50"></vue-feather>
                </a>

            <router-link :to="{name:'EmployeeDetails',params:{id:row.id}}" class="btn btn-sm btn-success ml-1" title="View Employee Details">
                <vue-feather type="eye"></vue-feather>
            </router-link>

            <router-link :to="{name:'ExperienceOfEmployee',params:{employee_id:row.id}}" class="btn btn-sm btn-primary p-1 ml-1"  title="View Experience Details">
                Experience
            </router-link>
            <router-link :to="{name:'EductionOfEmployee',params:{employee_id:row.id}}" class="btn btn-sm btn-info p-1 ml-1"  title="View Education Details">
                Education
            </router-link>
            <router-link :to="{name:'TrainingOfEmployee',params:{employee_id:row.id}}" class="btn btn-sm  p-1 ml-1" style="background:#7FBA43;color:#fff;"  title="View Employee Training">
                Training
            </router-link>
            <router-link :to="{name:'PromotionOfEmployee',params:{employee_id:row.id}}" class="btn btn-sm btn-warning p-1 ml-1"  title="View Promotion Details">
                Promotion
            </router-link>

        </td>
      </tr>
    </tbody>
  </table>
</template>
