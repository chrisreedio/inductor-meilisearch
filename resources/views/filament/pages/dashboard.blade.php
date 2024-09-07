<x-filament-panels::page>
    This is the Livewire Dashboard with Vue Components.
    {{--<div wire:ignore class="border-2 border-blue-500 p-4">--}}
    <div class="border-2 border-blue-500 p-4">
        {{--<x-inductor-vue-wrapper component="PHPVersion" :props="['searchKey' => config('scout.meilisearch.search_key')]" />--}}
        {{--<livewire:vue component="PHPVersion" :props="['search_key' => config('scout.meilisearch.search_key')]" />--}}
        <livewire:vue component="StoreIncrementer" />
        <livewire:vue component="InstantSearch" :props="[
            'searchKey' => config('scout.meilisearch.search_key'),
            'searchIndex' => config('scout.prefix').'people',
            'searchHost' => config('scout.meilisearch.host'),
        ]" />

        {{--<livewire:vue component="PHPVersion" :prop:search-key="config('scout.meilisearch.search_key')" />--}}
        {{--<inductor::vue component="PHPVersion" :search-key="config('scout.meilisearch.search_key')" />--}}
        {{--<inductor::vue-wrapper />--}}
        {{--<x-inductor-vue-wrapper :search-key="config('scout.meilisearch.search_key')" />--}}
        {{--<x-inductor-vue-wrapper searchKey="this is my search key" />--}}
        {{--<x-inductor-vue-wrapper component="PHPVersion" :props="['searchKey' => config('scout.meilisearch.search_key')]" />--}}
        {{--<livewire:vue component="ApplicationCounter" />--}}
        {{--<livewire:vue component="InstantSearch" />--}}
    </div>
</x-filament-panels::page>
