<template>
    
    <div>

        <Head title="Monitors"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl">Monitors</h1>

            <Link href="/monitors/create" class="text-blue-500 text-sm ml-2"  >Create New Monitor </Link>

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
                            <th scope="col" class="px-6 py-3">
                                MODEL
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
                    <tr v-for="monitor in monitors.data" :key="monitor.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">
                            {{ monitor.device['inventory_number'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{monitor.device['model']}}
                        </td>
                        <td class="px-6 py-4">
                            {{monitor.device['family']}}
                        </td>
                        <td class="px-6 py-4">
                            {{monitor.device['status']}}
                        </td>
                        <td class="px-6 py-4 flex justify-evenly text-center">
                            <Link :href="`/monitors/show/${monitor.id}`" class="font-medium text-green-400 dark:text-amber-400 hover:underline">Show</Link>

                            <Link :href="`/monitors/edit/${monitor.id}`" class="font-medium text-green-400 dark:text-green-400 hover:underline">Edit</Link>
                
                            <button type="buttton" @click="destroy(monitor.id)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>

                        
                        </td>
                    </tr>
                </tbody>
                
                </table>
            </div>

        
        <Pagination :links="monitors.links" class="mt-6" />

            
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

        monitors: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/monitors',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/monitors/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this monitor?')

        });

        

    }


</script>
