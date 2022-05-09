<template>
    
    <div>

        <Head title="Devices"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl">Devices</h1>
            </div>
            

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

           <div class=" shadow-md sm:rounded-lg">
                <table class="w-full mt-1 text-sm text-left">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                INVENTORY Nº
                            </th>
                            <th scope="col" class="px-6 py-3">
                                COMMENT
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CREATED DATE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                STATUS
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-for="device in devices.data" :key="device.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <td class="px-6 py-4">
                            {{device.inventory_number}}
                        </td>
                        <td class="px-6 py-4">
                            {{device.comment}}
                        </td>
                        <td class="px-6 py-4">
                            {{device.created_at}}
                        </td>
                        <td class="px-6 py-4">
                            {{device.status}}
                        </td>
                        
                    </tr>
                </tbody>
                
                </table>
            </div>

        
        <Pagination :links="devices.links" class="mt-6" />

            
        </Layout>

    </div>
</template>

<script setup>

import { ref,watch } from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia"
import debounce from 'lodash/throttle';
import Notification from '../../Shared/Notification.vue';



    let props = defineProps({

        devices: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/devices',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/devices/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this device?')

        });

        

    }

</script>
