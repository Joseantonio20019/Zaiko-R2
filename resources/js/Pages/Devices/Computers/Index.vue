<template>
    
    <div>

        <Head title="Computers"/> 

        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">

            <h1 class="text-3xl">Computers</h1>
        
            <div class="flex w-auto place-items-stretch">
                
                <Link href="/computers/create" class=" ml-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded align-middle">
                <i class="fa-solid fa-circle-plus"></i>
                Create New Computer
                </Link>

                <a href="/computers/excel" class=" ml-3 bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded align-middle">
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
                                STATUS
                            </th>
                             <th class="px-4 py-3">
                                CPU MODEL
                            </th>
                             <th class="px-4 py-3">
                                RAM TYPE
                            </th>
                            <th class="px-4 py-3">
                                LAST MODIFICATION 
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                <tbody>
                    <tr v-for="computer in computers.data" :key="computer.id" class="bg-gray-100 border-b border-gray-200">
                       <td class="px-4 py-3">
                            {{ computer.inventory_number }}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.site}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.department}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.ubication}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.user}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.status}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.cpu_model}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.ram_type}}
                        </td>
                       <td class="px-4 py-3">
                            {{computer.updated_at}}
                        </td>

                        <div class="flex item-center justify-evenly text-center mt-4 mb-4 ">
                                        <div class="w-4 transform hover:text-blue-500 hover:scale-110">
                                            <Link :href="`/computers/show/${computer.device_id}`">
                                            <i class="fa-regular fa-eye"></i>
                                            </Link>
                                        </div>
                                        <div class="w-4 transform hover:text-green-500 hover:scale-110">
                                            <Link :href="`/computers/edit/${computer.device_id}`" >
                                            <i class="fa-solid fa-pencil"></i>
                                            </Link>
                                        </div>
                                        <div class="w-4 transform hover:text-red-500 hover:scale-110">
                                            <button type="buttton" @click="destroy(computer.device_id)">
                                            <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                        </div>
                    </tr>
                </tbody>
                </table>
                <Pagination :links="computers.links" class="fixed bottom-0 left-10 mb-16" />
            </div>        
        
        
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

        computers: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/computers',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/computers/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this computer?')

        });

        
    }

</script>
