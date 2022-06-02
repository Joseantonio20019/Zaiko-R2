<template>
<div>
        <Head>
            <title>Home</title>
        
        </Head> 
    
    <Layout>

        <h1 class="text-3xl font-bold">Summary</h1>

        <div class="flex flex-wrap mt-6">

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-red-600"><i class="fa-solid fa-computer text-xl"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Computers</h2>
                                    <p class="font-bold text-3xl">{{computers}} <span class="text-red-500"></span></p>
                                </div>
                                <a :href="`/computers/create`" type="button" class="text-white relative bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New Computer
                                </a>
                            </div>
                        </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                <div class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-purple-600"><i class="fa-solid fa-phone text-xl"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Phones:</h2>
                                <p class="font-bold text-3xl">{{phones}}<span class="text-purple-500"></span></p>
                            </div>
                            <a :href="`/phones/create`" type="button" class="text-white relative bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New Phone
                            </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fa-solid fa-mobile-screen text-2xl"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total PDAS</h2>
                                    <p class="font-bold text-3xl">{{pdas}} <span class="text-green-500"></span></p>
                                </div>
                                <a :href="`/pdas/create`" type="button" class="text-white relative bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New PDA
                            </a>
                            </div>
                        </div>
            </div>
            
        </div>

        <div class="flex flex-wrap mt-6">

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-blue-600"><i class="fa-solid fa-wifi text-xl"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Network Devices</h2>
                                    <p class="font-bold text-3xl">{{networkdevices}} <span class="text-blue-500"></span></p>
                                </div>
                                <a :href="`/network-devices/create`" type="button" class="text-white relative bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New Network Device
                            </a>
                            </div>
                        </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-300 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-300"><i class="fa-solid fa-print text-xl"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Printers</h2>
                                <p class="font-bold text-3xl">{{printers}}<span class="text-yellow-500"></span></p>
                            </div>
                            <a :href="`/printers/create`" type="button" class="text-white relative bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New Printer
                            </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-cyan-200 to-cyan-100 border-b-4 border-cyan-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-cyan-600"><i class="fa-solid fa-display text-xl"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Monitors</h2>
                                    <p class="font-bold text-3xl">{{monitors}} <span class="text-cyan-500"></span></p>
                                </div>
                                <a :href="`/monitors/create`" type="button" class="text-white relative bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800">
                                    <i class="fa-solid fa-plus"></i>
                                    New Monitor
                            </a>
                            </div>
                        </div>
            </div>
            
        </div>

        <div class="flex flex-wrap justify-evenly mt-6">

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-orange-200 to-orange-100 border-b-4 border-orange-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-orange-400"><i class="fa-solid fa-laptop-file text-xl"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Devices</h2>
                                    <p class="font-bold text-3xl">{{devices}} <span class="text-orange-500"></span></p>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                <div class="bg-gradient-to-b from-rose-200 to-rose-100 border-b-4 border-rose-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-rose-600"><i class="fa-solid fa-users text-xl"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                                <p class="font-bold text-3xl">{{users}}<span class="text-rose-500"></span></p>
                            </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="mb-6">
                <h4 class="text-lg text-center font-bold m-5">Last Registers</h4>
                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">
                                ID
                            </th>
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
                        </tr>
                    <tbody>

                      <tr v-for="register in registers" :key="register.id" class="bg-gray-100 border-b border-gray-200">

                            <td class="px-4 py-3">
                                {{register.id}}
                            </td> 

                            <td class="px-4 py-3">

                                {{register.site}}

                            </td>

                            <td class="px-4 py-3">

                                {{register.department}}
                            </td>

                            <td class="px-4 py-3">

                                {{register.ubication}}
                            </td>

                            <td class="px-4 py-3">

                                {{register.user}}
                            </td>

                            <td class="px-4 py-3">

                                {{register.created_at}}
                            </td>

                            <td v-if="register.comment == null || register.comment == '' ">
                                No comment
                            </td>

                            <td v-else>
                                {{register.comment}}    
                            </td>
                        </tr>
                     </tbody>
                     
                </table>

        </div>
        
    
    </Layout>

   

</div>

</template>

<script setup>

import {Inertia} from "@inertiajs/inertia"

    defineProps({

        devices: String,
        users: String,
        phones: String,
        computers: String,
        monitors: String,
        printers: String,
        pdas: String,
        networkdevices: String,
        registers: Object
    });


</script>

