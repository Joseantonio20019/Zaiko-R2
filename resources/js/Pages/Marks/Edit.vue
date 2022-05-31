<template>
    
    <div>

        <Head title="Edit Mark" />

        <h1 class="text-3xl text-center font-bold">Edit Mark</h1>

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        
        
             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Name
                </label>


                <input v-model="form.name" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

            </div>


            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Edit</button>

            </div>
        
        </form>
    </div>


</template>


<script setup>

import { useForm} from "@inertiajs/inertia-vue3";


let props= defineProps({

    errors: Object,
    mark: Object

});

let form = useForm({

    name: props.mark.name

});


let submit = () => {

    form.put('/marks/edit/'+props.mark.id);
};
</script>