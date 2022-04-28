<template>
    
    <div>

        <Head>
            <title>Users</title>
        
        </Head> 


        <Layout>
            
            <h1 class="text-3xl">Users</h1>

            <ul>
                <li v-for="user in users" :key="user.id" v-text="user.name"></li>

            </ul>


        </Layout>

    </div>
</template>

<script setup>



    defineProps({

        users: Array
        
    });



</script>
