<template>
    
    <div>

        <Head title="Printer View"/> 


        <Layout>

            <div class="p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">printer View</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{printer.device["inventory_number"]}}</p>
                <p v-if="printer.device['comment'] != ''" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: {{printer.device["comment"] }}</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Family: {{printer.device["family"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{printer.device["model"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Status: {{printer.device["status"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ink: {{printer.ink}}</p>
                <p v-if="printer.USB == '1'" class="mb-3 font-normal text-gray-700 dark:text-gray-400">USB:Yes</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">USB: No</p>
                <p v-if="printer.COM == '1'" class="mb-3 font-normal text-gray-700 dark:text-gray-400">COM:Yes</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">COM: No</p>
                <p v-if="printer.WIFI == '1'" class="mb-3 font-normal text-gray-700 dark:text-gray-400">WIFI:Yes</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">WIFI: No</p>
                <p v-if="printer.Ethernet == '1'" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ethernet:Yes</p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ethernet: No</p>
    
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

        printer: Object,
        
        
    });



</script>