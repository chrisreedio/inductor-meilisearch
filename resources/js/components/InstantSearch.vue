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
import DataTable from "primevue/datatable";
import Column from "primevue/column";
//import ColumnGroup from "primevue/columngroup"; // optional
//import Row from "primevue/row"; // optional
import { instantMeiliSearch } from "@meilisearch/instant-meilisearch";
import { onMounted, ref } from "vue";
import { useMeiliSearch } from "../composables/useMeilisearch";
// import { useFilament } from '@inductor/composables/useFilament'
import { useFilament } from "@inductor/composables/useFilament";
import { useCounterStore } from "@/stores/counterStore";
import { storeToRefs } from "pinia";

const props = defineProps({
    searchHost: String,
    searchKey: String,
    searchIndex: String,
});

const counterStore = useCounterStore();
const { count } = storeToRefs(counterStore);
const filament = useFilament();
onMounted(() => {
    // filament.openModal()
});

const searchClient = ref(null);

const { customSearchFn: searchFn } = useMeiliSearch();

searchClient.value = instantMeiliSearch(props.searchHost, props.searchKey, {
    keepZeroFacets: true,
}).searchClient;
</script>
<template>
    <div>
        {{ count }}
    </div>
    <ais-instant-search
        v-if="searchClient"
        :searchClient="searchClient"
        :index-name="props.searchIndex"
        :future="{
            preserveSharedStateOnUnmount: true,
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
                    <DataTable :value="items" stripedRows>
                        <Column field="id" header="ID"></Column>
                        <Column field="name" header="Name"></Column>
                        <Column field="email" header="Email"></Column>
                        <Column field="phone" header="Phone"></Column>
                        <Column field="birthday" header="Birthday"></Column>
                        <Column>
                            <template #body="slotProps">
                                <Button
                                    @click="alert(slotProps.id)"
                                    label="Edit"
                                    icon="pi pi-pencil"
                                    severity="secondary"
                                    raised
                                />
                            </template>
                        </Column>
                    </DataTable>
                </template>
            </ais-hits>
        </div>
    </ais-instant-search>
</template>
