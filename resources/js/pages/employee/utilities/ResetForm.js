import { isBoolean } from "lodash";

export default function ResetForm(form){
    for(let column in form){

        if(isBoolean(form[column]) || form[column] == true){
              form[column] = false;
        }
        else{
            form[column] = "";
        }

    }


}
