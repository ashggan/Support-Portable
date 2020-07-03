<template>
    <div class="box">
        <div class="row offset-md-1 mb-4"><h4>New User</h4></div>
        <div class="col-md-10 offset-md-1">
            <div class="alert alert-warning alert-dismissible fade show" role="alert" v-show="msg">
              <strong>{{user.name}}!</strong>  is created <a :href="'/'+user.id" class=""></a>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
        <div class="c0l-md-12">
            <form >

                <div class="form-group row mb-3">
                    <label for="name" class="col-md-10 offset-md-1 col-form-label text-md-left">Name</label>
                    <div class="col-md-8  offset-md-1">
                        <input id="name" type="text" class="form-control" name="name" v-model="name" required autofocus>
                    </div>
                </div>

                <div class="form-group row  mb-3">
                    <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">E-Mail Address</label>
                    <div class="col-md-8  offset-md-1">
                        <input id="email" type="email" class="form-control" name="email" v-model="email" required>
                    </div>
                </div>

                <div class="form-group row mb-3" >
                    <div class="col-md-10 offset-md-1 pl-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="generate">
                    <label class="form-check-label" for="exampleCheck1">  generate Password  </label>
                    </div>                  
                </div>

                <div class="form-group row mb-3" v-show="generate">
                    <div class="col-md-8">
                    <label for="password" class="col-md-8 offset-md-1 col-form-label text-md-left">geanrate passwprd</label>
                        <div class="col-md-11 offset-md-1">
                            <div class="row">
                                <div class="col-md-8"><input id="password" type="text" :value="pass" class="form-control" name="password" required></div> 
                                <div class="col-md-4"><button  class="btn btn-outline-primary " @click="generatePass">Generate</button> </div>  
                            </div>
                                      
                        </div>  
                    </div>         
                </div>

                <div class="form-group row mb-3" v-show="!generate">
                    <label for="password" class="col-md-8 offset-md-1 col-form-label text-md-left">Password</label>
                    <div class="col-md-8 offset-md-1">
                        <input id="password" type="text" class="form-control" name="password" :value="password" required>
                    </div>       
                </div>

                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-1">
                        <button type="submit"  @click.prevent="create" class="btn btn-outline-primary btn-block">
                            Registe
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
</template>


<script>
    export default {
        data() {
            return {
                // user:{name:'asgh',email:'asdasdasd',id:'1'},
                // user:{name:'',email:'',id:''},
                user:{},
                generate: false,
                pass:'',
                name:'',
                email:'',
                password:'',
                url:'/admin/users',
                msg:false,
            }
        } , 
        mounted() {
            // console.log('Component mounted.')
        },
     //    created() {
     //         console.log('created called.');
        // },
        methods :{
            generatePass(){
                this.pass =Math.random().toString(36).slice(-8);    
                // console.log('generates :'+ this.pass);                
            },
            create(){
                let formData = new FormData();
                var password;
                if (this.generate==true)   password = this.pass;
                else password = this.password;
                formData.append('name',this.name);
                formData.append('email',this.email);
                formData.append('password',password);
                axios.post(this.url,formData,{headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}} )
                    .then(res => {
                        // console.log(res.data);
                        this.user = res.data;
                        this.name=' '; this.email=' '; this.pass=''; this.password='';
                        this.user.name = res.data.name;
                        this.user.email = res.data.email;
                        this.user.id = res.data.id;
                        this.msg =true;
                });
            },


        }

    }
</script>

