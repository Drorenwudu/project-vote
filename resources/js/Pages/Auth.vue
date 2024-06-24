<script setup>
import {ref, reactive} from "vue";
import { router } from '@inertiajs/vue3';

const emailError = ref('Ведіть електронну адресу в поле');
const isError = ref(false)

const form = reactive({
    email: '',
})

function validateEmail() {
    const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;
    if (form.email === ''){
        emailError.value = 'Ведіть електронну пошту!';
        isError.value = false;
    } else if (form.email.length > 100){
        emailError.value = 'Багато символів!';
        isError.value = false;
    } else if (!emailPattern.test(form.email)) {
        emailError.value = 'Неправильний формат електронної пошти!';
        isError.value = false;
    }else {
        emailError.value = '';
        isError.value = true;
    }
}

function submit() {
    router.post('/', form)
}

</script>

<template>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full text-center">
            <div class="text-center">
                <h2 v-if="$page.props.error" class="text-3xl font-bold p-4 bg-red-500 text-white">{{$page.props.error}}</h2>
            </div>
            <form @submit.prevent="submit">
                <h1 class="text-3xl font-bold text-black mb-4">Якщо ви хочете проголосувати, введіть свою електронну адресу та натисніть «Далі»!</h1>
                <label for="email" class="block p-3 font-medium text-2xl">Введіть електронну адресу:</label>
                <input type="email" id="email" v-model="form.email" @input="validateEmail" class="p-3 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required/>
                <p v-if="!isError" class="error p-2 text-red-700 font-bold">{{ emailError }}</p>
                <button type="submit" class=" m-4 shadow bg-blue-200 hover:bg-blue-500 drop-shadow-2xl focus:shadow-outline focus:outline-none text-black py-2 px-4 rounded">
                    Далі
                </button>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
