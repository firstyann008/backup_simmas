<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin - SIMMAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --brand-600: #1e7e71;
      /* teal sesuai logo */
      --brand-700: #18665c;
      --brand-50: #e6f4f3;
      --accent-500: #ff7a00;
      /* oranye aksen */
      --bg-surface: #f7faf9;
      --text-primary: #0f2e2c;
      --text-secondary: #5c6f6d;
      --border-color: #d7e3e1;
      --card-bg: #ffffff;
      --card-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    }

    body {
      background: var(--bg-surface);
      color: var(--text-primary);
    }
    
    .main-content {
      background-color: var(--bg-surface);
      min-height: 100vh;
    }
    
    .stat-card {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 0.75rem;
      padding: 1.25rem;
      box-shadow: var(--card-shadow);
      transition: transform .2s ease, box-shadow .2s ease;
    }
    
    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(0, 0, 0, .12);
    }
    
    .stat-number {
      font-size: 2.25rem;
      font-weight: 700;
      color: var(--brand-600);
    }

    /* Modern stat cards (icon + label + value) */
    .stat-card-modern {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 1.25rem;
      box-shadow: var(--card-shadow);
      transition: all .2s ease;
      height: 100%;
    }

    .stat-card-modern:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, .12);
    }

    .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      margin-right: .75rem;
    }

    .stat-label {
      font-size: .875rem;
      color: var(--text-secondary);
      margin-bottom: .25rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .3px;
    }

    .stat-value {
      font-size: 1.75rem;
      font-weight: 800;
      color: #212529;
      line-height: 1;
    }
    
    .info-panel {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 0.75rem;
      padding: 1.25rem;
      box-shadow: var(--card-shadow);
      overflow: hidden;
    }

    .info-panel .text-truncate {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .welcome-section {
      background: #2D807B;
      color: #fff;
      border-radius: .75rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    /* Modern table styling for DUDI (admin) */
    .modern-table {
      table-layout: fixed;
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
    }

    .modern-table thead th {
      background-color: rgba(40, 167, 69, .1) !important;
      border-bottom: 2px solid rgba(40, 167, 69, .2);
    }

    .modern-table td,
    .modern-table th {
      vertical-align: middle;
    }

    .table-opacity-10 {
      background-color: rgba(40, 167, 69, .1) !important;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: .5rem;
    }

    .contact-item span {
      display: inline-block;
      max-width: 100%;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .company-title {
      font-weight: 600;
      color: #212529;
    }

    .company-sub {
      font-size: .875rem;
      color: #6c757d;
      line-height: 1.4;
    }

    .badge-pill {
      border-radius: 999px;
      padding: .25rem .5rem;
      font-weight: 600;
      font-size: .75rem;
      line-height: 1;
    }

    /* Ensure sidebar not cropped: force horizontal scroll inside table area */
    #dudi-content .table-responsive {
      overflow-x: auto;
    }

    #dudi-content .modern-table {
      min-width: 1000px;
    }

    #dudi-content .modern-table td,
    #dudi-content .modern-table th {
      vertical-align: top;
    }

    /* Column widths for neat layout */
    #dudi-content .modern-table td:nth-child(1),
    #dudi-content .modern-table th:nth-child(1) {
      width: 35%;
    }

    #dudi-content .modern-table td:nth-child(2),
    #dudi-content .modern-table th:nth-child(2) {
      width: 28%;
    }

    #dudi-content .modern-table td:nth-child(3),
    #dudi-content .modern-table th:nth-child(3) {
      width: 17%;
    }

    #dudi-content .modern-table td:nth-child(4),
    #dudi-content .modern-table th:nth-child(4) {
      width: 8%;
    }

    #dudi-content .modern-table td:nth-child(5),
    #dudi-content .modern-table th:nth-child(5) {
      width: 7%;
      text-align: center;
    }

    #dudi-content .modern-table td:nth-child(6),
    #dudi-content .modern-table th:nth-child(6) {
      width: 9%;
    }

    #dudi-content .modern-table td:nth-child(7),
    #dudi-content .modern-table th:nth-child(7) {
      width: 12%;
      text-align: center;
    }

    .btn-primary {
      background: var(--brand-600);
      border-color: var(--brand-600);
    }

    .btn-primary:hover {
      background: var(--brand-700);
      border-color: var(--brand-700);
    }

    .link-primary {
      color: var(--brand-600);
    }

    .form-control:focus {
      border-color: #73c4bc;
      box-shadow: 0 0 0 .2rem rgba(42, 165, 148, .15);
    }

    /* Limit width inside settings page so sidebar never gets pushed */
    #settings-content .settings-container {
      max-width: 1100px;
      margin: 0 auto;
    }

    #settings-content .card {
      margin-bottom: 1rem;
    }

    #settings-content .card-header {
      background: var(--bg-surface);
      border-left: 4px solid var(--brand-600);
    }
    #settings-content h5,
    #settings-content h6 {
      color: var(--brand-600);
    }

    @media (max-width: 1400px) {
      #settings-content .settings-container {
        max-width: 1000px;
      }
    }

    @media (max-width: 1200px) {
      #settings-content .settings-container {
        max-width: 920px;
      }
    }

    /* Global responsive helpers */
    img {
      max-width: 100%;
      height: auto;
    }

    .container-fluid {
      max-width: 100%;
    }

    /* Keep main layout from collapsing when sidebar width changes */
    .d-flex>.sidebar {
      flex: 0 0 320px;
    }

    .d-flex>.flex-grow-1 {
      min-width: 0;
    }

    /* Modern buttons */
    .btn-modern {
      border-radius: 999px;
      font-weight: 600;
    }

    .btn-modern i {
      margin-right: .35rem;
    }

    .btn-modern.btn-outline-success {
      --bs-btn-color: #198754;
      --bs-btn-border-color: #198754;
    }

    .btn-modern.btn-outline-success:hover {
      color: #fff;
      background-color: #198754;
      border-color: #198754;
    }

    .btn-modern.btn-outline-danger {
      --bs-btn-color: #dc3545;
      --bs-btn-border-color: #dc3545;
    }

    .btn-modern.btn-outline-danger:hover {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-modern.btn-outline-primary {
      --bs-btn-color: #0d6efd;
      --bs-btn-border-color: #0d6efd;
    }

    .btn-modern.btn-outline-primary:hover {
      color: #fff;
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    /* Role badges */
    .badge-role {
      border-radius: 10px;
      padding: .25rem .6rem;
      font-weight: 700;
      text-transform: lowercase;
      letter-spacing: .2px;
      font-size: .8rem;
      line-height: 1;
    }

    .badge-role i {
      font-size: .85em;
    }

    /* Responsive typography and spacing */
    @media (max-width: 1200px) {
    .welcome-section {
        padding: 1.25rem;
      }

      .stat-number {
        font-size: 2rem;
      }
    }

    @media (max-width: 992px) {
      .welcome-section {
        padding: 1rem;
      }

      .stat-number {
        font-size: 1.75rem;
      }

      .main-content {
        padding: 1rem !important;
      }

      #settings-content {
        padding: 1rem !important;
      }

      #settings-content .settings-container {
        max-width: 100%;
      }

      #settings-content .card-body {
        padding: 1rem;
      }

      #settings-content .card-header {
        padding: .75rem 1rem;
      }
    }

    @media (max-width: 768px) {
      .welcome-section h2 {
        font-size: 1.25rem;
      }

      .welcome-section p {
        font-size: .9rem;
        margin-bottom: .25rem;
      }

      .stat-card {
        padding: 1rem;
      }

      .info-panel {
        padding: 1rem;
      }

      /* Make inputs comfortable on touch */
      .form-control,
      .form-select {
        min-height: 42px;
      }

      /* Space between stacked controls */
      #settings-content .form-label {
        margin-bottom: .35rem;
      }

      #settings-content .row.g-3>[class^="col-"] {
        margin-bottom: .25rem;
      }
    }

    @media (max-width: 576px) {
      .stat-number {
        font-size: 1.5rem;
      }

      .btn {
        padding: .45rem .75rem;
      }

      #settings-content .card {
        border-radius: .65rem;
      }
    }
  </style>
</head>

