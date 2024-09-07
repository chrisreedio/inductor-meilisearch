<script setup>
import { useCounterStore } from '@/stores/counterStore'
import { storeToRefs } from 'pinia'

const counterStore = useCounterStore()
const {count} = storeToRefs(counterStore)
const {increment} = counterStore
</script>
<template>
    <button
        @click="increment"
        class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
    >
        Clicked {{ count }} times
    </button>
</template>
