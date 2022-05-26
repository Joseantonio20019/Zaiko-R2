<template>

<div>

    <Head title="Login Page"></Head>


    <main class="grid place-items-center min-h-screen">

        <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
          <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4" @submit.prevent="submit">
            <div class="text-gray-800 text-2xl flex-col justify-self-auto border-b-2 py-2 mb-4 align-middle">
              <img src="../../../img/R2Hotels-Horizontal.png" alt="R2Hotels" class="h-8">
              <p class="font-bold italic">Zaiko Login</p>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-normal mb-2" for="username">
                Email
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="email"
                v-model="form.email"
                type="email"
                autofocus
                placeholder="Email"
              />
              <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs italic mt-2"></div>
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 text-sm font-normal mb-2" for="password">
                Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.password"
                type="password"
                placeholder="Password"
                name="password"
                autocomplete="current-password"
              />
              <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs italic mt-2"></div>
            </div>
            <div class="flex items-center justify-between">
              <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Sign In</button>
            </div>
          </form>
          <p class="text-center text-gray-500 text-xs">
            &copy;2022 R2 Hotels. All rights reserved.
          </p>
        </div>
      </div>
      
    </main>

    

    
</div>

    
</template>

<script>

    export default {

        layout:null,

    }


</script>


<script setup>

import { useForm } from '@inertiajs/inertia-vue3';

    let form = useForm({

        email:'',
        password:''
            
        });

    let submit = () => {


        form.post('/login');

    }


</script>