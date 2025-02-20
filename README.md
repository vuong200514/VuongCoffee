# VuongCoffee

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Giới thiệu

VuongCoffee là một trang web thương mại điện tử chuyên cung cấp các sản phẩm cà phê chất lượng cao. Trang web được xây dựng trên nền tảng Laravel, một framework PHP mạnh mẽ và linh hoạt, giúp việc phát triển trở nên dễ dàng và thú vị hơn.

## Hệ thống Quản lý Sản phẩm và Đơn hàng

Hệ thống này giúp quản lý sản phẩm, đơn hàng và các giao dịch của người dùng, với phân quyền rõ ràng giữa **Admin** và **Guest**. Admin có quyền quản lý đầy đủ các chức năng của hệ thống, trong khi Guest có quyền truy cập vào các tính năng cơ bản.

### **Chức năng chung** (Cả Admin và Guest đều có)
- **Đăng nhập**: Người dùng có thể đăng nhập vào hệ thống.
- **Đăng ký**: Người dùng có thể đăng ký tài khoản mới.
- **Chỉnh sửa hồ sơ**: Người dùng có thể cập nhật thông tin cá nhân.
- **Đổi mật khẩu**: Người dùng có thể thay đổi mật khẩu tài khoản.

---

### **Phân quyền**

#### **Admin**
Admin có quyền quản lý toàn bộ hệ thống và thực hiện các chức năng sau:
1. **Quản lý sản phẩm**: 
   - Thêm, sửa, xóa sản phẩm.
2. **Quản lý doanh thu**: 
   - Xem biểu đồ doanh thu.
   - Thêm các khoản phí cố định.
3. **Quản lý khách hàng**: 
   - Xem danh sách và thông tin của khách hàng.
4. **Quản lý đơn hàng**: 
   - Xác nhận, từ chối, sửa đổi, và xem lịch sử của tất cả các đơn hàng.

#### **Guest**
Guest có quyền truy cập các chức năng sau:
1. **Quản lý đơn hàng**:
   - Thêm, sửa, hủy đơn hàng.
2. **Đánh giá sản phẩm**:
   - Đánh giá và bình luận về sản phẩm đã mua.
   - Sửa đánh giá đã gửi.
3. **Xem sản phẩm**:
   - Xem thông tin chi tiết sản phẩm và giá.
4. **Lịch sử đơn hàng**:
   - Xem lại các đơn hàng đã được thực hiện trước đây.

---

## Hướng dẫn cài đặt

1. **Clone repository**:
    ```sh
    git clone https://github.com/vuong200514/VuongCoffee.git
    cd VuongCoffee
    ```

2. **Cài đặt các gói phụ thuộc**:
    ```sh
    composer install
    npm install
    ```

3. **Cấu hình môi trường**:
    - Tạo file [.env](http://_vscodecontentref_/0) từ file mẫu [.env.example](http://_vscodecontentref_/1):
        ```sh
        cp .env.example .env
        ```
    - Cập nhật các thông tin cấu hình trong file [.env](http://_vscodecontentref_/2) (database, mail, etc.).

4. **Tạo khóa ứng dụng**:
    ```sh
    php artisan key:generate
    ```

5. **Chạy các migration và seed dữ liệu**:
    ```sh
    php artisan migrate --seed
    ```

6. **Khởi động server**:
    ```sh
    php artisan serve
    ```

## Hướng dẫn sử dụng

### Người dùng

- **Đăng ký và đăng nhập**: Người dùng có thể đăng ký tài khoản mới hoặc đăng nhập vào tài khoản hiện có.
- **Mua hàng**: Duyệt qua các sản phẩm, thêm vào giỏ hàng và tiến hành thanh toán.
- **Đánh giá sản phẩm**: Sau khi mua hàng, người dùng có thể để lại đánh giá và nhận xét về sản phẩm.

### Quản trị viên

- **Quản lý sản phẩm**: Thêm mới, chỉnh sửa và xóa sản phẩm.
- **Quản lý đơn hàng**: Xem và cập nhật trạng thái đơn hàng.
- **Quản lý người dùng**: Xem danh sách người dùng và chỉnh sửa thông tin nếu cần.
- **Quản lý giao dịch**: Theo dõi các giao dịch tài chính và tạo báo cáo.

## Tài liệu và Hỗ trợ

- [Tài liệu Laravel](https://laravel.com/docs)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [Laracasts](https://laracasts.com)

## Liên hệ
<a href = 'https://github.com/Khanhs3043' >Đào Mạnh Vương - 23010586</a>
<p>I'M from PHENIKAA UNIVERSITY</p>

