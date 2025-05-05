<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\News;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news): void
    {
        //
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news): void
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        //
    }

    /**
     * Handle the News "restored" event.
     */
    public function restored(News $news): void
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news): void
    {
        //
    }

    
    /**
     * Handle the News "saving" event.
     */
    public function saving(News $news): void
    {
        $news->slug = Str::slug($news->title); // Генерируем slug из заголовка
    }
}
