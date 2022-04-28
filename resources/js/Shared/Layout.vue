<template>
    <div>
        <section class="p-6 bg-blue-200">
        <header class="flex justify-between">
            <div class="flex items-center">

            <h1 class="font-bold text-3xl"> Zaiko </h1>

            <p class="text-xl ml-4">Welcome back, {{ $page.props.auth.user }}</p>
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
    };

</script>