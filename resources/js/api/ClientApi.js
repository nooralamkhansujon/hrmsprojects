import Api from './Api.js';

export default   {
    lists(){
       return Api().get('/clients/list');
    },
    show(client_id){
        return Api().get(`clients/show/${client_id}`)
    },
    store(form){
        return Api().post('clients/store',form);
    },
    update(form,client_id){
       return Api().post(`clients/update/${client_id}`,form)
    },
    delete(client_id){
       return Api().delete(`/clients/delete/${client_id}`)
    },


}

