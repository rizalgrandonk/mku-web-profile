<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("kategori")->orderByDesc('created_at')->get();
        return view("posts.index", [
            "title" => "Berita & Pengumuman",
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        $latestPosts = Post::with("kategori")->orderByDesc('created_at')->get()->filter(function ($latest) use ($post)
        {
            return $latest->id != $post->id;
        })->take(3);

        return view("posts.show", [
            "title" => $post->judul,
            "post" => $post,
            "latestPosts" => $latestPosts
        ]);
    }
}