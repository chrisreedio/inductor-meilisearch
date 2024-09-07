<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public function getTitle(): string | Htmlable
    {
        return 'Dashboard';
    }

    protected function getHeaderActions(): array
    {
        return [
          Action::make('test')
            ->label('Test')
            ->icon('heroicon-o-document-text')
            ->action(function () {
                Notification::make()
                    ->title('Test')
                    ->body('This is a test notification.')
                    ->success()
                    ->send();
            }),
        ];
    }
}
