<?php

namespace App\Console\Commands\Meilisearch;

use App\Models\Person;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    protected $signature = 'scout:reindex';

    protected $description = 'Regenerate all search indexes.';

    public function handle(): void
    {
        $this->info('Reindexing all search indexes...');

        Person::flushSearchIndex();

        $this->info('Search indexing jobs have been queued...');
    }
}
