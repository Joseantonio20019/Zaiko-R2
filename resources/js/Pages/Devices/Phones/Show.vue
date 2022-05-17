<template>
    
    <div>

        <Head title="Phone View"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>


            <Link :href="`/register/create/${register.device_id}`">Add a Register</Link>
            <div class="p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Phone View</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{phone.device["inventory_number"]}}</p>
                <p v-if="phone.device['comment'] != ''" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: {{phone.device["comment"] }}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Family: {{phone.device["family"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{phone.device["model"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: {{phone.device["status"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Extension: {{phone.extension}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Serial Number: {{phone.serial_number}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">IMEI: {{phone.imei}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">User: {{register.user}}</p>
                <p v-if="register.comment != ''" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Comment: {{register.comment}}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Date: {{register.modification_date}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Date: {{registers}}</p>
    
            </div>

            <div class="mb-6">

                <h2>Last Registers</h2>

                <div class=" shadow-md sm:rounded-lg">
                <table class="w-full mt-1 text-sm text-left">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th>
                                EXTENSION
                            </th>
                            <th scope="col" class="px-6 py-3">
                                MODIFICATION DATE
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

                     <!-- <tr v-for="registersearch in registers.data" :key="registersearch.device_id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200"></tr>
                    <th>
                        {{registersearch.id}}
                    </th>
                    <th>
                        {{registersearch.modification_date}}
                    </th>  -->

                </tbody>
                </table>
            
                </div>
            </div>
            
        </Layout>


    </div>
</template>

<script setup>

import Notification from './../../../Shared/Notification.vue'


defineProps({

        phone: Object,
        register: Object,
        registers: Object
        
        
    });


</script>