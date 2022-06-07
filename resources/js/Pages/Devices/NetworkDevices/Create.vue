<template>
<div>

    <Head title="Create Network Device" />

    <h1 class="text-3xl text-center font-bold">Create a New Network Device</h1>

    <form @submit.prevent="submit" action="/" class="max-w-md mx-auto mt-8">

    <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Site
                </label>
                
                    <select v-model="form.selectedsite" @change="getUbications()" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="site in sites" :value="site.id" :key="site.id">{{site.name}}</option>
                    </select>
                
            </div>
        
            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Ubication
                </label>
                
                    <select v-model="form.ubication" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="ubication in ubications" :value="ubication.id" :key="ubication.id">{{ubication.name}}</option>
                    </select>
                

                <div v-if="form.errors.ubication" v-text="form.errors.ubication" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Department
                </label>
                
                    <select v-model="form.department" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="department in departments" :value="department.id" :key="department.id">{{department.name}}</option>
                    </select>
               

                <div v-if="form.errors.department" v-text="form.errors.department" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Modification Date (Optional)
                </label>

                <input v-model="form.modification_date" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" name="modificationdate">
                <div v-if="form.errors.modification_date" v-text="form.errors.modification_date" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    User
                </label>

                <input v-model="form.user" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="user">
                <div v-if="form.errors.user" v-text="form.errors.user" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Register Comment (Optional)
                </label>

                <input v-model="form.register_comment" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                <div v-if="form.errors.register_comment" v-text="form.errors.register_comment" class="text-red-500 text-xs italic mt-2"></div>
            </div>
        
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
                    Ethernet Ports Number
                </label>

                <input v-model="form.ethernet_ports_number" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" name="ethernet ports" id="ethernet ports" autofocus> 

                <div v-if="form.errors.ethernet_ports_number" v-text="form.errors.ethernet_ports_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Fiber Ports Number
                </label>

                <input v-model="form.fiber_ports_number" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" name="fiber ports" id="fiber ports" autofocus> 

                <div v-if="form.errors.fiber_ports_number" v-text="form.errors.ethernet_ports_number" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Manageable
                </label>

                <input type="radio" v-model="form.manageable" value="YES" id="Yes"> 
                <label for="Yes" class="ml-2">Yes</label>
                <br>
                <input type="radio" v-model="form.manageable" value="NO" id="No"> 
                <label for="No" class="ml-2">No</label>
                <br>
                <input type="radio" v-model="form.manageable" value="Controller" id="Controller"> 
                <label for="Controller" class="ml-2">Controller</label>

                <div v-if="form.errors.manageable" v-text="form.errors.manageable" class="text-red-500 text-xs italic mt-2"></div>

            </div>   

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Speed
                </label>

                <input type="radio" v-model="form.speed" value="100MB" id="100MB"> 
                <label for="Yes" class="ml-2">100MB</label>
                <br>
                <input type="radio" v-model="form.speed" value="1GB" id="1GB"> 
                <label for="1GB" class="ml-2">1GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="2.5GB" id="2.5GB"> 
                <label for="2.5GB" class="ml-2">2.5GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="5GB" id="5GB">
                <label for="5GB" class="ml-2">5GB</label>
                <br>
                <input type="radio" v-model="form.speed" value="10GB" id="10GB">
                <label for="10GB" class="ml-2">10GB</label>

                <div v-if="form.errors.speed" v-text="form.errors.speed" class="text-red-500 text-xs italic mt-2"></div>

            </div>  

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    POE
                </label>

                <input type="radio" v-model="form.poe" value="NO" id="No"> 
                <label for="No" class="ml-2">No</label>
                <br>
                <input type="radio" v-model="form.poe" value="24" id="24"> 
                <label for="24" class="ml-2">24</label>
                <br>
                <input type="radio" v-model="form.poe" value="48" id="48"> 
                <label for="48" class="ml-2">48</label>
                <br>
                <input type="radio" v-model="form.poe" value="24&48" id="24&48"> 
                <label for="24&48" class="ml-2">24&48</label>

                <div v-if="form.errors.poe" v-text="form.errors.poe" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">

                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing" >Create</button>

            </div>
    </form>

</div>
    

</template>

<script setup>

    import axios from 'axios';
    import { useForm } from '@inertiajs/inertia-vue3';
    import {ref, onMounted } from 'vue';

    
    const sites = ref([]);
    const ubications = ref([]);
    const selectedsite= ref(1);

    const getSites = async () => {

        await axios.get('/api/sites').then(response => {
            sites.value = response.data;
        });

    };

    const getUbications = async () => {

        await axios.get(`/api/ubications/${form.selectedsite}`).then(response => {
            ubications.value = response.data;
        });

    };

    defineProps({

        errors: Object,
        families: Object,
        models: Object,
        statuses: Object,
        marks: Object,
        departments: Object,

    });
    
    let form = useForm({

        inventory_number: '',
        comment: '',
        model: '',
        family: '',
        status:'',
        mark:'',
        manageable:'',
        ethernet_ports_number: '' ,
        speed: '',
        fiber_ports_number: '',
        poe: '',
        user:'',
        register_comment:'',
        ubication:'',
        selectedsite:'',
        department:'',
        modification_date:'',

    })

    let submit = () => {

        form.post('/network-devices/create');
        
    }

    onMounted(() => {

        getSites();
        getUbications();

    });

</script>
