<template>
<div>

    <Head title="Create Model"/>

    <h1 class="text-3xl text-center">Create a New Model</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Name
                </label>


                <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

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
});


let submit = () => {

    form.post('/model/create');
};



</script>
