require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";

import router from './router'
import TodolistsIndex from './components/todolists/TodolistsIndex.vue'
import ScriptsetupIndex from './components/scriptsetup/ScriptsetupIndex.vue'

createApp({
    components: {
        TodolistsIndex,
        ScriptsetupIndex
    }
}).use(router).mount('#app') 
