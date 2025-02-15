<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
		<div class="container">
			<a class="navbar-brand" href="/">Your Logo</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
	
					<!-- Dropdown News -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							News
						</a>
						<ul class="dropdown-menu" aria-labelledby="newsDropdown">
							<li><a class="dropdown-item" href="#">World</a></li>
							<li><a class="dropdown-item" href="#">Politics</a></li>
							<li><a class="dropdown-item" href="#">Technology</a></li>
						</ul>
					</li>
	
					<li class="nav-item"><a class="nav-link" href="#">Entertainment</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Business</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Travel</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Life Style</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Video</a></li>
	
					<!-- Dropdown Features -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="featuresDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Features
						</a>
						<ul class="dropdown-menu" aria-labelledby="featuresDropdown">
							<li><a class="dropdown-item" href="#">Special Reports</a></li>
							<li><a class="dropdown-item" href="#">Interviews</a></li>
						</ul>
					</li>
				</ul>
	
				<!-- Search Bar -->
				<form class="d-flex" action="/" method="GET">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
					<button class="btn btn-outline-secondary" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</form>
			</div>
		</div>
	</nav>
	
    <div class="container mt-4">
        <h1>{{ $post->name }}</h1>
        @if ($post->img)
            <img src="{{ asset('storage/' . $post->img) }}" class="img-fluid my-3" alt="{{ $post->name }}" style="width:1500px; height:500px;">
        @endif
        <p>{!! nl2br(e($post->content)) !!}</p>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Quay lại</a>

        <!-- Phần bình luận -->
        <h3 class="mt-4">Bình luận</h3>

        <ul class="list-group mt-3" id="commentList">
            @foreach ($post->commentsss as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                    @auth
                        @if (auth()->user()->id == $comment->user_id || auth()->user()->is_admin)
                            <button class="btn btn-danger btn-sm delete-comment" data-id="{{ $comment->id }}">Xóa</button>
                        @endif
                    @endauth
                </li>
            @endforeach
        </ul>

        @auth
            <form id="commentForm" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Viết bình luận:</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>
        @else
            <p><a href="{{ route('auth.login') }}">Đăng nhập</a> để bình luận.</p>
        @endauth
    </div>

    <script>
        $(document).ready(function () {
            $('#commentForm').submit(function (e) {
                e.preventDefault();
                let content = $('#content').val();
                let postId = "{{ $post->id }}";
                let token = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('comments.store', $post->id) }}",
                    method: "POST",
                    data: {
                        _token: token,
                        content: content
                    },
                    success: function (response) {
                        if (response.success) {
                            let newComment = `<li class="list-group-item">
                                <strong>${response.comment.user.name}:</strong> ${response.comment.content}
                                @auth
                                    <button class="btn btn-danger btn-sm delete-comment" data-id="${response.comment.id}">Xóa</button>
                                @endauth
                            </li>`;
                            $('#commentList').append(newComment);
                            $('#content').val('');
                        }
                    }
                });
            });

            // Xóa bình luận bằng AJAX
            $(document).on('click', '.delete-comment', function () {
                let commentId = $(this).data('id');
                let token = "{{ csrf_token() }}";
                let button = $(this);

                $.ajax({
                    url: `/comments/${commentId}`,
                    method: "POST",
                    data: {
                        _token: token,
                        _method: "DELETE"
                    },
                    success: function (response) {
                        if (response.success) {
                            button.closest('li').remove();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
