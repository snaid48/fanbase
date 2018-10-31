@extends('front_end.layouts.master') 
@section('title')
<title>Timnas | News</title>
@endsection
 
@section('content')

<!-- Subhead
================================================== -->
<section id="subintro">
        <div class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="row">
              <div class="span12">
                <div class="centered">
                  <h3>{{$event->event_name}}</h3>
                  <p>
                        {{$event->event_date}}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="breadcrumb">
        <div class="container">
          <div class="row">
            <div class="span12">
              <ul class="breadcrumb notop">
                <li><a href="#">Home</a><span class="divider">/</span></li>
                <li class="active">Event Participate</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section id="maincontent">
        <div class="container">
          <div class="row">
            <div class="span4">
              <aside>
                <div class="widget">
                  <h4>Event Detail</h4>
                  <ul>
                    <li><label><strong>Event Name : </strong></label>
                      <p>
                        {{$event->event_name}}
                      </p>
                    </li>
                    <li><label><strong>Description : </strong></label>
                      <p>
                            {{$event->description}}
                      </p>
                    </li>
                    <li><label><strong>Category : </strong></label>
                      <p>
                            {{$event->category}}
                      </p>
                    </li>
                    <li><label><strong>Event Date : </strong></label>
                        <p>
                                {{$event->event_date}}
                        </p>
                      </li>
                  </ul>
                </div>
                
              </aside>
            </div>
            <div class="span8">
                <img src="{{asset('/storage/event/'.$event->photo)}}" alt="" width="770px" height="400px" />
    
              <div class="spacer30"></div>
    
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="/Participate/store" method="POST" role="form" class="contactForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="event_id" value="{{ $event->id}}">
                <div class="row">
                  <div class="span4 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" required data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
    
                  <div class="span4 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" required data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                  <div class="span8 form-group">
                    <input type="text" class="form-control" name="phone" required id="phone" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                  <div class="span8 form-group">
                    <textarea class="form-control" name="address" required rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Address"></textarea>
                    <div class="validation"></div>
                    <div class="text-center">
                      <button class="btn btn-color btn-rounded" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
    
            </div>
          </div>
        </div>
      </section>
</section>
@endsection