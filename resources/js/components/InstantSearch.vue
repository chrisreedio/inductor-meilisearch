<script setup>
import {
    AisInstantSearch,
    AisHits,
    AisInfiniteHits,
    AisSearchBox,
    AisPagination,
    AisConfigure,
    AisClearRefinements,
    //@ts-ignore
} from 'vue-instantsearch/vue3/es'
import { instantMeiliSearch } from '@meilisearch/instant-meilisearch'
import { onMounted, ref } from 'vue'
import { useMeiliSearch } from '../composables/useMeilisearch'
// import { useFilament } from '@inductor/composables/useFilament'
import { useFilament } from '@inductor/composables/useFilament'

const props = defineProps({
    searchHost: String,
    searchKey: String,
    searchIndex: String,
})

const filament = useFilament()
onMounted(() => {
    // filament.openModal()
})

const searchClient = ref(null)

const {customSearchFn: searchFn} = useMeiliSearch()

searchClient.value = instantMeiliSearch(props.searchHost, props.searchKey, {
    keepZeroFacets: true,
}).searchClient
</script>
<template>
    <ais-instant-search
        v-if="searchClient"
        :searchClient="searchClient"
        :index-name="props.searchIndex"
        :future="{
            preserveSharedStateOnUnmount: true
        }"
    >
        <ais-configure />

        <div class="flex flex-col">
            <ais-search-box
                placeholder="ex. John Doe"
                class="relative"
            ></ais-search-box>

            <ais-hits>
                <template v-slot="{ items }">
                    <pre>{{ items }}</pre>
                </template>
            </ais-hits>
        </div>
    </ais-instant-search>
</template>
