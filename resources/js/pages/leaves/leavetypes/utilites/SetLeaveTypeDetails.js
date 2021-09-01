import { isBoolean } from "lodash";

export default function SetLeaveTypeDetails (form,data){
    for(let column in data){
        if(form.hasOwnProperty(column)){
            if(column == 'status'){
                form[column] = data[column] == 1 ? true:false
            }
            else{
                form[column] = data[column];
            }
        }
    }
}
