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
                <h2>Danh sách danh mục tin tức</h2>
                <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm danh mục</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backend.auth.dashboard.component.footer')
       
        </div>
        
    </div>

    @include('backend.auth.dashboard.component.script')
</body>
</html>
