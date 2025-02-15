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
                <h2>Chỉnh sửa thành viên</h2>
                
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                        @if ($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="Avatar" width="100" class="mt-2">
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>

            @include('backend.auth.dashboard.component.footer')
        </div>
    </div>

    @include('backend.auth.dashboard.component.script')
</body>
</html>
