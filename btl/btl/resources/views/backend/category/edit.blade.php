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

            <div class="container">
                <h2>Chỉnh sửa danh mục</h2>
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
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
