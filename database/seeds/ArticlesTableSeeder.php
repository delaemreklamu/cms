<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article();
        $article->title = 'Первая статья';
        $article->slug = 'pervaya-statya';
        $article->text = 'Et duis sit ipsum consectetur anim dolor voluptate. Consequat culpa irure quis aute proident Lorem sit ex elit et adipisicing velit consectetur. Ad occaecat exercitation aliqua aliqua elit enim aliqua non mollit id mollit. Ut consectetur laboris Lorem fugiat do velit ad nisi ad cupidatat commodo eiusmod sint. Magna in ex ullamco consectetur ipsum cupidatat eu cillum do amet. Proident adipisicing excepteur nostrud incididunt laboris.';
        $article->save();

        $article = new Article();
        $article->title = 'Распродажа наборов посуды';
        $article->slug = 'rasprodaja-naborov-posudy';
        $article->text = 'Tempor occaecat nisi officia in. Nulla velit ipsum sit sit consequat proident consectetur pariatur anim cupidatat sit et officia. Sit tempor incididunt anim ex irure sunt pariatur. Enim nisi tempor veniam Lorem mollit cillum. Adipisicing consectetur dolore ex non labore. Qui irure velit velit est magna nostrud excepteur velit sunt velit anim nulla pariatur. Lorem adipisicing aliquip irure non quis eu exercitation do ex excepteur minim amet anim.';
        $article->save();
    }
}
