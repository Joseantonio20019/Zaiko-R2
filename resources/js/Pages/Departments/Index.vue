<template>

    <div>

        <Head title="Departments"/>

        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>
            
        <div class="flex justify-between mb-6">
        
            
            <h1 class="text-3xl font-bold">Departments</h1>


            <div class="flex w-auto place-items-stretch">
                <Link href="/departments/create" class=" ml-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded align-middle">
                <i class="fa-solid fa-circle-plus"></i>
                Create New Department 
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
                            <th  class="px-4 py-3">
                                ALIAS
                            </th>
                            <th class="px-4 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>
                    <tbody>
                    <tr v-for="department in departments.data" :key="department.id" class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3">
                            {{ department.id}}
                        </td>
                        <td class="px-4 py-3">
                            {{department.name}}
                        </td>
                        <td class="px-4 py-3">
                            {{department.alias}}
                        </td>
                          <div class="flex justify-center text-center mt-4 mb-4 ">
                                <div class="w-4 transform mr-8 relative hover:text-green-500 hover:scale-110">
                                    <Link :href="`/departments/edit/${department.id}`">
                                        <i class="fa-solid fa-pencil"></i>
                                    </Link>
                                </div>
                                <div class="w-4 transform hover:text-red-500 hover:scale-110">
                                    <button type="buttton" @click="destroy(department.id)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                    </tr>
                </tbody>
                
                </table>
            </div>

        </Layout>
        <Pagination :links="departments.links" class="fixed bottom-0 left-10 mb-16" />


    </div>
    
</template>

<script setup>

import {ref,watch} from 'vue';
import Pagination from '../../Shared/Pagination.vue';
import {Inertia} from "@inertiajs/inertia";
import debounce from 'lodash/throttle';
import Notification from '../../Shared/Notification.vue';



    let props = defineProps({

        departments: Object,
        filters: Object,
    });

    let search = ref(props.filters.search);

        watch(search,debounce(function (value){

            Inertia.get('/departments',{ search : value }, {

            preserveState:true,
            replace:true

        });

    },300));


       let destroy = async function (id) {

        Inertia.delete(`/departments/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this department?')

        });
       }



</script>