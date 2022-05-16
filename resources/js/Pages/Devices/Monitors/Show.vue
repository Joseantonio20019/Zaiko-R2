<template>
    
    <div>

        <Head title="Monitor View"/> 

        <Layout>

            <div class="p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monitor View</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{monitor.device["inventory_number"]}}</p>
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

        monitor: Object,
        
        
    });


</script>