<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login SIMMAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #2c3e50;
      --secondary-color: #34495e;
      --accent-color: #3498db;
      --success-color: #27ae60;
      --text-primary: #2c3e50;
      --text-secondary: #7f8c8d;
      --bg-primary: #ecf0f1;
      --bg-secondary: #ffffff;
      --border-color: #bdc3c7;
      --shadow-light: 0 2px 10px rgba(0,0,0,0.1);
      --shadow-medium: 0 4px 20px rgba(0,0,0,0.15);
      --shadow-heavy: 0 8px 30px rgba(0,0,0,0.2);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body { 
      min-height: 100vh; 
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 1000px;
    }

    .login-container {
      display: flex;
      background: var(--bg-secondary);
      border-radius: 20px;
      box-shadow: var(--shadow-heavy);
      overflow: hidden;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
      min-height: 600px;
    }

    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(0,0,0,0.25);
    }

    .left-card {
      flex: 1;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .left-card::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    .right-card {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .system-title {
      color: #fff;
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      letter-spacing: 1px;
      position: relative;
      z-index: 2;
    }

    .system-description {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.1rem;
      line-height: 1.6;
      margin-bottom: 40px;
      position: relative;
      z-index: 2;
    }

    .features-list {
      list-style: none;
      padding: 0;
      margin: 0;
      position: relative;
      z-index: 2;
    }

    .features-list li {
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      font-size: 1rem;
    }

    .features-list li::before {
      content: '✓';
      color: #27ae60;
      font-weight: bold;
      margin-right: 12px;
      font-size: 1.2rem;
    }

    .card { 
      background: transparent;
      border: none;
      box-shadow: none;
    }

    .avatar { 
      height: 70px; 
      width: 70px; 
      border-radius: 50%; 
      display: inline-flex; 
      align-items: center; 
      justify-content: center; 
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: #fff; 
      font-size: 28px; 
      box-shadow: var(--shadow-medium);
      margin-bottom: 20px;
      position: relative;
      overflow: hidden;
    }

    .avatar::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
      transform: rotate(45deg);
      animation: shine 3s infinite;
    }

    @keyframes shine {
      0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
      50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
      100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    }

    .brand { 
      letter-spacing: 2px; 
      font-weight: 700;
      color: var(--text-primary);
      font-size: 2.2rem;
      margin-bottom: 8px;
    }

    .subtitle {
      color: var(--text-secondary);
      font-weight: 400;
      font-size: 1rem;
      margin-bottom: 30px;
    }

    .nav-tabs {
      border: none;
      margin-bottom: 30px;
      background: var(--bg-primary);
      border-radius: 15px;
      padding: 5px;
    }

    .nav-tabs .nav-link {
      border: none;
      border-radius: 12px;
      margin: 0 5px;
      padding: 12px 25px;
      background: transparent;
      color: var(--text-secondary);
      transition: all 0.3s ease;
      font-weight: 500;
      position: relative;
    }

    .nav-tabs .nav-link.active {
      background: var(--bg-secondary);
      color: var(--primary-color);
      box-shadow: var(--shadow-light);
    }

    .nav-tabs .nav-link:hover:not(.active) {
      background: rgba(255,255,255,0.5);
      color: var(--text-primary);
    }

    .tab-content {
      padding: 0;
    }

    .form-control, .input-group-text { 
      border-radius: 12px; 
      border: 2px solid var(--border-color);
      background: var(--bg-secondary);
      color: var(--text-primary);
      transition: all 0.3s ease;
      font-size: 14px;
    }

    .form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
      background: var(--bg-secondary);
    }

    .form-control::placeholder {
      color: var(--text-secondary);
    }

    .input-group-text { 
      background: var(--bg-primary);
      border-color: var(--border-color);
      color: var(--text-secondary);
    }

    .toggle-eye { 
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .toggle-eye:hover {
      color: var(--accent-color);
      transform: scale(1.1);
    }

    .form-label {
      color: var(--text-primary);
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      border: none;
      border-radius: 12px;
      padding: 12px 30px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-medium);
    }

    .btn-success {
      background: linear-gradient(135deg, var(--success-color), #2ecc71);
      border: none;
      border-radius: 12px;
      padding: 12px 30px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
    }

    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-medium);
    }

    .alert {
      border: none;
      border-radius: 12px;
      font-size: 14px;
    }

    .alert-danger {
      background: rgba(231, 76, 60, 0.1);
      color: #e74c3c;
      border: 1px solid rgba(231, 76, 60, 0.2);
    }

    .text-primary {
      color: var(--primary-color) !important;
      font-weight: 600;
    }

    .text-danger {
      color: #e74c3c !important;
    }

    .section-title {
      color: var(--text-primary);
      font-weight: 600;
      margin-bottom: 20px;
      position: relative;
      padding-left: 20px;
      font-size: 16px;
    }

    .section-title::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 4px;
      height: 20px;
      background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
      border-radius: 2px;
    }

    hr {
      border: none;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--border-color), transparent);
      margin: 30px 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
        min-height: auto;
      }
      
      .left-card {
        padding: 40px 30px;
      }
      
      .right-card {
        padding: 30px;
      }
      
      .system-title {
        font-size: 2rem;
      }
      
      .system-description {
        font-size: 1rem;
      }
      
      .brand {
        font-size: 1.8rem;
      }
      
      .nav-tabs .nav-link {
        padding: 10px 15px;
        font-size: 14px;
      }
    }

    /* Loading animation */
    .btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .btn:disabled::after {
      content: '';
      position: absolute;
      width: 16px;
      height: 16px;
      margin: auto;
      border: 2px solid transparent;
      border-top-color: #ffffff;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--bg-primary);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--border-color);
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--text-secondary);
    }
  </style>
  <script>
    async function handleLogin(e){
      e.preventDefault();
      const form = e.target;
      const email = form.email.value.trim();
      const password = form.password.value;
      const btn = form.querySelector('button[type=submit]');
      btn.disabled = true; btn.innerText = 'Masuk...';
      try {
        const res = await fetch('/api/auth/login', {method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({email,password})});
        const data = await res.json();
        if(!res.ok){ throw new Error(data.message||'Gagal login'); }
        localStorage.setItem('simmas_token', data.access_token);
        localStorage.setItem('simmas_user', JSON.stringify(data.user));
        const role = data.user.role;
        if(role==='admin') location.href='/dashboard/admin';
        else if(role==='guru') location.href='/dashboard/guru';
        else location.href='/dashboard/siswa';
      } catch(err){
        const msg = document.getElementById('msg');
        msg.innerText = err.message;
        msg.classList.remove('d-none');
      } finally { btn.disabled=false; btn.innerText='Masuk'; }
    }

    async function handleRegister(e){
      e.preventDefault();
      const form = e.target;
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
      
      // Validasi password confirmation
      if(data.password !== data.password_confirmation){
        const msg = document.getElementById('registerMsg');
        msg.innerText = 'Password dan konfirmasi password tidak sama';
        msg.classList.remove('d-none');
        return;
      }
      
      const btn = form.querySelector('button[type=submit]');
      btn.disabled = true; btn.innerText = 'Mendaftar...';
      try {
        const res = await fetch('/api/auth/register', {method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify(data)});
        const result = await res.json();
        if(!res.ok){ 
          let errorMsg = result.message || 'Gagal mendaftar';
          if(result.errors){
            errorMsg += ': ' + Object.values(result.errors).join(', ');
          }
          throw new Error(errorMsg); 
        }
        
        // Auto login after successful registration
        const loginData = {
          email: data.email,
          password: data.password
        };
        
        const loginRes = await fetch('/api/auth/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(loginData)
        });
        
        if(loginRes.ok) {
          const loginResult = await loginRes.json();
          localStorage.setItem('simmas_token', loginResult.token);
          localStorage.setItem('simmas_user', JSON.stringify(loginResult.user));
          
          alert('Pendaftaran berhasil! Anda akan diarahkan ke dashboard.');
          window.location.href = '/dashboard/siswa';
        } else {
          alert('Pendaftaran berhasil! Silakan login dengan akun yang baru dibuat.');
          showLoginTab();
          form.reset();
        }
      } catch(err){
        const msg = document.getElementById('registerMsg');
        msg.innerText = err.message;
        msg.classList.remove('d-none');
      } finally { btn.disabled=false; btn.innerText='Daftar Akun Siswa'; }
    }

    function showLoginTab(){
      document.getElementById('loginTab').classList.add('active');
      document.getElementById('registerTab').classList.remove('active');
      document.getElementById('loginContent').classList.add('show', 'active');
      document.getElementById('registerContent').classList.remove('show', 'active');
    }

    function showRegisterTab(){
      document.getElementById('loginTab').classList.remove('active');
      document.getElementById('registerTab').classList.add('active');
      document.getElementById('loginContent').classList.remove('show', 'active');
      document.getElementById('registerContent').classList.add('show', 'active');
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', async ()=>{
      // Clear any existing invalid tokens first
      const t=localStorage.getItem('simmas_token');
      if(t){
        try {
          // Validate token by calling API
          const res = await fetch('/api/auth/me', {
            headers: { 'Authorization': 'Bearer ' + t }
          });
          
          if(res.ok) {
        const u = JSON.parse(localStorage.getItem('simmas_user')||'{}');
        const role = u.role||'siswa';
        location.href = '/dashboard/'+role;
          } else {
            // Token invalid, clear it
            localStorage.removeItem('simmas_token');
            localStorage.removeItem('simmas_user');
            console.log('Token invalid, cleared from localStorage');
          }
        } catch(e) {
          // Network error or token invalid, clear it
          localStorage.removeItem('simmas_token');
          localStorage.removeItem('simmas_user');
          console.log('Token validation failed, cleared from localStorage');
        }
      }
      
      // Add a manual clear button for debugging
      if(window.location.search.includes('clear=1')) {
        localStorage.removeItem('simmas_token');
        localStorage.removeItem('simmas_user');
        console.log('Manual clear: localStorage cleared');
        window.location.href = '/';
      }
      const eye = document.getElementById('toggle-eye');
      const pwd = document.getElementById('password');
      if(eye && pwd){
        eye.addEventListener('click',()=>{
          const shown = pwd.getAttribute('type')==='text';
          pwd.setAttribute('type', shown ? 'password' : 'text');
          eye.innerHTML = shown ? '👁️' : '🙈';
        });
      }
    });
  </script>
