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
<div class="container-fluid" style="background-color: black;">
	<div class="container">
    <div class="row align-items-center">
        <div class="col-md-3">
		    <img src="{{ asset('imgs/A2.png') }}" class="img-fluid rounded shadow" alt="Ảnh Chào Mừng" style="width: 100%; height: 50%; vertical-align: middle; border-style: none;">
        </div>
        <div class="col-md-9" style="padding-left: 50px;">
            <h2 class="fw-bold text-primary">Chào mừng bạn đến với Web Tin Tức</h2>
            <p class="lead text-white">Cập nhật tin tức mới nhất, nhanh chóng và chính xác. Khám phá những bài viết hấp dẫn ngay hôm nay!</p>
            <a href="#" class="btn btn-primary btn-lg">Khám Phá Ngay</a>
        </div>
    </div>
	</div>
</div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand" href="/">Your Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>
                        <ul class="dropdown-menu" aria-labelledby="newsDropdown">
                            <li><a class="dropdown-item" href="#">World</a></li>
                            <li><a class="dropdown-item" href="#">Politics</a></li>
                            <li><a class="dropdown-item" href="#">Technology</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="/" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-7">
                <h1>{{ $post->name }}</h1>
                @if ($post->img)
                <img src="{{ asset($post->img) }}" class="img-fluid my-3" alt="{{ $post->name }}" style="width:100%; height:auto;">
                @endif
                <p>{!! nl2br(e($post->content)) !!}</p>
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Quay lại</a>
                <h3 class="mt-4">Bình luận</h3>
                <ul class="list-group mt-3" id="commentList">
                    @foreach ($post->comments as $comment)
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
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#commentForm').submit(function (e) {
                e.preventDefault();
                let content = $('#content').val();
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
                        } else {
                            alert("Đã xảy ra lỗi khi gửi bình luận.");
                        }
                    },
                    error: function () {
                        alert("Không thể kết nối đến máy chủ. Vui lòng thử lại!");
                    }
                });
            });

            $(document).on('click', '.delete-comment', function () {
                let commentId = $(this).data('id');
                let token = "{{ csrf_token() }}";
                let button = $(this);

                $.ajax({
                    url: `/comments/${commentId}`,
                    method: "DELETE",
                    headers: { 'X-CSRF-TOKEN': token },
                    success: function (response) {
                        if (response.success) {
                            button.closest('li').remove();
                        } else {
                            alert("Không thể xóa bình luận.");
                        }
                    },
                    error: function () {
                        alert("Có lỗi xảy ra khi xóa bình luận.");
                    }
                });
            });
        });
    </script>
</body>
</html>
