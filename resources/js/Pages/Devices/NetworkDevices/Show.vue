<template>
    
    <div>

        <Head title="Network Device View"/> 


        <Layout>

            <div class="p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Network Device View</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{networkdevice.device["inventory_number"]}}</p>
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

        networkdevice: Object,
        
        
    });


</script>