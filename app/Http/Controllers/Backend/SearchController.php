<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display search result.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $params = \Request::get('search');
        $posts = Post::where('title', 'LIKE', '%'.$params.'%')->get();
        $tags = Tag::where('title', 'LIKE', '%'.$params.'%')->get();

        return view('backend.search.index', compact('params', 'posts', 'tags'));
    }
}
