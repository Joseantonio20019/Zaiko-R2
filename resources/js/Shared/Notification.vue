<template>
   <div v-if="showNotification" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">{{ message }}</span> 
   </div>

</template>

<script setup>

import { defineProps,ref,onMounted } from "vue";


    
    const props = defineProps({
        message:String,
    });

    const showNotification = ref(false);

    onMounted( () => {

        showNotification.value = true;

        setTimeout(() => {

            showNotification.value = false;

        }, 3000);



    });


</script>