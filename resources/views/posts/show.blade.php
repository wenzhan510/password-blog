@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$post->title}}</div>
                <div class="panel-body">
                    {{$post->body}}

                    <a href="{{ route('post.edit') }}" class="btn btn-success">修改博文</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
