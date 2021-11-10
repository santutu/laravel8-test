<template>
    <div>
        <h1> {{ name }}</h1>

        <div>
            this is a test page
        </div>


        <Link :href="route('dashboard')">Go to home</Link>

    </div>
</template>

<style scoped>

</style>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {Link},

    props: {
        name: String
    },

    mounted() {
        console.log(this.name)
    }


})
</script>
