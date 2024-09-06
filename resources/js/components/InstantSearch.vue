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
} from "vue-instantsearch/vue3/es";
import { instantMeiliSearch } from "@meilisearch/instant-meilisearch";
import { ref } from "vue";
import { useMeiliSearch } from "../Composables/useMeilisearch";

const searchClient = ref(null);
const key = ref(null);
const indexName = ref(null);

const { customSearchFn: searchFn } = useMeiliSearch();

searchClient.value = instantMeilisearch(baseUrl, key.value, {
    keepZeroFacets: true,
}).searchClient;
</script>
<template>
    <ais-instant-search
        v-if="searchClient"
        :searchClient="searchClient"
        :index-name="indexName"
        :search-function="searchFn"
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
