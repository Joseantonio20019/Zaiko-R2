<template>
    
    <div>

        <Head title="Phones"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl">Phones</h1>

            <Link href="/phones/create" class=" ml-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded align-middle">
            Create New Phone
            </Link>
            <a href="/phones/excel" class=" ml-3 bg-transparent hover:bg-green-500 text-blue-green font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded align-middle">
            Export in Excel
            </a>


            </div>
            

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

           <div class=" shadow-md sm:rounded-lg">
                <table class="w-full mt-1 text-sm text-left">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                INVENTORY NUMBER
                            </th>
                            <th>
                                EXTENSION
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SERIAL NUMBER
                            </th>
                            <th scope="col" class="px-6 py-3">
                                FAMILY
                            </th>
                            <th scope="col" class="px-6 py-3">
                                STATUS
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-for="phone in phones.data" :key="phone.device_id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">
                            {{ phone.device["inventory_number"] }}
                        </th>
                        <td class="px-6 py-4">
                            {{phone.extension}}
                        </td>
                        <td class="px-6 py-4">
                            {{phone.serial_number}}
                        </td>
                        <td class="px-6 py-4">
                            {{phone.device["family"]}}
                        </td>
                        <td class="px-6 py-4">
                            {{phone.device["status"]}}
                        </td>
                        <td class="px-6 py-4 flex justify-evenly text-center">

                            <Link :href="`/phones/show/${phone.device_id}`" class="font-medium text-green-400 dark:text-amber-400 hover:underline">Show</Link>

                            <Link :href="`/phones/edit/${phone.device_id}`" class="font-medium text-green-400 dark:text-green-400 hover:underline">Edit</Link>
                
                            <button type="button" @click="destroy(phone.device_id)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>

                        </td>
                    </tr>
                </tbody>
                
                </table>
            </div>

        
        <Pagination :links="phones.links" class="mt-6" />

            
        </Layout>
    </div>

</template>

<script setup>

import { ref,watch } from 'vue';
import Pagination from '../../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia"
import debounce from 'lodash/throttle';
import Notification from '../../../Shared/Notification.vue';

    let props = defineProps({

        phones: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/phones',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/phones/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this phone?')

        });

    
    }

</script>
