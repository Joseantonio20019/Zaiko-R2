<template>
<div>

    <Head title="Create Computer" />


    <h1 class="text-3xl text-center">Create a New Computer</h1>


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


                <input v-model="form.comment" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="comment" id="comment" autofocus> 

                <div v-if="form.errors.comment" v-text="form.errors.comment" class="text-red-500 text-xs italic mt-2"></div>

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
                    CPU
                </label>

                <input v-model="form.cpu" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="cpu" id="cpu" autofocus> 

                <div v-if="form.errors.cpu" v-text="form.errors.cpu" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    CPU Model
                </label>

                <input v-model="form.cpu_model" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="cpu_model" id="cpu_model" autofocus> 

                <div v-if="form.errors.cpu_model" v-text="form.errors.cpu_model" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    RAM Type
                </label>

                <input v-model="form.ram_type" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="ram_type" id="ram_type" autofocus> 

                <div v-if="form.errors.ram_type" v-text="form.errors.ram_type" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    RAM Size
                </label>

                <input v-model="form.ram_size" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="ram_size" id="ram_size" autofocus> 

                <div v-if="form.errors.ram_size" v-text="form.errors.ram_size" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    OS
                </label>

                <input v-model="form.os" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="os" id="os" autofocus> 

                <div v-if="form.errors.os" v-text="form.errors.os" class="text-red-500 text-xs italic mt-2"></div>

            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 " for="name">
                    Hard Drive 1 Size
                </label>

                <input v-model="form.size" class="form-select appearance-none block w-80 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" name="size" id="size" autofocus>
                <label for="size">GB</label> 

                <div v-if="form.errors.size" v-text="form.errors.size" class="text-red-500 text-xs italic mt-2"></div>

            </div>
            
            <div class="mb-6">

                 <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Hard Drive 1 Type
                </label>

                <input v-model="form.type" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="size" id="size" autofocus> 

                <div v-if="form.errors.type" v-text="form.errors.type" class="text-red-500 text-xs italic mt-2"></div>


            </div>

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Hard Drive 2 Size (Optional)
                </label>

                <input v-model="form.size1" class="form-select appearance-none block w-96 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="number" name="size1" id="size1" autofocus>
                <label for="size">GB</label> 

                <div v-if="form.errors.size1" v-text="form.errors.size1" class="text-red-500 text-xs italic mt-2"></div>

            </div>
            
            <div class="mb-6">

                 <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                    Hard Drive 2 Type (Optional)
                </label>

                <input v-model="form.type1" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="type1" id="type1" autofocus> 

                <div v-if="form.errors.type1" v-text="form.errors.type1" class="text-red-500 text-xs italic mt-2"></div>


            </div>

            
               <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    User
                </label>

                <input v-model="form.user" class="border border-gray-400 p-2 w-full" type="text" name="user">
                <div v-if="form.errors.user" v-text="form.errors.user" class="text-red-500 text-xs italic mt-2"></div>
                

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Register Comment (Optional)
                </label>

                <textarea v-model="form.register_comment" class="border border-gray-400 p-2 w-full" placeholder="Write your comment"></textarea>
                <div v-if="form.errors.serial_number" v-text="form.errors.register_comment" class="text-red-500 text-xs italic mt-2"></div>
            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Modification Date (Optional)
                </label>

                <input v-model="form.modification_date" class="border border-gray-400 p-2 w-full" type="date" name="modificationdate">
                <div v-if="form.errors.modification_date" v-text="form.errors.modification_date" class="text-red-500 text-xs italic mt-2"></div>

            </div>

             <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Sites
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="selectedsite" @change="getUbications()" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="site in sites" :value="site.id" :key="site.id">{{site.name}}</option>
                    </select>
                </div>

            </div>
        

            <div class="mb-6">


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Ubication
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.ubication" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="ubication in ubications" :value="ubication.id" :key="ubication.id">{{ubication.name}}</option>
                    </select>
                </div>

            </div>

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
                    Department
                </label>
                <div class="mb-3 xl:w-96">
                    
                    <select v-model="form.department" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option v-for="department in departments" :value="department.id" :key="department.id">{{department.name}}</option>
                    </select>
                </div>

                <div v-if="form.errors.department" v-text="form.errors.department" class="text-red-500 text-xs italic mt-2"></div>

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

        await axios.get(`/api/ubications/${selectedsite.value}`).then(response => {
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
        cpu:'',
        cpu_model:'',
        ram_type:'',
        ram_size:'',
        os:'',
        size:'',
        type:'',
        size1:'',
        type1:'',
        user:'',
        register_comment:'',
        ubication:'',
        department:'',
        modification_date:'',

    });

    let submit = () => {

        form.post('/computers/create');

    }

    onMounted(() => {
        
        getSites();
        getUbications();
        
    });


</script>
