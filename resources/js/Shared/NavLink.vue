<template>
        <Link

       class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-green-400"
        :class="{'outline: 10px border-green-400' : active }"
        >
            <slot />
        </Link>

</template>

<script>

import { Link} from '@inertiajs/inertia-vue3';


export default {
    
    components: { Link},

    props: {

        active: Boolean,

        }
    };
</script>