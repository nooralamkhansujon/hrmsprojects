import Api from './Api.js';

export default   {

    addHoliday(form){
       return  Api().post('holidays/store',form);
    },
    getHolidays(){
       return Api().get('holidays/list');
    },
    getHolidayDetails(holiday_id){
       return Api().get(`holidays/show/${holiday_id}`);
    },
    updateHoliday(form,holiday_id){
      return  Api().post(`holidays/update/${holiday_id}`,form);
    },
    deleteHoliday(holiday_id){
        return Api().delete(`holidays/delete/${holiday_id}`);
    }
}

