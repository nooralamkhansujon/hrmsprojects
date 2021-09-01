export default function SetHolidayTypeDetails(form,data){
    for(let column in data){
        console.log(column);
        if(form.hasOwnProperty(column)){
            form[column] = data[column];
        }
    }
}
