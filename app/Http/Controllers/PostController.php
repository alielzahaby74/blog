<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request)
    {
        $img = $request->file('post_thumbnail')->getClientOriginalName();

        $request->file('post_thumbnail')->storeAs('img', $img, 'public');
        $url = "storage/img/" . $img;
        //return dd($request->post_thumbnail->getClientOriginalName());
        Post::create([
            "post_content" => $request->post_content,
            "thumbnail" => $url,
            "post_tag" => $request->tag,
            "user_id" => $request->user_id,
        ]);
        return redirect('home');
    }
}
