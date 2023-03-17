<template>
    <section class='login' id='login'>
        <h3>Dashboard</h3>
    </section>
    <footer>
    </footer>

</template>
<style>

</style>
<script setup>
import {reactive} from 'vue'


const getUser = async() =>  {
    await axios.post('/api/user', form).then(response => {
        if(response.data.success){

        }
    })
}
</script>
