<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
{{-- <!--===============================================================================================-->
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="backend/css/animate.css" rel="stylesheet">
	<link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --> --}}

</head>
<div class="container-fluid" style="background-color: black;">
	<div class="container">
    <div class="row align-items-center">
        <!-- Cột ảnh -->
        <div class="col-md-3">
		<img src="{{ asset('imgs/A2.png') }}" class="img-fluid rounded shadow" alt="Ảnh Chào Mừng" style="width: 100%; height: 50%; vertical-align: middle; border-style: none;">
        </div>
        <!-- Cột chữ -->
        <div class="col-md-9" style="padding-left: 50px;">
            <h2 class="fw-bold text-primary">Chào mừng bạn đến với Web Tin Tức</h2>
            <p class="lead text-white">Cập nhật tin tức mới nhất, nhanh chóng và chính xác. Khám phá những bài viết hấp dẫn ngay hôm nay!</p>
            <a href="#" class="btn btn-primary btn-lg">Khám Phá Ngay</a>
        </div>
    </div>
	</div>
</div>

<body class="animsition">
	<div class="topbar">
				<!-- <div class="content-topbar container h-100">
					<div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

						<a href="#" class="left-topbar-item">
							About
						</a>

						<a href="#" class="left-topbar-item">
							Contact
						</a>

						<a href="#" class="left-topbar-item">
							Sing up
						</a>

						<a href="{{ route('auth.logout')}}" class="left-topbar-item">
							Log out
						</a>
					</div>

					<div class="right-topbar">
						<a href="#">
							<span class="fab fa-facebook-f"></span>
						</a>

						<a href="#">
							<span class="fab fa-twitter"></span>
						</a>

						<a href="#">
							<span class="fab fa-pinterest-p"></span>
						</a>

						<a href="#">
							<span class="fab fa-vimeo-v"></span>
						</a>

						<a href="#">
							<span class="fab fa-youtube"></span>
						</a>
					</div>
				</div> -->
			</div
	<!-- Feature post -->
	

<!-- 	
	<section class="bg-light py-4">
        <div class="container">
            
			<div class="container my-3">
				<div class="bg-light p-3 rounded shadow">
					<nav class="nav">
						<a class="nav-link fw-bold text-primary" href="{{ route('news.index') }}">Tất cả</a>
						@foreach ($categories as $category)
							<a class="nav-link text-dark" href="{{ route('category.posts', $category->id) }}">{{ $category->name }}</a>
						@endforeach
					</nav>
				</div>
			</div>

            
            <section class="bg-light py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            
                            <div class="mb-4 text-center">
                                <h3 class="text-primary fw-bold">
                                    {{ isset($category) ? 'Danh mục: ' . $category->name : 'Bài viết mới nhất' }}
                                </h3>
                                <p class="text-muted">Cập nhật những tin tức mới nhất mỗi ngày</p>
                            </div>

                           
                            <div class="row">
                                @foreach ($posts as $post)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card h-100 shadow border-0">
                                            
                                            @if ($post->img)
                                                <img src="{{ asset('storage/' . $post->img) }}" class="card-img-top rounded-top" alt="{{ $post->name }}" style="height: 200px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                                            @endif

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title fw-bold text-dark">{{ $post->name }}</h5>
                                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($post->content, 100) }}</p>
                                                <a href="{{ route('news.show', $post->id) }}" class="btn btn-outline-primary align-self-start">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section> -->
    <div class="container">
    <!-- Thanh danh mục -->
<div class="container my-3">
    <div class="bg-light p-3 rounded shadow">
        <nav class="nav">
            <a class="nav-link fw-bold text-primary" href="{{ route('news.index') }}">Tất cả</a>
            @foreach ($categories as $cat)
                <a class="nav-link text-dark {{ $cat->id == $selectedCategory->id ? 'active' : '' }}" 
                   href="{{ route('category.posts', $cat->id) }}">{{ $cat->name }}</a>
            @endforeach
        </nav>
    </div>
</div>

<!-- Tiêu đề danh mục -->
<div class="mb-4 text-center">
    <h3 class="text-primary fw-bold">
        Danh mục: {{ $selectedCategory->name }}
    </h3>
    <p class="text-muted">Các bài viết thuộc danh mục này</p>
</div>


    <!-- Danh sách bài viết -->
    <div class="row">
        @if($posts->isEmpty())
            <p class="text-center">Không có bài viết nào trong danh mục này.</p>
        @else
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow border-0">
                        <!-- Hình ảnh bài viết -->
                        @if ($post->img)
                        <img src="{{ $post->img }}" class="card-img-top rounded-top" alt="{{ $post->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                        @endif

                        <!-- Nội dung bài viết -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark">{{ $post->name }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('news.show', $post->id) }}" class="btn btn-outline-primary align-self-start">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>