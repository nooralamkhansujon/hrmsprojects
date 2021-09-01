import {createRouter,createWebHistory} from 'vue-router';
import DashBoard  from '../pages/DashBoard';
import AddEmployee  from '../pages/employee/AddEmployee.vue';
import ViewEmployee  from '../pages/employee/ViewEmployee.vue';
import EmployeeDetails  from '../pages/employee/EmployeeDetails.vue';
import ViewDepartment  from '../pages/department/ViewDepartment.vue';
import EducationOfEmployee  from '../pages/employee/EducationOfEmployee.vue';
import ExperienceOfEmployee  from '../pages/employee/ExperienceOfEmployee.vue';
import PromotionOfEmployee  from '../pages/employee/PromotionOfEmployee.vue';
import TrainingOfEmployee  from '../pages/employee/TrainingOfEmployee.vue';
import Leaves  from '../pages/leaves/Leaves.vue';
import AddLeave  from '../pages/leaves/AddLeave.vue';
import LeaveTypeList  from '../pages/leaves/leavetypes/LeaveTypeList';
import Holidays  from '../pages/holidays/Holidays';
import HolidayTypes  from '../pages/holidays/holidaytype/HolidayTypes.vue';

import Login from '../pages/auth/Login.vue';
import Register from '../pages/auth/Register.vue';

const routes  = [
    {
        path:"/dashboard",
        component:DashBoard,
        name:"Dashboard",
        meta:{requiresAuth:true},
    },
    {
        path:"/department/list",
        component:ViewDepartment,
        name:"ViewDepartment",
        meta:{requiresAuth:true},

    },
    {
        path:"/employee/list",
        component:ViewEmployee,
        name:"ViewEmployee",
        meta:{requiresAuth:true},
    },
    {
        path:"/employee/details/:id",
        component:EmployeeDetails,
        name:"EmployeeDetails",
        props:true,
        meta:{requiresAuth:true},
    },
    {
        path:"/employee/add",
        component:AddEmployee,
        name:"AddEmployee",
        meta:{requiresAuth:true},
        props:true
        // beforeEnter: (to, from, next) => {
        //     if(to.meta.requiresAuth == true && localStorage.getItem('auth')){
        //         next();
        //     }
        //     else{
        //         next({name:"login"})
        //     }
        // }
    },
    {
        path:"/employee/experience/:employee_id",
        component:ExperienceOfEmployee,
        name:"ExperienceOfEmployee",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/employee/training/:employee_id",
        component:TrainingOfEmployee,
        name:"TrainingOfEmployee",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/employee/promotion/:employee_id",
        component:PromotionOfEmployee,
        name:"PromotionOfEmployee",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/employee/education/:employee_id",
        component:EducationOfEmployee,
        name:"EductionOfEmployee",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/employee/add_leave/",
        component:AddLeave,
        name:"AddLeave",
        meta:{requiresAuth:true},
        props:true
    },
    // employee leave routes
    {
        path:"/leave_list/",
        component:Leaves,
        name:"Leaves",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/leave_type_list/",
        component:LeaveTypeList,
        name:"LeaveTypeList",
        meta:{requiresAuth:true},
        props:true
    },

    //holiday type and holidayList routes
    {
        path:"/holiday_list/",
        component:Holidays,
        name:"Holidays",
        meta:{requiresAuth:true},
        props:true
    },
    {
        path:"/holidayType_list/",
        component:HolidayTypes,
        name:"HolidayTypes",
        meta:{requiresAuth:true},
        props:true
    },

    {
        path:"/login",
        component:Login,
        name:"login",
        meta:{guestOnly:true}
    },
    //sing up route
    {
        path:"/signup",
        component:Register,
        name:"signup",
        meta:{guestOnly:true}
    },
    {
        path:"/",
        redirect:{name:"login"}
    },


];
function isLoggedIn(){
    return !!localStorage.getItem('token');
}

const router = createRouter({
    routes,
    history:createWebHistory()
});


router.beforeEach((to, from, next) => {
    console.log(to.matched);
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      console.log(isLoggedIn());
      if (!isLoggedIn()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });
      } else {
        next();
      }
    }
    else if (to.matched.some(record => record.meta.guestOnly) ){
        ///if user is already logged in and it is login page
        if (isLoggedIn()) {
            next({
                path: '/dashboard',
                query: { redirect: to.fullPath }
            });
        }
        else {
            next();
        }

    }
    else {
      next() // make sure to always call next()!
    }
  });





export default router;
