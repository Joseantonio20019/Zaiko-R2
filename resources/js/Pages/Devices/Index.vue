<template>
    
    <div>

        <Head title="Devices"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <div class="flex items-center">
            <h1 class="text-3xl font-bold">Devices</h1>
            <a href="/devices/excel" class=" ml-3 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded align-middle">
                    <i class="fa-solid fa-file-excel"></i>
                    Export in Excel
                </a>
            </div>
            

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

          <div class="mb-6">
                <table class="rounded-t-lg  m-5 w-full mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">
                                INVENTORY NUMBER
                            </th>
                            <th class="px-4 py-3">
                                SITE
                            </th>
                            <th class="px-4 py-3">
                                DEPARTMENT
                            </th>
                            <th class="px-4 py-3">
                                UBICATION
                            </th>
                            <th class="px-4 py-3">
                                USER
                            </th>
                            <th class="px-4 py-3">
                                COMMENT
                            </th>
                            <th class="px-4 py-3">
                                LAST MODIFICATION 
                            </th>
                            <th class="px-4 py-3">
                                STATUS
                            </th>
                            
                    </tr>
                <tbody>
                    <tr v-for="device in devices.data" :key="device.id" class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3">
                            {{device.inventory_number}}
                        </td>

                        <td class="px-4 py-3">
                            {{device.site}}
                        </td>

                         <td class="px-4 py-3">
                            {{device.department}}
                        </td>

                        <td class="px-4 py-3">
                            {{device.ubication}}
                        </td>

                        <td class="px-6 py-4">
                            {{device.user}}
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

        
        <Pagination :links="devices.links" class="fixed bottom-0 left-10 mb-16" />

            
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
