<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Comment_news;
use Carbon\Carbon;
use App\Rating_news;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        // dd($news->comment_news);
        return view('front_end.news.display', compact('news'));
    }

    public function adminIndex()
    {
        $news = News::all();
        // dd($news->comment_news);
        return view('back_end.news.home', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.news.add');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->photo);
        $filename = time().'.png';
        $request->file('photo')->storeAs('public/news',$filename);
        
        News::create([
            'news_title' => $request->news_title,
            'author' => $request->author,
            'news_field' => $request->news_field,
            'category' => $request->category,
            'photo' => $filename
        ]);
        return redirect('/admin/news');
    }

    public function ratingStore(Request $request)
    {
        // dd($request->photo);
        Rating_news::create([
            'news_id' => $request->news_id,
            'posting' => $request->posting,
            'rating' => $request->rating
        ]);
        return back()->withInput()->with('status', 'Rating Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $rating = Rating_news::where('news_id', $id)->avg('rating');
    	return view('front_end.news.single', compact('news','rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
    	return view('back_end.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $filename = time().'.png';
        if ($request->hasFile('photo')) {
            $request->file('photo')->storeAs('public/news',$filename);
        }
        
        //dd('berhasil');
        News::where('id', $request->id)
        ->update([
            'news_title' => $request->news_title,
            'author' => $request->author,
            'news_field' => $request->news_field,
            'category' => $request->category,
            'photo' => $filename
        ]);
        return redirect('/admin/news');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::where('id','=',$id);
        $data->delete();
    }

    public function saveComment(Request $request)
    {
        $validatedData = $request->validate([
        'comment' => 'required'
    ]);
    $current_time = Carbon::now()->toDateTimeString();
    Comment_news::create([
        'news_id' => $request->news_id,
         'posting' => $request->posting,
         'comment' => $request->comment,
         'created_at' => $current_time
        ]);

        return back()->withInput()->with('status', 'Comment Success!');
    }


}
