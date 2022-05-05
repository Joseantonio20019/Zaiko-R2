<template>
    
    <div>

        <Head title="Edit User" />

        <h1 class="text-3xl text-center">Edit User</h1>

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Name
                </label>


                <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

            </div>


            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Edit Email
                </label>


                <input v-model="form.email" class="border border-gray-400 p-2 w-full" type="text"  name="email" id="email" autofocus> 
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Edit User</button>

            </div>
        
        </form>
    </div>


</template>

<script setup>

import { useForm} from "@inertiajs/inertia-vue3";

let props= defineProps({

    errors: Object,
    user: Object

});

let form = useForm({
    name: props.user.name,
    email: props.user.email,

});


let submit = () => {

    form.put('/users/edit/'+props.user.id);
};



</script>