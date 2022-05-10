<template>
<div>

    <Head title="Edit Network Device" />


    <h1 class="text-3xl text-center">Edit a New Network Device</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Inventory Number
                </label>

                <input v-model="form.inventory_number" class="border border-gray-400 p-2 w-full" type="text" name="inventory_number" id="inventory_number" autofocus> 

                <div v-if="form.errors.inventory_number" v-text="form.errors.inventory_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Comment(Optional)
                </label>


                <input v-model="form.comment" class="border border-gray-400 p-2 w-full" type="text" name="comment" id="comment" autofocus> 

                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
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


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
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


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
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


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
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


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Ethernet Ports Number
                </label>

                <input v-model="form.ethernet_ports_number" class="border border-gray-400 p-2 w-full" type="number" name="ethernet ports" id="ethernet ports" autofocus> 

                <div v-if="form.errors.ethernet_ports_number" v-text="form.errors.ethernet_ports_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Fiber Ports Number
                </label>

                <input v-model="form.fiber_ports_number" class="border border-gray-400 p-2 w-full" type="number" name="fiber ports" id="fiber ports" autofocus> 

                <div v-if="form.errors.fiber_ports_number" v-text="form.errors.ethernet_ports_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Manageable
                </label>

                <input type="radio" v-model="form.manageable" value="YES" id="Yes"> 
                <label for="Yes">Yes</label>
                <br>
                <input type="radio" v-model="form.manageable" value="NO" id="No"> 
                <label for="No">No</label>
                <br>
                <input type="radio" v-model="form.manageable" value="Controller" id="Controller"> 
                <label for="Controller">Controller</label>

                <div v-if="form.errors.manageable" v-text="form.errors.manageable" class="text-red-500 text-xs italic mt-2"></div>

            </div>   

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit Speed
                </label>

                <input type="radio" v-model="form.speed" value="100MB" id="100MB"> 
                <label for="Yes">100MB</label>
                <br>
                <input type="radio" v-model="form.speed" value="1GB" id="1GB"> 
                <label for="1GB">1GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="2.5GB" id="2.5GB"> 
                <label for="2.5GB">2.5GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="5GB" id="5GB">
                <label for="5GB">5GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="10GB" id="10GB">
                <label for="10GB">10GB</label>

                <div v-if="form.errors.speed" v-text="form.errors.speed" class="text-red-500 text-xs italic mt-2"></div>

            </div>  

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Edit POE
                </label>

                <input type="radio" v-model="form.poe" value="NO" id="No"> 
                <label for="No">No</label>
                <br>
                <input type="radio" v-model="form.poe" value="24" id="24"> 
                <label for="24">24</label>
                <br>
                <input type="radio" v-model="form.poe" value="48" id="48"> 
                <label for="48">48</label>
                <br>
                <input type="radio" v-model="form.poe" value="24&48" id="24&48"> 
                <label for="24&48">24&48</label>

                <div v-if="form.errors.poe" v-text="form.errors.poe" class="text-red-500 text-xs italic mt-2"></div>

            </div>    



              <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Edit</button>

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
        device: Object,
        networkdevice: Object

    });
    
    let form = useForm({

        inventory_number: props.device.inventory_number,
        comment: props.device.comment,
        model: props.device.model,
        family: props.device.family,
        status:props.device.status,
        mark:props.device.mark_id,
        manageable:props.networkdevice.manageable,
        ethernet_ports_number: props.networkdevice.ethernet_ports_number,
        speed: props.networkdevice.Speed,
        fiber_ports_number: props.networkdevice.fiber_ports_number,
        poe: props.networkdevice.POE,

    })

    let submit = () => {

        form.put(`/network-devices/edit/${props.networkdevice.id}`);


    }


</script>
