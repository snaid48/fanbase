@extends('front_end.layouts.master') 
@section('title')
<title>Timnas | Event</title>
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
            <h3>Single Event</h3>
            <p>
              Lorem ipsum dolor sit amet, modus salutatus honestatis ex mea. Sit cu probo putant. Nam ne impedit atomorum.
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
          <li class="active">Single Event</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="maincontent">
  <div class="container">
    <div class="row">
      <div class="span8">
        <!-- start article full post -->
        <article class="blog-post">
          <div class="post-heading">
            <h3><a href="#">{{ $historical->historical_title}}</a></h3>
          </div>
          <div class="clearfix">
          </div>
          <img src="{{ asset('assets/img/dummies/blog1.jpg') }}" alt="" />
          <ul class="post-meta">
            <li class="first"><i class="icon-calendar"></i><span>{{date_format($historical->created_at,"Y-m-d")}}</span></li>
            <li><i class="icon-list-alt"></i><span><a href="#">{{ count($historical->comment_historical)}}  comments</a></span></li>

            <div style="padding-top: 0px;" id="rateYo" data-rateyo-rating="0"></div>

            </li>
            {{--
            <li class="last"><i class="icon-tags"></i><span><a href="#">Design</a>, <a href="#">Blog</a>, <a href="#">Tutorial</a></span></li>
            --}}
          </ul>
          <div class="clearfix">
          </div>
          <p>
            {{ $historical->historical_field}}
          </p>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$historical->id}}" aria-expanded="false"
            aria-controls="collapseExample">
                              Comment
                            </button>


          <div class="collapse" id="collapseExample{{$historical->id}}">
            <div class="card card-body">
              <form role="form" action="/historical/comment" method="POST">
                @csrf
                <div class="form-group">
                  <label>Comment Content</label>
                  <input type="hidden" name="historical_id" value="{{ $historical->id}}"> 
                  <input type="hidden" name="posting" value="{{ Auth::user()->id}} ">
                  {{-- <input type="hidden" name="posting" value="1"> --}}
                  <textarea rows="9" class="input-block-level{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="Your comment"
                    name="comment" required autofocus></textarea> @if ($errors->has('comment'))
                  <script>
                    alert("Comment required!!");
                  </script>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary"> Send</button>
              </form>
            </div>
          </div>

          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          
          @endif

        </article>
        <!-- end article full post -->
        <h4>Comments</h4>
        <ul class="media-list">
          @isset($event) @forelse($event->comment_event as $row)
          <li class="media">
            <a class="pull-left" href="#">
                    <img class="media-object" src="{{ asset('assets/img/small-avatar.png') }}" alt="" />
                    </a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">{{$row->user->name}}</a></h5>
              <span>{{date_format($row->created_at,"Y-m-d")}}</span>
              <p>
                {{$row->comment}}
              </p>



            </div>
          </li>
          @empty
          <li class="media">
            Empty</li>
          @endforelse @endisset


        </ul>

      </div>
      <div class="span4">
        <aside>
          <div class="widget">
            <form class="form-search">
              <input placeholder="Type something" type="text" class="input-medium search-query">
              <button type="submit" class="btn btn-flat btn-color">Search</button>
            </form>
          </div>
          <div class="widget">
            <h4>Categories</h4>
            <ul class="cat">
              <li><a href="#">Web design (114)</a></li>
              <li><a href="#">Internet event (15)</a></li>
              <li><a href="#">Tutorial and tips (20)</a></li>
              <li><a href="#">Design trends (15)</a></li>
              <li><a href="#">Online business (10)</a></li>
            </ul>
          </div>
          <div class="widget">
            <h4>Recent posts</h4>
            <ul class="recent-posts">
              <li><a href="#">Lorem ipsum dolor sit amet munere commodo ut nam</a>
                <div class="clear">
                </div>
                <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                <span class="comment"><i class="icon-comment"></i> 4 Comments</span>
              </li>
              <li><a href="#">Sea nostrum omittantur ne mea malis nominavi insolens</a>
                <div class="clear">
                </div>
                <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                <span class="comment"><i class="icon-comment"></i> 2 Comments</span>
              </li>
              <li><a href="#">Eius graece recusabo no pri odio tale quo id, mea at saepe</a>
                <div class="clear">
                </div>
                <span class="date"><i class="icon-calendar"></i> 4 March, 2013</span>
                <span class="comment"><i class="icon-comment"></i> 12 Comments</span>
              </li>
              <li><a href="#">Malorum deserunt at nec usu ad graeco elaboraret at rebum</a>
                <div class="clear">
                </div>
                <span class="date"><i class="icon-calendar"></i> 3 March, 2013</span>
                <span class="comment"><i class="icon-comment"></i> 3 Comments</span>
              </li>
            </ul>
          </div>
          <div class="widget">
            <h4>Tags</h4>
            <ul class="tags">
              <li><a href="#" class="btn">Tutorial</a></li>
              <li><a href="#" class="btn">Tricks</a></li>
              <li><a href="#" class="btn">Design</a></li>
              <li><a href="#" class="btn">Trends</a></li>
              <li><a href="#" class="btn">Online</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function () {
            $("#rateYo").rateYo({
            readOnly: true
        });
    });
  </script>

  <script type="text/javascript" src="{{ asset('js/rating/jquery.rateyo.js')}} "></script>
  <script type="text/javascript" src="{{ asset('js/rating/application.js')}} "></script>
</section>
@endsection