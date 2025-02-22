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
                <h2>Chỉnh sửa bài viết</h2>

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Tên bài viết</label>
                        <input type="text" class="form-control" name="name" value="{{ $post->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Danh mục</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img">Hình ảnh</label>
                        @if ($post->img)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $post->img) }}" width="150" alt="Ảnh hiện tại">
                            </div>
                        @endif
                        <input type="file" class="form-control-file" name="img">
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" name="content" rows="4" required>{{ $post->content }}</textarea>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="is_published" {{ $post->is_published ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Đăng bài</label>
                    </div>

                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>

            @include('backend.auth.dashboard.component.footer')
        </div>
    </div>

    @include('backend.auth.dashboard.component.script')
</body>
</html>
