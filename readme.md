<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>  

# Laravel ブログアプリ  

## 環境
- MAMP使用
  - PHP : 7.4.16
  - Laravel : 5.8
  - composer : 2.1.5  

## パス  
/Applications/MAMP/htdocs/blog

## 参考動画  
[youtube](https://www.youtube.com/watch?v=yaitzPzBzuI&list=PLEdrX-C93h6Bhxyjg9G1kb7GY8iJuhyPv&index=5)

## 画面表示までの流れ  
トップ画面(/)に移動したら、「app/route/web.php」が読み込まれる。  
↓  
BlogController(コントローラー : app/Http/Controllers/BlogController)のshowListメソッドが呼ばれる  
↓  
Blogモデル(app/Models/Blog.php)からDBデータを取得して、view(resources/views/blog/list.blade.php)にDBデータを渡して、画面に表示する。  

## 各種コマンド  
etc...


