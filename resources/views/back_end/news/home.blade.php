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
                        <h4 class="title">News Table</h4>
                        <p class="category">
                            <a class="btn btn-primary" href="{{ url('admin/news/add')}}" role="button">Add</a>
                        </p>

                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>News Title</th>
                                <th>News Field</th>
                                <th>Author</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($news as $row)
                                <tr class="item{{$row->id}}">
                                    <td>#</td>
                                    <td>{{ $row->news_title}}</td>
                                    <td> {{strip_tags(substr(($row->news_field),0,20))}}...</td>
                                    <td>{{ $row->user->name}}</td>
                                    <td>
                                        <form action="/news/{{ $row->id }}" method="post">
                                            <a href="/news/edit/{{ $row->id }}" class="btn btn-warning btn-fill pull-center">
                                                Edit
                                        </a>

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger btn-fill pull-center">Delete</button>
                                        </form>
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