<template>
<div>

    <Head title="Edit Monitor" />


    <h1 class="text-3xl text-center font-bold">Edit a Monitor</h1>


    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">
        
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Inventory Number
                </label>


                <input v-model="form.inventory_number" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="inventory_number" id="inventory_number" autofocus> 

                <div v-if="form.errors.inventory_number" v-text="form.errors.inventory_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Comment(Optional)
                </label>


                <textarea v-model="form.comment" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="comment" id="comment" autofocus>
                </textarea>

                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Family
                </label>
                <div>
                    
                    <select v-model="form.family" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="family in families" :key="family.id">{{family.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.family" v-text="form.errors.family" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Mark
                </label>
                <div>
                    
                    <select v-model="form.mark" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="mark in marks" :key="mark.id" :value="mark.name" >{{mark.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.mark" v-text="form.errors.mark" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Model
                </label>
                <div>
                    
                    <select v-model="form.model" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="model in models" :key="model.id">{{model.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.model" v-text="form.errors.model" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Status
                </label>
                <div>
                    
                    <select v-model="form.status" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="status in statuses" :key="status.id">{{status.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.status" v-text="form.errors.status" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Inches
                </label>

                <input v-model="form.inches" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" name="inches" id="inches" autofocus> 

                <div v-if="form.errors.inches" v-text="form.errors.inches" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <input type="checkbox" v-model="form.hdmi" true-value="1" false-value="0" name="hdmi" id="hdmi" class="mr-2"> 
                <label>HDMI</label>
                <br>
                <input type="checkbox"  v-model="form.vga" true-value="1" false-value="0" name="vga" id="vga" class="mr-2"> 
                <label>VGA</label>
                <br>
                <input type="checkbox"  v-model="form.dvi" true-value="1" false-value="0" name="dvi" id="dvi" class="mr-2"> 
                <label>DVI</label>
                <br>
                <input type="checkbox" v-model="form.displayport" true-value="1" false-value="0" name="displayport" id="displayport" class="mr-2" > 
                <label>DisplayPort</label>
                

                
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
        monitor: Object,
        device: Object,

    });
    
    let form = useForm({

        inventory_number: props.device.inventory_number,
        comment: props.device.comment,
        model: props.device.model,
        family: props.device.family,
        status: props.device.status,
        mark: props.device.mark,
        inches: props.monitor.inches,
        hdmi: props.monitor.HDMI,
        vga: props.monitor.VGA,
        dvi: props.monitor.DVI,
        displayport: props.monitor.DisplayPort,




    })

    let submit = () => {

        form.put(`/monitors/edit/${props.monitor.device_id}`);


    }

</script>
