<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historical;
use App\Comment_historical;
use Carbon\Carbon;

class HistoricalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historical = Historical::all();
        return view('front_end.historical.display', compact('historical'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    	return view('front_end.historical.single', compact('historical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save_comment(Request $request)
    {
        $validatedData = $request->validate([
        'comment' => 'required'
    ]);
        $current_time = Carbon::now()->toDateTimeString();

        Comment_historical::create([
            'historical_id' => $request->historical_id,
             'posting' => $request->posting,
             'comment' => $request->comment,
             'created_at' => $current_time
            ]);


       

        return back()->withInput()->with('status', 'Comment Success!');;
    }


}
