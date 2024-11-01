<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Category;

class AddArticle extends Command
{
    protected $signature = 'app:add-article {title} {body} {category_id?}';
    protected $description = 'Add a new Article';



    public function handle()
    {
        $this->info("Available Categories:");
        $categories = Category::all();

        if($categories->isEmpty()){
            $this->info('No categories found');
            return;
        }

        foreach($categories as $category){
            $this->line("id: {$category->id} , Name: {$category->name}");
        }

        $title = $this->argument('title');
        $body = $this->argument('body');
        $categoryId = $this->argument('category_id');


        if(is_null($categoryId)){
            $categoryId = $this->ask('Please enter the category ID');
        }


        if (!Category::find($categoryId)) {
            $this->error("Category with ID {$categoryId} does not exist");
            return;
        }


        $article = new Article();
        $article->title = $title;
        $article->body = $body;
        $article->category_id = $categoryId; 
        $article->save();

        $this->info("Article '{$title}' added successfully");

    }
}

