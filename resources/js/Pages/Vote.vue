<script setup>
import {ref, reactive} from "vue";
import { router } from '@inertiajs/vue3';

defineProps({ title: String, text: String, answers: Array, message:String});

const selected = ref(1);
const emailError = ref('Ведіть електронну пошту!');
const isError = ref(false)

const form = reactive({
    email: '',
    checkedAnswer: [],
})

function checkAnswer() {
    console.log(1);
    if(selected.value !== 0){
        form.checkedAnswer = form.checkedAnswer.filter(item => item['index'] <= selected.value);
    }
}

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

function isDisabledAnswers(size) {
    const arrDisabled = [false];
    if(selected.value === 0) {
        for(let i = 1; i < size; i++) arrDisabled.push(false);
        return arrDisabled;
    }
    for(let i = 1; i < selected.value; i++) arrDisabled.push(false);
    return arrDisabled;
}

function submit() {
    router.post('/send', form)
}

</script>

<template>
    <div class="max-w-md mx-auto m-3 bg-amber-100 rounded-xl drop-shadow-2xl overflow-hidden md:max-w-3xl text-black">
        <div class="md:flex flex-col font-normal font-serif">
            <div class="text-center">
                <h2 v-if="$page.props.message" class="text-3xl font-bold p-4 bg-red-500 text-white">{{$page.props.message}}</h2>
            </div>
            <div class="p-8">
                <h1 class="mb-2 pb-2 text-3xl text-center border-b-2 border-blue-900">{{title}}</h1>
                <div class="mb-2 mt-2 p-2 tracking-wide text-2xl justify-center border-b-2 border-blue-900"><b>Опис:</b> {{text}}</div>
                <form @submit.prevent="submit">
                    <div class="p-2 mb-2 border-b-2 border-blue-900">
                        <label for="number-options" class="block text-2xl font-bold">Кількість вибраних варіантів:</label>
                        <ul class="pt-4 pr-4 pl-4 pb-2 list-disc">
                            <li>Max – можна вибрати всі варіанти</li>
                            <li>Або виберіть кількість варіантів</li>
                        </ul>
                        <div class="flex mb-4">
                            <select id="number-options"  name="number-options" v-model="selected" @click="checkAnswer" class="mt-1 block flex-none w-16 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm font-sans">
                                <option v-for="(answer, id) in answers" :key="id" :value="id">{{id === 0? 'Max': id}}</option>
                            </select>
                            <label for="number-options" @click="checkAnswer" class="flex-none w-56 block p-2 pl-2 font-medium text-lg">Вибрано: <span class="font-sans">{{selected === 0? answers.length : selected}} з {{answers.length}}</span></label>
                        </div>
                        <label for="email" class="block font-medium text-2xl">Введіть вашу електронну пошту:</label>
                        <input type="email" id="email" v-model="form.email" @input="validateEmail" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required/>
                        <p v-if="!isError" class="error p-2 text-red-700 font-bold">{{ emailError }}</p>
                    </div>
                    <div class="flex items-center mb-4 mt-4" v-for="(answer, index) in answers" :key="index">
                        <input v-model="form.checkedAnswer" :disabled="isDisabledAnswers(answers.length)[index] ?? true" :value="{'id': answer['id'], 'index': index + 1}" id="default-checkbox" type="checkbox" class="form-checkbox h-6 w-5 text-black text-2xl">
                        <label for="default-checkbox" class="ms-2 text-sm font-medium">{{answer['name']}}</label>
                    </div>
                        <p v-if="form.checkedAnswer.length === 0" class="error pl-5 pr-4 pb-4 text-red-700 font-bold">Зробіть хоча б один вибір!</p>
                    <div class="text-center mt-6 mb-1">
                        <button :disabled="!(isError && form.checkedAnswer.length > 0)" type="submit" class="shadow bg-white hover:bg-blue-300 drop-shadow-2xl focus:shadow-outline focus:outline-none text-black py-2 px-4 rounded">
                            Проголосувати
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
