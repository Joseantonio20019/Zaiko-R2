<template>
    
    <div>

        <Head title="Marks"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="flex justify-between mb-6">
        
            
            <h1 class="text-3xl font-bold">Marks</h1>

            <div class="flex w-auto place-items-stretch">
                <Link href="/marks/create" class=" ml-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded align-middle">
                    <i class="fa-solid fa-circle-plus"></i>
                    Create New Site
                </Link>

            </div>

           <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg" >
           </div>

           <div class="mb-6">
                <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">
                                ID
                            </th>
                            <th  class="px-4 py-3">
                                NAME
                            </th>
                            <th class="px-4 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                    <tbody>
                    <tr v-for="mark in marks.data" :key="mark.id" class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3">
                            {{ mark.id}}
                        </td>
                        <td class="px-4 py-3">
                            {{mark.name}}
                        </td>
                       <div class="flex justify-center text-center mt-4 mb-4 ">
                           <div class="w-4 transform mr-8 relative hover:text-green-500 hover:scale-110">
                                <Link :href="`/marks/edit/${mark.id}`">
                                    <i class="fa-solid fa-pencil"></i>
                                </Link>
                            </div>

                            <div class="w-4 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" @click="destroy(mark.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <Pagination :links="marks.links" class="fixed bottom-0 left-10 mb-16" />

            
        </Layout>

        

    </div>
</template>

<script setup>

import { ref,watch } from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia"
import debounce from 'lodash/throttle';
import Notification from '../../Shared/Notification.vue';



    let props = defineProps({

        marks: Object,
        filters: Object,
        
    });

    let search = ref(props.filters.search);

    watch(search,debounce(function (value){

        Inertia.get('/marks',{ search : value }, {

            preserveState:true,
            replace:true

        });


    },300));


    let destroy = async function (id) {

        Inertia.delete(`/marks/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this mark?')

        });

        

    }



</script>
