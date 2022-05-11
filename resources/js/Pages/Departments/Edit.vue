<template>
    
    <div>

        <Head title="Edit Department" />

        <h1 class="text-3xl text-center">Edit Department</h1>

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        
        
             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Edit Name
                </label>


                <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" autofocus> 

                <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Edit Alias
                </label>

                <input v-model="form.alias" class="border border-gray-400 p-2 w-full" type="text" name="alias" id="alias" autofocus> 

                <div v-if="form.errors.alias" v-text="form.errors.alias" class="text-red-500 text-xs italic mt-2"></div>

            </div>


            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Edit Department</button>

            </div>
        
        </form>
    </div>


</template>


<script setup>

import { useForm} from "@inertiajs/inertia-vue3";


let props= defineProps({

    errors: Object,
    department: Object

});

let form = useForm({

    name: props.department.name,
    alias: props.department.alias

});


let submit = () => {

    form.put(`/departments/edit/${props.department.id}`);
};
</script>