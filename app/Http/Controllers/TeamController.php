<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Province;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        // dd($news->comment_news);
        return view('front_end.team.display', compact('team'));
    }

    public function adminIndex()
    {
        $team = Team::all();
        // dd($news->comment_news);
        return view('back_end.team.home', compact('team'));
    }

    public function provinceIndex()
    {
        $province = Province::all();
        // dd($news->comment_news);
        return view('back_end.team.province', compact('province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $province = Province::all();
        return view('back_end.team.add', compact('province'));
    }
    public function createProvince()
    {

        return view('back_end.team.addProvince');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $filename = time().'.png';
        // $request->file('photo')->storeAs('public/news',$filename);
         Team::create([
             'player_name' => $request->player_name,
             'position' => $request->position,
             'province_id' => $request->province_id
            //  'photo' => $filename
         ]);
         return redirect('/admin/team');
    }

    public function storeProvince(Request $request)
    {
        $filename = time().'.png';
        $request->file('flag')->storeAs('public/team',$filename);
         Province::create([
             'province' => $request->province,
             'flag' => $filename
         ]);
         return redirect('/admin/province');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
    	return view('back_end.team.edit', compact('team'));
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
            $request->file('photo')->storeAs('public/team',$filename);
        }
        
        //dd('berhasil');
        Team::where('id', $request->id)
        ->update([
            
            'photo' => $filename
        ]);
        return redirect('/admin/team');
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
}
