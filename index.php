<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Demo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        body.landing-active {
            background: #f5f7fa;
            display: block;
            padding: 0;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .demo-info {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }

        .demo-info h3 {
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .demo-info p {
            color: #666;
            font-size: 13px;
            line-height: 1.6;
        }

        .dashboard {
            display: none;
        }

        .dashboard.active {
            display: block;
        }

        /* Landing Page Styles */
        .landing-container {
            width: 100%;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-brand h2 {
            color: #667eea;
            font-size: 24px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-link {
            color: #666;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #667eea;
        }

        .user-info {
            color: #333;
            font-weight: 600;
            padding: 8px 15px;
            background: #f0f0f0;
            border-radius: 20px;
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 50px;
            text-align: center;
        }

        .success-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn-primary, .btn-secondary {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: white;
            color: #667eea;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #667eea;
        }

        .features-section {
            padding: 60px 50px;
            background: white;
        }

        .section-title {
            text-align: center;
            color: #333;
            font-size: 36px;
            margin-bottom: 50px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        .info-section {
            padding: 60px 50px;
            background: #f5f7fa;
        }

        .info-card {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 25px;
            text-align: center;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            font-weight: 600;
        }

        .status-badge {
            background: #27ae60;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Halaman Login -->
    <div class="login-container" id="loginPage">
        <div class="login-header">
            <h1>🔐 Login</h1>
            <p>Masukkan kredensial Anda untuk melanjutkan</p>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                <div class="error-message" id="errorMessage">Username atau password salah!</div>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="demo-info">
            <h3>ℹ️ Informasi Demo</h3>
            <p><strong>Username:</strong> demo<br>
            <strong>Password:</strong> 123</p>
        </div>
    </div>

    <!-- Halaman Landing (setelah login) -->
    <div class="dashboard" id="landingPage">
        <div class="landing-container">
            <nav class="navbar">
                <div class="nav-brand">
                    <h2>🚀 MyApp</h2>
                </div>
                <div class="nav-menu">
                    <a href="#" class="nav-link active">Home</a>
                    <a href="#" class="nav-link">Features</a>
                    <a href="#" class="nav-link">About</a>
                    <span class="user-info">👤 <span id="displayUsername"></span></span>
                    <button class="btn-logout" id="logoutBtn">Keluar</button>
                </div>
            </nav>

            <section class="hero-section">
                <div class="hero-content">
                    <div class="success-badge">✅ Login Berhasil!</div>
                    <h1>Selamat Datang di Dashboard Anda</h1>
                    <p>Anda telah berhasil masuk ke sistem. Jelajahi fitur-fitur yang tersedia untuk Anda.</p>
                    <div class="hero-buttons">
                        <button class="btn-primary">Mulai Sekarang</button>
                        <button class="btn-secondary">Pelajari Lebih Lanjut</button>
                    </div>
                </div>
            </section>

            <section class="features-section">
                <h2 class="section-title">Fitur Unggulan</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3>Dashboard Analytics</h3>
                        <p>Pantau statistik dan data penting Anda secara real-time</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">⚙️</div>
                        <h3>Pengaturan Lengkap</h3>
                        <p>Sesuaikan sistem sesuai kebutuhan Anda dengan mudah</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h3>Keamanan Terjamin</h3>
                        <p>Data Anda dilindungi dengan enkripsi tingkat tinggi</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📱</div>
                        <h3>Responsive Design</h3>
                        <p>Akses dari perangkat apapun dengan tampilan optimal</p>
                    </div>
                </div>
            </section>

            <section class="info-section">
                <div class="info-card">
                    <h3>Informasi Login</h3>
                    <div class="info-item">
                        <span class="info-label">Username:</span>
                        <span class="info-value" id="displayUsername2"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tipe Akun:</span>
                        <span class="info-value">Demo</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Waktu Login:</span>
                        <span class="info-value" id="loginTime"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status:</span>
                        <span class="status-badge">Aktif</span>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        const loginPage = document.getElementById('loginPage');
        const landingPage = document.getElementById('landingPage');
        const errorMessage = document.getElementById('errorMessage');
        const logoutBtn = document.getElementById('logoutBtn');
        const displayUsername = document.getElementById('displayUsername');
        const displayUsername2 = document.getElementById('displayUsername2');
        const loginTime = document.getElementById('loginTime');

        // Kredensial demo
        const DEMO_USERNAME = 'demo';
        const DEMO_PASSWORD = '123';

        // Handle form login
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Validasi kredensial
            if (username === DEMO_USERNAME && password === DEMO_PASSWORD) {
                // Login berhasil
                errorMessage.classList.remove('show');
                
                // Simpan username dan tampilkan landing page
                displayUsername.textContent = username;
                displayUsername2.textContent = username;
                loginTime.textContent = new Date().toLocaleString('id-ID');
                
                // Redirect ke landing page
                loginPage.style.display = 'none';
                landingPage.classList.add('active');
                document.body.classList.add('landing-active');
            } else {
                // Login gagal
                errorMessage.classList.add('show');
                document.getElementById('password').value = '';
            }
        });

        // Handle logout
        logoutBtn.addEventListener('click', function() {
            // Kembali ke halaman login
            landingPage.classList.remove('active');
            loginPage.style.display = 'block';
            document.body.classList.remove('landing-active');
            
            // Reset form
            loginForm.reset();
            errorMessage.classList.remove('show');
        });

        // Hapus pesan error saat user mulai mengetik
        document.getElementById('username').addEventListener('input', function() {
            errorMessage.classList.remove('show');
        });

        document.getElementById('password').addEventListener('input', function() {
            errorMessage.classList.remove('show');
        });
    </script>
</body>
</html>