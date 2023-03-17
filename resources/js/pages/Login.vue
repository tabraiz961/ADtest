<template>
    <section class='login' id='login'>
        <div class='head'>
            <h1 class='company'>Login Page</h1>
        </div>
        <p class="text-danger" v-if="error">{{ error }}</p>
        <div class='form'>
            <form name="login-form" @submit.prevent="login">
                <input type="text" placeholder='Email' v-model='form.email' class='text' id='username' required><br>
                <input type="password" placeholder='••••••••••••••' class='password' v-model="form.password"><br>
                <!-- <a href="#" class='btn-login' id='do-login'></a> -->
                <button  class="btn-login">Submit</button>
                <!-- <a href="#" class='forgot'>Register</a> -->
                <router-link to="/register" class="forgot">Register </router-link>
            </form>
        </div>
    </section>
    <footer>
    </footer>
</template>

<script >
    import {reactive, ref} from 'vue'
    import router from '.././router.js'
    export default {
        setup(){
            let form = reactive({
                email:'',
                password:''
            })
            let error = ref('')
            // let self = this
            const login = async() =>  {
                await axios.post('api/login', form).then(response => {
                    if(response.data.success){
                        router.push('dashboard');
                    }else{
                        console.log(response.data.message);
                        if(response.data.message){
                            error.value = response.data.message;
                        }
                    }
                });
            }
            return {form,error, login}
        }

    }
</script>


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
    float: right;
    margin-top: 5px;
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
</style>
