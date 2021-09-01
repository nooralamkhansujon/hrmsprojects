import Api from './Api.js';

export default   {

    addLeave(form){
        return Api().post('leaves/add',form);
    },
    editLeave(form,leave_id){
       return Api().post(`leaves/update/${leave_id}`,form)
    },
    deleteLeave(leave_id){
       return Api().delete(`/leaves/delete/${leave_id}`)
    },
    getLeaves(){
       return Api().get('leaves/list');
    },
    getLeavesForADDLeave(){
       return Api().get('leaveList/for/add-leave');
    },
    getLeaveDetails(id){
       return Api().get(`leaves/show/${id}`);
    },

}

