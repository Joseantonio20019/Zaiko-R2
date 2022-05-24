<template>

<div>

        <Head>
            <title>Home</title>
        
        </Head> 
    
    <Layout>

        <h1 class="text-3xl">Welcome to Zaiko, the R2 Hotels Inventory</h1>


        <div class="flex flex-wrap mt-6">

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><a href="https://www.flaticon.com/free-icons/people" title="people icons">People icons created by Freepik - Flaticon</a></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                                    <p class="font-bold text-3xl">249 <span class="text-green-500"><i class="fas fa-exchange-alt"></i></span></p>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600"><a href="https://www.flaticon.com/free-icons/computer" title="computer icons">Computer icons created by Freepik - Flaticon</a></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Computers:</h2>
                                <p class="font-bold text-3xl">249 <span class="text-red-500"><i class="fas fa-exchange-alt"></i></span></p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                                    <p class="font-bold text-3xl">{{props.users}} <span class="text-blue-500"><i class="fas fa-exchange-alt"></i></span></p>
                                </div>
                            </div>
                        </div>
            </div>
            
                        

        </div>
        
        
        
    </Layout>

   

</div>

</template>

<script setup>

import {Inertia} from "@inertiajs/inertia"

    let props = defineProps({

        devices: String,
        users: String,
        phones: String,
        computers: String,
        monitors: String,
        printers: String,
        pdas: String,
        networkdevices: String,
    });


</script>

