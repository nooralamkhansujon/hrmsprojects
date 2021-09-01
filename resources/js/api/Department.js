import Api from './Api.js';

export default   {

   departmentList(){
       return  Api().get('/department/list');
   },
   getDepartment(id){
       return Api().get(`/department/show/${id}`);
   },
   store(form){
       return Api().post('department/store',form)
   },

   update(form){
     return Api().post(`department/update/${form.id}`,form)
   },
   delete(id){
     return Api().delete(`department/destroy/${id}`)
   }
}

