@extends('back_end.layouts.master') 
@section('title')
<title>Admin | News</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Event Table</h4>
                        <p class="category">
                            <a class="btn btn-primary" href="{{ url('admin/event/add')}}" role="button">Add</a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Event Date</th>
                                <th>Posting by</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($event as $row)
                                <tr class="item{{$row->id}}">
                                    <td>#</td>
                                    <td width="20%"><a href="/eventParticipate/{{ $row->id }}">
                                        {{ $row->event_name}}
                                    </a></td>
                                    <td>{{strip_tags(substr(($row->description),0,20))}}...</td>
                                    <td>{{ $row->category}}</td>
                                    <td>{{ $row->event_date}}</td>
                                    <td>{{ $row->user->name}}</td>
                                    <td align="center">
                                        <a href="/eventParticipate/{{ $row->id }}"> <button class="btn btn-info btn-fill pull-center">Participated</button> </a>
                                        <a href="/event/edit/{{$row->id}}"> <button class="btn btn-warning btn-fill pull-center">Edit</button> </a>
                                        <a href="/event/delete/{{$row->id}}"> <button class="btn btn-danger btn-fill pull-center">Delete</button> </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

