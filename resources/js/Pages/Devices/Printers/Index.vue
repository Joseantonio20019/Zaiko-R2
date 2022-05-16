<template>
    
    <div>

        <Head title="Printers"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl">Printers</h1>

            <Link href="/printers/create" class="text-blue-500 text-sm ml-2"  >Create New Printer </Link>

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
                                INK
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
                    <tr v-for="printer in printers.data" :key="printer.device_id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">
                            {{ printer.device['inventory_number'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{printer.ink}}
                        </td>
                        <td class="px-6 py-4">
                            {{printer.device['family']}}
                        </td>
                        <td class="px-6 py-4">
                            {{printer.device['status']}}
                        </td>
                        <td class="px-6 py-4 flex justify-evenly text-center">
                            <Link :href="`/printers/show/${printer.device_id}`" class="font-medium text-green-400 dark:text-amber-400 hover:underline">Show</Link>

                            <Link :href="`/printers/edit/${printer.device_id}`" class="font-medium text-green-400 dark:text-green-400 hover:underline">Edit</Link>
                
                            <button type="buttton" @click="destroy(printer.device_id)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>

                        
                        </td>
                    </tr>
                </tbody>
                
                </table>
            </div>

        
        <Pagination :links="printers.links" class="mt-6" />

            
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

        printers: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/printers',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/printers/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this printer?')

        });

        

    }


    console.log(props.printers);

</script>
