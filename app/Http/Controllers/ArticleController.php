<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get(10);

        return view('article.index', compact('articles'));
    }


    public function create()
    {
        return view('article.create');
    }
    

    public function show(Article $article)
    {
        
        return view('article.show',compact('article')); 
    }


    
}