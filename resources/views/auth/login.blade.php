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
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ $title }} Page</h1>
                                </div>

                                @if(session()->has('message'))
                                {!! session("message") !!}
                                @endif

                                <form class="user" method="post" action="/auth/login">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                          id="email" name="email" placeholder="Enter an email address"
                                          value="{{ @old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                          class="form-control @error('password') is-invalid @enderror" id="password"
                                          name="password" placeholder="Password" data-toggle="password">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="/auth/register">Chưa có tài khoản? Đăng kí ngay!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
