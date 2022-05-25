<template>
    
    <div>

        <Head title="Monitor View"/> 

        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <Link class=" mb-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" :href="`/register/create/${monitor.device_id}`">Add a Register</Link>
            <div class=" mt-6 p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Device: {{registerdevice.sitealias}} - {{registerdevice.departmentalias}} - {{monitor.device["inventory_number"]}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{monitor.device["inventory_number"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Site: {{registerdevice.sitename}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ubication: {{registerdevice.ubicationname}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Department: {{registerdevice.name}}</p>
                <p v-if="monitor.device['comment'] != ''" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: {{monitor.device["comment"] }}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Family: {{monitor.device["family"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{monitor.device["model"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: {{monitor.device["status"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inches: {{monitor.inches}}</p>
                <p v-if="monitor.HDMI == 0" class="mb-3 font-normal text-gray-700 dark:text-gray-400">HDMI:No</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">HDMI: Yes</p>
                <p v-if="monitor.VGA== 0" class="mb-3 font-normal text-gray-700 dark:text-gray-400">VGA:No</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">VGA: Yes</p>
                <p v-if="monitor.DVI == 0" class="mb-3 font-normal text-gray-700 dark:text-gray-400">DVI:No</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">DVI: Yes</p>
                <p v-if="monitor.DisplayPort == 0" class="mb-3 font-normal text-gray-700 dark:text-gray-400">DisplayPort:No</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">DisplayPort: Yes</p>
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

                        <td v-if="register.comment == null || register.comment == '' ">
                            No comment
                        </td>

                        <td v-else>
                            {{register.comment}}    
                        </td>

                        <td class="px-6 py-4 text-center">

                            <button type="button" @click="destroy(register.deviceid)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>
                    
                        </td>
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
        monitor: Object,
        
        
    });

    let destroy = async function (id) {

        Inertia.delete(`/register/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this register?')

        });


    }

</script>