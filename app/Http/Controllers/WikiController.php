<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index()
    {
        $domains = \App\Models\WikiDomain::orderBy('sort_order')->get();
        return view('wiki.index', compact('domains'));
    }

    public function domain($domainSlug)
    {
        $domain = \App\Models\WikiDomain::where('slug', $domainSlug)->firstOrFail();
        $manuals = \App\Models\WikiManual::where('domain_id', $domain->id)->orderBy('sort_order')->get();
        return view('wiki.domain', compact('domain', 'manuals'));
    }

    public function manual($domainSlug, $manualSlug)
    {
        $domain = \App\Models\WikiDomain::where('slug', $domainSlug)->firstOrFail();
        $manual = \App\Models\WikiManual::where('slug', $manualSlug)->where('domain_id', $domain->id)->firstOrFail();
        $articles = \App\Models\WikiArticle::where('manual_id', $manual->id)->where('is_published', true)->orderBy('sort_order')->get();
        return view('wiki.manual', compact('domain', 'manual', 'articles'));
    }

    public function article($domainSlug, $manualSlug, $articleSlug)
    {
        $domain = \App\Models\WikiDomain::where('slug', $domainSlug)->firstOrFail();
        $manual = \App\Models\WikiManual::where('slug', $manualSlug)->where('domain_id', $domain->id)->firstOrFail();
        $article = \App\Models\WikiArticle::where('slug', $articleSlug)->where('manual_id', $manual->id)->where('is_published', true)->firstOrFail();

        // Load sidebar articles for navigation
        $sidebarArticles = \App\Models\WikiArticle::where('manual_id', $manual->id)->where('is_published', true)->orderBy('sort_order')->get();

        return view('wiki.article', compact('domain', 'manual', 'article', 'sidebarArticles'));
    }
}
