<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = News::with('category');

        if ($request->search) {
            $query->where('title', 'ILIKE', '%' . $request->search . '%');
        }

        if ($request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->sort == 'az') {
            $query->orderBy('title');
        } elseif ($request->sort == 'za') {
            $query->orderByDesc('title');
        } elseif ($request->sort == 'latest') {
            $query->orderByDesc('created_at');
        } elseif ($request->sort == 'oldest') {
            $query->orderBy('created_at');
        }

        return view('dashboard.news.index', [
            'news' => $query->paginate(10),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.news.create', [
            'categories' => Category::all(),
            'source' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:news',
            'category_id' => 'required',
            'source_id' => 'required|exists:users,id',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('news-images');
        }

        // $validatedData['source_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::create($validatedData);

        return redirect('/dashboard/news')->with('success', 'New news has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('dashboard.news.show', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', [
            'news' => $news,
            'categories' => Category::all(),
            'source' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'source_id' => 'required|exists:users,id',
            'body' => 'required'
        ];
        
        if($request->slug != $news->slug) {
            $rules['slug'] = 'required|unique:news';
        };

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request['oldImage']) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('news-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        News::where('id', $news->id)->update($validatedData);

        return redirect('/dashboard/news')->with('success', 'News has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if($news->image) {
            Storage::delete($news->image);
        }
        
        News::destroy($news->id);

        return redirect('/dashboard/news')->with('success', 'News has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
