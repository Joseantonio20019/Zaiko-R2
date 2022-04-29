<template>
    
    <div>

        <Head>
            <title>Users</title>
        
        </Head> 


        <Layout>
            
            <h1 class="text-3xl">Users</h1>

           <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full mt-1 text-sm text-left">
                 <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    EMAIL
                </th>
                <th scope="col" class="px-10 py-3">
                    CONFIGURATION
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Configuration</span>
                </th>
            </tr>
        </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">
                            {{ user.id}}
                        </th>
                        <td class="px-6 py-4">
                            {{user.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{user.email}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="" class="font-medium text-green-400 dark:text-green-400 hover:underline">Edit</a>
                        </td>
                        <td class="px-2">
                            <a href="" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                </tbody>
                
                </table>
            </div>


        </Layout>

    </div>
</template>

<script setup>



    defineProps({

        users: Array
        
    });



</script>
