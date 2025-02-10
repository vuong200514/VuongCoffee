@extends('/layouts/auth')

@push('css-dependencies')
<link href="/css/auth.css" rel="stylesheet" />
<style>
    body {
        background-color: #f5f0e3; /* Màu kem */
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card .card-body {
        padding: 2rem;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #997720; /* Màu vàng nâu */
        box-shadow: none;
    }

    .btn-info {
        background-color: #997720; /* Màu vàng nâu */
        border-color: #997720;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #5c4a2e; /* Màu nâu */
        border-color: #5c4a2e;
    }

    .text-center a {
        color: #997720; /* Màu vàng nâu */
        transition: color 0.3s ease;
    }

    .text-center a:hover {
        color: #5c4a2e; /* Màu nâu */
    }

    .text-danger {
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts-dependencies')
<script src="/js/landing.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.addEventListener('focus', () => {
                control.classList.add('focused');
            });
            control.addEventListener('blur', () => {
                control.classList.remove('focused');
            });
        });
    });
</script>
@endpush

@section("content")
<div class="container pb-2">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ $title }} Trang</h1>
                        </div>

                        @if(session()->has('message'))
                        {!! session("message") !!}
                        @endif

                        <form class="user" method="post" action="/auth/register">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                  id="fullname" name="fullname" placeholder="Họ và tên" value="{{ @old('fullname') }}">
                                @error('fullname')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                  id="username" name="username" placeholder="Tên đăng nhập" value="{{ @old('username') }}">
                                @error('username')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                  name="email" placeholder="Địa chỉ email" value="{{ @old('email') }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                      id="password" name="password" placeholder="Mật khẩu" data-toggle="password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password"
                                      class="form-control @error('password_confirmation') is-invalid @enderror"
                                      id="password_confirmation" name="password_confirmation"
                                      placeholder="Xác nhận mật khẩu" data-toggle="password">
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="ml-2">Giới tính</div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="M" {{
                                  old('gender')=="M" ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="F" {{
                                  old('gender')=="F" ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">
                                    Nữ
                                </label>
                                @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                  name="phone" placeholder="Số điện thoại" value="{{ @old('phone') }}">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                  id="address" name="address" placeholder="Địa chỉ" value="{{ @old('address') }}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info btn-block">
                                Đăng ký
                            </button>
                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="/auth/login">Đã có tài khoản? Đăng nhập ngay!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
