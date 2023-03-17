<template>
    <section class='login' id='login'>
        <div class='head'>
            <img src="https://mateuspntx.github.io/templates/login-page/i/telescope.png">
            <h1 class='company'>Register Page</h1>
        </div>
        <p class="text-danger" v-if="r_error">{{ r_error }}</p>
        <div class='form' >
            <form name="login-form mt-3" @submit.prevent="register">
                <input type="text" placeholder='Email' v-model='form.email' class='text' id='username' required><br>
                <input type="password" placeholder='password' class='password' v-model="form.password"><br>
                <input type="password" placeholder='password' class='password' v-model="form.password_confirmation"><br>
                <input type="text" placeholder='Date of Birth' class='dob' id="dob" v-model="form.dob"><br>
                <button  class="btn-login mt-3">Submit</button>
            </form>
        </div>
    </section>
    <footer>
    </footer>

</template>
<style>
body {
  font-family: Assistant, sans-serif;
  display: flex;
  min-height: 90vh;
}
.login {
    color: white;
    width: 40%;
    display: flex;
    /* margin-top: 20%; */
    background: linear-gradient(to right, #267871, #136a8a);
    margin: auto;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2), 0px 10px 20px rgba(0,0,0,0.3), 0px 30px 60px 1px rgba(0,0,0,0.5);
    border-radius: 8px;
    padding: 50px;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 10%;
}
.login .head {
  display: flex;
  align-items: center;
  justify-content: center;
}
.login .head .company {
  font-size: 2.2em;
}
.login .msg {
  text-align: center;
}
.login .form input[type=text].text {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
}
.login .form .text::placeholder {
  color: #D3D3D3;
}
.login .form input[type=password].password {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px white;
  width: 100%;
  color: white;
  font-size: 1em;
  outline: none;
  margin-bottom: 20px;
  margin-top: 20px;
}
.login .form .password::placeholder {
  color: #D3D3D3;
}
.login .form .btn-login {
  background: none;
  text-decoration: none;
  color: white;
  box-shadow: 0px 0px 0px 2px white;
  border-radius: 3px;
  padding: 5px 2em;
  transition: 0.5s;
}
.login .form .btn-login:hover {
    background: #0e3f4e;
    color: white;
    transition: 0.5s;
}
.login .forgot {
  text-decoration: none;
  color: white;
  margin-top: 5px;
  float: right;
}
footer {
  position: absolute;
  color: #136a8a;
  bottom: 10px;
  padding-left: 20px;
}
footer p {
  display: inline;
}
footer a {
  color: green;
  text-decoration: none;
}
footer a:hover {
  text-decoration: underline;
}
footer .heart {
  color: #B22222;
  font-size: 1.5em
}
/* div#ui-datepicker-div {
    color: white;
    background: #000000;
}

a.ui-state-default {
    color: white;
} */
</style>
<script >

import {reactive, ref} from 'vue'
    import router from '.././router.js'
    export default {
        mounted(){
            $( "#dob" ).datepicker();
            $( "#dob" ).datepicker( "option", "dateFormat", 'mm/dd/yy');
            $('#datepicker').datepicker( "option", "minDate", new Date(moment().subtract(12, 'years').format("YYYY,MM,DD") ) )
        },
        setup(){
            let form = reactive({
                email:'',
                password:'',
                password_confirmation:'',
                dob:''
            })
            let r_error = ref('')
            console.log(moment().subtract(12, 'years').format("MM-DD-YYYY"));
            // let self = this
            const register = async() =>  {
                await axios.post('api/register', form).then(response => {
                    console.log(response);
                    if(response.data.success){
                        router.push('dashboard');
                    }else{
                        console.log(response.data.message);
                        if(response.data.message){
                            r_error.value = response.data.message;
                        }
                    }
                });
            }

            return {form, r_error, register}
        }

    }
</script>
