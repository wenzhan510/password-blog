@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="panel-body">
                    <h5>{{$post->user->name}}发表于{{$post->created_at}}</h5>
                    <div class="">
                        {!! nl2br($post->body) !!}
                    </div>
                    <br>
                    @if((Auth::check())&&(Auth::id()===$post->user_id))
                    <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">修改博文</a>
                    @endif
                </div>
                <div class="panel-body">
                    @foreach($replies as $reply)
                    <h6>{{$reply->name}}留言于{{$reply->created_at}}</h5>
                    <div class="">
                        {!! nl2br($reply->body) !!}
                    </div>
                    @endforeach
                    {{$replies->links()}}
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('reply.store', $post) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">姓名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-md-4 control-label">正文</label>
                            <div class="col-md-6">
                                <textarea id="body" name="body" rows="3" class="form-control" placeholder="正文">{{ old('body') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    发布留言
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
