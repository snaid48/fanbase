<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historical;
use App\Comment_historical;
use Carbon\Carbon;
use App\Rating_historical;

class HistoricalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historical = Historical::orderBy('created_at', 'desc')->get();
        return view('front_end.historical.display', compact('historical'));
    }

    public function adminIndex()
    {
        $historical = Historical::all();
        // dd($news->comment_news);
        return view('back_end.historical.home', compact('historical'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.historical.add');
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
        $request->file('photo')->storeAs('public/historical',$filename);
        
        Historical::create([
            'historical_title' => $request->historical_title,
            'author' => $request->author,
            'historical_field' => $request->historical_field,
            'photo' => $filename
        ]);
        return redirect('/admin/historical');
    }

    public function ratingStore(Request $request)
    {
        // dd($request->photo);
        Rating_historical::create([
            'historical_id' => $request->historical_id,
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
        $historical = Historical::findOrFail($id);
        $rating = Rating_historical::where('historical_id', $id)->avg('rating');
    	return view('front_end.historical.single', compact('historical','rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historical = Historical::findOrFail($id);
    	return view('back_end.historical.edit', compact('historical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename = time().'.png';
        if ($request->hasFile('photo')) {
            $request->file('photo')->storeAs('public/historical',$filename);
        }
        
        //dd('berhasil');
        Historical::where('id', $request->id)
        ->update([
            'historical_title' => $request->historical_title,
            'author' => $request->author,
            'historical_field' => $request->historical_field,
            'photo' => $filename
        ]);
        return redirect('/admin/historical');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Historical::where('id','=',$id);
        $data->delete();
        return redirect('/admin/historical');
    }

    public function saveComment(Request $request)
    {
        $validatedData = $request->validate([
        'comment' => 'required'
    ]);
        $current_time = Carbon::now()->toDateTimeString();

        Comment_historical::create([
            'historical_id' => $request->historical_id,
             'author' => $request->author,
             'comment' => $request->comment,
             'created_at' => $current_time
            ]);
   
        return back()->withInput()->with('status', 'Comment Success!');
    }


}
