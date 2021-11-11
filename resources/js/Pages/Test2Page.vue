<template>
    <div>
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
import {defineComponent} from 'vue'
import {useForm} from '@inertiajs/inertia-vue3';
import Content from "../models/Content";


export default defineComponent({
                                   components: {},
                                   props: {},
                                   mounted() {
                                   },

                                   setup() {

                                       const form = useForm(new Content().toPlain());

                                       return {form}
                                   }
                               })
</script>
