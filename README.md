# Giới Thiệu
## Web cập nhật tin tức.
## Mô tả ứng dụng và mục đích của dự án Web tin tức 
1. Giới thiệu ứng dụng.
   Ứng dụng Web Tin Tức là một hệ thống quản lý và hiển thị tin tức trực tuyến, cho phép người dùng xem tin tức theo danh mục, tìm kiếm bài viết, bình luận và tương tác với nội dung. Hệ thống này có một bảng điều khiển quản trị viên (Admin Panel) giúp quản lý danh mục, bài viết, bình luận và thành viên.
mục đích
2. Mục đích của dự án.<br>
   Đối với người dùng.<br>
   ✅ Cung cấp thông tin nhanh chóng, chính xác, được phân loại theo từng danh mục.<br>
   ✅ Cho phép người dùng đọc tin tức mà không cần đăng ký tài khoản.<br>
   ✅ Người dùng có thể bình luận, tương tác với bài viết (nếu có tài khoản).<br>
   Đối với quản trị viên:<br>
   ✅ Quản lý bài viết: Thêm, sửa, xóa, duyệt bài viết trước khi hiển thị công khai.<br>
   ✅ Quản lý danh mục: Tổ chức các bài viết theo danh mục phù hợp.<br>
   ✅ Quản lý người dùng: Thêm, sửa, xóa tài khoản người dùng, kiểm soát quyền truy cập.<br>
   ✅ Quản lý bình luận: Xóa hoặc kiểm duyệt bình luận không phù hợp.<br>
   Mục đích tổng quát:<br>
   ✅ Tạo một hệ thống tin tức dễ sử dụng, thân thiện với người dùng.<br>
   ✅ Hỗ trợ cập nhật tin tức mới nhất một cách nhanh chóng.<br>
   ✅ Đảm bảo tính bảo mật và hiệu suất cao để phục vụ nhiều người dùng cùng lúc.<br>
## Công nghệ sử dụng trong web tin tức
   Dự án Web Tin Tức được xây dựng bằng Laravel - một framework PHP mạnh mẽ, kết hợp với các công nghệ khác để tạo nên một hệ thống tin tức linh hoạt và dễ mở rộng.<br>
   1. Backend (Xử lý phía máy chủ) - PHP & Laravel <br>
      - Laravel Framework: Xây dựng ứng dụng theo mô hình MVC (Model - View - Controller) giúp tổ chức mã nguồn gọn gàng, dễ bảo trì.<br>
      - Middleware: Kiểm soát truy cập, bảo vệ nội dung quản trị.<br>
   2. Frontend (Giao diện người dùng) - HTML, CSS, JavaScript<br>
      - Bootstrap/Tailwind CSS: Tạo giao diện đẹp, tương thích với nhiều loại màn hình (responsive)<br>
      - JavaScript (jQuery, AJAX): Cải thiện trải nghiệm người dùng, xử lý tìm kiếm, gửi bình luận mà không cần tải lại trang.<br>
   3. Cơ sở dữ liệu - MySQL<br>
      - MySQL: Quản lý dữ liệu bài viết, người dùng, bình luận...<br>
      - Migration & Seeder: Hỗ trợ tạo bảng, thêm dữ liệu mẫu dễ dàng <br>
      - Relationship: Xây dựng quan hệ giữa các bảng như User - Post - Comment. <br>
   4. Triển khai & Hosting<br>
      - Server: Sử dụng Aiven quản lí cơ sở dữ liệu trên server, với tính năng sao lưu tự động, bảo mật cao, và khả năng mở rộng dễ dàng.<br>

# Quá trình phát triển dự án 
## Sơ đồ khối (url)
![sơ đồ khối web tin tức ](https://github.com/user-attachments/assets/bea038aa-bb66-44f8-a03f-a550f9f190f9)

# sơ dồ chức nawbg (sơ đồ thuật toans)
# chu trình phát triển
