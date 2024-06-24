<script setup>
    defineProps({err: String});
</script>

<template>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full text-center">
            <h1 class="text-4xl font-bold text-red-500 mb-4">Вибачте!</h1>
            <p class="text-4xl text-red-500 mb-6">{{err}}</p>
        </div>
    </div>
</template>

<style scoped>

</style>
