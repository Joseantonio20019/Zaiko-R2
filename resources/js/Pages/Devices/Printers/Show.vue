<template>
    
    <div>

        <Head title="Printer View"/> 

        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>
            
            <Link class=" mb-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" :href="`/register/create/${printer.device_id}`">Add a Register</Link>
            <div class=" mt-6 p-6 w-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Device: {{registerubication.alias}} - {{registerdepartment.alias}} - {{printer.device["inventory_number"]}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inventory Number: {{printer.device["inventory_number"]}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Site: {{registerubication.sitename}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ubication: {{registerubication.ubicationname}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Department: {{registerdepartment.name}}</p>
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
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">User: {{registerubication.user}}</p>
                <p v-if="registerdepartment.comment != null" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Comment: No comment </p>
                <p v-else class="mb-3 font-normal text-gray-700 dark:text-gray-400">Register Comment: {{registerdepartment.comment}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Last Modification: {{registerubication.modification_date}}</p>
    
            </div>

            <div class="mb-6">

                <h4 class="font-medium leading-tight text-2xl mt-3 mb-3 text-blue-600">Last Registers</h4>

                <div class=" shadow-md sm:rounded-lg">
                <table class="w-full mt-1 text-sm text-left">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-blue-700 dark:text-amber-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th>
                                SITE
                            </th>
                             <th>
                                 DEPARTMENT
                            </th>
                            <th>
                                UBICATION
                            </th>
                            <th>
                                USER
                            </th>
                            <th>
                                CREATION DATE
                            </th>
                            <th>
                                 COMMENT
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                CONFIGURATION
                            </th>
                        </tr>

                    </thead>
                     <tbody>

                      <tr v-for="lastregister in registers" :key="lastregister.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">

                            {{lastregister.registerid}}

                        </th> 

                        <td>

                            {{lastregister.sitename}}

                        </td>

                        <td>
                            {{lastregister.departmentname}}
                        </td>

                        <td>
                            {{lastregister.ubicationname}}
                        </td>

                        <td>
                            {{lastregister.user}}
                        </td>

                        <td>
                            {{lastregister.created_at}}
                        </td>

                        <td v-if="lastregister.comment == null || lastregister.comment == '' ">
                            No comment
                        </td>

                        <td v-else>
                            {{lastregister.comment}}    
                        </td>

                        <td class="px-6 py-4 text-center">

                            <button type="button" @click="destroy(lastregister.deviceid)" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>
                    
                        </td>
                      </tr>
            
                     </tbody>
                </table>
            
            </div>
            </div>

        </Layout>


    </div>
</template>

<script setup>


import Notification from './../../../Shared/Notification.vue';
import {Inertia} from "@inertiajs/inertia"


    let props = defineProps({

        registerdepartment: Object,
        registerubication: Object,
        registers: Object,
        printer: Object,
        
        
    });

    let destroy = async function (id) {

        Inertia.delete(`/register/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this register?')

        });


    }

</script>