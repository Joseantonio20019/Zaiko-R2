<template>
<div>

    <Head title="Create New Register" />


    <h1 class="text-3xl text-center">Create a New Register</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
  
        <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    User
                </label>

                <input v-model="form.user" class="border border-gray-400 p-2 w-full" type="text" name="user">
                <div v-if="form.errors.user" v-text="form.errors.user" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Comment(Optional)
                </label>

                <input v-model="form.comment" class="border border-gray-400 p-2 w-full" type="text" name="comment">
                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>
            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Modification Date (Optional)
                </label>

                <input v-model="form.modification_date" class="border border-gray-400 p-2 w-full" type="date" name="modificationdate">
                <div v-if="form.errors.modification_date" v-text="form.errors.modification_date" class="text-red-500 text-xs italic mt-2"></div>
            </div>

             <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Create</button>

        </div>
    </form>

</div>
</template>


<script setup>

    import { useForm, usePage } from '@inertiajs/inertia-vue3';

     const props = defineProps({

        errors: Object,
        id: String,
       
        

    });

    

    let form = useForm({

        user:'',
        comment:'',
        modification_date:'',
    
    })

    
    const number = parseInt(props.id);

     let submit = () => {

        form.post(`/register/create/${number}`);

    }



</script>
        