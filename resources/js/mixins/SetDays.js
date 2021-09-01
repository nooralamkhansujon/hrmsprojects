export default {
    computed:{
        setDays(){
            if(this.form.date_to == '' || this.form.date_from == ''){
                return this.form.days;
            }

            let date_from = new Date(this.form.date_from);
            let date_to   = new Date(this.form.date_to);
            // To calculate the time difference of two dates
            let Difference_In_Time = date_to.getTime() - date_from.getTime();
            // To calculate the no. of days between two dates
            //1000 is miliseconds 3600 minutes in 1 hours and 24 hours a day
            return this.form.days = Difference_In_Time / (1000 * 3600 * 24);

        },
    }
}
