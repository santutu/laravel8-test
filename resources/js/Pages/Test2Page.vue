<template>
    <div>

        <div>
            <Link :href="route('sample')">sample</Link>
            <Link :href="route('test')">testpage</Link>
        </div>


        <form>
            <div>
                <input v-model="form.title">
                <div v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
            <div>
                <input v-model="form.content">
                <div v-if="form.errors.content">{{ form.errors.content }}</div>
            </div>

            <button type="button" @mouseup.prevent="form.post('contents/create')" class="btn"
                    :disabled="form.processing">publish
                content
            </button>
        </form>
    </div>
</template>

<style scoped>

</style>

<script lang="ts">
import {defineComponent, reactive} from 'vue'
import {useForm} from '@inertiajs/inertia-vue3';
import Content from "../models/Content";
import {Link} from '@inertiajs/inertia-vue3';
import User from "../models/User";

export default defineComponent({
                                   components: {Link},
                                   props: {},

                                   setup() {

                                       const form = useForm(new Content("1", "2").toPlain());

                                       return {form}
                                   },

                                   mounted() {

                                   },


                               })
</script>
