<script>
export default {
  props: {
    columns: Array,
    entries: Array,
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
    editDepartment(row_id) {
      this.$emit("edit_department", row_id);
    },
    deleteDepartment(row_id) {
      this.$emit("delete_department", row_id);
    },
  },
};
</script>

<template>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th v-for="th in tHeader" :key="th.name">
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
        <td>{{ row.department_name }}</td>
        <td>
          <span
            class="badge rounded-pill"
            :class="[row?.status != 1 ? 'bg-danger' : 'bg-success']"
          >
            {{ row?.status == 1 ? "Active" : "Inactive" }}</span
          >
        </td>
        <td>{{ row.created_at }}</td>
        <td align="center">
             <a href="#" class="btn btn-sm btn-success text-light ml-1" @click.prevent="editDepartment(row.id)" title="Edit Department">
                <vue-feather type="edit-2" class="mr-50"></vue-feather>
                <span>Edit</span>
            </a>
             <a href="#" class="btn btn-sm btn-danger text-light ml-1" title="Delete Department" @click.prevent="deleteDepartment(row.id)">
               <vue-feather type="trash" class="mr-50"></vue-feather>
                <span>Delete</span>
            </a>
        </td>
      </tr>
    </tbody>
  </table>
</template>
