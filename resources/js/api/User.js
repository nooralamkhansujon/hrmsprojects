import Api from './Api.js';

export default   {

    login(form){
       return  Api().post('login',form);
   },
    user(){
       return  Api().get('user');
   },
    logout(){
       return Api().get('logout');
   }
}

