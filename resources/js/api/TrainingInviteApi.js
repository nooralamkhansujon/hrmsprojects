import Api from './Api.js';

export default   {
    lists(){
       return Api().get('/training_invites/list');
    },
    show(training_invite_id){
        return Api().get(`training_invites/show/${training_invite_id}`)
    },
    store(form){
        return Api().post('training_invites/store',form);
    },
    update(form,training_invite_id){
       return Api().post(`training_invites/update/${training_invite_id}`,form)
    },
    delete(training_invite_id){
       return Api().delete(`/training_invites/delete/${training_invite_id}`)
    },


}

