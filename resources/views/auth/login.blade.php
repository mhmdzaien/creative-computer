<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Aplikasi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #215C5C 0%, #2d7a7a 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .login-header {
            background: linear-gradient(135deg, #215C5C 0%, #2d7a7a 100%);
            padding: 30px 40px;
            text-align: center;
            color: white;
        }

        .login-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.8rem;
        }

        .login-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .login-body {
            padding: 40px;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #215C5C;
            box-shadow: 0 0 0 0.2rem rgba(33, 92, 92, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #215C5C 0%, #2d7a7a 100%);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            width: 100%;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(33, 92, 92, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .forgot-link {
            color: #215C5C;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #2d7a7a;
            text-decoration: underline;
        }

        .social-login {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .btn-social {
            border-radius: 12px;
            padding: 12px;
            font-weight: 500;
            margin-bottom: 10px;
            transition: transform 0.2s ease;
        }

        .btn-social:hover {
            transform: translateY(-2px);
        }

        .btn-google {
            background-color: #db4437;
            border-color: #db4437;
        }

        .btn-facebook {
            background-color: #3b5998;
            border-color: #3b5998;
        }

        .register-link {
            margin-top: 25px;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .register-link a {
            color: #215C5C;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #2d7a7a;
            text-decoration: underline;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .shape1 {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape2 {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 20%;
            animation-delay: 3s;
        }

        .shape3 {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 30%;
            animation-delay: 6s;
        }

        .shape4 {
            width: 100px;
            height: 100px;
            bottom: 10%;
            right: 10%;
            animation-delay: 9s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            33% {
                transform: translateY(-30px) rotate(120deg);
            }

            66% {
                transform: translateY(30px) rotate(240deg);
            }
        }

        @media (max-width: 576px) {
            .login-header {
                padding: 25px 30px;
            }

            .login-body {
                padding: 30px 25px;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="floating-shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
        <div class="shape shape4"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="bi bi-person-circle me-2"></i>Masuk</h2>
                <p>Selamat datang kembali!</p>
            </div>

            <div class="login-body">
                @if($errors->get('email'))
                <div class="alert alert-danger">
                    Email atau password salah.
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}" id=" loginForm">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" :value="old('email')" placeholder="nama@email.com" required>
                        <label for="email"><i class="bi bi-envelope me-2"></i>Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" name="remember" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form validation dan submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email && password) {
                // Simulasi loading
                const submitBtn = document.querySelector('.btn-login');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
                submitBtn.disabled = true;

                // Simulasi proses login (ganti dengan logika sebenarnya)
                setTimeout(() => {
                    alert(`Login berhasil!\nEmail: ${email}`);

                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;

                    // Reset form
                    this.reset();
                }, 2000);
            }
        });

        // Social login handlers
        document.querySelector('.btn-google').addEventListener('click', function() {
            alert('Login dengan Google akan dihubungkan ke API Google');
        });

        document.querySelector('.btn-facebook').addEventListener('click', function() {
            alert('Login dengan Facebook akan dihubungkan ke API Facebook');
        });

        // Enhanced form interactions
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            control.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>

</html>