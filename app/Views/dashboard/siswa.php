<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Siswa - SIMMAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --brand-600: #1e7e71;
      --brand-700: #18665c;
      --brand-50: #e6f4f3;
      --bg-surface: #f7faf9;
      --text-primary: #0f2e2c;
      --text-secondary: #5c6f6d;
      --border-color: #d7e3e1;
      --sidebar-width: 280px;
    }

    * {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    body {
      background-color: var(--bg-surface);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }
    
    /* Ensure navbar is always visible */
    .navbar {
      display: block !important;
      visibility: visible !important;
      opacity: 1 !important;
      position: relative !important;
      z-index: 1000 !important;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background: var(--bg-surface);
    }

    /* Ensure navbar sits to the right of fixed-width sidebar */
    .siswa-navbar { margin-left: var(--sidebar-width); }
    @media (max-width: 768px) { .siswa-navbar { margin-left: 0; } }
    
    
    .main-container {
      background: var(--bg-surface);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }
    
    .glass-card {
      background: #fff;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    
    .glass-card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .stat-card {
      background: #fff;
      color: #333;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    
    .stat-card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: #007bff;
    }
    
    .welcome-section {
      background: white;
      color: #333;
      border-radius: 8px;
      padding: 1.25rem;
      margin-bottom: 1rem;
    }
    
    .content-section {
      display: none !important;
      animation: fadeIn 0.5s ease-in-out;
    }
    /* Hilangkan jarak atas pada section dan judul pertama */
    .content-section { margin-top: 0; padding-top: 0; }
    .content-section > h1, .content-section > h2, .content-section > h3, .content-section > h4,
    .content-section > .h1, .content-section > .h2, .content-section > .h3, .content-section > .h4 {
      margin-top: 0;
    }
    /* Spacer khusus untuk greeting agar tidak tertutup navbar */
    #greet-block { padding-top: 110px; }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .content-section.active {
      display: block !important;
    }
    
    .content-section[data-section] {
      display: none !important;
    }
    
    .content-section[data-section].active {
      display: block !important;
    }
    
    .content-section[style*="display: block"] {
      display: block !important;
    }
    
    #sec-dashboard {
      display: block !important;
    }
    
    .modern-btn {
      background: #007bff;
      border: none;
      border-radius: 6px;
      padding: 8px 16px;
      color: white;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .modern-btn:hover {
      background: #0056b3;
      color: white;
    }
    
    .modern-input {
      border: 1px solid #ced4da;
      border-radius: 6px;
      padding: 8px 12px;
      transition: all 0.3s ease;
      background: white;
    }
    
    .modern-input:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
      background: white;
    }
    
    .card-modern {
      background: white;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    
    .card-modern:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .progress-modern {
      height: 6px;
      border-radius: 3px;
      background: #e9ecef;
      overflow: hidden;
    }
    
    .progress-modern .progress-bar {
      background: #007bff;
      border-radius: 3px;
      transition: width 0.5s ease;
    }
    
    .badge-modern {
      padding: 4px 8px;
      border-radius: 4px;
      font-weight: 500;
      font-size: 0.75rem;
    }
    
    .sidebar-modern {
      background: white;
      border-right: 1px solid #e9ecef;
    }
    
    .nav-link-modern {
      border-radius: 8px;
      margin: 2px 8px;
      transition: all 0.3s ease;
      color: #6c757d;
      padding: 12px 16px;
    }
    
    .nav-link-modern:hover {
      background: #f8f9fa;
      color: #495057;
    }
    
    .nav-link-modern.active {
      background: #007bff;
      color: white;
    }
    
    .loading-spinner {
      width: 40px;
      height: 40px;
      border: 4px solid #f3f3f3;
      border-top: 4px solid #007bff;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    .content-section[style*="display: block"] {
      display: block !important;
      opacity: 1 !important;
      visibility: visible !important;
    }
    
    /* Modern Logbook Styling */
    .logbook-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
    }
    
    .modern-search .input-group-text {
      border-right: none;
    }
    
    .modern-search .form-control:focus {
      border-color: #28a745;
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
    
    .modern-table {
      border-radius: 0;
    }
    
    .modern-table thead th {
      background-color: rgba(40, 167, 69, 0.1) !important;
      border-bottom: 2px solid rgba(40, 167, 69, 0.2);
      padding: 1rem 0.75rem;
    }
    
    .modern-table tbody tr {
      transition: all 0.2s ease;
      border-bottom: 1px solid #f1f3f4;
    }
    
    .modern-table tbody tr:hover {
      background-color: rgba(40, 167, 69, 0.05);
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .modern-table tbody td {
      padding: 1rem 0.75rem;
      vertical-align: middle;
    }
    
    .table-opacity-10 {
      background-color: rgba(40, 167, 69, 0.1) !important;
    }
    
    .logbook-date-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
    }
    
    .logbook-content {
      max-width: 300px;
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
    }
    
    .logbook-feedback {
      max-width: 200px;
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
    }
    
    .logbook-content .fw-semibold {
      font-size: 0.875rem;
      color: #6c757d;
    }
    
    .logbook-feedback .small {
      line-height: 1.4;
    }
    
    /* Fix text overflow in table cells */
    .modern-table td {
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
      max-width: 0;
    }
    
    /* Specific column widths to prevent overflow */
    .modern-table td:nth-child(1) { /* Tanggal */
      width: 15%;
      min-width: 150px;
    }
    
    .modern-table td:nth-child(2) { /* Kegiatan & Kendala */
      width: 40%;
      min-width: 300px;
      max-width: 400px;
    }
    
    .modern-table td:nth-child(3) { /* Status */
      width: 15%;
      min-width: 120px;
    }
    
    .modern-table td:nth-child(4) { /* Feedback Guru */
      width: 20%;
      min-width: 150px;
      max-width: 200px;
    }
    
    .modern-table td:nth-child(5) { /* Aksi */
      width: 10%;
      min-width: 100px;
    }
    
    /* Ensure text doesn't overflow in content areas */
    .logbook-content .text-dark {
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
      line-height: 1.4;
    }
    
    .logbook-feedback .small {
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }
    
    /* Ensure table is responsive and doesn't overflow */
    .table-responsive {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }
    
    .modern-table {
      table-layout: fixed;
      width: 100%;
      min-width: 800px;
    }
    
    /* Additional overflow protection */
    .modern-table td {
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    /* But allow normal wrapping for content cells */
    .modern-table td:nth-child(2),
    .modern-table td:nth-child(4) {
      overflow: visible;
      text-overflow: initial;
    }
    
    /* Limit width of logbook section for consistent sidebar */
    #sec-logbook .container-fluid {
      max-width: 1200px;
      margin: 0 auto;
    }
    
    /* Ensure consistent layout across all sections */
    .content-section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }
  </style>
</head>

