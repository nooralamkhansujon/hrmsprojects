import {isBoolean} from 'lodash';
export default function Form (form){
    let formData = new FormData();
    for(let formColumn in form){
        if(isBoolean(form[formColumn])){
            formData.append(formColumn,JSON.stringify(form[formColumn]));
        }
        else{
            formData.append(formColumn,form[formColumn]);
        }
    }
    return formData;

}
