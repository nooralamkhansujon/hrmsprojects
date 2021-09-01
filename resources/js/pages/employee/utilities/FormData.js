
export default function Form (form){
    let formData = new FormData();
    for(let formColumn in form){
        formData.append(formColumn,form[formColumn]);
    }
    return formData;

}
