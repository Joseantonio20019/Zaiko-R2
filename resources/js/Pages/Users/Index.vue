<template>
    
    <div>

        <Head>
            <title>Users</title>
        
        </Head> 


        <Layout>
            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>

            <Link href="/users/create" class="text-blue-500 text-sm ml-2"  >Create New User </Link>

            </div>

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

           <div class=" shadow-md sm:rounded-lg">
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
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">
                            {{ user.id}}
                        </th>
                        <td class="px-6 py-4">
                            {{user.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{user.email}}
                        </td>
                        <td class="px-6 py-4 flex justify-evenly text-center">
                            <Link :href="`/users/edit/${user.id}`" class="font-medium text-green-400 dark:text-green-400 hover:underline">Edit</Link>
                
                            <button type="buttton" @click="destroy(user.id)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>

                        
                        </td>
                    </tr>
                </tbody>
                
                </table>
            </div>

        
        <Pagination :links="users.links" class="mt-6" />

            
        </Layout>

        

    </div>
</template>

<script setup>

import { ref,watch } from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia"
import debounce from 'lodash/throttle';



    let props = defineProps({

        users: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/users',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/users/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this user?')

        });

        

    }



</script>
