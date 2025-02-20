# Giới Thiệu
👨‍💻 Võ Quang Giáp
## Web cập nhật tin tức.
## Mô tả ứng dụng và mục đích của dự án Web tin tức 
1. Giới thiệu ứng dụng.<br>
   Ứng dụng Web Tin Tức là một hệ thống quản lý và hiển thị tin tức trực tuyến, cho phép người dùng xem tin tức theo danh mục, tìm kiếm bài viết, bình luận và tương tác với nội dung. Hệ thống này có một bảng điều khiển quản trị viên (Admin Panel) giúp quản lý danh mục, bài viết, bình luận và thành viên.

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
      - Server: Sử dụng Aiven quản lí cơ sở dữ liệu trên server, với tính năng sao lưu tự động, bảo mật cao, và khả năng mở rộng dễ dàng.<br>

# Quá trình phát triển dự án 
## Sơ đồ lớp (Class Diagram)
![image](https://github.com/user-attachments/assets/292d054a-f40c-4140-b929-e40a51f66864)

## Sơ đồ khối ((Structural Diagram))


![image](https://github.com/user-attachments/assets/91c630d8-b669-4096-8f59-5cd57eff5762)

   Giải thích chi tiết về sơ đồ khối hệ thống web tin tức<br>
   Hệ thống web tin tức có các thành phần chính sau:<br>

   Người dùng (User)<br>
      - Người dùng có thể xem bài viết, để lại bình luận và tìm kiếm thông tin.<br>
      - Một số người dùng có quyền tạo tài khoản, đăng nhập và tương tác với nội dung trên trang web.<br>
      
   Quản trị viên (Admin)<br>
      Là người có quyền cao nhất trong hệ thống, có thể quản lý toàn bộ nội dung.<br>
      Các chức năng bao gồm:<br>
         - Quản lý thành viên (User Management): Xem danh sách, thêm, sửa, xóa tài khoản người dùng.<br>
         - Quản lý danh mục (Category Management): Tạo, sửa, xóa danh mục tin tức.<br>
         - Quản lý bài viết (Post Management): Viết bài, sửa bài, đăng bài, xóa bài.<br>
         - Quản lý bình luận (Comment Management): Kiểm duyệt, xóa bình luận không phù hợp.<br>
   Danh mục tin tức (Category)<br>
      - Hệ thống có nhiều danh mục để phân loại bài viết (ví dụ: Thể thao, Giải trí, Kinh tế...).<br>
      - Mỗi bài viết sẽ thuộc về một danh mục nhất định.<br>
   Bài viết (Post)<br>
      - Là nội dung chính của trang web tin tức, bao gồm tiêu đề, ảnh, nội dung, ngày đăng, trạng thái (đã duyệt hoặc chưa duyệt).<br>
      - Bài viết có thể được tạo, chỉnh sửa hoặc xóa bởi quản trị viên.<br>
   Bình luận (Comment)<br>
      - Người dùng có thể bình luận dưới bài viết.<br>
      - Bình luận sẽ hiển thị kèm theo tên người dùng và nội dung.<br>
      - Quản trị viên có thể kiểm soát và xóa bình luận nếu cần.<br>
   
   Luồng hoạt động của hệ thống<br>
      - Người dùng truy cập website và xem danh sách bài viết.<br>
      - Nếu muốn bình luận, người dùng cần đăng nhập.<br>
      - Quản trị viên có thể quản lý nội dung qua trang admin.<br>
      - Khi có bài viết mới hoặc chỉnh sửa bài viết, hệ thống cập nhật dữ liệu.<br>
      - Quản trị viên kiểm soát bình luận để đảm bảo nội dung phù hợp.<br>



# Sơ đồ chức năng ( sơ đồ thuật toán ).
   1. Chức năng đăng nhập<br>
      ![Chức năng đăng nhap](https://github.com/user-attachments/assets/57805031-a8bb-48ed-b9f5-9a99d4e6743c)<br>
   2.Chức năng đăng kí<br>
      ![chức năng đăng kí](https://github.com/user-attachments/assets/79b2547c-d256-47a7-9485-d581d5b3562c)<br>
   3.Chức năng quản lí thành viên<br>
      ![chức năng quản lí](https://github.com/user-attachments/assets/9feec77f-b4a6-4344-bee1-b93e70cd237b)<br>
      Thuật toán chi tiết quản lí thành viên <br>
         1. Hiển thị danh sách thành viên:<br>
            - Truy vấn database -> Lấy danh sách thành viên -> Hiển thị lên view.<br>
         2. Thêm thành viên:<br>
            - Nhập thông tin từ form -> Validate dữ liệu -> Lưu vào database.<br>
         3. Sửa thành viên:<br>
            - Chọn thành viên cần sửa -> Hiển thị form với dữ liệu hiện tại -> Cập nhật vào database.<br>
         4. Xóa thành viên:<br>
            - Chọn thành viên cần xóa -> Xác nhận xóa -> Xóa khỏi database.<br>
         
   4.Chức năng quản lí danh mục<br>
      ![chức năng quản lí danh mục](https://github.com/user-attachments/assets/df309409-de78-44a7-9e1a-0585e093f4ca)<br>
      Thuật toán chi tiết quản lí danh mục <br>
         1. Thêm danh mục:<br>
            - Nhập tên danh mục từ form -> Validate -> Lưu vào database<br>
         2. Sửa danh mục:<br>
            - Chọn danh mục cần sửa -> Hiển thị form với dữ liệu hiện tại -> Cập nhật vào database.<br>
         3. Xóa danh mục:<br>
            - Chọn danh mục cần xóa -> Xác nhận xóa -> Xóa khỏi database.<br>
   5.Chức năng quản lí bài viết<br>
      ![chức năng tạo bài viết ](https://github.com/user-attachments/assets/77a5fc44-26d1-41be-9505-ef4be4fe13ce)<br>
      Thuật toán chi tiết quản lí bài viết <br>
         1. Tạo bài viết:<br>
            - Nhập tiêu đề, nội dung, chọn danh mục từ form -> Validate -> Lưu vào database.<br>
         2. Đăng bài viết:<br>
            - Chọn bài viết từ danh sách -> Đặt trạng thái "Đã đăng" -> Cập nhật vào database.<br>
         3. Cập nhật bài viết:<br>
            - Chọn bài viết cần sửa -> Hiển thị form với dữ liệu hiện tại -> Cập nhật vào database.<br>
         4. Xóa bài viết:<br>
            - Chọn bài viết cần xóa -> Xác nhận xóa -> Xóa khỏi database.<br>
   6.Chức năng quản lí comment<br>
     ![chức năng quản lí bình luận](https://github.com/user-attachments/assets/a2f13a7f-dcc7-40b3-81f9-143c0ebd5bef)<br>
      Thuật toán chi tiết quản lí bình luận <br>
      Chức năng bình luận<br>
         1. Thêm bình luận:<br>
            - Nhập nội dung bình luận từ form -> Validate -> Lưu vào database.<br>
         2. Hiển thị bình luận:<br>
            - Truy vấn database -> Lấy danh sách bình luận theo bài viết -> Hiển thị lên view.<br>
      Quản lí bình luận trong admin<br>
         1. Xóa bình luận:<br>
            - Chọn bình luận cần xóa -> Xác nhận xóa -> Xóa khỏi database.<br>
         2. Cập nhật trạng thái bình luận:<br>
            - Chọn bình luận -> Đặt trạng thái (ví dụ: ẩn/hiện) -> Cập nhật vào database.<br>
      
# chu trình phát triển
