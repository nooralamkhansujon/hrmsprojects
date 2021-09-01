import Api from './Api.js';

export default   {

    addHolidayType(form){
       return  Api().post('holidayTypes/store',form);
    },
    getHolidayTypes(){
       return Api().get('holidayTypes/list');
    },
    getHolidayTypeDetails(holidayType_id){
       return Api().get(`holidayTypes/show/${holidayType_id}`);
    },
    updateHolidayType(form,holidayType_id){
      return  Api().post(`holidayTypes/update/${holidayType_id}`,form);
    },
    deleteHolidayType(holidayType_id){
        return Api().delete(`holidayTypes/delete/${holidayType_id}`);
    }
}

