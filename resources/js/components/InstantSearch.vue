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
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Toolbar from "primevue/toolbar";
import SplitButton from "primevue/splitbutton";
import Tag from "primevue/tag";
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

function rowClick(id) {
    const notification = new window.FilamentNotification()
        .title(`Edit ${id}`)
        .success()
        .send();
}
</script>
<template>
    <div>
        <!--<div>
            {{ count }}
        </div>-->
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
                <Toolbar>
                    <template #start>
                        <label class="font-semibold text-2xl"> People </label>
                    </template>

                    <template #center>
                        <ais-search-box>
                            <template v-slot="{ currentRefinement, refine }">
                                <IconField>
                                    <InputIcon class="pi pi-search" />
                                    <InputText
                                        :modelValue="currentRefinement"
                                        placeholder="Search"
                                        @input="
                                            refine($event.currentTarget.value)
                                        "
                                    />
                                </IconField>
                            </template>
                        </ais-search-box>
                    </template>

                    <template #end>
                        <Button label="Refresh" icon="pi pi-refresh" />
                        <!-- <SplitButton
                            label="Actions"
                            :model="items"
                        ></SplitButton
                    >-->
                    </template>
                </Toolbar>
                <ais-hits>
                    <template v-slot="{ items }">
                        <DataTable :value="items" stripedRows>
                            <Column field="id" header="ID" sortable></Column>
                            <Column
                                field="name"
                                header="Name"
                                sortable
                            ></Column>
                            <Column field="email" header="Email" sortable>
                                <template #body="slotProps">
                                    <Tag
                                        severity="info"
                                        :value="slotProps.data.email"
                                    ></Tag>
                                </template>
                            </Column>
                            <Column
                                field="phone"
                                header="Phone"
                                sortable
                            ></Column>
                            <Column
                                field="birthday"
                                header="Birthday"
                                sortable
                            ></Column>
                            <Column>
                                <template #body="slotProps">
                                    <Button
                                        @click="rowClick(slotProps.data.id)"
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
    </div>
</template>