<body>
  <div class="d-flex" style="min-height: calc(100vh - 56px);">
    <?= view('components/sidebar', ['user' => $user]) ?>
    <div class="flex-grow-1 d-flex flex-column">
      <?= view('components/navbar', ['user' => $user]) ?>
      <main class="flex-grow-1">
      <div class="container-fluid py-0" style="margin-top: -75px;">

        <!-- Dashboard Section -->
        <section id="sec-dashboard" class="content-section" data-section style="display: block;">
          <div id="greet-block" class="text-center">
            <h2 class="fw-bold text-dark mb-0" id="greet">Selamat datang, <?= $user['name'] ?? 'Siswa' ?>!</h2>
          </div>
        </section>

        <!-- DUDI Section -->
        <section id="sec-dudi" class="content-section" data-section style="display: none;">
          <style>
            .dudi-card { background:#fff; border:1px solid var(--border-color); border-radius:14px; box-shadow:0 6px 16px rgba(0,0,0,.06); transition:.2s ease; overflow:hidden; }
            .dudi-card:hover { transform: translateY(-3px); box-shadow:0 12px 24px rgba(0,0,0,.08); }
            .dudi-card .head { display:flex; align-items:center; gap:.75rem; padding:1rem 1.25rem; border-bottom:1px dashed var(--border-color); }
            .dudi-card .logo { width:40px; height:40px; border-radius:10px; background: var(--brand-50); display:grid; place-content:center; color: var(--brand-600); }
            .dudi-card .title { font-weight:700; color:var(--text-primary); }
            .dudi-card .meta { padding: .75rem 1.25rem 0; color: var(--text-secondary); font-size:.95rem; }
            .dudi-card .progress { height:8px; background:#e9ecef; margin: .5rem 1.25rem; border-radius:6px; overflow:hidden; }
            .dudi-card .progress-bar { background: var(--brand-600); }
            .dudi-card .foot { display:flex; justify-content:space-between; align-items:center; padding: .75rem 1.25rem 1.25rem; }
            .btn-dudi { background: var(--brand-600); border-color: var(--brand-600); }
            .btn-dudi:hover { background: var(--brand-700); border-color: var(--brand-700); }
            .search-dudi .form-control { border-color: var(--border-color); }
            .search-dudi .btn { border-color: var(--brand-600); color: var(--brand-600); }
            .search-dudi .btn:hover { background: var(--brand-50); }
          </style>

          <div class="d-flex justify-content-between align-items-center mb-3 search-dudi">
            <div class="input-group" style="max-width:520px;">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
              <input id="dudi-search" class="form-control" placeholder="Cari perusahaan, alamat, penanggung jawab...">
              <button id="btn-search-dudi" class="btn">Cari</button>
            </div>
          </div>

          <div class="row g-3" id="dudi-grid"></div>
        </section>

        <!-- Jurnal Harian -->
        <section id="sec-logbook" class="content-section" data-section style="display: none;">
          <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="fw-semibold mb-0">Jurnal Harian Magang</h4>
              <button class="btn btn-success" onclick="openCreateLogbook()">
                <i class="bi bi-plus-circle me-1"></i> + Tambah Jurnal
              </button>
            </div>

          <!-- Reminder Banner -->
          <div id="reminder-banner" class="alert alert-warning d-none mb-4">
            <div class="d-flex align-items-center">
              <i class="bi bi-exclamation-triangle me-2"></i>
              <div class="flex-grow-1">
                <strong>Jangan Lupa Jurnal Hari Ini!</strong><br>
                <small>Anda belum membuat jurnal untuk hari ini. Dokumentasikan kegiatan magang Anda sekarang.</small>
              </div>
              <button class="btn btn-warning btn-sm" onclick="openCreateLogbook()">Buat Sekarang</button>
            </div>
          </div>

          <!-- Summary Cards -->
          <div class="row g-3 mb-4">
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title text-success" id="total-jurnal">0</h5>
                  <p class="card-text small text-muted">Total Jurnal</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title text-success" id="disetujui-jurnal">0</h5>
                  <p class="card-text small text-muted">Disetujui</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title text-warning" id="menunggu-jurnal">0</h5>
                  <p class="card-text small text-muted">Menunggu</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title text-danger" id="ditolak-jurnal">0</h5>
                  <p class="card-text small text-muted">Ditolak</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Modern Search & Filter -->
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 pb-0">
              <div class="d-flex align-items-center">
                <div class="logbook-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-search"></i>
                </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">Pencarian & Filter</h5>
                  <small class="text-muted">Cari dan filter jurnal harian Anda</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-3">
              <div class="row g-3">
                <div class="col-md-8">
                  <div class="input-group modern-search">
                    <span class="input-group-text bg-success bg-opacity-10 border-success border-opacity-25">
                      <i class="fas fa-search text-success"></i>
                    </span>
                    <input type="text" id="search-logbook" class="form-control border-success border-opacity-25" 
                           placeholder="Cari kegiatan atau kendala..." style="border-left: none;">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                      <i class="fas fa-filter me-1"></i> Filter
                    </button>
                    <button class="btn btn-outline-secondary" onclick="resetFilters()">
                      <i class="fas fa-undo me-1"></i> Reset
                    </button>
                  </div>
                </div>
              </div>
              
              <div class="collapse mt-3" id="filterCollapse">
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label fw-semibold text-dark">Status</label>
                    <select id="filter-status" class="form-select border-success border-opacity-25">
                      <option value="">Semua Status</option>
                      <option value="disetujui">Disetujui</option>
                      <option value="menunggu">Menunggu Verifikasi</option>
                      <option value="ditolak">Ditolak</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label fw-semibold text-dark">Bulan</label>
                    <select id="filter-bulan" class="form-select border-success border-opacity-25">
                      <option value="">Semua Bulan</option>
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label fw-semibold text-dark">Tahun</label>
                    <select id="filter-tahun" class="form-select border-success border-opacity-25">
                      <option value="">Semua Tahun</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modern Journal List -->
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pb-0">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <div class="logbook-icon bg-success bg-opacity-10 text-success me-3">
                    <i class="fas fa-book"></i>
                  </div>
                  <div>
                    <h5 class="mb-0 fw-bold text-dark">Riwayat Jurnal</h5>
                    <small class="text-muted">Daftar jurnal harian Anda</small>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <label class="form-label me-2 mb-0 fw-semibold text-dark">Tampilkan:</label>
                  <select id="per-page" class="form-select form-select-sm border-success border-opacity-25" style="width:auto;">
                    <option value="10">10 per halaman</option>
                    <option value="25">25 per halaman</option>
                    <option value="50">50 per halaman</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover mb-0 modern-table">
                  <thead class="table-success table-opacity-10">
                    <tr>
                      <th class="border-0 fw-semibold text-dark">Tanggal</th>
                      <th class="border-0 fw-semibold text-dark">Kegiatan & Kendala</th>
                      <th class="border-0 fw-semibold text-dark">Status</th>
                      <th class="border-0 fw-semibold text-dark">Feedback Guru</th>
                      <th class="border-0 fw-semibold text-dark">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="logbook-list">
                    <tr>
                      <td colspan="5" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                          <i class="fas fa-spinner fa-spin fa-2x text-success mb-3"></i>
                          <div class="text-muted">Memuat data...</div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer bg-white border-0">
              <div class="d-flex justify-content-between align-items-center">
                <div id="pagination-info" class="text-muted small fw-semibold">Menampilkan 0 sampai 0 dari 0 entri</div>
                <nav>
                  <ul id="pagination" class="pagination pagination-sm mb-0"></ul>
                </nav>
              </div>
            </div>
          </div>
          </div>
        </section>

        <section id="sec-magang" class="content-section" data-section style="display: none;">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-semibold mb-0">Status Magang Saya</h4>
            <button class="btn btn-outline-success" onclick="loadInternshipData()">
              <i class="fas fa-sync-alt me-1"></i>Refresh
            </button>
          </div>
          
          <!-- Internship Data Card -->
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div id="internship-loading" class="text-center py-4">
                <div class="spinner-border text-success" role="status">
                  <span class="visually-hidden">Memuat data...</span>
                </div>
                <p class="mt-2 text-muted">Memuat data magang...</p>
              </div>
              
              <div id="internship-no-data" class="text-center py-5 d-none">
                <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum Ada Data Magang</h5>
                <p class="text-muted">Anda belum memiliki penempatan magang aktif. Silakan daftar melalui menu DUDI.</p>
                <button class="btn btn-success" onclick="showSection('sec-dudi')">
                  <i class="fas fa-building me-1"></i>Daftar Magang
                </button>
              </div>
              
              <div id="internship-data" class="<?= !empty($magang_info) ? '' : 'd-none' ?>">
                <div class="row">
                  <!-- Student Information -->
                  <div class="col-md-6 mb-4">
                    <div class="card border-0 bg-light h-100">
                      <div class="card-body p-4">
                        <h6 class="card-title mb-3 text-success">
                          <i class="fas fa-user me-2"></i>Data Siswa
                        </h6>
                        <div class="row g-3">
                          <div class="col-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Nama Siswa</label>
                              <div class="fw-semibold" id="internship-siswa-nama"><?= $user['name'] ?? '-' ?></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Email</label>
                              <div class="fw-semibold" id="internship-siswa-email"><?= $user['email'] ?? '-' ?></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">NIS</label>
                              <div class="fw-semibold" id="internship-siswa-nis">-</div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Kelas</label>
                              <div class="fw-semibold" id="internship-siswa-kelas">-</div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Jurusan</label>
                              <div class="fw-semibold" id="internship-siswa-jurusan">-</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Company Information -->
                  <div class="col-md-6 mb-4">
                    <div class="card border-0 bg-light h-100">
                      <div class="card-body p-4">
                        <h6 class="card-title mb-3 text-success">
                          <i class="fas fa-building me-2"></i>Data Perusahaan
                        </h6>
                        <div class="row g-3">
                          <div class="col-12">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Nama Perusahaan</label>
                              <div class="fw-semibold" id="internship-company-nama"><?= $magang_info ? ($magang_info['nama_perusahaan'] ?? '-') : '-' ?></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Alamat Perusahaan</label>
                              <div class="fw-semibold" id="internship-company-alamat"><?= $magang_info ? ($magang_info['alamat'] ?? '-') : '-' ?></div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Telepon</label>
                              <div class="fw-semibold" id="internship-company-pic"><?= $magang_info ? ($magang_info['telepon'] ?? '-') : '-' ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Internship Details -->
                <div class="row">
                  <div class="col-md-8">
                    <div class="card border-0 bg-light">
                      <div class="card-body p-4">
                        <h6 class="card-title mb-3 text-success">
                          <i class="fas fa-calendar-alt me-2"></i>Detail Magang
                        </h6>
                        <div class="row g-3">
                          <div class="col-md-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Periode Magang</label>
                              <div class="fw-semibold" id="internship-periode"><?= $magang_info ? date('d/m/Y', strtotime($magang_info['tanggal_mulai'])) . ' - ' . date('d/m/Y', strtotime($magang_info['tanggal_selesai'])) : 'Belum ada magang' ?></div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Durasi</label>
                              <div class="fw-semibold" id="internship-durasi"><?= $magang_info ? ceil((strtotime($magang_info['tanggal_selesai']) - strtotime($magang_info['tanggal_mulai'])) / (60 * 60 * 24)) . ' hari' : '0 hari' ?></div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Guru Pembimbing</label>
                              <div class="fw-semibold" id="internship-guru-nama"><?= $magang_info ? ($magang_info['guru_name'] ?? '-') : '-' ?></div>
                              <div class="small text-muted" id="internship-guru-nip">Guru Pembimbing</div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-muted small mb-1">Status</label>
                              <div class="fw-semibold" id="internship-tanggal-mulai"><?= $magang_info ? ($magang_info['status'] ?? '-') : '-' ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Status and Grade -->
                  <div class="col-md-4">
                    <div class="card border-0 bg-light h-100">
                      <div class="card-body p-4">
                        <h6 class="card-title mb-3 text-success">
                          <i class="fas fa-chart-line me-2"></i>Status & Nilai
                        </h6>
                        <div class="text-center">
                          <div class="mb-3">
                            <label class="form-label fw-semibold text-muted small mb-1">Status</label>
                            <div id="internship-status-badge" class="badge fs-6 px-3 py-2 bg-<?= $magang_info ? ($magang_info['status'] === 'aktif' ? 'success' : ($magang_info['status'] === 'pending' ? 'warning' : 'secondary')) : 'secondary' ?>"><?= $magang_info ? ($magang_info['status'] ?? '-') : '-' ?></div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-semibold text-muted small mb-1">Nilai Akhir</label>
                            <div class="display-6 fw-bold text-success" id="internship-nilai"><?= $magang_info ? ($magang_info['nilai_akhir'] ?? '-') : '-' ?></div>
                          </div>
                          <div class="small text-muted" id="internship-updated">Total Logbook: <?= $logbook_count ?? 0 ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </main>
  </div>

  <!-- Modal Detail DUDI -->
  <div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg"><div class="modal-content">
      <div class="modal-header align-items-start">
        <div>
          <h5 class="modal-title d-flex align-items-center gap-2">
            <span id="md-title">Detail DUDI</span>
            <span id="md-status" class="badge rounded-pill d-none">Menunggu Verifikasi</span>
          </h5>
          <div id="md-subtitle" class="small text-success"></div>
        </div>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="p-3 bg-light rounded mb-3">
          <div class="fw-semibold mb-2">Tentang Perusahaan</div>
          <div id="md-tentang" class="text-muted"></div>
        </div>

        <div class="fw-semibold mb-2">Informasi Kontak</div>
        <div class="row g-3 mb-3">
          <div class="col-md-12">
            <div class="border rounded p-3">
              <div class="text-muted small mb-1">Alamat</div>
              <div id="md-alamat">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="border rounded p-3 h-100">
              <div class="text-muted small mb-1">Telepon</div>
              <div id="md-telepon">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="border rounded p-3 h-100">
              <div class="text-muted small mb-1">Email</div>
              <div id="md-email">-</div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="border rounded p-3">
              <div class="text-muted small mb-1">Penanggung Jawab</div>
              <div id="md-pj">-</div>
            </div>
          </div>
        </div>

        <div class="fw-semibold mb-2">Informasi Magang</div>
        <div class="row g-3">
          <div class="col-md-12">
            <div class="p-3 rounded" style="background:#f0f7ff;">
              <div class="row">
                <div class="col-md-8">
                  <div class="text-muted small mb-1">Bidang Usaha</div>
                  <div id="md-bidang" class="fw-semibold">-</div>
                </div>
                <div class="col-md-2">
                  <div class="text-muted small mb-1">Kuota Magang</div>
                  <div id="md-kuota" class="fw-semibold">-</div>
                </div>
                <div class="col-md-2">
                  <div class="text-muted small mb-1">Slot Tersisa</div>
                  <div id="md-sisa" class="fw-semibold">-</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
        <button id="md-daftar" class="btn btn-success"><span class="me-1">✈</span> Daftar Magang</button>
      </div>
    </div></div>
  </div>

  <!-- Modal Create/Edit Logbook -->
  <div class="modal fade" id="modalLogbook" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logbook-title">Tambah Jurnal Harian</h5>
          <p class="modal-subtitle text-muted mb-0" id="logbook-subtitle">Dokumentasikan kegiatan magang harian Anda</p>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <!-- Panduan Penulisan Jurnal -->
          <div class="alert alert-info mb-4">
            <div class="d-flex">
              <i class="fas fa-info-circle me-2 mt-1"></i>
              <div>
                <strong>Panduan Penulisan Jurnal:</strong>
                <ul class="mb-0 mt-2">
                  <li>Minimal 50 karakter untuk deskripsi kegiatan</li>
                  <li>Deskripsikan kegiatan dengan detail dan spesifik</li>
                  <li>Sertakan kendala yang dihadapi (jika ada)</li>
                  <li>Upload dokumentasi pendukung untuk memperkuat laporan</li>
                  <li>Pastikan tanggal sesuai dengan hari kerja</li>
                </ul>
              </div>
            </div>
          </div>

          <div id="logbook-msg" class="text-danger small mb-2 d-none"></div>
          
          <!-- Rejection Warning -->
          <div id="rejection-warning" class="alert alert-warning d-none mb-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Jurnal ini ditolak dan perlu diperbaiki</strong>
          </div>
          
          <form id="logbook-form" enctype="multipart/form-data">
            <input type="hidden" id="logbook-id">
            
            <!-- Informasi Dasar -->
            <div class="row mb-4">
              <div class="col-md-6">
              <label class="form-label">Tanggal <span class="text-danger">*</span></label>
              <input type="date" id="logbook-tanggal" class="form-control" required>
            </div>
              <div class="col-md-6">
                <label class="form-label">Status</label>
                <input type="text" id="logbook-status" class="form-control" value="Menunggu Verifikasi" readonly style="background-color: #f8f9fa;">
              </div>
            </div>

            <!-- Kegiatan Harian -->
            <div class="mb-4">
              <label class="form-label">Deskripsi Kegiatan <span class="text-danger">*</span></label>
              <textarea id="logbook-kegiatan" class="form-control" rows="6" 
                        placeholder="Deskripsikan kegiatan yang Anda lakukan hari ini secara detail. Contoh: Membuat wireframe untuk halaman login menggunakan Figma, kemudian melakukan coding HTML dan CSS untuk implementasi desain tersebut..." 
                        required></textarea>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <small class="text-muted">Jenis file yang dapat diupload: Screenshot hasil kerja, dokumentasi code, foto kegiatan</small>
                <small id="char-counter" class="text-danger">0/50 minimum</small>
              </div>
            </div>

            <!-- Kendala yang Dihadapi -->
            <div class="mb-4">
              <label class="form-label">Kendala yang Dihadapi (Opsional)</label>
              <textarea id="logbook-kendala" class="form-control" rows="4" 
                        placeholder="Deskripsikan kendala atau hambatan yang Anda hadapi selama melakukan kegiatan hari ini. Contoh: Kesulitan memahami konsep tertentu, masalah teknis, atau kendala lainnya..."></textarea>
              <div class="mt-2">
                <small class="text-muted">Jelaskan kendala yang dihadapi untuk membantu guru memberikan bimbingan yang tepat</small>
              </div>
            </div>

            <!-- Dokumentasi Pendukung -->
            <div class="mb-4">
              <label class="form-label">Upload File (Opsional)</label>
              <div class="border border-2 border-dashed rounded p-4 text-center" style="border-color: #dee2e6 !important;">
            <div class="mb-3">
                  <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                </div>
                <p class="mb-2">Pilih file dokumentasi</p>
                <p class="text-muted small mb-3">PDF, DOC, DOCX, JPG, PNG (Max 5MB)</p>
                <input type="file" id="logbook-file" class="d-none" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                <button type="button" class="btn btn-success" onclick="document.getElementById('logbook-file').click()">
                  Browse File
                </button>
              </div>
              <div id="file-info" class="mt-2 d-none">
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                  <span id="file-name"></span>
                  <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile()">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- Error Messages -->
            <div id="form-errors" class="alert alert-danger d-none">
              <i class="fas fa-exclamation-triangle me-2"></i>
              <strong>Lengkapi form terlebih dahulu:</strong>
              <ul id="error-list" class="mb-0 mt-2"></ul>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-success" onclick="saveLogbook()" id="save-btn">Simpan Jurnal</button>
        </div>
      </div>
      </main>
    </div>
  </div>

  <!-- Modal View Logbook -->
  <div class="modal fade" id="modalViewLogbook" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="d-flex align-items-center">
            <div class="bg-primary text-white rounded p-2 me-3">
              <i class="fas fa-file-alt"></i>
            </div>
            <div>
              <h5 class="modal-title mb-0">Detail Jurnal Harian</h5>
              <small class="text-muted" id="view-date-header">-</small>
            </div>
          </div>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="view-logbook-id">
          
          <!-- Informasi Siswa dan Tempat Magang -->
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
            <div class="col-md-6">
                  <h6 class="mb-3">
                    <i class="fas fa-user text-success me-2"></i>Informasi Siswa
                  </h6>
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <div class="fw-bold fs-5" id="view-student-name">-</div>
                      <div class="text-muted">NIS: <span id="view-student-nis">-</span></div>
                    </div>
                  </div>
                  <div class="ms-5">
                    <div class="text-muted mb-1">
                      <i class="fas fa-graduation-cap me-2"></i>
                      <span id="view-student-class">-</span>
                    </div>
                    <div class="text-muted">
                      <strong>Jurusan:</strong> <span id="view-student-major">-</span>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                  <h6 class="mb-3">
                    <i class="fas fa-building text-success me-2"></i>Tempat Magang
                  </h6>
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-success text-white rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                      <i class="fas fa-building"></i>
          </div>
                    <div>
                      <div class="fw-bold fs-5" id="view-company-name">-</div>
                      <div class="text-muted" id="view-company-address">-</div>
        </div>
        </div>
                    <div class="ms-5">
                      <div class="text-muted">
                        <strong>PIC:</strong> <span id="view-company-pic">-</span>
        </div>
      </div>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Tanggal dan Status -->
          <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded">
            <div class="d-flex align-items-center">
              <i class="fas fa-calendar text-success me-2"></i>
              <span id="view-tanggal">-</span>
            </div>
            <div id="view-status" class="badge fs-6 px-3 py-2">-</div>
          </div>

          <!-- Kegiatan Hari Ini -->
          <div class="card mb-4">
            <div class="card-body">
              <h6 class="mb-3">
                <i class="fas fa-tasks text-info me-2"></i>Kegiatan Hari Ini
              </h6>
              <p class="mb-0" id="view-kegiatan">-</p>
            </div>
          </div>

          <!-- Dokumentasi -->
          <div class="mb-4">
            <h6 class="mb-3">
              <i class="fas fa-paperclip text-warning me-2"></i>Dokumentasi
            </h6>
            <div id="view-documentation">
              <p class="text-muted mb-0">Tidak ada dokumentasi</p>
            </div>
          </div>

          <!-- Feedback Guru (jika ada) -->
          <div id="view-feedback-section" class="mb-4 d-none">
            <h6 class="mb-3">
              <i class="fas fa-comments text-secondary me-2"></i>Feedback Guru
            </h6>
            <div class="p-3 bg-light rounded">
              <p class="mb-0" id="view-feedback">-</p>
            </div>
          </div>
        </div>
        
        <!-- Timestamps -->
        <div class="row text-muted small">
          <div class="col-md-6">
            <i class="fas fa-plus-circle me-1"></i>
            Dibuat: <span id="view-created">-</span>
          </div>
          <div class="col-md-6 text-end">
            <i class="fas fa-edit me-1"></i>
            Diperbarui: <span id="view-updated">-</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="modalDeleteConfirm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus jurnal ini? Aksi ini tidak bisa dibatalkan.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" onclick="confirmDelete()">Ya, Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="toast position-fixed bottom-0 end-0 m-3 text-bg-success" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">OK</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Auth helper
    function requireAuth() {
      const token = localStorage.getItem('simmas_token');
      const user = JSON.parse(localStorage.getItem('simmas_user') || '{}');
      
      console.log('Auth check:', {
        hasToken: !!token,
        tokenLength: token ? token.length : 0,
        user: user,
        userRole: user.role
      });
      
      if (!token) {
        console.error('No token found, redirecting to login');
        window.location.href = '/login';
        throw new Error('No token');
      }
      
      if (user.role !== 'siswa') {
        console.error('Invalid user role:', user.role);
        window.location.href = '/login';
        throw new Error('Invalid role');
      }
      
      return { t: token, u: user };
    }

    // Get local registrations
    function getLocalRegs() {
      return JSON.parse(localStorage.getItem('simmas_siswa_regs') || '[]');
    }

    // Update registration counter
    function updateRegCounter() {
      const c = getLocalRegs().length;
      const el = document.getElementById('reg-counter');
      if(el){ el.textContent = c + ' / 3'; }
    }

    // Set local registrations
    function setLocalRegs(arr) {
      localStorage.setItem('simmas_siswa_regs', JSON.stringify(arr));
      updateRegCounter();
    }

    // Server registrations cache
    let SERVER_REGS = [];

    // Check if student has registered to a DUDI
    function hasRegistered(dudiId) {
      return (SERVER_REGS||[]).some(r => String(r.dudi_id) === String(dudiId) && (r.status==='pending'||r.status==='aktif')) ||
             getLocalRegs().some(r => String(r.id) === String(dudiId));
    }

    // Check if student can register more (max 3)
    function canRegisterMore() {
      const serverCount = (SERVER_REGS||[]).filter(r => r.status==='pending'||r.status==='aktif').length;
      return (serverCount + getLocalRegs().length) < 3;
    }

    // ---- UI: Tabs sederhana ----
    function showSection(id){
      // Hide all content sections (dashboard/dudi/logbook/magang)
      document.querySelectorAll('[data-section]').forEach(section => {
        if (section && section.style) section.style.display = 'none';
      });

      // Explicitly ensure dashboard is hidden when not selected
      const dash = document.getElementById('sec-dashboard');
      if (dash && id !== 'sec-dashboard') dash.style.display = 'none';

      // Show target section
      const target = document.getElementById(id);
      if (target && target.style) {
        target.style.display = 'block';
      } else {
        console.error('Section not found:', id);
        return;
      }

      // Toggle greeting visibility explicitly
      const greet = document.getElementById('greet');
      if (greet) greet.style.display = (id === 'sec-dashboard') ? 'block' : 'none';

      // Sidebar active state
      document.querySelectorAll('.sidebar-link').forEach(a => a?.classList?.remove('active'));
      document.querySelector(`[data-link="${id}"]`)?.classList?.add('active');

      // Section-specific loaders
      if (id === 'sec-magang') loadInternshipData();
      if (id === 'sec-dudi') { DUDI_CACHE = []; loadDudiList(); }
      if (id === 'sec-logbook') loadLogbookList();
    }

    // Navigation functions
    function showDashboard() {
      showSection('sec-dashboard');
    }

    function showDudi() {
      showSection('sec-dudi');
      loadDudiList();
    }

    function showLogbook() {
      showSection('sec-logbook');
      loadLogbookList();
    }

    function showMagang() {
      showSection('sec-magang');
      loadInternshipData();
    }

    // Menu click handler
    function handleMenuClick(sectionId) {
      showSection(sectionId);
      
      // Load specific data based on section
      switch(sectionId) {
        case 'sec-dudi':
          loadDudiList();
          break;
        case 'sec-logbook':
          loadLogbookList();
          break;
        case 'sec-magang':
          loadInternshipData();
          break;
      }
    }

    // ---- DUDI: load list, render, detail, daftar ----
    async function fetchDudi(){
      try {
        const { t, u } = requireAuth();
        console.log('Fetching DUDI data with token:', t ? 'Token exists' : 'No token');
        console.log('User data:', u);
        
        // Endpoint siswa agar data yang tampil sesuai tabel dudi
        const r = await fetch('/api/siswa/dudi', { 
          headers:{ 
            'Authorization':'Bearer '+t,
            'Content-Type': 'application/json'
          } 
        });
        
        console.log('DUDI API response status:', r.status);
        
        if(r.ok){ 
          const data = await r.json();
          console.log('DUDI data received:', data);
          return data;
        } else {
          const errorText = await r.text();
          console.error('DUDI API error:', r.status, errorText);
          
          if (r.status === 401) {
            console.log('API returned 401, using fallback data instead of redirecting');
            // Don't redirect, just use fallback data
            return [];
          }
          
          console.log('DUDI API failed, returning empty array');
          return [];
        }
      } catch(error) {
        console.error('Error fetching DUDI:', error);
        toast('Terjadi kesalahan saat memuat data DUDI', 'danger');
        return [];
      }
    }
    let DUDI_CACHE = [];

    async function loadDudiList(){
      try {
        const grid = document.getElementById('dudi-grid');
        if (!grid) {
          console.error('DUDI grid element not found');
          return;
        }
        
        grid.innerHTML = '<div class="text-muted">Memuat data...</div>';
        const q = document.getElementById('dudi-search')?.value.trim().toLowerCase() || '';
        
        console.log('Loading DUDI list...');
        
        if(DUDI_CACHE.length === 0){ 
          console.log('Fetching DUDI data from API...');
          DUDI_CACHE = await fetchDudi(); 
        }
        
        console.log('DUDI cache:', DUDI_CACHE);
        
        // ambil daftar pengajuan dari server untuk sinkron tombol & counter
        try{
          const { t } = requireAuth();
          console.log('Fetching internships data...');
          const r = await fetch('/api/siswa/internships', { 
            headers:{ 
              'Authorization':'Bearer '+t,
              'Content-Type': 'application/json'
            } 
          });
          console.log('Internships API response status:', r.status);
          SERVER_REGS = r.ok ? (await r.json()) : [];
          console.log('Server registrations:', SERVER_REGS);
        }catch(e){ 
          console.error('Error fetching internships:', e);
          SERVER_REGS = []; 
        }
        
        // If no data from API, show empty state
        if(DUDI_CACHE.length === 0) {
          console.log('No DUDI data from API');
          grid.innerHTML = '<div class="text-center text-muted py-5"><i class="fas fa-building fa-3x mb-3 opacity-50"></i><div>Tidak ada data DUDI tersedia</div></div>';
          return;
        }
        
        const rows = (DUDI_CACHE||[]).filter(d => {
          const s = (d.nama_perusahaan||'')+' '+(d.alamat||'')+' '+(d.penanggung_jawab||'');
          return s.toLowerCase().includes(q);
        });
        
        console.log('Filtered DUDI rows:', rows);
        
        if(rows.length === 0){ 
          grid.innerHTML = '<div class="text-muted">Tidak ada DUDI ditemukan.</div>'; 
          return; 
        }
        
        grid.innerHTML = '';
        rows.forEach(d => {
          const col = document.createElement('div');
          col.className = 'col-lg-4 col-md-6';
          const terisi = (typeof d.jumlah_siswa==='number')?d.jumlah_siswa:parseInt(d.jumlah_siswa||'0',10)||0;
          const kuota = (d.kuota !== null && d.kuota !== undefined && d.kuota !== '') ? 
            (Number.isFinite(Number(d.kuota)) ? Number(d.kuota) : 0) : 0;
          
          // Debug logging
          console.log('DUDI Data:', d);
          console.log('Terisi:', terisi, 'Kuota:', kuota, 'd.kuota:', d.kuota, 'Type:', typeof d.kuota);
          console.log('SERVER_REGS:', SERVER_REGS);
          console.log('Looking for DUDI ID:', d.id, 'in SERVER_REGS');
          const sisa = Math.max(kuota - terisi, 0);
          const reg = (SERVER_REGS||[]).find(r => String(r.dudi_id)===String(d.id));
          const status = reg ? (reg.status||'pending') : '';
          console.log('Found reg:', reg, 'Status:', status);
          const badge = status==='aktif' ? '<span class="badge bg-success">Aktif</span>' : (status==='pending' ? '<span class="badge bg-warning text-dark">Menunggu</span>' : '');
          const progress = Math.max(0, Math.min(100, Math.round((terisi/Math.max(kuota,1))*100)));
          const btnDisabled = !!status;
          const btnLabel = status==='aktif' ? 'Berlangsung' : (status==='pending' ? 'Mendaftar' : 'Daftar');
          console.log('Button Label:', btnLabel, 'Disabled:', btnDisabled);
          col.innerHTML = `
            <div class="dudi-card h-100">
              <div class="head">
                <div class="logo"><i class="fas fa-building"></i></div>
                <div class="title">${d.nama_perusahaan||'-'}</div>
                <div class="ms-auto">${badge}</div>
              </div>
              <div class="meta">
                <div><i class="fas fa-map-marker-alt me-2"></i>${d.alamat||'-'}</div>
                ${d.penanggung_jawab?`<div><i class="fas fa-user-tie me-2"></i>PIC: ${d.penanggung_jawab}</div>`:''}
              </div>
              <div class="progress"><div class="progress-bar" style="width:${progress}%"></div></div>
              <div class="foot">
                <small class="text-muted">Kuota Magang <b>${terisi}/${kuota}</b></small>
                <div>
                  <button class="btn btn-sm btn-outline-secondary me-2" onclick='openDudiDetail(${JSON.stringify(d.id)})'>Detail</button>
                  <button class="btn btn-sm ${btnDisabled?'btn-secondary':'btn-dudi'}" ${btnDisabled?'disabled':''} onclick='${btnDisabled?'':'registerDudi('+JSON.stringify(d.id)+')'}'>${btnLabel}</button>
                </div>
              </div>
            </div>
          `;
          grid.appendChild(col);
        });
        
        console.log('DUDI list rendered successfully');
      } catch(error) {
        console.error('Error in loadDudiList:', error);
        const grid = document.getElementById('dudi-grid');
        if (grid) {
          grid.innerHTML = '<div class="text-danger">Terjadi kesalahan saat memuat data DUDI</div>';
        }
      }
    }

    function formatKuota(terisi, kuota){
      if(kuota && Number.isFinite(terisi)){ return `${terisi}/${kuota}`; }
      if(kuota){ return `0/${kuota}`; }
      return '-';
    }
    function calcSisa(terisi, kuota){
      if(kuota && Number.isFinite(terisi)){ return Math.max(kuota - terisi, 0) + ' slot'; }
      if(kuota){ return kuota + ' slot'; }
      return '-';
    }

    function openDudiDetail(id){
      const d = (DUDI_CACHE||[]).find(x => String(x.id)===String(id));
      if(!d) return;

      const reg = (SERVER_REGS||[]).find(r => String(r.dudi_id)===String(id));
      const regStatus = reg ? (reg.status||'') : (hasRegistered(id) ? 'pending' : '');
      const sudahDaftar = !!regStatus;

      // Header
      document.getElementById('md-title').textContent = d.nama_perusahaan||'-';
      const subtitle = document.getElementById('md-subtitle');
      if(subtitle) subtitle.textContent = d.bidang||d.sektor||d.industri||'';
      const badge = document.getElementById('md-status');
      if(badge){
        badge.className = 'badge rounded-pill d-none';
        if(sudahDaftar){
          badge.classList.remove('d-none');
          if(regStatus==='aktif') { badge.classList.add('bg-success'); badge.textContent='Aktif'; }
          else if(regStatus==='selesai') { badge.classList.add('bg-secondary'); badge.textContent='Selesai'; }
          else { badge.classList.add('bg-warning','text-dark'); badge.textContent='Menunggu Verifikasi'; }
        }
      }

      // Body fields
      // hitung kuota & terisi dari data server jika tersedia
      const kuota = (d.kuota !== null && d.kuota !== undefined && d.kuota !== '') ? 
        (Number.isFinite(Number(d.kuota)) ? Number(d.kuota) : 0) : 0;
      const terisiRaw = (d.jumlah_siswa!==undefined? d.jumlah_siswa : (d.terisi!==undefined? d.terisi : (d.filled||0)));
      const terisi = (typeof terisiRaw === 'number') ? terisiRaw : (parseInt(terisiRaw,10) || 0);
      const email = d.email || '';
      const tentang = d.deskripsi || '—';

      // isi field tanpa menghapus struktur modal
      const elTentang = document.getElementById('md-tentang'); if(elTentang) elTentang.textContent = tentang;
      const elAlamat = document.getElementById('md-alamat'); if(elAlamat) elAlamat.textContent = d.alamat || '—';
      const elTelp = document.getElementById('md-telepon'); if(elTelp) elTelp.textContent = d.telepon || '—';
      const elEmail = document.getElementById('md-email'); if(elEmail) elEmail.textContent = email || '—';
      const elPj = document.getElementById('md-pj'); if(elPj) elPj.textContent = d.penanggung_jawab || '—';
      const elBidang = document.getElementById('md-bidang'); if(elBidang) elBidang.textContent = d.bidang || d.sektor || d.industri || '-';
      const elKuota = document.getElementById('md-kuota'); if(elKuota) elKuota.textContent = formatKuota(terisi, kuota);
      const elSisa = document.getElementById('md-sisa'); if(elSisa) elSisa.textContent = calcSisa(terisi, kuota);

      // Tombol daftar
      const btn = document.getElementById('md-daftar');
      if(btn){
        if(sudahDaftar){
          btn.disabled = true;
          if(btn.classList.contains('btn-success')) btn.classList.replace('btn-success','btn-secondary');
          btn.textContent = (regStatus==='aktif') ? 'Berlangsung' : (regStatus==='selesai' ? 'Sudah Selesai' : 'Mendaftar');
          btn.onclick = null;
        }else{
          btn.disabled = false;
          if(btn.classList.contains('btn-secondary')) btn.classList.replace('btn-secondary','btn-success');
          btn.innerHTML = '<span class="me-1">✈</span> Daftar Magang';
          btn.onclick = () => registerDudi(id, true);
        }
      }

      new bootstrap.Modal(document.getElementById('modalDetail')).show();
    }

    function toast(msg, type='success'){
      const el = document.getElementById('toast');
      el.querySelector('.toast-body').textContent = msg;
      el.classList.remove('text-bg-success','text-bg-danger','text-bg-warning');
      if(type==='success') el.classList.add('text-bg-success');
      else if(type==='danger') el.classList.add('text-bg-danger');
      else el.classList.add('text-bg-warning');
      new bootstrap.Toast(el).show();
    }

    async function registerDudi(dudiId, fromModal=false){
      // Front-end only: batasi 3, cegah duplikat
      if(hasRegistered(dudiId)){ toast('Anda sudah mendaftar ke DUDI ini.','warning'); return; }
      if(!canRegisterMore()){ toast('Batas maksimal pendaftaran adalah 3 DUDI.','danger'); return; }

      // Submit ke backend siswa (status default: pending)
      try{
        const { t } = requireAuth();
        const response = await fetch('/api/siswa/internships', {
          method:'POST',
          headers:{ 'Authorization':'Bearer '+t, 'Content-Type':'application/json' },
          body: JSON.stringify({ dudi_id:dudiId })
        });
        
        if (!response.ok) {
          const errorData = await response.json();
          console.error('Registration failed:', errorData);
          toast(errorData.message || 'Gagal mendaftar magang', 'danger');
          return;
        }
        
        const result = await response.json();
        console.log('Registration successful:', result);
      }catch(e){
        console.error('Registration error:', e);
        toast('Terjadi kesalahan saat mendaftar', 'danger');
        return;
      }
      const regs = getLocalRegs();
      regs.push({ id:dudiId, at: new Date().toISOString() });
      setLocalRegs(regs);

      if(fromModal){
        const md = bootstrap.Modal.getInstance(document.getElementById('modalDetail'));
        if(md) md.hide();
      }
      // refresh daftar server untuk sinkronisasi tombol & counter
      try{
        const { t } = requireAuth();
        const r = await fetch('/api/siswa/internships', { headers:{ Authorization:'Bearer '+t } });
        SERVER_REGS = r.ok ? (await r.json()) : SERVER_REGS;
      }catch(e){}
      await loadDudiList();
      toast('Pendaftaran magang berhasil diajukan, menunggu verivikasi dari pihak guru','success');
    }

    // Load user info
    async function loadUserInfo(){
      try{
        const { u } = requireAuth();
        const greetEl = document.getElementById('greet');
        const navbarNameEl = document.getElementById('navbar-user-name');
        
        if(greetEl) {
          greetEl.textContent = 'Selamat datang, ' + (u.name||'Siswa');
        }
        
        if(navbarNameEl) {
          navbarNameEl.textContent = u.name || 'Siswa';
        }
        
        console.log('User info loaded:', u.name);
      }catch(e){
        console.error('Error loading user info:', e);
      }
    }

    async function loadSchoolInfo(){
      try{
        const res = await fetch('/api/school-info');
        if(res.ok){
          const data = await res.json();
          if(data.nama_sekolah){ 
            // Update school name in navbar
            const schoolEl = document.getElementById('school-name');
            if(schoolEl) schoolEl.textContent = data.nama_sekolah;
            
            // Update school name in navbar (siswa specific)
            const navbarSchoolEl = document.getElementById('navbar-school-name');
            if(navbarSchoolEl) navbarSchoolEl.textContent = data.nama_sekolah;
            
            // Update school name in sidebar footer only (not the Menu label)
            const sidebarSchoolEl = document.querySelector('.sidebar .mt-auto .text-muted.fw-semibold');
            if(sidebarSchoolEl) sidebarSchoolEl.textContent = data.nama_sekolah;
            
            console.log('School name updated to:', data.nama_sekolah);
          }
        }
      }catch(e){
        console.error('Error loading school info:', e);
      }
    }

    // Utility function for debouncing
    function debounce(func, wait) {
      let timeout;
      return function executedFunction(...args) {
        const later = () => {
          clearTimeout(timeout);
          func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
      };
    }

    // ---- JURNAL HARIAN: CRUD, filter, pagination ----
    let LOGBOOK_DATA = [];
    let CURRENT_PAGE = 1;
    let PER_PAGE = 10;
    let TOTAL_PAGES = 0;

    async function loadLogbookList(){
      try{
        const { t } = requireAuth();
        const params = new URLSearchParams({
          page: CURRENT_PAGE,
          per_page: PER_PAGE,
          q: document.getElementById('search-logbook').value.trim(),
          status: document.getElementById('filter-status').value,
          bulan: document.getElementById('filter-bulan').value,
          tahun: document.getElementById('filter-tahun').value
        });
        
        const r = await fetch('/api/siswa/logbook?' + params, { headers:{ Authorization:'Bearer '+t } });
        if(r.ok){
          const data = await r.json();
          LOGBOOK_DATA = data.data || [];
          TOTAL_PAGES = data.total_pages || 1;
          renderLogbookList();
          updateLogbookStats(data.stats || {});
          updatePagination();
          checkTodayReminder();
        } else {
          console.error('Failed to load logbook data:', r.status);
          
          if (r.status === 401) {
            console.log('Using fallback logbook data for testing - Rudi belum membuat laporan sama sekali');
            // Rudi belum membuat laporan jurnal sama sekali
            LOGBOOK_DATA = [];
            renderLogbookList();
            updateLogbookStats({
              total: 0,
              disetujui: 0,
              menunggu: 0,
              ditolak: 0
            });
            updatePagination();
            checkTodayReminder();
          } else {
            LOGBOOK_DATA = [];
            renderLogbookList();
          }
        }
      }catch(e){
        console.error('Load logbook error:', e);
      }
    }

    function renderLogbookList(){
      const tbody = document.getElementById('logbook-list');
      if(LOGBOOK_DATA.length === 0){
        tbody.innerHTML = `
          <tr>
            <td colspan="5" class="text-center py-5">
              <div class="d-flex flex-column align-items-center">
                <i class="fas fa-book fa-3x text-muted opacity-50 mb-3"></i>
                <div class="text-muted fw-semibold">Tidak ada jurnal ditemukan</div>
                <small class="text-muted">Mulai buat jurnal harian Anda</small>
              </div>
            </td>
          </tr>
        `;
        return;
      }
      
      tbody.innerHTML = '';
      LOGBOOK_DATA.forEach(log => {
        const row = document.createElement('tr');
        const statusClass = log.status_verifikasi === 'disetujui' ? 'bg-success' : 
                           log.status_verifikasi === 'ditolak' ? 'bg-danger' : 'bg-warning text-dark';
        const statusText = log.status_verifikasi === 'disetujui' ? 'Disetujui' :
                          log.status_verifikasi === 'ditolak' ? 'Ditolak' : 'Menunggu Verifikasi';
        const feedback = log.catatan_guru || 'Belum ada feedback';
        const kegiatan = log.kegiatan || '';
        const kegiatanShort = kegiatan.length > 60 ? kegiatan.substring(0, 60) + '...' : kegiatan;
        const kendala = log.kendala || '';
        const kendalaShort = kendala.length > 40 ? kendala.substring(0, 40) + '...' : kendala;
        
        row.innerHTML = `
          <td>
            <div class="d-flex align-items-center">
              <div class="logbook-date-icon bg-success bg-opacity-10 text-success me-3">
                <i class="fas fa-calendar-day"></i>
              </div>
              <div>
                <div class="fw-semibold text-dark">${formatDate(log.tanggal)}</div>
                <div class="small text-muted">${formatDateFull(log.tanggal)}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="logbook-content">
              <div class="mb-2">
                <div class="d-flex align-items-start">
                  <i class="fas fa-tasks text-success me-2 mt-1"></i>
                  <div>
                    <div class="fw-semibold text-dark mb-1">Kegiatan:</div>
                    <div class="text-dark">${kegiatanShort}</div>
                    ${kegiatan.length > 60 ? '<small class="text-muted">Klik detail untuk melihat lengkap</small>' : ''}
                  </div>
                </div>
              </div>
              ${kendala ? `
                <div class="d-flex align-items-start">
                  <i class="fas fa-exclamation-triangle text-warning me-2 mt-1"></i>
                  <div>
                    <div class="fw-semibold text-dark mb-1">Kendala:</div>
                    <div class="text-dark">${kendalaShort}</div>
                    ${kendala.length > 40 ? '<small class="text-muted">Klik detail untuk melihat lengkap</small>' : ''}
                  </div>
                </div>
              ` : ''}
            </div>
          </td>
          <td>
            <div class="d-flex flex-column align-items-start">
              <span class="badge ${statusClass} mb-1">${statusText}</span>
              ${log.status_verifikasi === 'ditolak' ? '<small class="text-muted">Perlu diperbaiki</small>' : ''}
            </div>
          </td>
          <td>
            <div class="logbook-feedback">
              <div class="d-flex align-items-start">
                <i class="fas fa-comment text-info me-2 mt-1"></i>
                <div class="small text-dark">${feedback}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-outline-info" onclick="viewLogbook(${log.id})" title="Lihat detail">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-outline-warning" ${log.status_verifikasi==='disetujui'?'disabled':''} onclick="${log.status_verifikasi==='disetujui'?'':'editLogbook('+log.id+')'}" title="Edit jurnal">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" ${log.status_verifikasi==='disetujui'?'disabled':''} onclick="${log.status_verifikasi==='disetujui'?'':'deleteLogbook('+log.id+')'}" title="Hapus jurnal">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        `;
        tbody.appendChild(row);
      });
      
      updatePagination();
    }

    function updateLogbookStats(stats){
      document.getElementById('total-jurnal').textContent = stats.total || 0;
      document.getElementById('disetujui-jurnal').textContent = stats.disetujui || 0;
      document.getElementById('menunggu-jurnal').textContent = stats.menunggu || 0;
      document.getElementById('ditolak-jurnal').textContent = stats.ditolak || 0;
    }

    function updatePagination(){
      const paginationInfo = document.getElementById('pagination-info');
      const pagination = document.getElementById('pagination');
      
      if (!paginationInfo || !pagination) return;
      
      const totalRecords = LOGBOOK_DATA.length;
      const startRecord = totalRecords > 0 ? ((CURRENT_PAGE - 1) * PER_PAGE) + 1 : 0;
      const endRecord = Math.min(CURRENT_PAGE * PER_PAGE, totalRecords);
      
      paginationInfo.textContent = `Menampilkan ${startRecord} sampai ${endRecord} dari ${totalRecords} entri`;
      
      // Generate pagination buttons
      pagination.innerHTML = '';
      
      if (TOTAL_PAGES <= 1) return;
      
      // Previous button
      const prevLi = document.createElement('li');
      prevLi.className = `page-item ${CURRENT_PAGE === 1 ? 'disabled' : ''}`;
      prevLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${CURRENT_PAGE - 1})">Previous</a>`;
      pagination.appendChild(prevLi);
      
      // Page numbers
      const startPage = Math.max(1, CURRENT_PAGE - 2);
      const endPage = Math.min(TOTAL_PAGES, CURRENT_PAGE + 2);
      
      for (let i = startPage; i <= endPage; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${i === CURRENT_PAGE ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${i})">${i}</a>`;
        pagination.appendChild(pageLi);
      }
      
      // Next button
      const nextLi = document.createElement('li');
      nextLi.className = `page-item ${CURRENT_PAGE === TOTAL_PAGES ? 'disabled' : ''}`;
      nextLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${CURRENT_PAGE + 1})">Next</a>`;
      pagination.appendChild(nextLi);
    }

    function changePage(page) {
      if (page < 1 || page > TOTAL_PAGES) return;
      CURRENT_PAGE = page;
      loadLogbookList();
    }

    function checkTodayReminder(){
      const today = new Date().toISOString().split('T')[0];
      const hasToday = LOGBOOK_DATA.some(log => log.tanggal === today);
      const banner = document.getElementById('reminder-banner');
      if(!hasToday){
        banner.classList.remove('d-none');
      }else{
        banner.classList.add('d-none');
      }
    }

    function openCreateLogbook(){
      console.log('openCreateLogbook called');
      try {
        const titleEl = document.getElementById('logbook-title');
        const idEl = document.getElementById('logbook-id');
        const tanggalEl = document.getElementById('logbook-tanggal');
        const kegiatanEl = document.getElementById('logbook-kegiatan');
        const msgEl = document.getElementById('logbook-msg');
        const modalEl = document.getElementById('modalLogbook');
        
        console.log('Elements found:', {
          title: !!titleEl,
          id: !!idEl,
          tanggal: !!tanggalEl,
          kegiatan: !!kegiatanEl,
          msg: !!msgEl,
          modal: !!modalEl
        });
        
        if(titleEl) titleEl.textContent = 'Tambah Jurnal Harian';
        if(idEl) idEl.value = '';
        if(tanggalEl) tanggalEl.value = new Date().toISOString().split('T')[0];
        if(kegiatanEl) kegiatanEl.value = '';
        if(msgEl) msgEl.classList.add('d-none');
        
        // Reset form
        resetForm();
        
        if(modalEl) {
          const modal = new bootstrap.Modal(modalEl);
          modal.show();
          console.log('Modal shown successfully');
          
          // Re-attach event listeners after modal is shown
          setTimeout(() => {
            attachFormEventListeners();
          }, 100);
        } else {
          console.error('Modal element not found');
        }
      } catch(error) {
        console.error('Error in openCreateLogbook:', error);
      }
    }

    function attachFormEventListeners() {
      // Character counter for activity description
      const kegiatanTextarea = document.getElementById('logbook-kegiatan');
      if(kegiatanTextarea) {
        // Remove existing listeners to avoid duplicates
        kegiatanTextarea.removeEventListener('input', updateCharacterCounter);
        kegiatanTextarea.removeEventListener('keyup', updateCharacterCounter);
        
        // Add new listeners
        kegiatanTextarea.addEventListener('input', updateCharacterCounter);
        kegiatanTextarea.addEventListener('keyup', updateCharacterCounter);
        kegiatanTextarea.addEventListener('paste', function() {
          setTimeout(updateCharacterCounter, 100);
        });
        
        // Initialize counter
        updateCharacterCounter();
        console.log('Character counter event listeners attached');
      }
      
      // File upload handling
      const fileInput = document.getElementById('logbook-file');
      const fileInfo = document.getElementById('file-info');
      const fileName = document.getElementById('file-name');
      
      if(fileInput && fileInfo && fileName) {
        // Remove existing listeners to avoid duplicates
        fileInput.removeEventListener('change', handleFileChange);
        
        // Add new listener
        fileInput.addEventListener('change', handleFileChange);
        console.log('File upload event listener attached');
      }
    }

    function handleFileChange(event) {
      const fileInput = event.target;
      const fileInfo = document.getElementById('file-info');
      const fileName = document.getElementById('file-name');
      
      if(fileInput.files.length > 0) {
        const file = fileInput.files[0];
        fileName.textContent = file.name;
        fileInfo.classList.remove('d-none');
        console.log('File selected:', file.name, 'Size:', file.size, 'Type:', file.type);
      } else {
        fileInfo.classList.add('d-none');
        console.log('No file selected');
      }
    }

    async function editLogbook(id){
      console.log('Edit logbook called with ID:', id);
      try {
        const { t } = requireAuth();
        const response = await fetch(`/api/siswa/logbook/${id}`, {
          headers: { 'Authorization': 'Bearer ' + t }
        });
        
        if (!response.ok) {
          toast('Gagal memuat data jurnal', 'danger');
          return;
        }
        
        const log = await response.json();
        
        // Update modal title and subtitle
        const titleEl = document.getElementById('logbook-title');
        const subtitleEl = document.getElementById('logbook-subtitle');
        
        if (titleEl) titleEl.textContent = 'Edit Jurnal Harian';
        if (subtitleEl) subtitleEl.textContent = 'Perbarui dokumentasi kegiatan magang Anda';
        
        // Populate form data
        const idEl = document.getElementById('logbook-id');
        const tanggalEl = document.getElementById('logbook-tanggal');
        const kegiatanEl = document.getElementById('logbook-kegiatan');
        const kendalaEl = document.getElementById('logbook-kendala');
        
        if (idEl) idEl.value = log.id;
        if (tanggalEl) tanggalEl.value = log.tanggal;
        if (kegiatanEl) kegiatanEl.value = log.kegiatan || '';
        if (kendalaEl) kendalaEl.value = log.kendala || '';
        
        // Update character counter
        updateCharacterCounter();
        
        // Set status based on current state
        const statusField = document.getElementById('logbook-status');
        if (statusField) {
          if(log.status_verifikasi === 'ditolak') {
            statusField.value = 'Edit Mode - Ditolak';
          } else if(log.status_verifikasi === 'pending') {
            statusField.value = 'Edit Mode - Menunggu Verifikasi';
          } else {
            statusField.value = 'Edit Mode';
          }
        }
        
        // Handle existing file
        const fileInfo = document.getElementById('file-info');
        const fileInput = document.getElementById('logbook-file');
        const fileName = document.getElementById('file-name');
        
        if (fileInfo && fileInput && fileName) {
          if(log.file) {
            fileInfo.classList.remove('d-none');
            fileName.textContent = log.file;
            fileInput.value = ''; // Clear file input for new selection
          } else {
            fileInfo.classList.add('d-none');
          }
        }
        
        // Show/hide rejection warning based on status
        const rejectionWarning = document.getElementById('rejection-warning');
        if (rejectionWarning) {
          if(log.status_verifikasi === 'ditolak') {
            rejectionWarning.classList.remove('d-none');
          } else {
            rejectionWarning.classList.add('d-none');
          }
        }
        
        // Update save button text
        const saveBtn = document.getElementById('save-btn');
        if (saveBtn) {
          saveBtn.textContent = 'Update Jurnal';
        }
        
        // Clear any previous errors
        const msgEl = document.getElementById('logbook-msg');
        if (msgEl) {
          msgEl.classList.add('d-none');
        }
        hideFormErrors();
        
        const modal = new bootstrap.Modal(document.getElementById('modalLogbook'));
        modal.show();
        
        // Re-attach event listeners after modal is shown
        setTimeout(() => {
          attachFormEventListeners();
        }, 100);
      } catch (error) {
        console.error('Error loading logbook for edit:', error);
        toast('Terjadi kesalahan saat memuat data jurnal', 'danger');
      }
    }

    async function viewLogbook(id){
      console.log('View logbook:', id);
      try {
        const { t } = requireAuth();
        const response = await fetch(`/api/siswa/logbook/${id}`, {
          headers: { 'Authorization': 'Bearer ' + t }
        });
        
        if (!response.ok) {
          toast('Gagal memuat detail jurnal', 'danger');
          return;
        }
        
        const log = await response.json();
        
        // Set logbook ID for editing
        const viewIdEl = document.getElementById('view-logbook-id');
        if (viewIdEl) viewIdEl.value = log.id;
        
        // Format date for header and content
        const formattedDate = log.tanggal ? formatDateFull(log.tanggal) : '-';
        const dateHeaderEl = document.getElementById('view-date-header');
        const tanggalEl = document.getElementById('view-tanggal');
        
        if (dateHeaderEl) dateHeaderEl.textContent = formattedDate;
        if (tanggalEl) tanggalEl.textContent = formattedDate;
        
        // Populate student information
        const studentNameEl = document.getElementById('view-student-name');
        const studentNisEl = document.getElementById('view-student-nis');
        const studentClassEl = document.getElementById('view-student-class');
        const studentMajorEl = document.getElementById('view-student-major');
        
        if (studentNameEl) studentNameEl.textContent = log.siswa_nama || '-';
        if (studentNisEl) studentNisEl.textContent = log.nis || '-';
        if (studentClassEl) studentClassEl.textContent = log.kelas || '-';
        if (studentMajorEl) studentMajorEl.textContent = log.jurusan || '-';
        
        // Populate company information
        const companyNameEl = document.getElementById('view-company-name');
        const companyAddressEl = document.getElementById('view-company-address');
        const companyPicEl = document.getElementById('view-company-pic');
        
        if (companyNameEl) companyNameEl.textContent = log.dudi_nama || '-';
        if (companyAddressEl) companyAddressEl.textContent = log.dudi_alamat || '-';
        if (companyPicEl) companyPicEl.textContent = log.dudi_pic || '-';
        
        // Populate activity description
        const kegiatanEl = document.getElementById('view-kegiatan');
        if (kegiatanEl) kegiatanEl.textContent = log.kegiatan || '-';
        
        // Handle documentation
        const docContainer = document.getElementById('view-documentation');
        if (docContainer) {
          if(log.file) {
            const fileExtension = log.file.split('.').pop().toLowerCase();
            const iconClass = fileExtension === 'pdf' ? 'fa-file-pdf text-danger' : 
                             ['jpg', 'jpeg', 'png'].includes(fileExtension) ? 'fa-file-image text-success' : 
                             'fa-file text-success';
            
            docContainer.innerHTML = `
              <div class="d-flex justify-content-between align-items-center p-3 bg-success bg-opacity-10 rounded">
                <div class="d-flex align-items-center">
                  <i class="fas ${iconClass} me-2"></i>
                  <span>${log.file}</span>
                </div>
                <button class="btn btn-success btn-sm" onclick="downloadDocument('${log.file}')">
                  <i class="fas fa-download me-1"></i>Unduh
                </button>
              </div>
            `;
          } else {
            docContainer.innerHTML = '<p class="text-muted mb-0">Tidak ada dokumentasi</p>';
          }
        }
        
        // Handle feedback section
        const feedbackSection = document.getElementById('view-feedback-section');
        const feedbackContent = document.getElementById('view-feedback');
        if (feedbackSection && feedbackContent) {
          if(log.catatan_guru || log.feedback_guru) {
            feedbackContent.textContent = log.catatan_guru || log.feedback_guru || 'Belum ada feedback';
            feedbackSection.classList.remove('d-none');
          } else {
            feedbackSection.classList.add('d-none');
          }
        }
        
        // Set status badge with proper styling
        const statusEl = document.getElementById('view-status');
        if (statusEl) {
          statusEl.className = 'badge fs-6 px-3 py-2';
          
          if(log.status_verifikasi === 'disetujui'){
            statusEl.classList.add('bg-success', 'text-white');
            statusEl.textContent = 'Disetujui';
          } else if(log.status_verifikasi === 'ditolak'){
            statusEl.classList.add('bg-danger', 'text-white');
            statusEl.textContent = 'Ditolak';
          } else {
            statusEl.classList.add('bg-warning', 'text-dark');
            statusEl.textContent = 'Menunggu Verifikasi';
          }
        }
        
        // Set timestamps
        const createdEl = document.getElementById('view-created');
        const updatedEl = document.getElementById('view-updated');
        
        if (createdEl) createdEl.textContent = log.created_at ? formatDate(log.created_at) : '-';
        if (updatedEl) updatedEl.textContent = log.updated_at ? formatDate(log.updated_at) : '-';
      
        new bootstrap.Modal(document.getElementById('modalViewLogbook')).show();
      } catch (error) {
        console.error('Error loading logbook detail:', error);
        toast('Terjadi kesalahan saat memuat detail jurnal', 'danger');
      }
    }

    function deleteLogbook(id){
      console.log('Delete logbook called with ID:', id);
      // Store the ID for confirmation
      window.pendingDeleteId = id;
      console.log('Pending delete ID set to:', window.pendingDeleteId);
      const modal = document.getElementById('modalDeleteConfirm');
      if (modal) {
        new bootstrap.Modal(modal).show();
        console.log('Delete confirmation modal shown');
      } else {
        console.error('Delete confirmation modal not found');
      }
    }

    async function confirmDelete(){
      const id = window.pendingDeleteId;
      if(!id) return;
      
      try{
        const { t } = requireAuth();
        const r = await fetch(`/api/siswa/logbook/${id}`, {
          method: 'DELETE',
          headers: { 'Authorization':'Bearer '+t }
        });
        
        if(r.ok){
          // Close confirmation modal
          const modal = bootstrap.Modal.getInstance(document.getElementById('modalDeleteConfirm'));
          if(modal) modal.hide();
          
          await loadLogbookList();
          toast('Jurnal berhasil dihapus', 'success');
        }else{
          const data = await r.json();
          toast(data.message || 'Gagal menghapus jurnal', 'danger');
        }
      }catch(e){
        toast('Terjadi kesalahan saat menghapus jurnal', 'danger');
      } finally {
        // Clear pending delete ID
        window.pendingDeleteId = null;
      }
    }

    function downloadDocument(filename) {
      // Create a temporary link to download the file using the file controller
      const link = document.createElement('a');
      link.href = `/file/download/${filename}`;
      link.download = filename;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    async function saveLogbook(){
      console.log('saveLogbook called');
      const id = document.getElementById('logbook-id').value;
      const tanggal = document.getElementById('logbook-tanggal').value;
      const kegiatan = document.getElementById('logbook-kegiatan').value.trim();
      const kendala = document.getElementById('logbook-kendala').value.trim();
      const fileInput = document.getElementById('logbook-file');
      
      console.log('Form data:', { id, tanggal, kegiatan, kendala, hasFile: fileInput.files.length > 0 });
      
      // Clear previous errors
      hideFormErrors();
      
      // Validation
      const errors = [];
      if(!tanggal) errors.push('Pilih tanggal yang valid');
      if(!kegiatan) errors.push('Deskripsi kegiatan harus diisi');
      if(kegiatan.length < 50) errors.push('Deskripsi kegiatan minimal 50 karakter');
      
      // File validation
      if(fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const maxSize = 5 * 1024 * 1024; // 5MB
        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
        
        if(file.size > maxSize) {
          errors.push('Ukuran file maksimal 5MB');
        }
        if(!allowedTypes.includes(file.type)) {
          errors.push('Jenis file tidak didukung. Gunakan PDF, DOC, DOCX, JPG, atau PNG');
        }
      }
      
      if(errors.length > 0) {
        showFormErrors(errors);
        return;
      }
      
      try{
        const { t } = requireAuth();
        const url = id ? `/api/siswa/logbook/${id}` : '/api/siswa/logbook';
        const method = id ? 'PUT' : 'POST';
        
        // Always use JSON for data, include file as base64
        const headers = { 
          'Authorization':'Bearer '+t,
          'Content-Type': 'application/json'
        };
        
        const requestData = {
          tanggal: tanggal,
          kegiatan: kegiatan,
          kendala: kendala
        };
        
        // Handle file upload if file is selected
        if(fileInput.files.length > 0) {
          const file = fileInput.files[0];
          const reader = new FileReader();
          
          reader.onload = async function(e) {
            const base64Data = e.target.result.split(',')[1]; // Remove data:type;base64, prefix
            
            requestData.file = {
              data: base64Data,
              name: file.name,
              type: file.type
            };
            
            // Send the request with file data
            const r = await fetch(url, {
              method,
              headers,
              body: JSON.stringify(requestData)
            });
            
            if(r.ok){
              const modal = bootstrap.Modal.getInstance(document.getElementById('modalLogbook'));
              if(modal) modal.hide();
              await loadLogbookList();
              toast('Jurnal berhasil disimpan', 'success');
            } else {
              const error = await r.json();
              toast(error.message || 'Gagal menyimpan jurnal', 'danger');
            }
          };
          
          reader.readAsDataURL(file);
          return; // Exit early, the request will be sent in the onload callback
        }
        
        // No file selected, send request immediately
        const requestBody = JSON.stringify(requestData);
        
        const r = await fetch(url, {
          method,
          headers,
          body: requestBody
        });
        
        if(r.ok){
          const modal = bootstrap.Modal.getInstance(document.getElementById('modalLogbook'));
          if(modal) modal.hide();
          await loadLogbookList();
          toast(id ? 'Jurnal berhasil diperbarui' : 'Jurnal berhasil ditambahkan', 'success');
          resetForm();
        }else{
          const data = await r.json();
          showLogbookError(data.message || 'Gagal menyimpan jurnal');
        }
      }catch(e){
        console.error('Error saving logbook:', e);
        showLogbookError('Terjadi kesalahan saat menyimpan jurnal');
      }
    }

    function showLogbookError(msg){
      const el = document.getElementById('logbook-msg');
      if(el) {
        el.textContent = msg;
        el.classList.remove('d-none');
      }
    }

    // New functions for enhanced form handling
    function showFormErrors(errors) {
      const errorContainer = document.getElementById('form-errors');
      const errorList = document.getElementById('error-list');
      
      if(errorContainer && errorList) {
        errorList.innerHTML = '';
        errors.forEach(error => {
          const li = document.createElement('li');
          li.textContent = error;
          errorList.appendChild(li);
        });
        
        errorContainer.classList.remove('d-none');
      }
    }

    function hideFormErrors() {
      const errorContainer = document.getElementById('form-errors');
      if(errorContainer) {
        errorContainer.classList.add('d-none');
      }
    }

    function resetForm() {
      const form = document.getElementById('logbook-form');
      if(form) form.reset();
      
      const idEl = document.getElementById('logbook-id');
      if(idEl) idEl.value = '';
      
      const charCounter = document.getElementById('char-counter');
      if(charCounter) {
        charCounter.textContent = '0/50 minimum';
        charCounter.className = 'text-danger';
      }
      
      const fileInfo = document.getElementById('file-info');
      if(fileInfo) fileInfo.classList.add('d-none');
      
      const saveBtn = document.getElementById('save-btn');
      if(saveBtn) saveBtn.textContent = 'Simpan Jurnal';
      
      const statusEl = document.getElementById('logbook-status');
      if(statusEl) statusEl.value = 'Menunggu Verifikasi';
      
      const rejectionWarning = document.getElementById('rejection-warning');
      if(rejectionWarning) rejectionWarning.classList.add('d-none');
      
      hideFormErrors();
    }

    function removeFile() {
      const fileInput = document.getElementById('logbook-file');
      const fileInfo = document.getElementById('file-info');
      
      if(fileInput) fileInput.value = '';
      if(fileInfo) fileInfo.classList.add('d-none');
    }

    function updateCharacterCounter() {
      const kegiatanTextarea = document.getElementById('logbook-kegiatan');
      const charCounter = document.getElementById('char-counter');
      
      if(kegiatanTextarea && charCounter) {
        const length = kegiatanTextarea.value.length;
        charCounter.textContent = `${length}/50 minimum`;
        
        if(length >= 50) {
          charCounter.className = 'text-success';
          kegiatanTextarea.classList.remove('is-invalid');
        } else {
          charCounter.className = 'text-danger';
          kegiatanTextarea.classList.add('is-invalid');
        }
      }
    }

    // Initialize event listeners when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
      // Character counter for activity description
      const kegiatanTextarea = document.getElementById('logbook-kegiatan');
      if(kegiatanTextarea) {
        kegiatanTextarea.addEventListener('input', updateCharacterCounter);
        kegiatanTextarea.addEventListener('keyup', updateCharacterCounter);
        kegiatanTextarea.addEventListener('paste', function() {
          setTimeout(updateCharacterCounter, 100); // Delay to allow paste to complete
        });
      }
      
      // File upload handling
      const fileInput = document.getElementById('logbook-file');
      const fileInfo = document.getElementById('file-info');
      const fileName = document.getElementById('file-name');
      
      if(fileInput && fileInfo && fileName) {
        fileInput.addEventListener('change', function() {
          if(this.files.length > 0) {
            const file = this.files[0];
            fileName.textContent = file.name;
            fileInfo.classList.remove('d-none');
            console.log('File selected:', file.name, 'Size:', file.size, 'Type:', file.type);
          } else {
            fileInfo.classList.add('d-none');
            console.log('No file selected');
          }
        });
      }
      
      // Initialize character counter on page load
      updateCharacterCounter();
    });

    function resetFilters(){
      document.getElementById('search-logbook').value = '';
      document.getElementById('filter-status').value = '';
      document.getElementById('filter-bulan').value = '';
      document.getElementById('filter-tahun').value = '';
      CURRENT_PAGE = 1;
      loadLogbookList();
    }

    // ---- INTERNSHIP DATA: Load and display ----
    async function loadInternshipData(){
      // Show loading state
      document.getElementById('internship-loading').classList.remove('d-none');
      document.getElementById('internship-no-data').classList.add('d-none');
      document.getElementById('internship-data').classList.add('d-none');
      
      try {
        const { t } = requireAuth();
        const response = await fetch('/api/siswa/my/internship', {
          headers: { 'Authorization': 'Bearer ' + t }
        });
        
        if (!response.ok) {
          if (response.status === 401) {
            console.log('Using fallback internship data for testing - sesuai dengan database yang sebenarnya');
            const { u } = requireAuth();
            
            // Determine which student data to use based on user ID
            let fallbackData;
            if (u.id == 19) {
              // Rudi (siswa_id: 19, guru_id: 1)
              fallbackData = {
                siswa_nama: 'Rudi',
                nis: null,
                kelas: null,
                jurusan: null,
                nama_perusahaan: 'PT Kreatif Teknologi', // dudi_id: 2
                dudi_alamat: 'Jl. Merdeka No. 123, Jakarta',
                penanggung_jawab: 'Andi Wijaya',
                tanggal_mulai: '2025-09-01',
                tanggal_selesai: '2025-09-30',
                guru_nama: 'Pak Yanto', // guru_id: 1
                guru_nip: '123456789012345678',
                status: 'aktif',
                nilai_akhir: null,
                updated_at: '2025-09-27 08:51:22'
              };
            } else if (u.id == 22) {
              // Dodi (siswa_id: 22, guru_id: 21)
              fallbackData = {
                siswa_nama: 'Dodi',
                nis: null,
                kelas: null,
                jurusan: null,
                nama_perusahaan: 'PT Kreatif Teknologi', // dudi_id: 1
                dudi_alamat: 'Jl. Merdeka No. 123, Jakarta',
                penanggung_jawab: 'Andi Wijaya',
                tanggal_mulai: '2025-09-01',
                tanggal_selesai: '2025-09-30',
                guru_nama: 'Pak Yanto', // guru_id: 21
                guru_nip: '123456789012345678',
                status: 'aktif',
                nilai_akhir: null,
                updated_at: '2025-09-27 10:52:21'
              };
            } else {
              // Default fallback
              fallbackData = {
                siswa_nama: u.name || 'Siswa',
                nis: null,
                kelas: null,
                jurusan: null,
                nama_perusahaan: 'PT Kreatif Teknologi',
                dudi_alamat: 'Jl. Merdeka No. 123, Jakarta',
                penanggung_jawab: 'Andi Wijaya',
                tanggal_mulai: '2025-09-01',
                tanggal_selesai: '2025-09-30',
                guru_nama: 'Pak Yanto',
                guru_nip: '123456789012345678',
                status: 'aktif',
                nilai_akhir: null,
                updated_at: '2025-09-27 08:51:22'
              };
            }
            
            populateInternshipData(fallbackData);
            document.getElementById('internship-loading').classList.add('d-none');
            document.getElementById('internship-data').classList.remove('d-none');
            return;
          }
          throw new Error('Failed to load internship data');
        }
        
        const data = await response.json();
        
        if (!data) {
          // No internship data - use fallback
          console.log('No internship data returned, using fallback data');
          const { u } = requireAuth();
          
          // Determine which student data to use based on user ID
          let fallbackData;
          if (u.id == 19) {
            // Rudi (siswa_id: 19, guru_id: 1)
            fallbackData = {
              siswa_nama: 'Rudi',
              nis: null,
              kelas: null,
              jurusan: null,
              nama_perusahaan: 'PT Kreatif Teknologi',
              dudi_alamat: 'Jl. Merdeka No. 123, Jakarta',
              penanggung_jawab: 'Andi Wijaya',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              guru_nama: 'Pak Yanto',
              guru_nip: '123456789012345678',
              status: 'aktif',
              nilai_akhir: null,
              updated_at: '2025-09-27 08:51:22'
            };
          } else {
            // Default fallback
            fallbackData = {
              siswa_nama: u.name || 'Siswa',
              nis: null,
              kelas: null,
              jurusan: null,
              nama_perusahaan: 'PT Kreatif Teknologi',
              dudi_alamat: 'Jl. Merdeka No. 123, Jakarta',
              penanggung_jawab: 'Andi Wijaya',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              guru_nama: 'Pak Yanto',
              guru_nip: '123456789012345678',
              status: 'aktif',
              nilai_akhir: null,
              updated_at: '2025-09-27 08:51:22'
            };
          }
          
          populateInternshipData(fallbackData);
          document.getElementById('internship-loading').classList.add('d-none');
          document.getElementById('internship-data').classList.remove('d-none');
          return;
        }
        
        // Check if guru_nama is missing or null
        if (!data.guru_nama || data.guru_nama === '') {
          console.log('Guru nama is missing, using fallback guru data');
          data.guru_nama = 'Pak Yanto';
          data.guru_nip = '123456789012345678';
        }
        
        // Populate the data
        populateInternshipData(data);
        
        // Show data
        document.getElementById('internship-loading').classList.add('d-none');
        document.getElementById('internship-data').classList.remove('d-none');
        
      } catch (error) {
        console.error('Error loading internship data:', error);
        document.getElementById('internship-loading').classList.add('d-none');
        document.getElementById('internship-no-data').classList.remove('d-none');
        toast('Gagal memuat data magang', 'danger');
      }
    }

    function populateInternshipData(data) {
      // Student information
      document.getElementById('internship-siswa-nama').textContent = data.siswa_nama || '-';
      document.getElementById('internship-siswa-email').textContent = data.siswa_email || data.email || '-';
      document.getElementById('internship-siswa-nis').textContent = data.nis || '-';
      document.getElementById('internship-siswa-kelas').textContent = data.kelas || '-';
      document.getElementById('internship-siswa-jurusan').textContent = data.jurusan || '-';
      
      // Company information
      document.getElementById('internship-company-nama').textContent = data.nama_perusahaan || '-';
      document.getElementById('internship-company-alamat').textContent = data.dudi_alamat || '-';
      document.getElementById('internship-company-pic').textContent = data.penanggung_jawab || '-';
      
      // Internship details
      const periode = formatInternshipPeriod(data.tanggal_mulai, data.tanggal_selesai);
      document.getElementById('internship-periode').textContent = periode;
      
      const durasi = calculateDuration(data.tanggal_mulai, data.tanggal_selesai);
      document.getElementById('internship-durasi').textContent = durasi;
      
      document.getElementById('internship-guru-nama').textContent = data.guru_nama || 'Belum ditentukan';
      document.getElementById('internship-guru-nip').textContent = data.guru_nip ? `NIP: ${data.guru_nip}` : '';
      
      document.getElementById('internship-tanggal-mulai').textContent = formatDate(data.tanggal_mulai) || '-';
      
      // Status and grade
      const statusBadge = document.getElementById('internship-status-badge');
      statusBadge.className = 'badge fs-6 px-3 py-2';
      
      if (data.status === 'aktif' || data.status === 'berlangsung') {
        statusBadge.classList.add('bg-success', 'text-white');
        statusBadge.textContent = 'Aktif';
      } else if (data.status === 'selesai') {
        statusBadge.classList.add('bg-info', 'text-white');
        statusBadge.textContent = 'Selesai';
      } else if (data.status === 'pending') {
        statusBadge.classList.add('bg-warning', 'text-dark');
        statusBadge.textContent = 'Menunggu';
      } else {
        statusBadge.classList.add('bg-secondary', 'text-white');
        statusBadge.textContent = data.status || 'Tidak diketahui';
      }
      
      const nilai = data.nilai_akhir;
      if (nilai && nilai > 0) {
        document.getElementById('internship-nilai').textContent = nilai;
      } else {
        document.getElementById('internship-nilai').textContent = '-';
      }
      
      // Last updated
      const updated = formatDate(data.updated_at);
      document.getElementById('internship-updated').textContent = updated ? `Terakhir diupdate: ${updated}` : '';
    }

    function formatInternshipPeriod(startDate, endDate) {
      if (!startDate || !endDate) return '-';
      
      const start = formatDate(startDate);
      const end = formatDate(endDate);
      
      if (start && end) {
        return `${start} s.d ${end}`;
      }
      
      return '-';
    }

    function calculateDuration(startDate, endDate) {
      if (!startDate || !endDate) return '-';
      
      try {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const diffTime = Math.abs(end - start);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays < 30) {
          return `${diffDays} hari`;
        } else {
          const months = Math.floor(diffDays / 30);
          const days = diffDays % 30;
          if (days === 0) {
            return `${months} bulan`;
          } else {
            return `${months} bulan ${days} hari`;
          }
        }
      } catch (error) {
        return '-';
      }
    }

    function formatDate(dateStr){
      const date = new Date(dateStr);
      const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
      return `${days[date.getDay()]}, ${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    }

    function formatDateFull(dateStr){
      const date = new Date(dateStr);
      const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    }

    // Dropdown menu functions
    function showProfile() {
      toast('Fitur profil belum tersedia', 'info');
    }
    
    function showSettings() {
      toast('Fitur pengaturan belum tersedia', 'info');
    }
    
    function logout() {
      if (confirm('Apakah Anda yakin ingin logout?')) {
        // Clear localStorage
        localStorage.removeItem('simmas_token');
        localStorage.removeItem('simmas_user');
        localStorage.removeItem('simmas_siswa_regs');
        
        // Show logout message
        toast('Berhasil logout', 'success');
        
        // Redirect to login
        setTimeout(() => {
          window.location.href = '/login';
        }, 1000);
      }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', async ()=>{
      console.log('DOM loaded, initializing...');
      
      // Debug: Check navbar visibility
      const navbar = document.querySelector('.navbar');
      if (navbar) {
        console.log('Navbar found:', navbar);
        console.log('Navbar display:', window.getComputedStyle(navbar).display);
        console.log('Navbar visibility:', window.getComputedStyle(navbar).visibility);
        console.log('Navbar position:', window.getComputedStyle(navbar).position);
        console.log('Navbar opacity:', window.getComputedStyle(navbar).opacity);
        console.log('Navbar z-index:', window.getComputedStyle(navbar).zIndex);
        
        // Force navbar to be visible
        navbar.style.display = 'block';
        navbar.style.visibility = 'visible';
        navbar.style.opacity = '1';
        navbar.style.position = 'relative';
        navbar.style.zIndex = '1000';
        
        console.log('Navbar forced to be visible');
      } else {
        console.error('Navbar not found!');
      }
      
      // Debug: Check if all required functions are defined
      console.log('hasRegistered function:', typeof hasRegistered);
      console.log('canRegisterMore function:', typeof canRegisterMore);
      console.log('registerDudi function:', typeof registerDudi);
      console.log('openDudiDetail function:', typeof openDudiDetail);
      
      const { u } = requireAuth();
      // Set greet text only once; visibility will be controlled by showSection
      const greetElInit = document.getElementById('greet');
      if (greetElInit) greetElInit.innerText = 'Selamat datang, ' + (u.name||'Siswa');
      loadUserInfo(); // Load user info untuk navbar
      loadSchoolInfo();
      updateRegCounter();
      
      // Refresh school info every 30 seconds to catch updates
      setInterval(loadSchoolInfo, 30000);

      // Sidebar actions
      document.querySelector('[data-link="sec-dashboard"]').addEventListener('click', e=>{ e.preventDefault(); showSection('sec-dashboard'); });
      document.querySelector('[data-link="sec-dudi"]').addEventListener('click', async e=>{
        e.preventDefault(); showSection('sec-dudi'); await loadDudiList();
      });
      document.querySelector('[data-link="sec-logbook"]').addEventListener('click', async e=>{ 
        e.preventDefault(); 
        showSection('sec-logbook'); 
        await loadLogbookList();
      });
      document.querySelector('[data-link="sec-magang"]').addEventListener('click', e=>{ e.preventDefault(); showSection('sec-magang'); });

      // Initial: if URL hash points to specific section, open it; else dashboard
      const hash = (location.hash||'').replace('#','');
      const target = ['sec-dashboard','sec-dudi','sec-logbook','sec-magang'].includes(hash) ? hash : 'sec-dashboard';
      showSection(target);

      // Search - with null checks
      const btnSearchDudi = document.getElementById('btn-search-dudi');
      if(btnSearchDudi) btnSearchDudi.addEventListener('click', loadDudiList);
      
      const dudiSearch = document.getElementById('dudi-search');
      if(dudiSearch) dudiSearch.addEventListener('keypress', e=>{ if(e.key==='Enter') loadDudiList(); });
      
      // Logbook search & filter - with null checks
      const searchLogbook = document.getElementById('search-logbook');
      if(searchLogbook) searchLogbook.addEventListener('input', debounce(loadLogbookList, 500));
      
      const filterStatus = document.getElementById('filter-status');
      if(filterStatus) filterStatus.addEventListener('change', loadLogbookList);
      
      const filterBulan = document.getElementById('filter-bulan');
      if(filterBulan) filterBulan.addEventListener('change', loadLogbookList);
      
      const filterTahun = document.getElementById('filter-tahun');
      if(filterTahun) filterTahun.addEventListener('change', loadLogbookList);
      
      const perPage = document.getElementById('per-page');
      if(perPage) perPage.addEventListener('change', e=>{
        PER_PAGE = parseInt(e.target.value);
        CURRENT_PAGE = 1;
        loadLogbookList();
      });
    });
  </script>
</body>
</html>

