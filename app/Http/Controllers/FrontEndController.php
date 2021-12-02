<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function home()
    {
        $posts = Post::with("category", "user")->orderBy("created_at", "DESC")->take(5)->get();
        $firstPosts2 = $posts->splice(0,2);
        $middlePost = $posts->splice(0,1);
        $lastPosts = $posts->splice(0);
        $recentPosts = Post::with("category", "user")->orderBy("created_at", "DESC")->paginate(9);
        
        $footerPosts = Post::with("category", "user")->inRandomOrder("created_at", "DESC")->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0,1);
        $firstFooterPosts2 = $footerPosts->splice(0,2);
        $lastFooterPosts = $footerPosts->splice(0,1);
        
        return view("website.home", compact(["posts", "recentPosts", "middlePost","firstPosts2","lastPosts","footerPosts","firstFooterPost","firstFooterPosts2","lastFooterPosts"]));
    }

    public function post($slug)
    {
        $post = Post::with("category", "user")->where('slug', $slug)->first();
        if ($post) {
            return view("website.post", compact("post"));
        } else {
            return redirect("/");
        }
    }

    public function category()
    {
        return view("website.category");
    }
}
