import Api from './Api.js';

export default   {

  addEmployee(form){
       return  Api().post('employees/store',form);
   },
   getEmployees(){
       return Api().get('employees/list');
   },
   getEmployeeDetails(id){
       return Api().get(`employees/${id}`);
   },
   getEmployeeEducationDetails(employee_id){
        return Api().get(`/employees/education/${employee_id}`);
   },
   getEmployeeExperienceDetails(employee_id){
        return Api().get(`/employees/experience/${employee_id}`);
   },
   getEmployeePromotionDetails(employee_id){
        return Api().get(`/employees/promotion/${employee_id}`);
   },
   getEmployeeTrainingDetails(employee_id){
        return Api().get(`/employees/training/${employee_id}`);
   },
   updateEmployee(form,employee_id){
    return  Api().post(`employees/update/${employee_id}`,form);
   }
}

