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
import { ref } from 'vue'
import { useMeiliSearch } from '../composables/useMeilisearch'

// const props = defineProps({
//     page: Object
// })

// console.log('Search Key: ', props.page.search_key)

const searchClient = ref(null)
const baseUrl = 'http://localhost:7700'
const key = ref('SEARCH_KEY')
const indexName = ref('inductor_meilisearch-people')

const {customSearchFn: searchFn} = useMeiliSearch()

searchClient.value = instantMeiliSearch(baseUrl, key.value, {
    keepZeroFacets: true,
}).searchClient
</script>
<template>
    <ais-instant-search
        v-if="searchClient"
        :searchClient="searchClient"
        :index-name="indexName"
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
