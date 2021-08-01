<?php
/**
 * factory
 * seederに対して、テスト用にランダムデータを与えることができる
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        // テストデータ記述
        'title' => $faker->word,        // 何か1単語、英語のワードを指定
        'content' => $faker->realText   // 小説の文章をランダムで入れる
    ];
});
