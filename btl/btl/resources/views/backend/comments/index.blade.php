<!DOCTYPE html>
<html>

<head>
    @include('backend.auth.dashboard.component.head')
</head>

<body>
    <div id="wrapper">
        @include('backend.auth.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('backend.auth.dashboard.component.nav')

            <div class="container mt-4">
                <h2>Danh sách bình luận</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bài viết</th>
                            <th>Người dùng</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->post->name }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $comments->links() }} <!-- Phân trang -->
            </div>

            @include('backend.auth.dashboard.component.footer')
        </div>
    </div>

    @include('backend.auth.dashboard.component.script')
</body>
</html>
