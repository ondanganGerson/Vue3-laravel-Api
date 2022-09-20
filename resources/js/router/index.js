import { createRouter, createWebHistory } from "vue-router";

import TodolistsIndex from '../components/todolists/TodolistsIndex.vue'
// import CompaniesCreate from '../components/todolists/CompaniesCreate'
// import CompaniesEdit from '../components/todolists/CompaniesEdit'

const routes = [
    {
        path: '/dashboard',
        name: 'todolists.index', 
        component: TodolistsIndex,
    }
    // {
    //     path: '/companies/create',
    //     name: 'companies.create',
    //     component: CompaniesCreate
    // },
    // {
    //     path: '/companies/:id/edit',
    //     name: 'companies.edit',
    //     component: CompaniesEdit,
    //     props: true
    // }
]

export default createRouter({
    history: createWebHistory(),
    routes
})