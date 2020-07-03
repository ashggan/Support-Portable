<template>
    <div class="col-md-6">
        <div class="counter">
            <p><strong>time left  </strong> </p>
             <div  class="row" :show="live">
                 <div class="col-md-3"> <h1 >{{days | two_digits }} </h1><p>days</p> </div>
                 <div class="col-md-3"> <h1>{{hours | two_digits}}</h1><p>hours</p> </div>
                 <div class="col-md-3"> <h1>{{minutes | two_digits}}</h1><p>minutes</p> </div>
                 <div class="col-md-3"> <h1>{{seconds | two_digits}}</h1><p>seconds</p> </div>
             </div>
             <!-- <div class="row" > -->
                 <h3 :show="outdate">this request is outdated !</h3>
             <!-- </div> -->
            <!-- <h1 ></h1> -->
        </div>
    </div>
</template>


<script>
    export default {
        props: ['updateddate','lead'],
    	data() {
			return {
            now: Math.trunc((new Date()).getTime() / 1000),
            live :true,
            outdate :false,
    			}
		},
      
        watch: {
            distance: function(){

            }
        }, 
 
        mounted() {
            this.check();
           window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);
        },    
        computed: {
            countDownDate: function(){
                return   Math.trunc(Date.parse(this.updateddate) / 1000);
            },
            leadtime: function(){
                return this.lead * 3600000 ;
            },
            distance: function(){
                return this.countDownDate + this.leadtime - this.now;
            },
            days: function(){
                 return Math.floor(this.distance / (1000 * 60 * 60 * 24));
            },
            hours: function(){
                return Math.floor((this.distance) /60 / 60 ) %24 ;
            },
            minutes: function() {
              return Math.trunc((this.distance) / 60) % 60;
            },
            seconds: function(){
                 return  Math.floor(this.distance % 60);
                 
            },

        },
        filters : {

        },
        methods :{
            check(){
                console.log( 'distance   ' + this.distance);
                //     if (this.distance < 0) {
                //     this.live = false;
                //     this.outdate = true;
                // }
            }
		}
    }
</script>

