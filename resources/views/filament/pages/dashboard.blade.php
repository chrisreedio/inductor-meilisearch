<x-filament-panels::page>
    This is the Livewire Dashboard with Vue Components.
    {{--<div wire:ignore class="border-2 border-blue-500 p-4">--}}
    <div class="border-2 border-blue-500 p-4">

        <livewire:vue component="PHPVersion" :prop:search-key="config('scout.meilisearch.search_key')" />
        {{--<livewire:vue component="ApplicationCounter" />--}}
        {{--<livewire:vue component="InstantSearch" />--}}
    </div>
</x-filament-panels::page>
