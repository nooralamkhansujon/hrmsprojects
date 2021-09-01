export default function SetLeaveDetails (form,data){
    for(let column in data){
        if(form.hasOwnProperty(column)){
            form[column] = data[column];
        }
    }
}