</head>
 <body>
   <div class="container">
     <div class="login-container">
       <!-- Left Card - System Information -->
       <div class="left-card">
         <h1 class="system-title">SIMMAS</h1>
         <p class="system-description">
           Sistem Manajemen Magang Siswa yang memudahkan pengelolaan program magang, 
           monitoring progress siswa, dan koordinasi antara sekolah, siswa, dan dunia industri.
         </p>
         <ul class="features-list">
           <li>Kelola data siswa dan perusahaan</li>
           <li>Monitoring progress magang</li>
           <li>Laporan dan evaluasi otomatis</li>
           <li>Komunikasi terintegrasi</li>
         </ul>
       </div>
       
       <!-- Right Card - Login Form -->
       <div class="right-card">
        <div class="text-center mb-4">
           <div class="avatar">👤</div>
           <h3 class="brand">Welcome Back</h3>
           <div class="subtitle">Masuk ke akun SIMMAS Anda</div>
        </div>
        <div class="card">
          <!-- Tab Navigation -->
          <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="loginTab" data-bs-toggle="tab" data-bs-target="#loginContent" type="button" role="tab" aria-controls="loginContent" aria-selected="true">
                <i class="fas fa-sign-in-alt me-2"></i>Login
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="registerTab" data-bs-toggle="tab" data-bs-target="#registerContent" type="button" role="tab" aria-controls="registerContent" aria-selected="false">
                <i class="fas fa-user-plus me-2"></i>Daftar Siswa
              </button>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content" id="authTabContent">
            <!-- Login Tab -->
            <div class="tab-pane fade show active" id="loginContent" role="tabpanel" aria-labelledby="loginTab">
          <form onsubmit="handleLogin(event)">
            <div id="msg" class="alert alert-danger py-2 small mb-3 d-none" role="alert"></div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <div class="input-group">
                <span class="input-group-text">📧</span>
                <input name="email" type="email" class="form-control" placeholder="admin@simmas.test" autocomplete="username" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text">🔒</span>
                <input id="password" name="password" type="password" class="form-control" value="password" autocomplete="current-password" required>
                <span id="toggle-eye" class="input-group-text toggle-eye" title="Tampilkan/Sembunyikan">👁️</span>
              </div>
            </div>
            <button class="btn btn-primary w-100" type="submit">Sign In</button>
          </form>
            </div>

            <!-- Register Tab -->
            <div class="tab-pane fade" id="registerContent" role="tabpanel" aria-labelledby="registerTab">
              <form onsubmit="handleRegister(event)">
                <div id="registerMsg" class="alert alert-danger py-2 small mb-3 d-none" role="alert"></div>
                
                 <!-- Data Dasar -->
                 <h6 class="section-title">Data Dasar</h6>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">👤</span>
                        <input name="name" type="text" class="form-control" placeholder="Nama lengkap" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Email <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">📧</span>
                        <input name="email" type="email" class="form-control" placeholder="email@example.com" required>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Password <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">🔒</span>
                        <input name="password" type="password" class="form-control" placeholder="Minimal 6 karakter" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">🔒</span>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi password" required>
                      </div>
                    </div>
                  </div>
                </div>

                 <!-- Data Siswa -->
                 <hr>
                 <h6 class="section-title">Data Siswa</h6>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">NIS <span class="text-danger">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">🎓</span>
                        <input name="nis" type="text" class="form-control" placeholder="Nomor Induk Siswa" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <div class="input-group">
                        <span class="input-group-text">🏫</span>
                        <input name="kelas" type="text" class="form-control" placeholder="Contoh: XII RPL 1">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Jurusan</label>
                      <div class="input-group">
                        <span class="input-group-text">📚</span>
                        <select name="jurusan" class="form-control">
                          <option value="">Pilih Jurusan</option>
                          <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                          <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
                          <option value="MM">Multimedia (MM)</option>
                          <option value="AK">Akuntansi (AK)</option>
                          <option value="AP">Administrasi Perkantoran (AP)</option>
                          <option value="PM">Pemasaran (PM)</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Telepon</label>
                      <div class="input-group">
                        <span class="input-group-text">📱</span>
                        <input name="telepon" type="text" class="form-control" placeholder="Nomor telepon">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <div class="input-group">
                    <span class="input-group-text">🏠</span>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap"></textarea>
                  </div>
                </div>

                <button class="btn btn-success w-100" type="submit">
                  <i class="fas fa-user-plus me-2"></i>Daftar Akun Siswa
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


