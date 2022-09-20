import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useTodolists() {
    const todolists = ref([])
    const list = ref([])
    const router = useRouter()
    const errors = ref('')

    const getTodolists = async () => {
        let response = await axios.get('/api/todolists')
        todolists.value = response.data.data;
    }

    const getList = async (id) => {
        let response = await axios.get('/api/todolists/' + id)
        list.value = response.data.data;
    }

    const storeList = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/todolists/create',data)
            await router.push({name: 'todolists.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateList = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/todolists/' + id, list.value)
            await router.push({name: 'todolists.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyList = async (id) => {
        await axios.delete('/api/todolists/' + id)
    }


    return {
        todolists,
        list,
        errors,
        getTodolists,
        getList,
        storeList,
        updateList,
        destroyList
    }
}