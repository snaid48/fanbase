<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Comment_event;
use App\Rating_event;
use App\EventParticipate;
use Carbon\Carbon;
use File;
use Faker\Factory as Faker;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::orderBy('created_at', 'desc')->get();
        
        return view('front_end.event.display', compact('event'));
    }

    public function adminIndex()
    {
        $event = Event::all();
        // dd($news->comment_news);
        return view('back_end.event.home', compact('event'));
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

    public function adminCreate()
    {
        return view('back_end.event.add');
    }

    public function addParcitipate($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
    	return view('front_end.event.addParcitipate', compact('event'));
        
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
        $request->file('photo')->storeAs('public/event',$filename);
        
        Event::create([
            'event_name' => $request->event_name,
            'posting' => $request->posting,
            'description' => $request->description,
            'category' => $request->category,
            'event_date' => $request->event_date,
            'photo' => $filename
        ]);
        return redirect('/admin/event');
    }

    public function participateStore(Request $request)
    {
        $faker = Faker::create();

        EventParticipate::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'code' => $faker->ean8,
            'event_id' => $request->event_id,
            'attendance_status' => "Not Yet Present"
        ]);
        return redirect('/event');
    }

    public function ratingStore(Request $request)
    {
        // dd($request->photo);
        Rating_event::create([
            'event_id' => $request->event_id,
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
        $event = Event::findOrFail($id);
        $rating = Rating_event::where('event_id', $id)->avg('rating');
        // dd($event);
    	return view('front_end.event.single', compact('event','rating'));
    }

    public function participate_list($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
    	return view('back_end.event.participateList', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
    	return view('back_end.event.edit', compact('event'));
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
            $request->file('photo')->storeAs('public/event',$filename);
        }
        
        //dd('berhasil');
        Event::where('id', $request->id)
        ->update([
            'event_name' => $request->event_name,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'photo' => $filename
        ]);
        return redirect('/admin/event');
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

    public function saveComment(Request $request)
    {
        $validatedData = $request->validate([
        'comment' => 'required'
    ]);
        $current_time = Carbon::now()->toDateTimeString();

        Comment_event::create([
            'event_id' => $request->event_id,
             'posting' => $request->posting,
             'comment' => $request->comment,
             'created_at' => $current_time
            ]);


       

        return back()->withInput()->with('status', 'Comment Success!');;
    }

    public function participateCheck(Request $request)
    {
        $in = 7;
         $search = EventParticipate::where('code', $request->code)->first();
         $current_time = Carbon::now('Asia/Jakarta');

	     if (!empty($search)) {

	     	if ($search->attendance_status === "Not Yet Present") {
	        $search->update([
                'attendance_status' => "Present",
                'updated_at' => $current_time
    		]);
    		$in = 1;
	    }}
	    else  {
	    	$in = 0;
        }
        
        //MENAMPILKAN KE VIEW
	    // return view('result', [
	    //     'result' => $search,
	    //     'in' => $in
	        
        // ]);
        return back()->withInput();
    }

    public function print($id)
    {
        $ticket = EventParticipate::findOrFail($id);
    	return view('back_end.event.ticket', compact('ticket'));
    }


}
