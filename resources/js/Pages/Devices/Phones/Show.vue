<template>
    
    <div>

        <Head title="Phone View"/> 


        <Layout>

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
    
            </div>

            <div class="mb-6">

                <h2>Last Registers</h2>

            </div>
            
        </Layout>


    </div>
</template>

<script setup>

import Notification from '../../../Shared/Notification.vue';


defineProps({

        phone: Object,
        
        
    });


</script>