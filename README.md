# Dự án Ứng Dụng Đặt Tour Du Lịch - PHP MVC

## 🚀 Giới thiệu

Dự án "Ứng Dụng Đặt Tour Du Lịch" được xây dựng với mô hình **MVC (Model-View-Controller)** bằng PHP. Ứng dụng cho phép người dùng dễ dàng tìm kiếm, đặt và quản lý các tour du lịch, đồng thời cung cấp các chức năng quản lý cho người quản trị.

## 🛠️ Chức năng nổi bật

- **🔑 Xác thực người dùng (Authentication)**:  
  - Đăng ký tài khoản  
  - Đăng nhập, đăng xuất  
  - Quản lý phiên đăng nhập và bảo mật bằng Session

- **🌍 Trang danh sách tour**:  
  - Hiển thị danh sách các tour du lịch theo các tiêu chí lọc như điểm đến, thời gian, giá cả  
  - Tìm kiếm tour theo từ khóa  
  - Hiển thị chi tiết tour du lịch (bao gồm thông tin, hình ảnh, giá cả...)

- **🛒 Giỏ hàng và đặt tour**:  
  - Thêm tour vào giỏ  
  - Quản lý đơn hàng (thêm, sửa, xóa sản phẩm trong giỏ)  
  - Đặt tour và thanh toán

- **🧑‍💼 Quản lý thông tin khách hàng**:  
  - Cập nhật thông tin cá nhân  
  - Xem lịch sử đặt tour

- **👨‍💻 Quản lý hệ thống (Admin Panel)**:  
  - Quản lý danh sách tour, thêm/sửa/xóa tour  
  - Xem thống kê đặt tour, quản lý đơn hàng

## 💻 Công nghệ sử dụng

- **💻 Backend**: PHP (MVC Framework)
- **💾 Cơ sở dữ liệu**: MySQL
- **🎨 Giao diện**: HTML, CSS (Bootstrap hoặc custom), JavaScript
- **🔐 Xác thực người dùng**: Session
- **📧 Gửi email**: PHP Mailer (hoặc SMTP) để gửi thông báo khi khách hàng đặt tour thành công
- **⚙️ Môi trường phát triển**: XAMPP (hoặc môi trường PHP local khác)

## 📝 Ghi chú

- Ứng dụng được xây dựng theo mô hình **MVC**, giúp tách biệt rõ ràng giữa **Model** (cơ sở dữ liệu), **View** (giao diện người dùng), và **Controller** (logic xử lý).
- Hệ thống có thể được mở rộng để hỗ trợ nhiều tính năng hơn như **đánh giá tour**, **chạy quảng cáo tour**, hoặc **thêm các phương thức thanh toán trực tuyến**.
