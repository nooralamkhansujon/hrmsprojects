import Api from './Api.js';

export default   {
    list(){
       return Api().get('/training_programs/list');
    },
    show(training_program_id){
        return Api().get(`training_programs/show/${training_program_id}`)
    },
    store(form){
        return Api().post('training_programs/store',form);
    },
    update(form,training_program_id){
       return Api().post(`training_programs/update/${training_program_id}`,form)
    },
    delete(leaveType_id){
       return Api().delete(`/training_programs/delete/${training_program_id}`)
    },


}

