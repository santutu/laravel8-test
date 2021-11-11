<template>
    <div class="mx-auto" style="margin: 20px">

        <div class="flex justify-center">
            <Link class="big-text" :href="route('card-game')">카드게임 하러가기 ㅇㅅㅇ</Link>
        </div>

        <div class="flex flex-row justify-center items-center flex-wrap">
            <div class="flex flex-col">


                <div class="flex flex-col "
                     style="background: #98e59a; min-width: 200px; height: 500px;overflow: auto;display: flex;flex-direction: column-reverse;">
                    <div v-for="(chat, idx) in chatList">

                        <div class="flex flex-col p-2"
                             style="background: #112d7c; color: white; border-top: 1px white solid">
                            <div style="font-weight: bold">
                                {{ chat.user.name }} :
                            </div>
                            <div style="font-weight: bold">
                                {{ chat.message }}
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <input @keyup.enter.prevent="sendMessage" type="text" v-model="chatData.message">
                    <button class="btn" type="button" @mouseup.prevent="sendMessage">보내기</button>

                </div>

            </div>

            <div class="flex flex-col" style="height: 500px;  color: white">
                <h1 class="p-2">참여자 ㅇㅅㅇ</h1>
                <div v-for="( user,idx) in userList">
                    <div class="p-2">
                        <span v-if="user.isMe">(나)</span>
                        {{ user.name }}
                    </div>
                </div>
            </div>
        </div>

        <!--        <div v-if="chatForm.errors">{{ chatForm.errors }}</div>-->

    </div>

</template>

<style scoped>

</style>

<script lang="ts">
import {defineComponent, reactive} from 'vue'
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import User from "../models/User";
import Chat from "../models/Chat";
import axios from "axios";
import Content from "../models/Content";
import {classToPlain, plainToClass} from "class-transformer";

export default defineComponent({
                                   components: {Link},

                                   props: {
                                       user: {
                                           type: Object,
                                           required: true
                                       },
                                   },

                                   setup(props: any, context) {
                                       let chatList: Chat[] = [];
                                       let userList: User[] = []

                                       chatList = reactive(chatList)
                                       userList = reactive(userList)

                                       const chatData = reactive({message: ""});


                                       return {
                                           chatList, chatData, userList
                                       }
                                   },

                                   methods: {
                                       sendMessage() {

                                           if (this.chatData.message.length === 0) {
                                               return;
                                           }
                                           console.log('sendMessage');

                                           const chat = new Chat(
                                               plainToClass(User, this.user),
                                               this.chatData.message
                                           )

                                           this.chatList.splice(0, 0, chat)


                                           axios.post('/chatroom/send-message', this.chatData);


                                           this.chatData.message = "";

                                       }

                                   },

                                   mounted() {


                                       Echo.join('chatroom')
                                           .here((users: User[]) => {
                                               users.forEach(user => {
                                                   if (user.name === this.user.name) {
                                                       user.isMe = true;
                                                   }

                                                   if (!this.userList.find(_user => user.name === _user.name))
                                                       this.userList.push(user)


                                               });
                                               console.log(users)
                                               console.log('here')
                                           })
                                           .joining((user: User) => {

                                               if (!!this.userList.find(_user => user.name === _user.name)) {
                                                   return;
                                               }
                                               this.userList.push(user)

                                               console.log('joining')
                                               console.log(user.name);
                                           })
                                           .leaving((user: User) => {
                                               const userIdx = this.userList.findIndex(_user => user.name === _user.name);
                                               if (userIdx !== -1)
                                                   this.userList.splice(userIdx, 1)

                                               console.log('leaving')
                                               console.log(user.name);
                                           })

                                           .listen('.chat', (e) => {
                                               const chat: Chat = e.chat
                                               console.log('listen');
                                               console.log(e);
                                               console.log(chat);

                                               this.chatList.splice(0, 0, chat)

                                           })
                                           .error((e) => {
                                               console.log(e);
                                           });
                                   },

                                   data() {
                                       return {}
                                   },
                                   computed: {},


                               })
</script>
