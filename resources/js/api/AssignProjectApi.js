import Api from './Api.js';

export default   {
    lists(){
       return Api().get('/assign_projects/list');
    },
    show(assign_project_id){
        return Api().get(`assign_projects/show/${assign_project_id}`)
    },
    store(form){
        return Api().post('assign_projects/store',form);
    },
    update(form,assign_project_id){
       return Api().post(`assign_projects/update/${assign_project_id}`,form)
    },
    delete(assign_project_id){
       return Api().delete(`/assign_projects/delete/${assign_project_id}`)
    },


}

