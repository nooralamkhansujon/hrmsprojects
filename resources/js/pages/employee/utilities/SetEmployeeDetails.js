
export default function SetEmployeeDetails (form,data){
    for(let column in data){
        form[column] = data[column];
    }
    return form;
}
