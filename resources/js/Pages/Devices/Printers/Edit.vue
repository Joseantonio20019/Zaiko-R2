<template>
<div>

    <Head title="Edit Printer" />


    <h1 class="text-3xl text-center font-bold">Edit a Printer</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Inventory Number
                </label>

                <input v-model="form.inventory_number" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="inventory_number" id="inventory_number" autofocus> 

                <div v-if="form.errors.inventory_number" v-text="form.errors.inventory_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Comment(Optional)
                </label>


                <input v-model="form.comment" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="comment" id="comment" autofocus> 

                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Model
                </label>
                    
                    <select v-model="form.model" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option :selected="form.model" v-for="model in models" :key="model.id">{{model.name}}</option>
                    </select>

                <div v-if="form.errors.model" v-text="form.errors.model" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Family
                </label>
                    
                    <select v-model="form.family" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option :selected="form.family" v-for="family in families" :key="family.id">{{family.name}}</option>
                    </select>

                <div v-if="form.errors.family" v-text="form.errors.family" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Status
                </label>
                    
                    <select v-model="form.status" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option :selected="form.status" v-for="status in statuses" :key="status.id">{{status.name}}</option>
                    </select>

                <div v-if="form.errors.status" v-text="form.errors.status" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Mark
                </label>
                    
                    <select v-model="form.mark" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option :selected="form.mark_id" v-for="mark in marks" :key="mark.id" :value="mark.name" >{{mark.name}}</option>
                    </select>

                <div v-if="form.errors.mark" v-text="form.errors.mark" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Ink
                </label>

                <input type="radio" v-model="form.ink" value="Color" id="Color"> 
                <label for="Color" class="ml-2">Color</label>
                <br>
                <input type="radio" v-model="form.ink" value="BW" id="Black&White"> 
                <label for="Black&White" class="ml-2">Black & White</label>

                <div v-if="form.errors.ink" v-text="form.errors.inches" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <input type="checkbox" v-model="form.usb"  true-value="1" false-value="0" name="usb" id="usb"> 
                <label class="ml-2">USB</label>
                <br>
                <input type="checkbox" v-model="form.com" true-value="1" false-value="0" name="com" id="com"> 
                <label class="ml-2">COM</label>
                <br>
                <input type="checkbox" v-model="form.wifi" true-value="1" false-value="0" name="wifi" id="wifi"> 
                <label class="ml-2">WIFI</label>
                <br>
                <input type="checkbox" v-model="form.ethernet" true-value="1" false-value="0" name="ethernet" id="ethernet"> 
                <label class="ml-2">Ethernet</label>
            
            </div>      

            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Edit</button>


            </div>
    </form>

</div>
    
</template>

<script setup>

    import { useForm } from '@inertiajs/inertia-vue3';

    let props= defineProps({

        errors: Object,
        families: Object,
        models: Object,
        statuses: Object,
        marks: Object,
        printer: Object,
        device: Object,

    });
    
    let form = useForm({

        inventory_number: props.device.inventory_number,
        comment: props.device.comment,
        model: props.device.model,
        family: props.device.family,
        status: props.device.status,
        mark: props.device.mark,
        ink: props.printer.ink,
        usb: props.printer.USB,
        com: props.printer.COM,
        wifi: props.printer.WIFI,
        ethernet: props.printer.Ethernet,
    })

    let submit = () => {

        form.put(`/printers/edit/${props.printer.device_id}`);


    }



</script>
