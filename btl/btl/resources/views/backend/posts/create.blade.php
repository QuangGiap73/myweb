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
                <h2>Thêm bài viết</h2>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên bài viết</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Hình ảnh</label>
                        <input type="file" class="form-control-file" name="img">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" name="content" rows="4" required></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_published">
                        <label class="form-check-label" for="is_published">Đăng bài</label>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm bài viết</button>
                </form>
            </div>

            @include('backend.auth.dashboard.component.footer')
        </div>
    </div>

    @include('backend.auth.dashboard.component.script')
</body>
</html>
