<template>
<div>

    <Head title="Edit Phone" />


    <h1 class="text-3xl text-center">Edit Phone</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Inventory Number
                </label>

                <input v-model="form.inventory_number" class="border border-gray-400 p-2 w-full" type="text" name="inventory_number" id="inventory_number" autofocus> 

                <div v-if="form.errors.inventory_number" v-text="form.errors.inventory_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Comment(Optional)
                </label>


                <input v-model="form.comment" class="border border-gray-400 p-2 w-full" type="text" name="comment" id="comment" autofocus> 

                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Model
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.model" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="model in models" :key="model.id">{{model.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.model" v-text="form.errors.model" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Family
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.family" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="family in families" :key="family.id">{{family.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.family" v-text="form.errors.family" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Status
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.status" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="status in statuses" :key="status.id">{{status.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.status" v-text="form.errors.status" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Mark
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.mark" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="mark in marks" :key="mark.id" :value="mark.id" >{{mark.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.mark" v-text="form.errors.mark" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Extension
                </label>

                <input v-model="form.extension" class="border border-gray-400 p-2 w-full" type="number" name="extension">
                <div v-if="form.errors.extension" v-text="form.errors.extension" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

             <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit Serial Number
                </label>

                <input v-model="form.serial_number" class="border border-gray-400 p-2 w-full" type="text" name="serialnumber">
                <div v-if="form.errors.serial_number" v-text="form.errors.serial_number" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

             <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Edit IMEI
                </label>

                <input v-model="form.imei" class="border border-gray-400 p-2 w-full" type="text" name="imei">
                <div v-if="form.errors.imei" v-text="form.errors.imei" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>
        

              <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Create</button>

            </div>
    </form>

</div>
    

</template>

<script setup>

    import { useForm } from '@inertiajs/inertia-vue3';

    let props = defineProps({

        errors: Object,
        families: Object,
        models: Object,
        statuses: Object,
        marks: Object,
        phone: Object,
        device: Object,

    });
    
    let form = useForm({

        inventory_number: props.device.inventory_number,
        comment: props.device.comment,
        model: props.device.model,
        family: props.device.family,
        status: props.device.status,
        mark: props.device.mark_id,
        extension: props.phone.extension,
        serial_number: props.phone.serial_number,
        imei: props.phone.imei,
    
    })

    let submit = () => {

        form.put(`/phones/edit/${props.phone.id}`);


    }


</script>
