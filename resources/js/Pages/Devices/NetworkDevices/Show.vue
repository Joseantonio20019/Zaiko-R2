<template>
    
    <div>

        <Head title="Network Device View"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <Link class=" mb-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" :href="`/register/create/${networkdevice.device_id}`">Add a Register</Link>
            <div class=" mt-6 p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Device: {{registerdevice.sitealias}} - {{registerdevice.departmentalias}} - {{networkdevice.device["inventory_number"]}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{networkdevice.device["inventory_number"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Site: {{registerdevice.sitename}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ubication: {{registerdevice.ubicationname}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Department: {{registerdevice.departmentname}}</p>
                <p v-if="networkdevice.device['comment'] != ''" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: {{networkdevice.device["comment"] }}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Family: {{networkdevice.device["family"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{networkdevice.device["model"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: {{networkdevice.device["status"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Manageable: {{networkdevice.manageable}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ethernet Ports Number: {{networkdevice.ethernet_ports_number}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Speed: {{networkdevice.Speed}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Fiber Ports Number: {{networkdevice.fiber_ports_number}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">POE: {{networkdevice.POE}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">User: {{registerdevice.user}}</p>
                <p v-if="registerdevice.comment != null" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Comment: {{registerdevice.comment}} </p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Last Modification: {{registerdevice.modification_date}}</p>
    
            </div>

             <div class="mb-6">

                <h4 class="font-medium leading-tight text-2xl mt-3 mb-3 text-blue-600">Last Registers</h4>

                <div class=" shadow-md sm:rounded-lg">
                <table class="w-full mt-1 text-sm text-left">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th>
                                SITE
                            </th>
                             <th>
                                 DEPARTMENT
                            </th>
                            <th>
                                UBICATION
                            </th>
                            <th>
                                USER
                            </th>
                            <th>
                                CREATION DATE
                            </th>
                            <th>
                                 COMMENT
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>

                    </thead>
                     <tbody>

                      <tr v-for="register in registers" :key="register.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">

                            {{register.registerid}}

                        </th> 

                        <td>

                            {{register.sitename}}

                        </td>

                        <td>
                            {{register.departmentname}}
                        </td>

                        <td>
                            {{register.ubicationname}}
                        </td>

                        <td>
                            {{register.user}}
                        </td>

                        <td>
                            {{register.created_at}}
                        </td>

                        <td v-if="register.comment == null ||register.comment == '' ">
                            No comment
                        </td>

                        <td v-else>
                            {{register.comment}}    
                        </td>

                        <div class=" w-auto mr-20 text-center mt-3 align-middle transform hover:text-red-500 hover:scale-110">
                        
                            <button type="button" @click="destroy(register.deviceid)"><i class="fa-solid fa-trash-can"></i></button>
                    
                        </div>
                      </tr>
            
                     </tbody>
                </table>
            
            </div>
            </div>
            
        </Layout>


    </div>
</template>

<script setup>

    import Notification from './../../../Shared/Notification.vue';
    import {Inertia} from "@inertiajs/inertia"

    let props = defineProps({

        registerdevice: Object,
        registers: Object,
        networkdevice: Object,
        
        
    });

    let destroy = async function (id) {

        Inertia.delete(`/register/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this register?')

        });
    }


</script>