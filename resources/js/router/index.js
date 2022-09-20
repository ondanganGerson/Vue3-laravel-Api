import { createRouter, createWebHistory } from "vue-router";

import TodolistsIndex from '../components/todolists/TodolistsIndex.vue'
import TodolistsCreate from '../components/todolists/TodolistsCreate'
import TodolistsEdit from '../components/todolists/TodolistsEdit'

const routes = [
    {
        path: '/dashboard',
        name: 'todolists.index', 
        component: TodolistsIndex,
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
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})