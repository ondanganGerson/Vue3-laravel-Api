require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";

import router from './router'
import TodolistsIndex from './components/todolists/TodolistsIndex.vue'

createApp({
    components: {
        TodolistsIndex
    }
}).use(router).mount('#app') 
