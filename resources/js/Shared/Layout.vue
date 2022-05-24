<template>
    <div>
        <section class="p-6 bg-blue-200">
        <header class="flex justify-between">
            <div class="flex items-center">

            <h1 class="font-bold text-3xl mr-3"> Zaiko </h1>
            <img src="../../img/R2Hotels-Logo.png" alt="R2Hotels" class="h-8 w-auto">

             <p class="text-xl ml-4">Welcome back, {{ username }}</p>
        </div>

        <Nav />

    </header>

    </section>


    <section class="p-6">

        <div class="max-w-1xl mx-auto ml-6">
            
        <slot/>

        </div>

    </section>
    
    

</div>

</template>

<script>

import Nav from './Nav.vue';

    export default {

        components: { Nav},

        computed: {
            username() {
                return this.$page.props.auth.user.username;
            }
        }


    };

</script>