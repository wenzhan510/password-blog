@foreach($posts as $post)
<div class="h3">
    <a href="{{ route('post.show', $post) }}">
        <span>《{{ $post->title }}》by {{ $post->user->name }} &nbsp;{{ $post->created_at }}</span>
    </a>
</div>
@endforeach
{{ $posts->links() }}
