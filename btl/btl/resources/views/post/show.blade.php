@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="text-muted">Đăng bởi {{ $post->user->name }} vào {{ $post->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
    
    <div class="mt-4">
        <h4>Bình luận ({{ $post->comments->count() }})</h4>
        
        @auth
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Nhập bình luận..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
        @else
        <p><a href="{{ route('login') }}">Đăng nhập</a> để bình luận.</p>
        @endauth
        
        <div class="mt-3">
            @foreach($post->comments as $comment)
            <div class="border p-3 mt-2 rounded">
                <strong>{{ $comment->user->name }}</strong> 
                <span class="text-muted">({{ $comment->created_at->format('d/m/Y H:i') }})</span>
                <p class="mt-1">{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
