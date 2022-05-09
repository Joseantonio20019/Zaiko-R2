<template>
<div>

    <Head title="Create Site"/>

    <h1 class="text-3xl text-center">Create a New Site</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Name
                </label>


                <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Alias
                </label>


                <input v-model="form.alias" class="border border-gray-400 p-2 w-full" type="text" name="alias" id="alias" autofocus> 

                <div v-if="form.errors.alias" v-text="form.errors.alias" class="text-red-500 text-xs italic mt-2"></div>

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
    alias: '',
});


let submit = () => {

    form.post('/sites/create');
};



</script>
