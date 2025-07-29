<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Content::where('category', 'news')
            ->where('status', 'published')
            ->with('user') // Eager load user relationship
            ->orderBy('created_at', 'desc');
        
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('body', 'like', "%{$searchTerm}%")
                  ->orWhere('source', 'like', "%{$searchTerm}%");
            });
        }
        
        $newsContents = $query->paginate(12)->appends($request->query());
        
        return view('news.index', compact('newsContents'));
    }

    public function show($slug)
    {
        $content = Content::where('category', 'news')
            ->where('status', 'published')
            ->where('slug', $slug)
            ->with('user') // Eager load user relationship
            ->firstOrFail();
        
        // Increment views
        $content->increment('views');
        
        // Get related news
        $relatedNews = Content::where('category', 'news')
            ->where('status', 'published')
            ->where('id', '!=', $content->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
            
        return view('news.show', compact('content', 'relatedNews'));
    }
}