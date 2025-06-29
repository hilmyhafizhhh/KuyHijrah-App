<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get berita per kategori (untuk chart bar)
    $categories = Category::withCount('news')->get();
    $categoryNames = $categories->pluck('name');
    $newsCounts = $categories->pluck('news_count');

    // Get berita per source (untuk chart pie)
    $sourceNews = DB::table('news')
        ->join('users', 'news.source_id', '=', 'users.id')
        ->select('users.name', DB::raw('count(news.id) as total'))
        ->groupBy('users.name')
        ->orderByDesc('total')
        ->get();

    $sourceNames = $sourceNews->pluck('name');
    $sourceCounts = $sourceNews->pluck('total');

    return view('dashboard.index', [
        'title' => 'Dashboard',
        'newsCount' => News::count(),
        'categoryCount' => Category::count(),
        'sourceCount' => User::count(),
        'categoryNames' => $categoryNames,
        'newsCounts' => $newsCounts,
        'sourceNames' => $sourceNames,
        'sourceCounts' => $sourceCounts
    ]);
    }
}
