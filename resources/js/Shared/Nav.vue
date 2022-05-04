<template>
    
     <nav>
        <ul class="flex space-x-4 list-inside list-none">
            <li>
                <NavLink href='/' :active="$page.component === 'Home'" >Home</NavLink>
            </li>
            <li>
                <NavLink href='/users' :active="$page.component === 'Users'" >Users</NavLink>
            </li>
            <li>
                <DropdownDevices></DropdownDevices>
            </li>  
            <li>
                <DropdownConfiguration></DropdownConfiguration>
            </li>         
            <li>
                <NavLink href='/logout' class="text-red-600 hover:underline" method="post" as="button" >Log Out</NavLink>
            </li>
            
            
        </ul>

    </nav>


</template>

<script setup>

    import NavLink from "./NavLink.vue";
    import DropdownDevices from "./DropdownDevices.vue";
    import DropdownConfiguration from "./DropdownConfiguration.vue";

</script>