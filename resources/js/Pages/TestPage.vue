<template>
    <div>
        <h1> {{ name }}</h1>
        <h2>
            {{ age }}
        </h2>

        <div>
            {{ timer1.second }}
        </div>

        <div>
            {{ timer2.second }}
        </div>

        <div>
            this is a test page
        </div>

        <div>
            <button class="btn" @mouseup.prevent="test">test</button>
        </div>

        <div>
            <button class="btn-secondary" @mouseup.prevent="test">test</button>
        </div>

        <Link :href="route('dashboard')">Go to home</Link>

    </div>
</template>

<style scoped>

</style>

<script lang="ts">
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';
import {container} from "../../system/container";
import Timer from "../libs/Timer";

export default defineComponent({
                                   components: {Link},

                                   props: {
                                       name: String
                                   },

                                   data() {

                                       return {
                                           age: 22,
                                           timer1: container.get(Timer),
                                           timer2: container.get(Timer)
                                       }
                                   },

                                   mounted() {
                                       console.log(this.name)
                                   },
                                   methods: {
                                       test() {
                                           console.log("test");
                                           this.timer1.add();
                                       }
                                   }


                               })
</script>
