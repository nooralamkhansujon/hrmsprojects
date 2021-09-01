import Department from "../api/Department.js";
export default  {
     data(){
       return {
        departmentList:[]
       }
     },
     methods:{
        getDepartment() {
            Department.departmentList()
              .then(({ data }) => {
                this.departmentList = data.departmentList;
              })
              .catch((error) => {
                console.log(error);
              })
          },
     }

}