<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <?= view('components/sidebar', ['user' => $user]) ?>
    
    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column">
      <!-- Navbar -->
      <?= view('components/navbar', ['user' => $user]) ?>
        
        <!-- Dashboard Content -->
        <div class="main-content p-4">
          <!-- Welcome Section -->
          <div class="welcome-section">
            <h2>Dashboard</h2>
            <p>Selamat datang di sistem pelaporan magang siswa SMK Negeri 1 Surabaya.</p>
          </div>
          
        <!-- Modern Statistics Cards -->
        <div class="row g-4 mb-4">
          <div class="col-lg-3 col-md-6">
            <div class="stat-card-modern d-flex align-items-center">
              <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="fas fa-user-graduate"></i></div>
              <div class="ms-3">
                <div class="stat-label">Total Siswa</div>
                <div class="stat-value" id="total-siswa"><?= $stats['total_siswa'] ?? 0 ?></div>
              </div>
            </div>
              </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-card-modern d-flex align-items-center">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-handshake"></i></div>
              <div class="ms-3">
                <div class="stat-label">DUDI Partner</div>
                <div class="stat-value" id="total-dudi"><?= $stats['total_dudi'] ?? 0 ?></div>
            </div>
              </div>
            </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-card-modern d-flex align-items-center">
              <div class="stat-icon bg-info bg-opacity-10 text-info"><i class="fas fa-briefcase"></i></div>
              <div class="ms-3">
                <div class="stat-label">Siswa Magang</div>
                <div class="stat-value" id="siswa-magang"><?= $stats['total_magang'] ?? 0 ?></div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-card-modern d-flex align-items-center">
              <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="fas fa-calendar-day"></i></div>
              <div class="ms-3">
                <div class="stat-label">Logbook Hari Ini</div>
                <div class="stat-value" id="logbook-hari-ini"><?= $stats['total_logbook'] ?? 0 ?></div>
              </div>
              </div>
            </div>
          </div>
          
          <!-- Information Panels -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="info-panel">
              <div class="d-flex align-items-center mb-3">
                <div class="stat-icon bg-info bg-opacity-10 text-info me-2"><i class="fas fa-history"></i></div>
                <h6 class="mb-0">Magang Terbaru</h6>
              </div>
                <div id="magang-terbaru-list">
                <?php if (!empty($recent_magang)): ?>
                  <?php foreach ($recent_magang as $magang): ?>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                      <div class="flex-grow-1">
                        <div class="fw-semibold"><?= $magang['siswa_name'] ?? '-' ?></div>
                        <div class="small text-muted"><?= $magang['nama_perusahaan'] ?? '-' ?></div>
                        <div class="small text-muted"><?= date('d/m/Y', strtotime($magang['tanggal_mulai'])) ?> -
                          <?= date('d/m/Y', strtotime($magang['tanggal_selesai'])) ?></div>
                      </div>
                      <span class="badge bg-primary"><?= $magang['status'] ?? '-' ?></span>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="text-muted text-center py-3">Tidak ada data</div>
                <?php endif; ?>
                </div>
              </div>
              <div class="info-panel mt-3">
                <h6 class="mb-3">Logbook Terbaru</h6>
                <div id="logbook-terbaru-list">
                  <div class="text-muted text-center py-3">Tidak ada data</div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="info-panel">
              <div class="d-flex align-items-center mb-3">
                <div class="stat-icon bg-success bg-opacity-10 text-success me-2"><i class="fas fa-building"></i></div>
                <h6 class="mb-0">DUDI Aktif</h6>
              </div>
                <div id="dudi-aktif-list">
                <?php if (!empty($recent_dudi)): ?>
                  <?php foreach ($recent_dudi as $dudi): ?>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                      <div class="flex-grow-1">
                        <div class="fw-semibold"><?= $dudi['nama_perusahaan'] ?? '-' ?></div>
                        <div class="small text-muted"><?= $dudi['alamat'] ?? '-' ?></div>
                        <div class="small text-muted"><?= $dudi['telepon'] ?? '-' ?></div>
                      </div>
                      <span class="badge bg-success"><?= $dudi['status'] ?? '-' ?></span>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="text-muted text-center py-3">Tidak ada data</div>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- DUDI Management Content -->
        <div id="dudi-content" class="p-4" style="display: none;">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Manajemen DUDI</h5>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDudi" onclick="openCreate()">+
            Tambah DUDI</button>
          </div>
          
          <!-- DUDI Statistics Cards -->
          <div class="row mb-4">
            <div class="col-md-3 mb-3">
              <div class="stat-card text-center">
                <h6 class="text-muted mb-2">Total DUDI</h6>
                <div class="stat-number" id="dudi-total">-</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stat-card text-center">
                <h6 class="text-muted mb-2">DUDI Aktif</h6>
                <div class="stat-number" id="dudi-aktif-count">-</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stat-card text-center">
                <h6 class="text-muted mb-2">DUDI Tidak Aktif</h6>
                <div class="stat-number" id="dudi-tidak-aktif-count">-</div>
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="stat-card text-center">
                <h6 class="text-muted mb-2">Total Siswa Magang</h6>
                <div class="stat-number" id="dudi-siswa-magang">-</div>
              </div>
            </div>
          </div>
          
          <!-- Search and Filter Controls -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group" style="max-width:400px;">
            <input id="search" type="text" class="form-control"
              placeholder="Cari perusahaan, alamat, penanggung jawab...">
            <button class="btn btn-outline-secondary" onclick="loadDudi()">Cari</button>
          </div>
            <div class="d-flex align-items-center gap-2">
              <span>Tampilkan:</span>
              <select id="perPage" class="form-select" style="width:80px;" onchange="loadDudi()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
              </select>
              <span>entri</span>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover modern-table mb-0">
            <thead class="table-opacity-10">
              <tr>
                <th class="border-0 fw-semibold text-dark">Perusahaan</th>
                <th class="border-0 fw-semibold text-dark">Kontak</th>
                <th class="border-0 fw-semibold text-dark">Penanggung Jawab</th>
                <th class="border-0 fw-semibold text-dark">Status</th>
                <th class="border-0 fw-semibold text-dark">Siswa Magang</th>
                <th class="border-0 fw-semibold text-dark">Kuota Magang</th>
                <th class="border-0 fw-semibold text-dark text-center">Aksi</th>
                </tr>
              </thead>
            <tbody id="rows"></tbody>
          </table>
        </div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <div id="pagination-info" class="text-muted"></div>
            <div id="pagination-controls"></div>
          </div>
        </div>
        
        <!-- Users Management Content -->
        <div id="users-content" class="p-4" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="stat-icon bg-success bg-opacity-10 text-success me-2"><i class="fas fa-users"></i></div>
            <h5 class="mb-0 fw-bold text-dark">Manajemen Pengguna</h5>
          </div>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUser" onclick="openUserCreate()">
            <i class="fas fa-user-plus me-2"></i>Tambah User
          </button>
      </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="input-group" style="max-width:420px;">
            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
            <input id="uq" type="text" class="form-control border-start-0" placeholder="Cari nama, email, atau role...">
            <button class="btn btn-outline-success" onclick="loadUsers()">Cari</button>
          </div>
            <div class="d-flex align-items-center gap-2">
              <select id="roleFilter" class="form-select" style="width:150px;" onchange="loadUsers()">
                <option value="">Semua Role</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
              </select>
            <span class="text-muted">Tampilkan:</span>
              <select id="userPerPage" class="form-select" style="width:80px;" onchange="loadUsers()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
              </select>
            <span class="text-muted">entri</span>
            </div>
          </div>
        <div class="card border-0 shadow-sm">
          <div class="card-body p-0">
          <div class="table-responsive">
              <table class="table table-hover modern-table mb-0">
                <thead class="table-opacity-10">
                  <tr>
                    <th class="border-0 fw-semibold text-dark">User</th>
                    <th class="border-0 fw-semibold text-dark">Email & Verifikasi</th>
                    <th class="border-0 fw-semibold text-dark">Role</th>
                    <th class="border-0 fw-semibold text-dark">Terdaftar</th>
                    <th class="border-0 fw-semibold text-dark text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="urows"></tbody>
            </table>
            </div>
          </div>
          </div>
          <div class="d-flex justify-content-between align-items-center mt-3">
          <div id="user-pagination-info" class="text-muted small fw-semibold"></div>
            <div id="user-pagination-controls"></div>
          </div>
        </div>
        
        <!-- Settings Content -->
        <div id="settings-content" class="p-4" style="display: none;">
        <div class="settings-container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Pengaturan Sekolah</h5>
          </div>
          
          <div class="row g-4">
            <!-- Left Column - School Information -->
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-cog me-2 text-success"></i>
                    <h6 class="mb-0">Informasi Sekolah</h6>
                  </div>
                  <button class="btn btn-outline-primary btn-sm" onclick="toggleEditMode()">
                    <i class="fas fa-edit me-1"></i>Edit
                  </button>
                </div>
                <div class="card-body">
                  <form id="settingsForm" onsubmit="saveSettings(event)">
                    <div class="row g-3">
                      <div class="col-12">
                        <label class="form-label">Logo Sekolah</label>
                        <div class="border rounded p-3 text-center" style="height: 120px; background-color: #f8f9fa;">
                          <div id="logoPreview" class="d-none">
                            <img id="logoImage" src="" alt="Logo Sekolah" style="max-height: 80px; max-width: 100%;">
                          </div>
                          <div id="logoPlaceholder">
                            <i class="fas fa-image fa-2x text-muted mb-2"></i>
                            <div class="text-muted">Logo</div>
                          </div>
                          <input type="file" id="logoInput" class="form-control mt-2 mb-4" accept="image/*"
                            onchange="handleLogoUpload(event)">
                        </div>
                      </div>
                      <div class="col-12">
                        <label class="form-label">Nama Sekolah/Instansi *</label>
                        <input id="s_nama" class="form-control" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label">Alamat Lengkap *</label>
                        <textarea id="s_alamat" class="form-control" rows="3" required></textarea>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Telepon *</label>
                        <input id="s_telp" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input id="s_email" type="email" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input id="s_web" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Kepala Sekolah *</label>
                        <input id="s_kepala" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">NPSN (Nomor Pokok Sekolah Nasional)</label>
                        <input id="s_npsn" class="form-control">
                      </div>
                      <div class="col-12">
                        <div class="text-muted small">
                          <i class="fas fa-clock me-1"></i>
                          Terakhir diperbarui: <span id="lastUpdated">-</span>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                          <i class="fas fa-save me-1"></i>Simpan Perubahan
                        </button>
        </div>
      </div>
        </form>
                </div>
              </div>
            </div>
            
            <!-- Right Column - Preview -->
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-eye me-2 text-success"></i>
                    <h6 class="mb-0">Preview Tampilan</h6>
                  </div>
                </div>
                <div class="card-body">
                  <p class="text-muted small">Pratinjau bagaimana informasi sekolah akan ditampilkan</p>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-desktop me-2 text-success"></i>
                    <h6 class="mb-0">Dashboard Header</h6>
                  </div>
                </div>
                <div class="card-body">
                  <div class="border rounded p-2 text-center">
                    <div class="mb-2" id="preview_dashboard_logo">
                      <i class="fas fa-image text-muted"></i>
                    </div>
                    <div class="fw-semibold" id="preview_nama">SMK Negeri 1 Surabaya</div>
                    <div class="small text-muted" id="preview_sistem">Sistem Informasi Magang</div>
                  </div>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-file-alt me-2 text-success"></i>
                    <h6 class="mb-0">Header Rapor/Sertifikat</h6>
                  </div>
                </div>
                <div class="card-body">
                  <div class="border rounded p-3 text-center">
                    <div class="mb-2" id="preview_cert_logo">
                      <i class="fas fa-image text-muted"></i>
                    </div>
                    <div class="fw-bold mb-2" id="preview_nama_cert">SMK Negeri 1 Surabaya</div>
                    <div class="small mb-2" id="preview_alamat_cert">Jl. SMEA No.4, Sawahan, Kec. Sawahan, Kota
                      Surabaya, Jawa Timur 60252</div>
                    <div class="small mb-1">Telp: <span id="preview_telp_cert">031-5678910</span></div>
                    <div class="small mb-1">Email: <span id="preview_email_cert">info@smkn1surabaya.sch.id</span></div>
                    <div class="small mb-2">Web: <span id="preview_web_cert">www.smkn1surabaya.sch.id</span></div>
                    <div class="fw-bold text-primary">SERTIFIKAT MAGANG</div>
                  </div>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-print me-2 text-success"></i>
                    <h6 class="mb-0">Dokumen Cetak</h6>
                  </div>
                </div>
                <div class="card-body">
                  <div class="border rounded p-3">
                    <div class="text-center mb-2" id="preview_print_logo">
                      <i class="fas fa-image text-muted"></i>
                    </div>
                    <div class="fw-bold text-center mb-2" id="preview_nama_print">SMK Negeri 1 Surabaya</div>
                    <div class="small text-center mb-2">NPSN: <span id="preview_npsn_print">20567890</span></div>
                    <div class="small text-center mb-1" id="preview_alamat_print">Jl. SMEA No.4, Sawahan, Kec. Sawahan,
                      Kota Surabaya, Jawa Timur 60252</div>
                    <div class="small text-center mb-1" id="preview_telp_print">031-5678910</div>
                    <div class="small text-center mb-2" id="preview_email_print">info@smkn1surabaya.sch.id</div>
                    <div class="small text-center">Kepala Sekolah: <span id="preview_kepala_print">Drs. H. Sutrisno,
                        M.Pd.</span></div>
                  </div>
                </div>
              </div>
              
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle me-2 text-success"></i>
                    <h6 class="mb-0">Informasi Penggunaan</h6>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled small mb-0">
                    <li class="mb-2">
                      <i class="fas fa-check text-success me-2"></i>
                      <strong>Dashboard:</strong> Logo dan nama sekolah ditampilkan di header navigasi
                    </li>
                    <li class="mb-2">
                      <i class="fas fa-check text-success me-2"></i>
                      <strong>Rapor/Sertifikat:</strong> Informasi lengkap sebagai kop dokumen resmi
                    </li>
                    <li class="mb-0">
                      <i class="fas fa-check text-success me-2"></i>
                      <strong>Dokumen Cetak:</strong> Footer atau header pada laporan yang dicetak
                    </li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="modal fade" id="modalDudi" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah DUDI</h5><button type="button" class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
          <form onsubmit="saveDudi(event)">
            <div class="modal-body">
              <div id="formMsg" class="text-danger small mb-2"></div>
              <input type="hidden" id="id">
            <div class="mb-3"><label class="form-label">Nama Perusahaan*</label><input id="nama_perusahaan"
                class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Alamat*</label><textarea id="alamat" class="form-control"
                required></textarea></div>
              <div class="mb-3"><label class="form-label">Telepon</label><input id="telepon" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Email</label><input id="email" type="email"
                class="form-control"></div>
            <div class="mb-3"><label class="form-label">Penanggung Jawab</label><input id="penanggung_jawab"
                class="form-control"></div>
            <div class="mb-3"><label class="form-label">Kuota Magang (maksimal siswa)</label><input id="kuota"
                type="number" min="0" class="form-control" placeholder="Contoh: 8"></div>
              <div class="mb-3"><label class="form-label">Status</label>
                <select id="status" class="form-select">
                  <option value="aktif">Aktif</option>
                  <option value="nonaktif">Tidak Aktif</option>
                  <option value="pending">Pending</option>
                </select>
              </div>
            </div>
          <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal"
              type="button">Batal</button><button class="btn btn-primary" type="submit">Simpan</button></div>
          </form>
        </div>
      </div>
    </div>
  <div class="modal fade" id="modalUser" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uTitle">Tambah User Baru</h5><button class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <form id="userForm">
          <div class="modal-body">
        <div id="uMsg" class="text-danger small mb-2"></div>
        <input type="hidden" id="uid">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
          <input id="uname" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email <span class="text-danger">*</span></label>
          <input id="uemail" type="email" class="form-control" placeholder="Contoh: user@email.com" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Role <span class="text-danger">*</span></label>
              <select id="urole" class="form-select" onchange="toggleRoleFields()" required>
                <option value="">Pilih Role</option>
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="mb-3" id="pwdWrap">
          <label class="form-label">Password <span class="text-danger">*</span></label>
              <input id="upassword" type="password" class="form-control"
                placeholder="Masukkan password (min. 6 karakter)" required>
        </div>
        <div class="mb-3" id="cpwdWrap">
          <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
          <input id="uconfirm" type="password" class="form-control" placeholder="Ulangi password" required>
        </div>

            <!-- Role-specific Fields -->
            <div id="roleSpecificFields" style="display: none;">
              <hr>
              <h6 class="mb-3">Informasi Tambahan</h6>

              <!-- Siswa Fields -->
              <div id="siswaFields" class="role-fields" style="display: none;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">NIS <span class="text-danger">*</span></label>
                      <input id="unis" type="text" class="form-control" placeholder="Nomor Induk Siswa" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <input id="ukelas" type="text" class="form-control" placeholder="Contoh: XII RPL 1">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Jurusan</label>
                      <select id="ujurusan" class="form-select">
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
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Telepon</label>
                      <input id="utelepon" type="text" class="form-control" placeholder="Nomor telepon">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea id="ualamat" class="form-control" rows="3" placeholder="Alamat lengkap"></textarea>
                </div>
              </div>

              <!-- Guru Fields -->
              <div id="guruFields" class="role-fields" style="display: none;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">NIP <span class="text-danger">*</span></label>
                      <input id="unip" type="text" class="form-control" placeholder="Nomor Induk Pegawai" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Telepon</label>
                      <input id="uguru_telepon" type="text" class="form-control" placeholder="Nomor telepon">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea id="uguru_alamat" class="form-control" rows="3" placeholder="Alamat lengkap"></textarea>
                </div>
              </div>

              <!-- Admin Fields -->
              <div id="adminFields" class="role-fields" style="display: none;">
                <div class="alert alert-info">
                  <i class="fas fa-info-circle me-2"></i>
                  Admin tidak memerlukan informasi tambahan selain data dasar.
                </div>
              </div>
            </div>

        <div class="mb-1">
          <label class="form-label">Email Verification</label>
          <select id="uverified" class="form-select">
            <option value="0">Unverified</option>
            <option value="1">Verified</option>
          </select>
        </div>
          </div>
          <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal"
              type="button">Batal</button><button class="btn btn-primary" type="button"
              onclick="saveUserDirect()">Simpan</button></div>
        </form>
      </div>
    </div>
  </div>
 
    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="mConfirmDelete" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="confirmDeleteId">
            <p>Apakah Anda yakin ingin menghapus data user ini? Tindakan ini tidak dapat dibatalkan.</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
            <button class="btn btn-danger" type="button" onclick="confirmDeleteUser()">Ya, Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function requireAuth() {
      const t = localStorage.getItem('simmas_token');
      const u = JSON.parse(localStorage.getItem('simmas_user') || '{}');
      if (!t || u.role !== 'admin') { location.href = '/login'; }
      return { t, u };
    }
    function token() { return localStorage.getItem('simmas_token') }
    function hdr() { return { Authorization: 'Bearer ' + token(), 'Content-Type': 'application/json' } }

    // Function to validate token
    async function validateToken() {
      const currentToken = token();
      if (!currentToken) {
        return false;
      }

      try {
        const response = await fetch('/api/auth/me', {
          headers: { 'Authorization': 'Bearer ' + currentToken }
        });

        if (!response.ok) {
          // Token invalid, clear it
          localStorage.removeItem('simmas_token');
          localStorage.removeItem('simmas_user');
          return false;
        }

        return true;
      } catch (error) {
        console.error('Token validation error:', error);
        return false;
      }
    }
    
    // Debug function to check token
    function debugToken() {
      const token = localStorage.getItem('simmas_token');
      console.log('Token exists:', !!token);
      console.log('Token length:', token ? token.length : 0);
      if (token) {
        try {
          const payload = JSON.parse(atob(token.split('.')[1]));
          console.log('Token payload:', payload);
          console.log('Token expired:', new Date(payload.exp * 1000) < new Date());
        } catch (e) {
          console.error('Token decode error:', e);
        }
      }
    }
    function logout() { location.href = '/logout'; }
    
    // Logo upload functions
    async function handleLogoUpload(event) {
      const file = event.target.files[0];
      if (file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
          alert('File harus berupa gambar');
          return;
        }
        
        // Validate file size (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
          alert('Ukuran file maksimal 2MB');
          return;
        }
        
        // Show loading state
        const logoPlaceholder = document.getElementById('logoPlaceholder');
        logoPlaceholder.innerHTML = '<i class="fas fa-spinner fa-spin fa-2x text-muted mb-2"></i><div class="text-muted">Mengupload...</div>';
        
        try {
          // Validate token before upload
          const isValidToken = await validateToken();
          if (!isValidToken) {
            alert('Sesi Anda telah berakhir. Silakan login ulang.');
            location.href = '/login';
            return;
          }

          // Upload file to server
          const formData = new FormData();
          formData.append('logo', file);
          
          const response = await fetch('/api/admin/settings/upload-logo', {
            method: 'POST',
            headers: {
              'Authorization': 'Bearer ' + currentToken
            },
            body: formData
          });
          
          const data = await response.json();
          
          if (!response.ok) {
            // Check if it's a token error
            if (response.status === 401 || data.message?.includes('token') || data.message?.includes('Token')) {
              alert('Sesi Anda telah berakhir. Silakan login ulang.');
              localStorage.removeItem('simmas_token');
              localStorage.removeItem('simmas_user');
              location.href = '/login';
              return;
            }
            throw new Error(data.message || 'Gagal mengupload logo');
          }
          
          // Update logo display
          const logoImage = document.getElementById('logoImage');
          const logoPreview = document.getElementById('logoPreview');
          
          logoImage.src = data.logo_url;
          logoImage.onload = function () {
            logoPreview.classList.remove('d-none');
            logoPlaceholder.classList.add('d-none');
            
            // Update preview sections with logo
            updatePreviewWithLogo(data.logo_url);
            
            // Show success notification
            showNotification('Logo berhasil diupload', 'success');
            
            // Store logo URL for persistence
            localStorage.setItem('simmas_logo_url', data.logo_url);
          };
          logoImage.onerror = function () {
            // Reset placeholder on error
            logoPlaceholder.innerHTML = '<i class="fas fa-image fa-2x text-muted mb-2"></i><div class="text-muted">Logo</div>';
            showNotification('Gagal menampilkan logo', 'error');
          };
          
        } catch (error) {
          // Reset placeholder on error
          logoPlaceholder.innerHTML = '<i class="fas fa-image fa-2x text-muted mb-2"></i><div class="text-muted">Logo</div>';
          showNotification(error.message || 'Gagal mengupload logo', 'error');
          console.error('Upload error:', error);
        }
      }
    }
    
    function loadExistingLogo(logoUrl) {
      const logoImage = document.getElementById('logoImage');
      const logoPreview = document.getElementById('logoPreview');
      const logoPlaceholder = document.getElementById('logoPlaceholder');
      
      // Check if logoUrl is valid
      if (logoUrl && logoUrl !== 'null' && logoUrl !== '') {
        logoImage.src = logoUrl;
        logoImage.onload = function () {
          logoPreview.classList.remove('d-none');
          logoPlaceholder.classList.add('d-none');
          
          // Update preview sections with logo
          updatePreviewWithLogo(logoUrl);
        };
        logoImage.onerror = function () {
          console.error('Failed to load logo:', logoUrl);
          // Keep placeholder visible if logo fails to load
        };
      }
    }
    
    function updatePreviewWithLogo(logoDataUrl) {
      // Update all preview sections to show logo
      const previewSections = [
        'preview_dashboard_logo',
        'preview_cert_logo', 
        'preview_print_logo'
      ];
      
      previewSections.forEach(id => {
        const element = document.getElementById(id);
        if (element && logoDataUrl) {
          const img = document.createElement('img');
          img.src = logoDataUrl;
          img.alt = 'Logo';
          img.style.cssText = 'max-height: 40px; max-width: 100%;';
          img.onload = function () {
            element.innerHTML = '';
            element.appendChild(img);
          };
          img.onerror = function () {
            // Keep placeholder if image fails to load
            element.innerHTML = '<i class="fas fa-image text-muted"></i>';
          };
        }
      });
    }
    
    function updatePreview() {
      // Update dashboard header preview
      document.getElementById('preview_nama').textContent = val('s_nama') || 'SMK Negeri 1 Surabaya';
      
      // Update certificate header preview
      document.getElementById('preview_nama_cert').textContent = val('s_nama') || 'SMK Negeri 1 Surabaya';
      document.getElementById('preview_alamat_cert').textContent = val('s_alamat') || 'Jl. SMEA No.4, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60252';
      document.getElementById('preview_telp_cert').textContent = val('s_telp') || '031-5678910';
      document.getElementById('preview_email_cert').textContent = val('s_email') || 'info@smkn1surabaya.sch.id';
      document.getElementById('preview_web_cert').textContent = val('s_web') || 'www.smkn1surabaya.sch.id';
      
      // Update print document preview
      document.getElementById('preview_nama_print').textContent = val('s_nama') || 'SMK Negeri 1 Surabaya';
      document.getElementById('preview_npsn_print').textContent = val('s_npsn') || '20567890';
      document.getElementById('preview_alamat_print').textContent = val('s_alamat') || 'Jl. SMEA No.4, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60252';
      document.getElementById('preview_telp_print').textContent = val('s_telp') || '031-5678910';
      document.getElementById('preview_email_print').textContent = val('s_email') || 'info@smkn1surabaya.sch.id';
      document.getElementById('preview_kepala_print').textContent = val('s_kepala') || 'Drs. H. Sutrisno, M.Pd.';
    }
    async function loadDudi() {
      try {
        // Validate token before loading DUDI
        const isValidToken = await validateToken();
        if (!isValidToken) {
          alert('Sesi Anda telah berakhir. Silakan login ulang.');
          location.href = '/login';
          return;
        }

        const q = document.getElementById('search').value.trim();
        console.log('Loading DUDI with query:', q);
        console.log('Using headers:', hdr());
        console.log('Token exists:', !!token());
        const res = await fetch('/api/admin/dudi' + (q ? '?q=' + encodeURIComponent(q) : ''), { headers: hdr() });
        console.log('DUDI response status:', res.status);
        console.log('DUDI response headers:', res.headers);
        const data = await res.json();
        console.log('DUDI data:', data);
        const tbody = document.getElementById('rows');
        tbody.innerHTML = '';
        
        // Check if response is an error
        if (!res.ok) {
          // Check if it's a token error
          if (res.status === 401 || data.message?.includes('token') || data.message?.includes('Token')) {
            alert('Sesi Anda telah berakhir. Silakan login ulang.');
            localStorage.removeItem('simmas_token');
            localStorage.removeItem('simmas_user');
            location.href = '/login';
            return;
          }
          throw new Error(data.message || 'Gagal memuat data DUDI');
        }
        
        // Check if data is an array
        if (!Array.isArray(data)) {
          throw new Error('Data DUDI tidak valid');
        }
        
        if (data.length === 0) {
          tbody.innerHTML = '<tr><td colspan="7" class="text-center text-muted py-3">Tidak ada data DUDI</td></tr>';
          return;
        }
        
        data.forEach((r, i) => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>
            <div class="d-flex align-items-start">
              <div class="stat-icon bg-success bg-opacity-10 text-success me-2"><i class="fas fa-building"></i></div>
                <div>
                <div class="company-title">${r.nama_perusahaan || '-'}</div>
                <div class="company-sub"><i class="fas fa-location-dot me-1"></i>${r.alamat || '-'}</div>
                </div>
              </div>
            </td>
            <td>
            <div class="contact-item"><i class="fas fa-envelope text-muted"></i><span class="small">${r.email || '-'}</span></div>
            <div class="contact-item"><i class="fas fa-phone text-muted"></i><span class="small">${r.telepon || '-'}</span></div>
            </td>
            <td>
            <div class="d-flex align-items-start">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary me-2"><i class="fas fa-user"></i></div>
              <div class="pt-1">${r.penanggung_jawab || '-'}</div>
              </div>
            </td>
            <td>
            <span class="badge badge-pill ${r.status === 'aktif' ? 'bg-success' : (r.status === 'pending' ? 'bg-warning text-dark' : 'bg-secondary')}">${r.status || '-'}</span>
            </td>
            <td>
            <span class="badge badge-pill bg-info text-dark">${r.jumlah_siswa || 0}</span>
            </td>
          <td>
            <span class="badge badge-pill bg-success">${r.kuota || 0}</span>
            <small class="text-muted ms-1">max</small>
          </td>
          <td class="text-center">
            <div class="btn-group btn-group-sm" role="group">
              <button class="btn btn-outline-success" onclick='openEdit(${JSON.stringify(r)})'><i class="fas fa-edit me-1"></i>Edit</button>
              <button class="btn btn-outline-danger" onclick="deleteDudi(${r.id})"><i class="fas fa-trash me-1"></i>Hapus</button>
            </div>
          </td>`;
        tbody.appendChild(tr);
      });
        
        // Load DUDI statistics
        loadDudiStats();
      } catch (error) {
        console.error('Error loading DUDI:', error);
        document.getElementById('rows').innerHTML = '<tr><td colspan="6" class="text-center text-danger py-3">Gagal memuat data DUDI</td></tr>';
      }
    }
    
    async function loadDudiStats() {
      try {
        // Validate token before loading stats
        const isValidToken = await validateToken();
        if (!isValidToken) {
          console.log('Token invalid, skipping stats load');
          return;
        }

        console.log('Loading DUDI stats...');
        const res = await fetch('/api/admin/stats', { headers: hdr() });
        console.log('Stats response status:', res.status);
        const data = await res.json();
        console.log('Stats data:', data);
        
        // Update DUDI statistics cards
        document.getElementById('dudi-total').textContent = data.total_dudi || 0;
        document.getElementById('dudi-aktif-count').textContent = data.dudi_aktif || 0;
        document.getElementById('dudi-tidak-aktif-count').textContent = data.dudi_tidak_aktif || 0;
        document.getElementById('dudi-siswa-magang').textContent = data.magang_aktif || 0;
        console.log('DUDI stats updated successfully');
      } catch (error) {
        console.error('Error loading DUDI stats:', error);
        // Set default values on error
        document.getElementById('dudi-total').textContent = '0';
        document.getElementById('dudi-aktif-count').textContent = '0';
        document.getElementById('dudi-tidak-aktif-count').textContent = '0';
        document.getElementById('dudi-siswa-magang').textContent = '0';
      }
    }
    function openCreate() { document.getElementById('modalTitle').innerText = 'Tambah DUDI'; setForm({}); }
    function openEdit(r) { document.getElementById('modalTitle').innerText = 'Edit DUDI'; setForm(r); new bootstrap.Modal(document.getElementById('modalDudi')).show(); }
    function setForm(r) {
      // Clear error message
      clearFormError();
      
      // Set form values
      ['id', 'nama_perusahaan', 'alamat', 'telepon', 'email', 'penanggung_jawab', 'status', 'kuota'].forEach(k => {
        const el = document.getElementById(k);
        if (el) el.value = r?.[k] || '';
      });

      if (!document.getElementById('status').value) document.getElementById('status').value = 'aktif';
    }
    async function saveDudi(e) {
      e.preventDefault(); 
      
      // Clear any previous error messages
      clearFormError();
      
      const id = document.getElementById('id').value;
      
      // Get form values
      const nama_perusahaan = val('nama_perusahaan').trim();
      const alamat = val('alamat').trim();
      const telepon = val('telepon').trim();
      const email = val('email').trim();
      const penanggung_jawab = val('penanggung_jawab').trim();
      const status = val('status');
      const kuota = val('kuota');
      
      // Basic validation
      if (!nama_perusahaan) {
        showFormError('Nama perusahaan harus diisi');
        return;
      }
      if (!alamat) {
        showFormError('Alamat harus diisi');
        return;
      }
      if (!status) {
        showFormError('Status harus dipilih');
        return;
      }
      
      const payload = {
        nama_perusahaan, 
        alamat, 
        telepon, 
        email, 
        penanggung_jawab, 
        status,
        kuota
      };
      
      console.log('Sending payload:', payload);
      
      const url = id ? '/api/admin/dudi/' + id : '/api/admin/dudi';
      const method = id ? 'PUT' : 'POST';
      
      try {
        const res = await fetch(url, { method, headers: hdr(), body: JSON.stringify(payload) });
        
        console.log('Response status:', res.status);
        
        let data;
        try {
          data = await res.json();
          console.log('Response data:', data);
        } catch (jsonError) {
          console.error('JSON parse error:', jsonError);
          showFormError('Terjadi kesalahan saat memproses response server');
          return;
        }
        
        if (!res.ok) {
          showFormError(data.message || (data.errors ? Object.values(data.errors).join(', ') : 'Gagal menyimpan data DUDI'));
          return; 
        }
        
        // Success
        bootstrap.Modal.getInstance(document.getElementById('modalDudi')).hide(); 
        showNotification(data.message || (id ? 'Data DUDI berhasil diperbarui' : 'Data DUDI berhasil ditambahkan'), 'success');
        loadDudi();
        loadDashboard(); // Refresh stats
      } catch (error) {
        showFormError('Terjadi kesalahan saat menyimpan data');
        console.error('Error:', error);
      }
    }
    
    function showFormError(message) {
      const msgEl = document.getElementById('formMsg');
      if (msgEl) {
        msgEl.textContent = message;
        msgEl.classList.remove('d-none');
      }
    }
    
    function clearFormError() {
      const msgEl = document.getElementById('formMsg');
      if (msgEl) {
        msgEl.textContent = '';
        msgEl.classList.add('d-none');
      }
    }
    
    function showNotification(message, type = 'success') {
      // Create notification element
      const notification = document.createElement('div');
      notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
      notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
      notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      `;
      
      document.body.appendChild(notification);
      
      // Auto remove after 5 seconds
      setTimeout(() => {
        if (notification.parentNode) {
          notification.parentNode.removeChild(notification);
        }
      }, 5000);
    }
    function val(id) { return document.getElementById(id).value }
    async function deleteDudi(id) {
      if (!confirm('Apakah Anda yakin ingin menghapus DUDI ini? Data akan dihapus secara permanen.')) return;

      try {
        const res = await fetch('/api/admin/dudi/' + id, { method: 'DELETE', headers: hdr() });
        const data = await res.json();
        
        if (!res.ok) {
          showNotification(data.message || 'Gagal menghapus data DUDI', 'error');
          return;
        } 
        
        showNotification(data.message || 'Data DUDI berhasil dihapus', 'success');
        loadDudi();
        loadDudiStats(); // Refresh stats
      } catch (error) {
        showNotification('Terjadi kesalahan saat menghapus data', 'error');
        console.error('Error:', error);
      }
    }
    document.addEventListener('DOMContentLoaded', () => { requireAuth(); loadDudi(); });
    // Ensure backdrops are always cleaned when modals close
    document.addEventListener('DOMContentLoaded', () => {
      ['modalUser', 'mConfirmDelete'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('hidden.bs.modal', () => {
          document.body.classList.remove('modal-open');
          document.querySelectorAll('.modal-backdrop').forEach(n => n.parentNode && n.parentNode.removeChild(n));
        });
      });
    });
    async function loadUsers() {
      const q = document.getElementById('uq').value.trim();
      const role = document.getElementById('roleFilter')?.value || '';
      const params = new URLSearchParams();
      if (q) params.set('q', q);
      if (role) params.set('role', role);
      try {
        const url = '/api/admin/users' + (params.toString() ? ('?' + params.toString()) : '');
        const res = await fetch(url, { headers: hdr() });
        const tb = document.getElementById('urows');
        tb.innerHTML = '';
        let data;
        try { data = await res.json(); } catch (e) { data = null; }

        // Debug: Log data yang diterima
        console.log('Users data received:', data);
        console.log('Number of users:', data ? data.length : 0);

        if (!res.ok) {
          tb.innerHTML = '<tr><td colspan="5" class="text-center text-danger py-3">Gagal memuat data pengguna</td></tr>';
          return;
        }
        if (!Array.isArray(data) || data.length === 0) {
          tb.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data pengguna</td></tr>';
          return;
        }
        data.forEach((r) => {
          const tr = document.createElement('tr');
          const created = r.created_at ? new Date(r.created_at).toLocaleDateString('id-ID') : '-';
          const verified = r.email_verified_at
            ? '<span class="badge badge-pill bg-success"><i class="fas fa-check me-1"></i>Terverifikasi</span>'
            : '<span class="badge badge-pill bg-secondary"><i class="fas fa-clock me-1"></i>Belum</span>';
          tr.innerHTML = `
            <td>
              <div class="fw-semibold"><i class="fas fa-user text-success me-2"></i>${r.name || '-'}</div>
              <div class="small text-muted">ID: ${r.id}</div>
            </td>
            <td>
              <div class="d-flex align-items-center"><i class="fas fa-envelope text-muted me-2"></i><span>${r.email || '-'}</span></div>
              <div class="small mt-1">${verified}</div>
            </td>
            <td>
              <span class="badge-role ${r.role === 'admin' ? 'bg-primary' : (r.role === 'guru' ? 'bg-info text-dark' : 'bg-warning text-dark')}">
                <i class="fas ${r.role === 'admin' ? 'fa-shield-halved' : (r.role === 'guru' ? 'fa-chalkboard-teacher' : 'fa-user-graduate')} me-1"></i>${r.role || '-'}
              </span>
            </td>
            <td>${created}</td>
            <td class="text-center">
              <div class="btn-group btn-group-sm" role="group">
                <button class="btn btn-modern btn-outline-primary" onclick='openUserEdit(${JSON.stringify(r)})'><i class="fas fa-pen"></i>Edit</button>
                <button class="btn btn-modern btn-outline-danger" onclick="deleteUser(${r.id})"><i class="fas fa-trash"></i>Hapus</button>
              </div>
            </td>`;
          tb.appendChild(tr);
        });
      } catch (error) {
        const tb = document.getElementById('urows');
        tb.innerHTML = '<tr><td colspan="5" class="text-center text-danger py-3">Terjadi kesalahan</td></tr>';
        console.error('Error loading users:', error);
      }
    }
    function openUserCreate() {
      document.getElementById('uTitle').innerText = 'Tambah User Baru';
      setUserForm({}); 
      // show password fields and set required
      const pw = document.getElementById('pwdWrap'); const cpw = document.getElementById('cpwdWrap');
      if (pw) pw.style.display = 'block'; if (cpw) cpw.style.display = 'block';
      const ip = document.getElementById('upassword'); const ic = document.getElementById('uconfirm');
      if (ip) { ip.required = true; ip.value = ''; }
      if (ic) { ic.required = true; ic.value = ''; }
      document.getElementById('uverified').value = '0';
      // Reset role fields
      document.getElementById('urole').value = '';
      toggleRoleFields();
      new bootstrap.Modal(document.getElementById('modalUser')).show();
    }
    function openUserEdit(r) {
      document.getElementById('uTitle').innerText = 'Edit User';
      setUserForm(r); 
      // hide password fields and remove required to allow submit
      const pw = document.getElementById('pwdWrap'); const cpw = document.getElementById('cpwdWrap');
      if (pw) pw.style.display = 'none'; if (cpw) cpw.style.display = 'none';
      const ip = document.getElementById('upassword'); const ic = document.getElementById('uconfirm');
      if (ip) { ip.required = false; ip.value = ''; }
      if (ic) { ic.required = false; ic.value = ''; }
      document.getElementById('uverified').value = r.email_verified_at ? '1' : '0'; 
      new bootstrap.Modal(document.getElementById('modalUser')).show(); 
    }
    function setUserForm(r) {
      // Clear error message
      const msgEl = document.getElementById('uMsg');
      if (msgEl) {
        msgEl.textContent = '';
        msgEl.classList.add('d-none');
      }
      
      // Set form values
      ['uid', 'uname', 'uemail', 'urole'].forEach((id, idx) => {
        const el = document.getElementById(id);
        const map = { uid: 'id', uname: 'name', uemail: 'email', urole: 'role' };
        el.value = r?.[map[id]] || '';
      });
      const pwd = document.getElementById('upassword'); if (pwd) pwd.value = '';
      const cpw = document.getElementById('uconfirm'); if (cpw) cpw.value = '';

      // Set role-specific data if editing
      if (r && r.role === 'siswa') {
        document.getElementById('unis').value = r.nis || '';
        document.getElementById('ukelas').value = r.kelas || '';
        document.getElementById('ujurusan').value = r.jurusan || '';
        document.getElementById('utelepon').value = r.telepon || '';
        document.getElementById('ualamat').value = r.alamat || '';
      } else if (r && r.role === 'guru') {
        document.getElementById('unip').value = r.nip || '';
        document.getElementById('uguru_telepon').value = r.telepon || '';
        document.getElementById('uguru_alamat').value = r.alamat || '';
      }

      // Toggle role fields based on selected role
      toggleRoleFields();
    }

    // Function to toggle role-specific fields
    function toggleRoleFields() {
      const role = document.getElementById('urole').value;
      const roleSpecificFields = document.getElementById('roleSpecificFields');
      const roleFields = document.querySelectorAll('.role-fields');

      // Hide all role-specific fields first
      roleFields.forEach(field => {
        field.style.display = 'none';
      });

      // Clear all role-specific input values
      const roleInputs = [
        'unis', 'ukelas', 'ujurusan', 'utelepon', 'ualamat',
        'unip', 'uguru_telepon', 'uguru_alamat'
      ];
      roleInputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) input.value = '';
      });

      if (role) {
        roleSpecificFields.style.display = 'block';

        switch (role) {
          case 'siswa':
            document.getElementById('siswaFields').style.display = 'block';
            // Set required fields for siswa
            document.getElementById('unis').required = true;
            break;
          case 'guru':
            document.getElementById('guruFields').style.display = 'block';
            // Set required fields for guru
            document.getElementById('unip').required = true;
            break;
          case 'admin':
            document.getElementById('adminFields').style.display = 'block';
            break;
        }
      } else {
        roleSpecificFields.style.display = 'none';
      }
    }

    function saveUserDirect() {
      console.log('saveUserDirect function called');
      saveUser({ preventDefault: function () { } });
    }

    async function saveUser(e) {
      if (e && e.preventDefault) e.preventDefault();
      console.log('saveUser function called');
      
      // Clear any previous error messages
      const msgEl = document.getElementById('uMsg');
      if (msgEl) {
        msgEl.textContent = '';
        msgEl.classList.add('d-none');
      }
      
      const id = document.getElementById('uid').value;
      const role = val('urole');
      console.log('Form data - id:', id, 'role:', role);

      const payload = {
        name: val('uname'),
        email: val('uemail'),
        role: role
      };
      console.log('Basic payload:', payload);

      // Validate required basic fields
      if (!payload.name) {
        if (msgEl) { msgEl.textContent = 'Nama harus diisi'; msgEl.classList.remove('d-none'); }
        return;
      }
      if (!payload.email) {
        if (msgEl) { msgEl.textContent = 'Email harus diisi'; msgEl.classList.remove('d-none'); }
        return;
      }
      if (!payload.role) {
        if (msgEl) { msgEl.textContent = 'Role harus dipilih'; msgEl.classList.remove('d-none'); }
        return;
      }

      // Add password for new users
      if (!id) {
        payload.password = val('upassword');
      }

      // Add role-specific data
      if (role === 'siswa') {
        payload.nis = val('unis');
        payload.kelas = val('ukelas');
        payload.jurusan = val('ujurusan');
        payload.telepon = val('utelepon');
        payload.alamat = val('ualamat');

        // Validate required fields for siswa
        if (!payload.nis) {
          if (msgEl) { msgEl.textContent = 'NIS harus diisi'; msgEl.classList.remove('d-none'); }
          return;
        }
      } else if (role === 'guru') {
        payload.nip = val('unip');
        payload.telepon = val('uguru_telepon');
        payload.alamat = val('uguru_alamat');

        // Validate required fields for guru
        if (!payload.nip) {
          if (msgEl) { msgEl.textContent = 'NIP harus diisi'; msgEl.classList.remove('d-none'); }
          return;
        }

        // Debug logging for guru fields
        console.log('Guru fields debug:', {
          nip: payload.nip,
          telepon: payload.telepon,
          alamat: payload.alamat,
          nipElement: document.getElementById('unip')?.value,
          teleponElement: document.getElementById('uguru_telepon')?.value,
          alamatElement: document.getElementById('uguru_alamat')?.value
        });
      }

      if (!id) {
        const p = val('upassword'); const c = val('uconfirm');
        if (!p || p.length < 6) { if (msgEl) { msgEl.textContent = 'Password minimal 6 karakter'; msgEl.classList.remove('d-none'); } return; }
        if (p !== c) { if (msgEl) { msgEl.textContent = 'Konfirmasi password tidak sama'; msgEl.classList.remove('d-none'); } return; }
        payload.password = p;
      }

      // email verification flag (optional)
      const ver = document.getElementById('uverified')?.value;
      if (ver === '1') { payload.email_verified_at = new Date().toISOString().slice(0, 19).replace('T', ' '); }

      // Debug: Log final payload
      console.log('Final payload being sent:', payload);

      const url = id ? '/api/admin/users/' + id : '/api/admin/users';
      const method = id ? 'PUT' : 'POST';

      try {
        const res = await fetch(url, { method, headers: hdr(), body: JSON.stringify(payload) });
        const data = await res.json();
        
        if (!res.ok) {
          if (msgEl) {
            msgEl.textContent = data.message || 'Gagal menyimpan data user';
            msgEl.classList.remove('d-none');
          }
          return;
        } 
        
        // close modal safely
        const modalEl = document.getElementById('modalUser');
        let inst = bootstrap.Modal.getInstance(modalEl);
        if (!inst) { inst = new bootstrap.Modal(modalEl); }
        inst.hide();
        // cleanup in case backdrop sticks
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop').forEach(el => el.parentNode && el.parentNode.removeChild(el));
        showNotification(data.message || (id ? 'Data user berhasil diperbarui' : 'Data user berhasil ditambahkan'), 'success');
        loadUsers(); 
      } catch (error) {
        if (msgEl) {
          msgEl.textContent = 'Terjadi kesalahan saat menyimpan data';
          msgEl.classList.remove('d-none');
        }
        console.error('Error:', error);
      }
    }
    // Confirm delete user (custom modal)
    function deleteUser(id) {
      const input = document.getElementById('confirmDeleteId');
      if (input) { input.value = id; }
      new bootstrap.Modal(document.getElementById('mConfirmDelete')).show();
    }
    async function confirmDeleteUser() {
      const id = document.getElementById('confirmDeleteId').value;
      if (!id) return;
      try {
        const res = await fetch('/api/admin/users/' + id, { method: 'DELETE', headers: hdr() });
        const data = await res.json();
        if (!res.ok) {
          showNotification(data.message || 'Gagal menghapus data user', 'error');
          return;
        }
        // close modal
        const modalEl = document.getElementById('mConfirmDelete');
        let inst = bootstrap.Modal.getInstance(modalEl); if (!inst) { inst = new bootstrap.Modal(modalEl); }
        inst.hide();
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop').forEach(el => el.parentNode && el.parentNode.removeChild(el));
        showNotification(data.message || 'Data user berhasil dihapus', 'success');
        loadUsers(); 
      } catch (error) {
        showNotification('Terjadi kesalahan saat menghapus data', 'error');
        console.error('Error:', error);
      }
    }
    // Add event listeners for tabs if they exist
    const usersTab = document.getElementById('users-tab');
    if (usersTab) {
      usersTab.addEventListener('shown.bs.tab', loadUsers);
    }
    
    const settingsTab = document.getElementById('settings-tab');
    if (settingsTab) {
      settingsTab.addEventListener('shown.bs.tab', loadSettings);
    }
    async function loadSettings() {
      const res = await fetch('/api/admin/settings', { headers: hdr() });
      if (!res.ok) return;
      const s = await res.json();
      document.getElementById('s_nama').value = s.nama_sekolah || 'SMK Negeri 1 Surabaya';
      document.getElementById('s_web').value = s.website || 'www.smkn1surabaya.sch.id';
      document.getElementById('s_alamat').value = s.alamat || 'Jl. SMEA No.4, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60252';
      document.getElementById('s_telp').value = s.telepon || '031-5678910';
      document.getElementById('s_email').value = s.email || 'info@smkn1surabaya.sch.id';
      document.getElementById('s_kepala').value = s.kepala_sekolah || 'Drs. H. Sutrisno, M.Pd.';
      document.getElementById('s_npsn').value = s.npsn || '20567890';
      
      // Load logo if exists (from server or localStorage)
      if (s.logo_url) {
        loadExistingLogo(s.logo_url);
      } else {
        // Check localStorage for uploaded logo
        const savedLogoUrl = localStorage.getItem('simmas_logo_url');
        if (savedLogoUrl) {
          loadExistingLogo(savedLogoUrl);
        }
      }
      
      // Update last updated
      const now = new Date();
      document.getElementById('lastUpdated').textContent = now.toLocaleDateString('id-ID') + ' pukul ' + now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
      
      // Update preview
      updatePreview();
    }
    async function saveSettings(e) {
      e.preventDefault();
      
      const payload = {
        nama_sekolah: val('s_nama'),
        website: val('s_web'),
        alamat: val('s_alamat'),
        telepon: val('s_telp'),
        email: val('s_email'),
        kepala_sekolah: val('s_kepala'),
        npsn: val('s_npsn')
      };
      
      try {
        const res = await fetch('/api/admin/settings', {
          method: 'PUT',
          headers: hdr(),
          body: JSON.stringify(payload)
        });
        
        const data = await res.json();
        
        if (!res.ok) {
          showNotification(data.message || 'Gagal menyimpan pengaturan', 'error');
          return;
        }
        
        showNotification(data.message || 'Pengaturan berhasil disimpan', 'success');
        
        // Update last updated time
        document.getElementById('lastUpdated').textContent = new Date().toLocaleString('id-ID');
        
      } catch (error) {
        showNotification('Terjadi kesalahan saat menyimpan pengaturan', 'error');
        console.error('Error:', error);
      }
    }
  </script>
  
  <script>
    // Navigation functions
    function showDashboard() {
      hideAllContent();
      const mainContent = document.querySelector('.main-content');
      if (mainContent) {
        mainContent.style.display = 'block';
      }
      updateActiveNav('dashboard');
      loadDashboard();
    }
    
    function showDudi() {
      hideAllContent();
      const dudiContent = document.getElementById('dudi-content');
      if (dudiContent) {
        dudiContent.style.display = 'block';
      }
      updateActiveNav('dudi');
      debugToken(); // Debug token
      loadDudi();
    }
    
    function showUsers() {
      hideAllContent();
      const usersContent = document.getElementById('users-content');
      if (usersContent) {
        usersContent.style.display = 'block';
      }
      updateActiveNav('users');
      loadUsers();
    }
    
    function showSettings() {
      hideAllContent();
      const settingsContent = document.getElementById('settings-content');
      if (settingsContent) {
        settingsContent.style.display = 'block';
      }
      updateActiveNav('settings');
      loadSettings();
    }
    
    function hideAllContent() {
      // Hide main content
      const mainContent = document.querySelector('.main-content');
      if (mainContent) {
        mainContent.style.display = 'none';
      }
      
      // Hide all content sections
      const sections = ['dudi-content', 'users-content', 'settings-content'];
      sections.forEach(sectionId => {
        const section = document.getElementById(sectionId);
        if (section) {
          section.style.display = 'none';
        }
      });
    }
    
    function updateActiveNav(active) {
      document.querySelectorAll('.sidebar .nav-link').forEach(link => {
        link.classList.remove('active');
      });
      
      // Find and activate the correct nav link
      const activeLink = document.querySelector(`.sidebar .nav-link[onclick*="${active}"]`);
      if (activeLink) {
        activeLink.classList.add('active');
      }
    }
    
    // Handle menu click from sidebar
    function handleMenuClick(menuName) {
      console.log('Menu clicked:', menuName);
      
      switch (menuName.toLowerCase()) {
        case 'sec-dashboard':
        case 'dashboard':
          showDashboard();
          break;
        case 'sec-dudi':
        case 'dudi':
          showDudi();
          break;
        case 'sec-users':
        case 'users':
        case 'pengguna':
          showUsers();
          break;
        case 'sec-settings':
        case 'settings':
        case 'pengaturan':
          showSettings();
          break;
        default:
          console.log('Unknown menu:', menuName);
          showDashboard();
      }
    }
    
    // Load dashboard data
    async function loadDashboard() {
      try {
        console.log('Loading dashboard data...');
        const { t } = requireAuth();
        console.log('Token:', t ? 'exists' : 'missing');
        
        const res = await fetch('/api/admin/stats', { headers: { Authorization: 'Bearer ' + t } });
        console.log('API response status:', res.status);
        
        let data;
        if (!res.ok) {
          console.log('API failed, using fallback data');
          // Fallback data for admin dashboard
          data = {
            total_siswa: 1,
            total_dudi: 3,
            magang_aktif: 1,
            logbook_hari_ini: 0,
            magang_terbaru: [
              {
                siswa_name: 'Ahmad Rizki',
                nama_perusahaan: 'PT Kreatif Teknologi',
                tanggal_mulai: '2024-01-15',
                tanggal_selesai: '2024-04-15',
                status: 'berlangsung'
              }
            ],
            dudi_aktif_list: [
              {
                nama_perusahaan: 'PT Kreatif Teknologi',
                alamat: 'Jl. Merdeka No. 123, Jakarta',
                telepon: '021-12345678',
                jumlah_siswa: 1
              },
              {
                nama_perusahaan: 'CV Digital Solusi',
                alamat: 'Jl. Sudirman No. 45, Surabaya',
                telepon: '031-87654321',
                jumlah_siswa: 0
              },
              {
                nama_perusahaan: 'PT Pusat Madiun',
                alamat: 'Madiun',
                telepon: '089634567829',
                jumlah_siswa: 2
              }
            ],
            logbook_terbaru: []
          };
        } else {
          data = await res.json();
          console.log('API response data:', data);
        }
        
        // Update stat cards
        document.getElementById('total-siswa').textContent = data.total_siswa || '-';
        document.getElementById('total-dudi').textContent = data.total_dudi || '-';
        document.getElementById('siswa-magang').textContent = data.magang_aktif || '-';
        document.getElementById('logbook-hari-ini').textContent = data.logbook_hari_ini || '-';
        
        console.log('Stats updated:', {
          total_siswa: data.total_siswa,
          total_dudi: data.total_dudi,
          magang_aktif: data.magang_aktif,
          logbook_hari_ini: data.logbook_hari_ini
        });
        
        // Update magang terbaru list
        const magangList = document.getElementById('magang-terbaru-list');
        if (data.magang_terbaru && data.magang_terbaru.length > 0) {
          magangList.innerHTML = data.magang_terbaru.map(m => {
            const startDate = m.tanggal_mulai ? new Date(m.tanggal_mulai).toLocaleDateString('id-ID') : '-';
            const endDate = m.tanggal_selesai ? new Date(m.tanggal_selesai).toLocaleDateString('id-ID') : '-';
            const period = `${startDate} - ${endDate}`;
            
            return `
              <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <div>
                  <div class="fw-semibold">${m.siswa_name || '-'}</div>
                  <div class="small text-muted">${m.nama_perusahaan || '-'}</div>
                  <div class="small text-muted">${period}</div>
                </div>
                <span class="badge ${m.status === 'aktif' || m.status === 'berlangsung' ? 'bg-success' : (m.status === 'pending' ? 'bg-warning text-dark' : 'bg-secondary')}">${m.status || '-'}</span>
              </div>
            `;
          }).join('');
        } else {
          magangList.innerHTML = '<div class="text-muted text-center py-3">Tidak ada data</div>';
        }
        
        // Update DUDI aktif list
        const dudiList = document.getElementById('dudi-aktif-list');
        if (data.dudi_aktif_list && data.dudi_aktif_list.length > 0) {
          dudiList.innerHTML = data.dudi_aktif_list.map(d => `
            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
              <div class="flex-grow-1">
                <div class="fw-semibold">${d.nama_perusahaan || '-'}</div>
                <div class="small text-muted">${d.alamat || '-'}</div>
                <div class="small text-muted">${d.telepon || '-'}</div>
              </div>
              <span class="badge bg-primary">${d.jumlah_siswa || 0} siswa</span>
            </div>
          `).join('');
        } else {
          dudiList.innerHTML = '<div class="text-muted text-center py-3">Tidak ada data</div>';
        }
        
        // Update logbook terbaru list
        const logbookList = document.getElementById('logbook-terbaru-list');
        if (data.logbook_terbaru && data.logbook_terbaru.length > 0) {
          logbookList.innerHTML = data.logbook_terbaru.map(l => {
            const formattedDate = l.tanggal ? new Date(l.tanggal).toLocaleDateString('id-ID') : '-';
            
            return `
              <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <div class="flex-grow-1 me-2">
                  <div class="fw-semibold text-truncate" style="max-width: 200px;" title="${l.kegiatan || '-'}">${l.kegiatan || '-'}</div>
                  <div class="small text-muted">${formattedDate}</div>
                  <div class="small text-muted text-truncate" style="max-width: 200px;" title="${l.kendala || '-'}">${l.kendala || '-'}</div>
                </div>
                <span class="badge ${l.status_verifikasi === 'disetujui' ? 'bg-success' : (l.status_verifikasi === 'pending' ? 'bg-warning text-dark' : 'bg-danger')}">${l.status_verifikasi || '-'}</span>
              </div>
            `;
          }).join('');
        } else {
          logbookList.innerHTML = '<div class="text-muted text-center py-3">Tidak ada data</div>';
        }
      } catch (error) {
        console.error('Error loading dashboard:', error);
        // Set default values on error
        document.getElementById('total-siswa').textContent = '1';
        document.getElementById('total-dudi').textContent = '3';
        document.getElementById('siswa-magang').textContent = '1';
        document.getElementById('logbook-hari-ini').textContent = '0';
      }
    }
    
    // Update current date
    function updateCurrentDate() {
      const now = new Date();
      const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
      };
      document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
    }
    
    // Load user info and update greeting
    async function loadUserInfo() {
      try {
        const { t } = requireAuth();
        const res = await fetch('/api/auth/me', { headers: { Authorization: 'Bearer ' + t } });
        const data = await res.json();
        document.getElementById('greet').textContent = 'Halo, ' + (data.user?.name || 'Admin') + ' (Admin)';
      } catch (error) {
        console.error('Error loading user info:', error);
      }
    }
    
    // Add event listeners for real-time preview
    document.addEventListener('DOMContentLoaded', function () {
      const settingsInputs = ['s_nama', 's_alamat', 's_telp', 's_email', 's_web', 's_kepala', 's_npsn'];
      settingsInputs.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
          element.addEventListener('input', updatePreview);
        }
      });
    });
    
    // Load school info from database
    async function loadSchoolInfo() {
      try {
        const res = await fetch('/api/school-info');
        if (res.ok) {
          const data = await res.json();
          if (data.nama_sekolah) {
            // Update school name in navbar
            const schoolEl = document.getElementById('school-name');
            if (schoolEl) schoolEl.textContent = data.nama_sekolah;
            
            // Update school name in sidebar footer only (not the Menu label)
            const sidebarSchoolEl = document.querySelector('.sidebar .mt-auto .text-muted.fw-semibold');
            if (sidebarSchoolEl) sidebarSchoolEl.textContent = data.nama_sekolah;
            
            console.log('School name updated to:', data.nama_sekolah);
          }
        }
      } catch (error) {
        console.error('Error loading school info:', error);
      }
    }

    // Load user info for navbar
    function loadUserInfo() {
      try {
        const userData = JSON.parse(localStorage.getItem('simmas_user') || '{}');
        console.log('Loading user info:', userData);
        
        if (userData.name) {
          // Update navbar user name
          const navbarName = document.getElementById('navbar-user-name');
          const dropdownName = document.getElementById('dropdown-user-name');
          
          if (navbarName) navbarName.textContent = userData.name;
          if (dropdownName) dropdownName.textContent = userData.name;
        }
        
        if (userData.role) {
          // Update navbar user role
          const navbarRole = document.getElementById('navbar-user-role');
          const dropdownRole = document.getElementById('dropdown-user-role');
          
          if (navbarRole) navbarRole.textContent = userData.role;
          if (dropdownRole) dropdownRole.textContent = userData.role;
        }
      } catch (error) {
        console.error('Error loading user info:', error);
      }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', async function () {
      console.log('Admin Dashboard initializing...');
      requireAuth();

      // Validate token on page load
      const isValidToken = await validateToken();
      if (!isValidToken) {
        alert('Sesi Anda telah berakhir. Silakan login ulang.');
        location.href = '/login';
        return;
      }

      updateCurrentDate();
      loadUserInfo();
      loadSchoolInfo();
      
      // Refresh school info every 30 seconds to catch updates
      setInterval(loadSchoolInfo, 30000);
      showDashboard(); // Show dashboard by default
      
      // Debug: Check if elements exist
      console.log('Total siswa element:', document.getElementById('total-siswa'));
      console.log('Total dudi element:', document.getElementById('total-dudi'));
      console.log('Siswa magang element:', document.getElementById('siswa-magang'));
      console.log('Logbook hari ini element:', document.getElementById('logbook-hari-ini'));
    });

    // Additional debugging for form submission
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.querySelector('#modalUser form');
      const submitBtn = document.querySelector('#modalUser button[onclick="saveUserDirect()"]');

      if (form) {
        console.log('Form found:', form);
        form.addEventListener('submit', function (e) {
          console.log('Form submit event triggered');
          e.preventDefault();
          saveUserDirect();
        });

        // Add Enter key listener
        form.addEventListener('keypress', function (e) {
          if (e.key === 'Enter') {
            console.log('Enter key pressed');
            e.preventDefault();
            saveUserDirect();
          }
        });
      }

      if (submitBtn) {
        console.log('Submit button found:', submitBtn);
        submitBtn.addEventListener('click', function (e) {
          console.log('Submit button click event triggered');
          e.preventDefault();
          saveUserDirect();
        });
      }

      // Auto-refresh user list on page load
      console.log('Auto-refreshing user list...');
      setTimeout(() => {
        loadUsers();
      }, 1000);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>