<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deha Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
    body {
      background: linear-gradient(to right, #c2e9fb, #a1c4fd); /* xanh nhạt */
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
      background-color: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
    }

    .login-container h3 {
      text-align: center;
      color: #004e92; /* xanh nhẹ */
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-login {
      background-color: #004e92; /* xanh đậm hơn */
      color: white;
      border-radius: 8px;
    }

    .btn-login:hover {
      background-color:#004e92; /* xanh đậm hơn khi hover */
    }

    .deha-logo {
      display: block;
      margin: 0 auto 20px auto;
      width: 100px;
      height: auto;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('adminlte/dist/img/deha.png')}}" alt="Deha Logo" class="deha-logo">
        <h3>Đăng nhập hệ thống</h3>
        <form action="{{ route('LoginAdmin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" required placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-login btn-block">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
