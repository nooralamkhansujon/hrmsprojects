import Api from './Api.js';

export default   {
    getLeaveTypes(){
       return Api().get('/leave_type/list');
    },
    getLeaveType(leave_type_id){
        return Api().get(`leaveTypes/show/${leave_type_id}`)
    },
    addLeaveType(form){
        return Api().post('leaveTypes/add',form);
    },
    updateLeaveType(form,leaveType_id){
       return Api().post(`leaveTypes/update/${leaveType_id}`,form)
    },
    deleteLeaveType(leaveType_id){
       return Api().delete(`/leaveTypes/delete/${leaveType_id}`)
    },


}

