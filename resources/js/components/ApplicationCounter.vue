<script setup>
import { ref } from 'vue'

const counter = ref(0)
setInterval(() => {
    counter.value++
}, 100)
</script>
<template>
    <div class="flex gap-x-2 border border-yellow-500 p-2">
        <dt class="font-bold text-gray-200">Application Level Counter:</dt>
        <dd>{{ counter }}</dd>
    </div>
</template>
