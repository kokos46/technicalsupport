<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Some site - Register</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-light">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="mb-0">Регистрация</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login') }}" required>
                            @error('login')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                        <div class="text-end">
                            <a href="{{ url()->previous() }}" class="btn btn-link">Назад</a>
                        </div>
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger mt-3 mb-0">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS (необязательно, только если нужен JS функционал) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
