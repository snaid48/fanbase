@extends('front_end.layouts.master') 
@section('title')
<title>Timnas | Home</title>
@endsection
 
@section('content')

<section id="intro">
    <div class="jumbotron masthead">
        <div class="container">
            <!-- slider navigation -->
            <div class="sequence-nav">
                <div class="prev">
                    <span></span>
                </div>
                <div class="next">
                    <span></span>
                </div>
            </div>
            <!-- end slider navigation -->
            <div class="row">
                <div class="span12">
                    <div id="slider_holder">
                        <div id="sequence">
                            <ul>
                                <!-- Layer 1 -->
                                <li>
                                    <div class="info animate-in">
                                        <h2>Perjuangan</h2>
                                        <br>
                                        <h3>Skuad Garuda Muda</h3>
                                        <p>
                                            Pantang Menyerah sebelum pluit usai
                                        </p>

                                    </div>
                                    <img class="slider_img animate-in" src="assets/img/slides/sequence/img-1.png" alt="">
                                </li>
                                <!-- Layer 2 -->
                                <li>
                                    <div class="info">
                                        <h2>Dukunganmu Kunanti</h2>
                                        <br>
                                        <h3>Para Pemain Muda Berbakat</h3>
                                        <p>

                                        </p>

                                    </div>
                                    <img class="slider_img" src="assets/img/slides/sequence/img-2.png" alt="">
                                </li>
                                <!-- Layer 3 -->
                                <li>
                                    <div class="info">
                                        <h2>Indonesia</h2>
                                        <br>
                                        <h3>Demi Harum Nama Bangsa</h3>
                                        <p>

                                        </p>

                                    </div>
                                    <img class="slider_img" src="assets/img/slides/sequence/img-3.png" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sequence Slider::END-->
                </div>
            </div>
        </div>
    </div>
</section>
<section id="maincontent">
    <div class="container">

        <div class="row">
            <div class="home-posts">
                <div class="span12">
                    <h3>Recent News</h3>
                </div>

                @foreach ($news as $row)

                <div class="span3">
                    <div class="post-image">
                        <a href="{{ route('news.show', $row->id)}}">
                                <img src="{{asset('/storage/news/'.$row->photo)}}" alt="">
                                </a>
                    </div>
                    <div class="entry-meta">
                        <a href="#"><i class="icon-square icon-48 icon-pencil left"></i></a>
                        <span class="date">{{date_format($row->created_at,"Y-m-d")}} </span>
                    </div>
                    <!-- end .entry-meta -->
                    <div class="entry-body">
                        <a href="{{ route('news.show', $row->id)}}">
                            <h5 class="title">{{$row->news_title}}</h5>
                        </a>
                        <p>
                            {{strip_tags(substr(($row->news_field),0,100))}}...
                        </p>
                        <a href="{{ route('news.show', $row->id)}}" class="btn btn-small btn-success">Read more</a>
                    </div>
                    <!-- end .entry-body -->
                    <div class="clear">
                    </div>
                </div>

                @endforeach

            </div>
        </div>

        <div class="row">
            <div class="home-posts">
                <div class="span12">
                    <h3>Recent Event</h3>
                </div>

                @foreach ($event as $row)

                <div class="span3">
                    <div class="post-image">
                        <a href="{{ route('event.show', $row->id)}}">
					<img src="{{asset('/storage/event/'.$row->photo)}}" alt="">
					</a>
                    </div>
                    <div class="entry-meta">
                        <a href="#"><i class="icon-square icon-48 icon-pencil left"></i></a>
                        <span class="date"> {{$row->event_date}} </span>
                    </div>
                    <!-- end .entry-meta -->
                    <div class="entry-body">
                        <a href="{{ route('event.show', $row->id)}}">
                            <h5 class="title">{{$row->event_name}}</h5>
                        </a>
                        <p>
                            {{strip_tags(substr(($row->description),0,100))}}...
                        </p>
                        <a href="{{ route('event.show', $row->id)}}" class="btn btn-small btn-success">Read more</a>
                    </div>
                    <!-- end .entry-body -->
                    <div class="clear">
                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <hr>

        <div class="row">
            <div class="home-posts">
                <div class="span12">
                    <h3>Historical</h3>
                </div>

                @foreach ($historical as $row)
                <div class="span3">
                    <div class="post-image">
                        <a href="{{ route('historical.show', $row->id)}}">
                        <img src="{{asset('/storage/historical/'.$row->photo)}}" alt="">
                        </a>
                    </div>
                    <div class="entry-meta">
                        <a href="#"><i class="icon-square icon-48 icon-pencil left"></i></a>
                        <span class="date">{{date_format($row->created_at,"Y-m-d")}}</span>
                    </div>
                    <!-- end .entry-meta -->
                    <div class="entry-body">
                        <a href="{{ route('historical.show', $row->id)}}">
                            <h5 class="title">{{$row->historical_title}}</h5>
                        </a>
                        <p>
                            {{strip_tags(substr(($row->historical_field),0,100))}}...
                            <a href="{{ route('historical.show', $row->id)}}" class="btn btn-small btn-success">Read more</a>
                        </p>
                    </div>
                    <!-- end .entry-body -->
                    <div class="clear">
                    </div>
                </div>

                @endforeach

            </div>
        </div>

    </div>
</section>
@endsection