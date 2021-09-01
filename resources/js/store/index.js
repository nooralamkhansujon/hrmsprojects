import {createStore} from 'vuex';


const store = createStore({
    state(){
        return {
             authUser:{}
        }
    },
    getters:{
        GET_AUTH_USER(state){
            return state.authUser;
        }
    },
    mutations:{
       SET_AUTH_USER(state,payload){
            state.authUser = payload;
       }
    },
    actions:{

    }
});




export default store;
