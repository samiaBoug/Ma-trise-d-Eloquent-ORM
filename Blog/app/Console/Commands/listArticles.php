<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;

class listArticles extends Command
{
    protected $signature = 'app:list-articles';
    protected $description = 'display articles';

    public function handle()
    {
        $articles = Article::all();

        $this->info('List of Articles');
        foreach($articles as $article){
            $this->line("Title: {$article->title} - Body: {$article->body}");
        }
    }
}
