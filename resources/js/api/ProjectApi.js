import Api from './Api.js';

export default   {
    lists(){
       return Api().get('/projects/list');
    },
    show(project_id){
        return Api().get(`projects/show/${project_id}`)
    },
    store(form){
        return Api().post('projects/store',form);
    },
    update(form,project_id){
       return Api().post(`projects/update/${project_id}`,form)
    },
    delete(project_id){
       return Api().delete(`/projects/delete/${project_id}`)
    },


}

