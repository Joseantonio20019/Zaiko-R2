<template>
    
    <div>

        <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :key="link.id"
            :href="link.url"
            v-html="link.label"
            class="text-black bg-white hover:bg-amber-500 focus:ring-4 border-0 border-b-2 border-amber-500 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-white dark:hover:bg-white focus:outline-none dark:focus:ring-amber-500"
            :class="{ 'text-gray-500': ! link.url, 'font-bold, text-blue-500' : link.active}"
        />

    </div>

</template>

<script>

    export default{

        props: {

            links: Array

        }

    }


</script>