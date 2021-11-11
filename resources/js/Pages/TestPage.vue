<template>
    <app-layout title="TestPage Title">
        <template #header>
            <div class="text-6xl">
                카드 뽑기 !!! 카드 클릭해 !!
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <Link :href="route('dashboard')">dashboard</Link>
            <Link :href="route('test2')">test2</Link>

            <div class="flex flex-row flex-wrap">
                <div @mouseup.prevent="openCard($event,card)" class="card m-2"
                     :style="{
                        backgroundColor : card.color
                     }"
                     v-for="( card ,idx) in cards"
                     :key="'card'+idx">
                    {{ card.name }}
                    {{ card.text }}
                </div>
            </div>

            <div class="text-center mt-4 text-8xl">
                <h1>{{ results }}</h1>
            </div>

            <div v-show="isAllOpen" class="flex justify-center my-6">
                <button class="btn-secondary text-6xl py-10 px-20" @click="init">다시하기</button>
            </div>

        </div>
    </app-layout>
</template>

<style scoped>


</style>

<script lang="ts">
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
import Card from "../models/Card";
import AppLayout from "../Layouts/SimpleLayout.vue";


export default defineComponent({
                                   components: {Link, AppLayout},


                                   data() {
                                       const cards: Card[] = []

                                       return {
                                           cards,
                                           results: ""
                                       }
                                   },


                                   mounted() {
                                       this.init();

                                   },

                                   computed: {
                                       isAllOpen: function (): boolean {
                                           return !this.cards.find((card) => !card.isOpen);
                                       }
                                   },
                                   methods: {
                                       init() {
                                           this.cards = _.range(1, 10 + 1).map((v) => {
                                               return new Card(`카드 ${v}번`);
                                           })
                                           this.results = "";
                                       },
                                       openCard(e, card: Card) {
                                           if (card.isOpen) {
                                               return;
                                           }

                                           card.isOpen = true;
                                           card.text = _.random(0, 1) ? "꽝!" : "당첨!";
                                           card.name = "";

                                           if (this.isAllOpen) {
                                               const 당첨개수 = this.cards.filter((card) => card.text === "당첨!").length;
                                               this.results = `${당첨개수}개 당첨!!!`;
                                               this.results += 당첨개수 > 8 ? " 운이 좋으시군요!!" : " 나쁘지 않아요!!";
                                           }


                                       }
                                   }


                               })
</script>
