<template>
    
     <nav>
        <ul class="flex space-x-4 list-inside list-none">
            <div class="relative">
                <input type="text" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-green-400 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Buscar</label>
            </div>
            <li>
                <NavLink href='/' :active="$page.component === 'Home'" >Home</NavLink>
            </li>
            <li>
                <NavLink href='/users' :active="$page.component === 'Users'" >Users</NavLink>
            </li>
            <li>
                <NavLink href='/settings' :active="$page.component === 'Settings'" >Settings</NavLink>
            </li>
            <li>
                <DropdownDevices></DropdownDevices>
            </li>  
            <li>
                <DropdownConfiguration></DropdownConfiguration>
            </li>         
            <li>
                <NavLink href='/logout' class="text-red-600 hover:underline" method="post" :data="{foo: 'bar'}" as="button" >Log Out</NavLink>
            </li>
            
            
        </ul>

    </nav>


</template>

<script setup>

    import NavLink from "./NavLink.vue";
    import DropdownDevices from "./DropdownDevices.vue";
    import DropdownConfiguration from "./DropdownConfiguration.vue";

</script>