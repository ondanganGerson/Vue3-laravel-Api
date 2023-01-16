import { createRouter, createWebHistory } from "vue-router";

import TodolistsIndex from '../components/todolists/TodolistsIndex.vue'
import TodolistsCreate from '../components/todolists/TodolistsCreate'
import TodolistsEdit from '../components/todolists/TodolistsEdit'

import ScriptsetupIndex from '../components/scriptsetup/ScriptsetupIndex'

const routes = [
    {
        path: '/dashboard',
        name: 'todolists.index', 
        component: TodolistsIndex, //from resources/js/app/js
    },
    {
        path: '/todolists/create',
        name: 'todolists.create',
        component: TodolistsCreate
    },
    {
        path: '/todolists/:id/edit',
        name: 'todolists.edit',
        component: TodolistsEdit,
        props: true
    },

    {
        path: '/dashboard2',
        name: 'scriptsetup.index',
        component: ScriptsetupIndex
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})