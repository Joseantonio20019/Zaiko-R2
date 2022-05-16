<template>
    
    <div>

        <Head title="computer View"/> 


        <Layout>

            <div class="p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">computer View</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{computer.device["inventory_number"]}}</p>
                <p v-if="computer.device['comment'] != null" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: {{computer.device["comment"] }}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Family: {{computer.device["family"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{computer.device["model"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: {{computer.device["status"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Extension: {{computer.extension}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">CPU: {{computer.cpu}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">CPU Model: {{computer.cpu_model}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">RAM Type: {{computer.ram_type}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">RAM Size: {{computer.ram_size}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">OS: {{computer.os}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Hard Drive 1:</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Size: {{harddrive1.size}} GB</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Type: {{harddrive1.type}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Hard Drive 2:</p>
                <p v-if="harddrive2 != '' || harddrive2 != null" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Size: {{harddrive2.size}} GB</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Size:-</p>
                <p v-if="harddrive2 != '' || harddrive2 != null" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Type: {{harddrive2.type}}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Type:-</p>
    
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

        computer: Object,
        harddrive1:Object,
        harddrive2:Object,
        
        
    });


</script>