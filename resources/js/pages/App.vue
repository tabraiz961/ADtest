<template>
    <header id="navbar">
        <router-link to="/">Home</router-link>
        <router-link to="login"> Login</router-link>
        <router-link to="register">Register</router-link>
        <!-- <router-link to="dashboard">Dashboard</router-link> -->
    </header>
    <div class="container">
        <div class="row" style="text-align: center;">
            <h1>Home Page</h1>
        </div>
    </div>
    <router-view></router-view>

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


#navbar a{
  color:#fff;
  text-decoration:none;
}
#navbar {
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
  display: block;
  transition: top 0.3s;
  display: flex;
  gap:1rem;
  padding: 1rem;
}
</style>
<script setup>
import {reactive} from 'vue'

axios.get('sanctum/csrf-cookie').then(response => {
});

let form = reactive({
    email:'',
    password:''
})

const login = async() =>  {
    await axios.post('login', form).then(response => {
        if(response.data.success){

        }
    })
}

</script>
