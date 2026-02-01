<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index()
    {
        $articles = \App\Models\WikiArticle::where('is_published', true)->get();
        return view('wiki.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = \App\Models\WikiArticle::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('wiki.show', compact('article'));
    }
}
