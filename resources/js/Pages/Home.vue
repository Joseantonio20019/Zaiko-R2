<template>
<div>
        <Head>
            <title>Home</title>
        
        </Head> 
    
    <Layout>

        <h1 class="text-3xl">Welcome to Zaiko, the R2 Hotels Inventory</h1>

        <div class="flex flex-wrap mt-6">

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Phones</h2>
                                    <p class="font-bold text-3xl">{{phones}} <span class="text-green-500"></span></p>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600"></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Printers:</h2>
                                <p class="font-bold text-3xl">{{printers}}<span class="text-red-500"></span></p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        
                        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                                    <p class="font-bold text-3xl">{{users}} <span class="text-blue-500"></span></p>
                                </div>
                            </div>
                        </div>
            </div>
            
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
                        </tr>

                    </thead>
                    <tbody>

                      <tr v-for="register in registers" :key="register.id" class="bg-white border-b dark:bg-gray-200 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-black dark:text-black whitespace-nowrap">

                                {{register.id}}

                            </th> 

                            <td>

                                {{register.site}}

                            </td>

                            <td>
                                {{register.department}}
                            </td>

                            <td>
                                {{register.ubication}}
                            </td>

                            <td>
                                {{register.user}}
                            </td>

                            <td>
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

