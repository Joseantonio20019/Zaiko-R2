<template>
    
    <div>

        <Head title="PDA View"/> 


        <Layout>

            <div v-if="$page.props.flash.message" class="absolute top-20 left-10 z-10">
            <Notification :message="$page.props.flash.message" />
            </div>

            <div class="text-center w-auto place-items-stretch">
                <Link class=" mb-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" :href="`/register/create/${pda.device_id}`">
                    <i class="fa-solid fa-circle-plus"></i>
                    Add a Register
                </Link>
            </div> 
            
    <div class="flex justify-between px-4 mt-6">
        <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl font-bold">
                    Device Information
                </h2>
                <p class="text-sm text-gray-500">
                    {{registerdevice.sitealias}} - {{registerdevice.departmentalias}} - {{pda.device["inventory_number"]}}
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                     <p class="text-gray-600">
                        Inventory Number
                    </p>
                    <p>
                        {{pda.device["inventory_number"]}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Site
                    </p>
                    <p>
                        {{registerdevice.sitename}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Ubication
                    </p>
                    <p>
                        {{registerdevice.ubicationname}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Department
                    </p>
                    <p>
                        {{registerdevice.departmentname}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Comment
                    </p>
                    <p v-if="pda.device['comment'] != null">

                        {{pda.device["comment"]}}                    
                    </p>
                    <p v-else>
                        No Comment
                    </p>
                </div>
                 <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Family
                    </p>
                    <p>
                        {{pda.device["family"]}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Model
                    </p>
                    <p>
                        {{pda.device["model"]}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Status
                    </p>
                    <p>
                        {{pda.device["status"]}}
                    </p>
                </div>
                 <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        User
                    </p>
                    <p>
                        {{registerdevice.user}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Register Comment
                    </p>
                    <p v-if="registerdevice.comment != null">

                        {{registerdevice.comment}}                    
                    </p>
                    <p v-else>
                        No Comment
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Last Modification
                    </p>
                    <p>
                        {{registerdevice.modification_date}}
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-4xl bg-white w-full rounded-lg shadow-xl">
                <div class="p-4 border-b">
                    <h2 class="text-2xl font-bold">
                        Device Specs
                    </h2>
                    <p class="text-sm text-gray-500">
                        {{registerdevice.sitealias}} - {{registerdevice.departmentalias}} - {{pda.device["inventory_number"]}}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                MAC Address
                            </p>
                            <p>
                                {{pda.MAC}}
                            </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                Serial Number
                            </p>
                            <p>
                                {{pda.serial_number}}
                            </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-gray-600">
                                IMEI
                            </p>
                            <p>
                                {{pda.imei}}
                            </p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="text-lg text-center font-bold m-5">Last Registers</h4>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-3">
                            SITE
                        </th>
                            <th class="px-4 py-3">
                                DEPARTMENT
                        </th>
                        <th class="px-4 py-3">
                            UBICATION
                        </th>
                        <th class="px-4 py-3">
                            USER
                        </th>
                        <th class="px-4 py-3">
                            CREATION DATE
                        </th>
                        <th class="px-4 py-3">
                                COMMENT
                        </th>
                        <th class="px-4 py-3">
                                CONFIGURATION
                        </th>
                    </tr>
                <tbody>

                    <tr v-for="register in registers" :key="register.id" class="bg-gray-100 border-b border-gray-200">


                        <td class="px-4 py-3">

                            {{register.sitename}}

                        </td>

                        <td class="px-4 py-3">

                            {{register.departmentname}}
                        </td>

                        <td class="px-4 py-3">

                            {{register.ubicationname}}
                        </td>

                        <td class="px-4 py-3">

                            {{register.user}}
                        </td>

                        <td class="px-4 py-3">

                            {{register.created_at}}
                        </td>

                        <td class="px-4 py-3" v-if="register.comment == null || register.comment == '' ">
                            No comment
                        </td>

                        <td v-else  class="px-4 py-3">
                            {{register.comment}}    
                        </td>
                        <div class=" w-auto mr-20 text-center mt-3 align-middle transform hover:text-red-500 hover:scale-110">
                    
                            <button type="button" @click="destroy(register.deviceid)"><i class="fa-solid fa-trash-can"></i></button>
                
                        </div>
                    </tr>

                    </tbody>
                    
            </table>

        </div>
            
        </Layout>
    </div>
</template>

<script setup>

import Notification from './../../../Shared/Notification.vue';
import {Inertia} from "@inertiajs/inertia"

 let props = defineProps({

        
        registerdevice: Object,
        registers: Object,
        pda: Object,
        
        
    });

    let destroy = async function (id) {

        Inertia.delete(`/register/delete/${id}`,{

            onBefore: () => confirm('Are you sure you want to delete this register?')

        });


    }




</script>