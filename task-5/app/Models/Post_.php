<?php

namespace App\Models;



class Post 
{
    private static $blog_posts = [[
        "id" => " 001",
        "title" => "Post Pertama",
        "slug" => "post-pertama",
        "content" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Expedita laudantium quae quas non quibusdam? Maxime itaque voluptate odio corrupti alias laboriosam at, 
        asperiores optio quibusdam voluptatum sed, accusamus, doloribus officia?",
        "image" => "images/gambar.jpg",
        "user_id" => "101",
        "categories_id" => "01"
    ],
    [
        "id" => " 002",
        "title" => "Post Kedua",
        "slug" => "post-kedua",
        "content" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Expedita laudantium quae quas non quibusdam? Maxime itaque voluptate odio corrupti alias laboriosam at, 
        asperiores optio quibusdam voluptatum sed, accusamus, doloribus officia?",
        "image" => "images/gambar.jpg",
        "user_id" => "102",
        "categories_id" => "02"
    ]];
    
    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug',$slug);
        }
    }


