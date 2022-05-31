<template>
    
    <div>

        <Head title="Create User" />

        <h1 class="text-3xl text-center font-bold">Create a New User</h1>

        <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Name
                </label>

                <input v-model="form.name" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

            </div>


            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Email
                </label>


                <input v-model="form.email" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="email" id="email" autofocus> 
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                    Password
                </label>


                <input v-model="form.password" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="password" name="password" id="password" autofocus > 
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs bold mt-2"></div>

            </div>

            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Create</button>


            </div>
        
        </form>


    </div>


</template>

<script setup>

import { useForm} from "@inertiajs/inertia-vue3";


defineProps({

    errors: Object

});

let form = useForm({
    name: '',
    email: '',
    password: '',
});


let submit = () => {

    form.post('/users/create');
};



</script>