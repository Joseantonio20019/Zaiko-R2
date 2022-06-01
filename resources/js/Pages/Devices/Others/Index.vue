<template>
    
    <div>

        <Head title="Other Devices"/> 

        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            <h1 class="text-3xl font-bold">Other Devices</h1>

            <div class="flex w-auto place-items-stretch">
            <Link href="/others/create" class=" ml-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded align-middle">
                <i class="fa-solid fa-circle-plus"></i>
                Create New Device
            </Link>
            <a href="/devices/othersExcels" class=" ml-3 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded align-middle">
                <i class="fa-solid fa-file-excel"></i>
                Export in Excel
            </a>
            </div>
            

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

          <div class="mb-6">
                <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
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
                                FAMILY
                            </th>
                            <th class="px-4 py-3">
                                MARK
                            </th>
                            <th class="px-4 py-3">
                                STATUS
                            </th>
                            <th class="px-4 py-3">
                                LAST MODIFICATION 
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                <tbody>
                    <tr v-for="device in devices.data" :key="device.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <td class="px-4 py-3">
                            {{ device.inventory_number }}
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
                        <td class="px-4 py-3">
                            {{device.user}}
                        </td>
                        <td class="px-4 py-3">
                            {{device.family}}
                        </td>
                        <td class="px-4 py-3">
                            {{device.mark}}
                        </td>
                        <td class="px-4 py-3">
                            {{device.status}}
                        </td>
                        <td class="px-4 py-3">
                            {{device.updated_at}}
                        </td>
                        <div class="flex item-center justify-evenly text-center mt-4 mb-4 ">
                            <div class="w-4 transform hover:text-blue-500 hover:scale-110">
                                <Link :href="`/others/show/${device.id}`">
                                <i class="fa-regular fa-eye"></i>
                                </Link>
                            </div>
                            <div class="w-4 transform hover:text-green-500 hover:scale-110">
                                <Link :href="`/others/edit/${device.id}`" >
                                <i class="fa-solid fa-pencil"></i>
                                </Link>
                            </div>
                            <div class="w-4 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" @click="destroy(device.id)">
                                <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
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
import Pagination from '../../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia"
import debounce from 'lodash/throttle';
import Notification from '../../../Shared/Notification.vue';



    let props = defineProps({

        devices: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/others',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/others/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this device?')

        });

    
    }

</script>
