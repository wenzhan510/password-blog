@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">博文中心</div>
                <div class="panel-body">
                    您已登陆个人博文中心
                    @include('posts._posts')
                    <a href="{{ route('post.create') }}" class="btn btn-primary">写新博文</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
