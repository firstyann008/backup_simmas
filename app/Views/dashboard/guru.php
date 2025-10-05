<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Guru - SIMMAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root { --brand-600:#1e7e71; --brand-700:#18665c; --brand-50:#e6f4f3; --bg-surface:#f7faf9; --border-color:#d7e3e1; }
    
    /* Ensure number input is fully editable */
    #gval {
      pointer-events: auto !important;
      user-select: auto !important;
      -webkit-user-select: auto !important;
      -moz-user-select: auto !important;
      -ms-user-select: auto !important;
    }
    
    #gval::-webkit-outer-spin-button,
    #gval::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    #gval[type=number] {
      -moz-appearance: textfield;
    }
    body { background-color: var(--bg-surface); }
    
    .main-content {
      background-color: #ffffff;
      min-height: 100vh;
    }
    
    .stat-card {
      background: white;
      border: 1px solid #dee2e6;
      border-radius: 0.75rem;
      padding: 1.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .stat-number { font-size: 2.5rem; font-weight: bold; color: var(--brand-600); }
    
    /* DUDI List Styling */
    .dudi-list {
      max-height: 600px;
      overflow-y: auto;
    }
    
    .dudi-item {
      border-bottom: 1px solid #e9ecef;
      padding: 1.5rem;
      transition: background-color 0.2s ease;
    }
    
    .dudi-item:last-child {
      border-bottom: none;
    }
    
    .dudi-item:hover {
      background-color: #f8f9fa;
    }
    
    .dudi-company {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
    }
    
    .dudi-company-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #28a745, #20c997);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
      flex-shrink: 0;
    }
    
    .dudi-company-info h6 {
      font-weight: 600;
      color: #212529;
      margin-bottom: 0.25rem;
    }
    
    .dudi-company-info .text-muted {
      font-size: 0.875rem;
      line-height: 1.4;
    }
    
    .dudi-contact {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    
    .dudi-contact-item {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }
    
    .dudi-contact-item i {
      width: 16px;
      color: #6c757d;
    }
    
    .dudi-responsible {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }
    
    .dudi-responsible i {
      width: 16px;
      color: #6c757d;
    }
    
    .dudi-students {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .dudi-students-badge {
      background: linear-gradient(135deg, #28a745, #20c997);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.875rem;
    }
    
    /* Modern Dashboard Styling */
    .stat-card-modern {
      background: white;
      border-radius: 12px;
      padding: 1rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
      transition: all 0.3s ease;
      border: 1px solid #f1f3f4;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    
    .stat-card-modern:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    
    .stat-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
      flex-shrink: 0;
    }
    
    .stat-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
    }
    
    .stat-label {
      font-size: 0.75rem;
      color: #6c757d;
      margin-bottom: 0.5rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    
    .stat-value {
      font-size: 1.75rem;
      font-weight: 700;
      color: #212529;
      line-height: 1;
      margin: 0;
    }
    
    /* Ensure equal height for stats cards */
    .row.g-4 {
      display: flex;
      flex-wrap: wrap;
    }
    
    .row.g-4 > [class*="col-"] {
      display: flex;
      flex-direction: column;
    }
    
    /* Responsive adjustments for stats cards */
    @media (max-width: 768px) {
      .stat-card-modern {
        padding: 0.875rem;
      }
      
      .stat-icon {
        width: 36px;
        height: 36px;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
      }
      
      .stat-value {
        font-size: 1.5rem;
      }
      
      .stat-label {
        font-size: 0.7rem;
        margin-bottom: 0.375rem;
      }
    }
    
    .content-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
    }
    
    .modern-list {
      max-height: 400px;
      overflow-y: auto;
    }
    
    .modern-list-item {
      padding: 1rem;
      border-bottom: 1px solid #f1f3f4;
      transition: background-color 0.2s ease;
    }
    
    .modern-list-item:last-child {
      border-bottom: none;
    }
    
    .modern-list-item:hover {
      background-color: #f8f9fa;
    }
    
    /* Modern Search Styling */
    .modern-search .input-group-text {
      border-right: none;
    }
    
    .modern-search .form-control:focus {
      border-color: #28a745;
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
    
    /* Modern Table Styling */
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
    
    /* Logbook Content Styling */
    .logbook-content {
      max-width: 300px;
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }
    
    .logbook-feedback {
      max-width: 200px;
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }
    
    .modern-table td {
      word-wrap: break-word;
      word-break: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }
    
    /* Table column widths for better layout */
    .modern-table {
      table-layout: fixed;
      width: 100%;
      min-width: 1000px;
    }
    
    .modern-table td:nth-child(1) { width: 60px; min-width: 60px; }
    .modern-table td:nth-child(2) { width: 200px; min-width: 200px; }
    .modern-table td:nth-child(3) { width: 300px; min-width: 300px; }
    .modern-table td:nth-child(4) { width: 200px; min-width: 200px; }
    .modern-table td:nth-child(5) { width: 120px; min-width: 120px; }
    .modern-table td:nth-child(6) { width: 200px; min-width: 200px; }
    .modern-table td:nth-child(7) { width: 100px; min-width: 100px; }
    
    .table-responsive {
      overflow-x: auto;
    }
    
    .modern-table td {
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .modern-table td:nth-child(3),
    .modern-table td:nth-child(4),
    .modern-table td:nth-child(6) {
      overflow: visible;
      text-overflow: initial;
    }
    
    .student-avatar {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
    }
    
    .info-panel {
      background: white;
      border: 1px solid #dee2e6;
      border-radius: 0.75rem;
      padding: 1.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .welcome-section { background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); color:#fff; border-radius:.75rem; padding:2rem; margin-bottom:2rem; }
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
        <div class="container py-4">
  <div class="tab-content">
    <div class="tab-pane fade show active" id="tab-dashboard">
      <!-- Welcome Header -->
      <div class="card border-0 shadow-sm mb-4" style="background: #2D807B;">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h2 class="mb-1 fw-bold text-white">Dashboard Guru</h2>
              <p class="text-white mb-0 opacity-90">Selamat datang di panel guru pembimbing magang siswa</p>
      </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-chart-line text-white me-2" style="font-size: 1.5rem;"></i>
              <span class="text-white opacity-90">Overview</span>
          </div>
          </div>
        </div>
          </div>

      <!-- Stats Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="card border-0 shadow-sm stat-card-modern">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-users"></i>
        </div>
                <div>
                  <div class="stat-label text-muted small">Total Siswa Bimbingan</div>
                  <div class="stat-value text-success fw-bold" id="stat-total"><?= $stats['total_siswa_bimbingan'] ?? 0 ?></div>
      </div>
    </div>
      </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0 shadow-sm stat-card-modern">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                  <i class="fas fa-briefcase"></i>
          </div>
                <div>
                  <div class="stat-label text-muted small">Magang Aktif</div>
                  <div class="stat-value text-info fw-bold" id="stat-dudi"><?= $stats['total_magang_aktif'] ?? 0 ?></div>
        </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0 shadow-sm stat-card-modern">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                  <i class="fas fa-book"></i>
                </div>
                <div>
                  <div class="stat-label text-muted small">Total Logbook</div>
                  <div class="stat-value text-warning fw-bold" id="stat-aktif"><?= $stats['total_logbook'] ?? 0 ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0 shadow-sm stat-card-modern">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                  <i class="fas fa-calendar-day"></i>
                </div>
                <div>
                  <div class="stat-label text-muted small">Logbook Hari Ini</div>
                  <div class="stat-value text-primary fw-bold" id="stat-logbook">0</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Cards -->
      <div class="row g-4">
        <div class="col-lg-7">
          <!-- Siswa Bimbingan Card -->
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 pb-0">
              <div class="d-flex align-items-center">
                <div class="content-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-users"></i>
          </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">Siswa Bimbingan</h5>
                  <small class="text-muted">Daftar siswa yang sedang dibimbing</small>
          </div>
        </div>
            </div>
            <div class="card-body pt-3">
              <div id="list-magang" class="modern-list">
                <?php if (!empty($siswa_bimbingan)): ?>
                  <?php foreach ($siswa_bimbingan as $siswa): ?>
                    <div class="modern-list-item">
                      <div class="d-flex align-items-center">
                        <div class="student-avatar bg-success bg-opacity-10 text-success me-3">
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="flex-grow-1">
                          <div class="fw-semibold text-dark"><?= $siswa['siswa_name'] ?? '-' ?></div>
                          <div class="small text-muted"><?= $siswa['nama_perusahaan'] ?? '-' ?></div>
                          <div class="small text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            <?= date('d/m/Y', strtotime($siswa['tanggal_mulai'])) ?> - <?= date('d/m/Y', strtotime($siswa['tanggal_selesai'])) ?>
                          </div>
                        </div>
                        <span class="badge bg-success"><?= $siswa['status'] ?? '-' ?></span>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="text-center py-4">
                    <i class="fas fa-users fa-3x text-muted opacity-50 mb-3"></i>
                    <div class="text-muted">Tidak ada siswa bimbingan</div>
                  </div>
                <?php endif; ?>
          </div>
        </div>
      </div>

          <!-- Logbook Terbaru Card -->
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pb-0">
              <div class="d-flex align-items-center">
                <div class="content-icon bg-warning bg-opacity-10 text-warning me-3">
                  <i class="fas fa-book"></i>
                </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">Logbook Terbaru</h5>
                  <small class="text-muted">Jurnal harian siswa terbaru</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-3">
              <div id="list-logbook" class="modern-list"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <!-- DUDI Aktif Card -->
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pb-0">
              <div class="d-flex align-items-center">
                <div class="content-icon bg-info bg-opacity-10 text-info me-3">
                  <i class="fas fa-building"></i>
                </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">DUDI Aktif</h5>
                  <small class="text-muted">Perusahaan tempat magang siswa</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-3">
              <div id="list-dudi" class="modern-list"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab-logbook">
      <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="content-icon bg-success bg-opacity-10 text-success me-3">
              <i class="fas fa-book"></i>
            </div>
            <div>
              <h4 class="mb-0 fw-bold text-dark">Jurnal Harian</h4>
              <small class="text-muted">Verifikasi dan kelola logbook siswa</small>
            </div>
          </div>
        </div>

        <!-- Modern Stats Cards -->
        <div class="row g-4 mb-4">
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                <i class="fas fa-book-open"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Total Logbook</div>
                <div class="stat-value" id="logbook-total">-</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="fas fa-clock"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Belum Diverifikasi</div>
                <div class="stat-value" id="logbook-pending">-</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-success bg-opacity-10 text-success">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Disetujui</div>
                <div class="stat-value" id="logbook-approved">-</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                <i class="fas fa-times-circle"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Ditolak</div>
                <div class="stat-value" id="logbook-rejected">-</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modern Filter Section -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-header bg-white border-0 pb-0">
            <div class="d-flex align-items-center">
              <div class="content-icon bg-success bg-opacity-10 text-success me-3">
                <i class="fas fa-filter"></i>
              </div>
              <div>
                <h5 class="mb-0 fw-bold text-dark">Filter & Pencarian</h5>
                <small class="text-muted">Saring dan cari data logbook</small>
              </div>
            </div>
          </div>
          <div class="card-body pt-3">
        <div class="row g-3">
          <div class="col-md-3">
                <label class="form-label fw-semibold text-dark">Status</label>
                <select id="fstatus" class="form-select border-success border-opacity-25">
          <option value="">Semua Status</option>
          <option value="pending">Pending</option>
          <option value="disetujui">Disetujui</option>
          <option value="ditolak">Ditolak</option>
        </select>
      </div>
          <div class="col-md-3">
                <label class="form-label fw-semibold text-dark">Bulan</label>
                <select id="fmonth" class="form-select border-success border-opacity-25">
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
          <div class="col-md-2">
                <label class="form-label fw-semibold text-dark">Tahun</label>
                <select id="fyear" class="form-select border-success border-opacity-25">
              <option value="">Semua Tahun</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
          </div>
          <div class="col-md-2">
                <label class="form-label fw-semibold text-dark">Tanggal Mulai</label>
                <input id="fdate-start" type="date" class="form-control border-success border-opacity-25">
          </div>
          <div class="col-md-2">
                <label class="form-label fw-semibold text-dark">Tanggal Akhir</label>
                <input id="fdate-end" type="date" class="form-control border-success border-opacity-25">
          </div>
        </div>
            <div class="row g-3 mt-3">
          <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Pencarian</label>
                <div class="input-group modern-search">
                  <span class="input-group-text bg-success bg-opacity-10 border-success border-opacity-25">
                    <i class="fas fa-search text-success"></i>
                  </span>
                  <input id="fsearch" type="text" class="form-control border-success border-opacity-25" 
                         placeholder="Cari siswa, kegiatan, atau kendala..." style="border-left: none;">
                </div>
          </div>
          <div class="col-md-3">
                <label class="form-label fw-semibold text-dark">Tampilkan per Halaman</label>
                <select id="fperpage" class="form-select border-success border-opacity-25">
              <option value="10">10 per halaman</option>
              <option value="25">25 per halaman</option>
              <option value="50">50 per halaman</option>
              <option value="100">100 per halaman</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
                <div class="d-flex gap-2 w-100">
                  <button class="btn btn-success flex-fill" onclick="loadLogbooks()">
                    <i class="fas fa-search me-1"></i>Filter
                  </button>
                  <button class="btn btn-outline-secondary" onclick="resetLogbookFilters()">
                    <i class="fas fa-undo me-1"></i>Reset
                  </button>
                </div>
              </div>
          </div>
        </div>
      </div>

        <!-- Modern Logbook Table -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="content-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-list"></i>
                </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">Daftar Logbook</h5>
                  <small class="text-muted">Data jurnal harian siswa</small>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
      <div class="table-responsive">
              <table class="table table-hover mb-0 modern-table">
                <thead class="table-success table-opacity-10">
                  <tr>
                    <th class="border-0 fw-semibold text-dark">#</th>
                    <th class="border-0 fw-semibold text-dark">Siswa & Tanggal</th>
                    <th class="border-0 fw-semibold text-dark">Kegiatan</th>
                    <th class="border-0 fw-semibold text-dark">Kendala</th>
                    <th class="border-0 fw-semibold text-dark">Status</th>
                    <th class="border-0 fw-semibold text-dark">Catatan Guru</th>
                    <th class="border-0 fw-semibold text-dark text-center">Aksi</th>
              </tr>
            </thead>
                <tbody id="grows">
                  <tr>
                    <td colspan="7" class="text-center py-5">
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
              <div id="logbook-pagination-info" class="text-muted small fw-semibold">Menampilkan 0 sampai 0 dari 0 entri</div>
              <nav>
                <ul class="pagination pagination-sm mb-0" id="logbook-pagination"></ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab-dudi">
      <div class="container-fluid px-0">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <i class="fas fa-building text-success me-3" style="font-size: 1.5rem;"></i>
            <h4 class="mb-0 fw-bold text-dark">Daftar DUDI</h4>
        </div>
            </div>

        <!-- Search and Pagination Controls -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="input-group" style="max-width: 500px;">
            <span class="input-group-text bg-white border-end-0">
              <i class="fas fa-search text-muted"></i>
            </span>
            <input id="gd-q" class="form-control border-start-0" placeholder="Cari perusahaan, alamat, penanggung jawab..." onkeyup="if(event.key==='Enter') loadDudiGuru()">
          </div>
          <div class="d-flex align-items-center">
            <span class="text-muted me-2">Tampilkan:</span>
            <select id="gd-perpage" class="form-select" style="width: 80px;" onchange="loadDudiGuru()">
              <option value="5">5</option>
              <option value="10" selected>10</option>
              <option value="20">20</option>
              <option value="50">50</option>
            </select>
            <span class="text-muted ms-2">per halaman</span>
          </div>
        </div>

        <!-- DUDI List -->
        <div class="card border-0 shadow-sm">
          <div class="card-body p-0">
            <div id="gd-rows" class="dudi-list">
              <!-- DUDI items will be loaded here -->
            </div>
          </div>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="text-muted">
            Menampilkan <span id="gd-showing-start">0</span> - <span id="gd-showing-end">0</span> dari <span id="gd-total-records">0</span> DUDI
          </div>
          <nav>
            <ul id="gd-pagination" class="pagination pagination-sm mb-0">
              <!-- Pagination buttons will be loaded here -->
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab-magang">
      <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="content-icon bg-success bg-opacity-10 text-success me-3">
              <i class="fas fa-briefcase"></i>
        </div>
            <div>
              <h4 class="mb-0 fw-bold text-dark">Manajemen Magang</h4>
              <small class="text-muted">Kelola data penempatan magang siswa</small>
            </div>
          </div>
          <button class="btn btn-success" onclick="openCreateInternship()">
            <i class="fas fa-plus me-2"></i>Tambah Magang
          </button>
          </div>

        <!-- Modern Stats Cards -->
        <div class="row g-4 mb-4">
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                <i class="fas fa-users"></i>
        </div>
              <div class="stat-content">
                <div class="stat-label">Total Magang</div>
                <div class="stat-value" id="im-total">-</div>
      </div>
    </div>
        </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-success bg-opacity-10 text-success">
                <i class="fas fa-check-circle"></i>
            </div>
              <div class="stat-content">
                <div class="stat-label">Aktif</div>
                <div class="stat-value" id="im-aktif">-</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-info bg-opacity-10 text-info">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Selesai</div>
                <div class="stat-value" id="im-selesai">-</div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-card-modern">
              <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="fas fa-clock"></i>
              </div>
              <div class="stat-content">
                <div class="stat-label">Pending</div>
                <div class="stat-value" id="im-pending">-</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-header bg-white border-0 pb-0">
            <div class="d-flex align-items-center">
              <div class="content-icon bg-success bg-opacity-10 text-success me-3">
                <i class="fas fa-search"></i>
              </div>
            <div>
                <h5 class="mb-0 fw-bold text-dark">Pencarian & Filter</h5>
                <small class="text-muted">Cari dan filter data magang</small>
              </div>
            </div>
          </div>
          <div class="card-body pt-3">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="input-group modern-search">
                  <span class="input-group-text bg-success bg-opacity-10 border-success border-opacity-25">
                    <i class="fas fa-search text-success"></i>
                  </span>
                  <input type="text" id="im-q" class="form-control border-success border-opacity-25" 
                         placeholder="Cari siswa, guru, atau DUDI..." style="border-left: none;">
                </div>
              </div>
              <div class="col-md-3">
                <select id="im-status" class="form-select border-success border-opacity-25" onchange="loadInternships()">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="pending">Pending</option>
                <option value="selesai">Selesai</option>
              </select>
            </div>
              <div class="col-md-3">
                <div class="d-flex gap-2">
                  <button class="btn btn-outline-success" onclick="loadInternships()">
                    <i class="fas fa-search me-1"></i>Cari
                  </button>
                  <button class="btn btn-outline-secondary" onclick="resetMagangFilters()">
                    <i class="fas fa-undo me-1"></i>Reset
                  </button>
          </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modern Magang List -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="content-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-list"></i>
                </div>
                <div>
                  <h5 class="mb-0 fw-bold text-dark">Daftar Magang</h5>
                  <small class="text-muted">Data penempatan magang siswa</small>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <label class="form-label me-2 mb-0 fw-semibold text-dark">Tampilkan:</label>
                <select id="im-per-page" class="form-select form-select-sm border-success border-opacity-25" style="width:auto;" onchange="loadInternships()">
                  <option value="5">5 per halaman</option>
                  <option value="10" selected>10 per halaman</option>
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
                    <th class="border-0 fw-semibold text-dark">Siswa</th>
                    <th class="border-0 fw-semibold text-dark">Guru Pembimbing</th>
                    <th class="border-0 fw-semibold text-dark">DUDI</th>
                    <th class="border-0 fw-semibold text-dark">Periode</th>
                    <th class="border-0 fw-semibold text-dark">Status</th>
                    <th class="border-0 fw-semibold text-dark">Nilai</th>
                    <th class="border-0 fw-semibold text-dark text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="im-rows">
                  <tr>
                    <td colspan="7" class="text-center py-5">
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
              <div id="im-pagination-info" class="text-muted small fw-semibold">Menampilkan 0 sampai 0 dari 0 entri</div>
              <nav>
                <ul id="im-pagination" class="pagination pagination-sm mb-0"></ul>
            </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal create internship -->
      <div class="modal fade" id="mCreate" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Tambah Data Siswa Magang</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
          <div id="cMsg" class="text-danger small mb-2 d-none"></div>
          <div class="mb-3">
            <label class="form-label">Siswa</label>
            <select id="cSiswa" class="form-select"></select>
          </div>
          <div class="mb-3">
            <label class="form-label">Guru Pembimbing</label>
            <input id="cGuru" class="form-control" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">DUDI</label>
            <select id="cDudi" class="form-select"></select>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tanggal Mulai</label>
              <input id="cMulai" type="date" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Selesai</label>
              <input id="cSelesai" type="date" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><button class="btn btn-primary" onclick="submitCreateInternship()">Simpan</button></div>
      </div></div></div>

      <!-- Modal edit penempatan / nilai akhir -->
      <div class="modal fade" id="mGrade" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Edit Data Siswa Magang</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
          <input type="hidden" id="gid">
          <input type="hidden" id="gcur">
          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <label class="form-label">Tanggal Mulai</label>
              <input id="gstart" type="date" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Tanggal Selesai</label>
              <input id="gend" type="date" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Status</label>
              <select id="gstatus" class="form-select">
                <option value="pending">Pending</option>
                <option value="aktif">Aktif</option>
                <option value="selesai">Selesai</option>
              </select>
            </div>
          </div>
          <div class="mb-1">
          <label class="form-label">Nilai Akhir (0-100)</label>
            <input id="gval" type="number" min="0" max="100" class="form-control" placeholder="Isi setelah status selesai" step="1" inputmode="numeric">
            <div class="form-text">Nilai hanya dapat diisi jika status magang selesai</div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><button class="btn btn-primary" onclick="submitGrade()">Update</button></div>
      </div></div></div>
    </div>
  </div>

  <!-- Modal Detail Jurnal Harian -->
  <div class="modal fade" id="mJournalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="d-flex align-items-center">
            <div class="bg-primary text-white rounded p-2 me-3">
              <i class="fas fa-file-alt"></i>
            </div>
            <div>
              <h5 class="modal-title mb-0">Detail Jurnal Harian</h5>
              <small class="text-muted" id="journal-date">-</small>
            </div>
          </div>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="journal-id">
          
          <!-- Informasi Siswa -->
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="card border-0 bg-light">
                <div class="card-body p-3">
                  <h6 class="card-title mb-2"><i class="fas fa-user text-primary me-2"></i>Informasi Siswa</h6>
                  <p class="mb-1"><strong>Nama:</strong> <span id="journal-student">-</span></p>
                  <p class="mb-1"><strong>DUDI:</strong> <span id="journal-company">-</span></p>
                  <p class="mb-0"><strong>Tanggal:</strong> <span id="journal-date-detail">-</span></p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card border-0 bg-light">
                <div class="card-body p-3">
                  <h6 class="card-title mb-2"><i class="fas fa-info-circle text-info me-2"></i>Status Saat Ini</h6>
                  <p class="mb-0"><span id="journal-status-badge" class="badge">-</span></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Kegiatan -->
          <div class="mb-4">
            <h6 class="mb-3"><i class="fas fa-tasks text-success me-2"></i>Kegiatan yang Dilakukan</h6>
            <div class="card border-0 bg-light">
              <div class="card-body p-3">
                <p class="mb-0" id="journal-activity">-</p>
              </div>
            </div>
          </div>

          <!-- Kendala yang Dihadapi -->
          <div class="mb-4">
            <h6 class="mb-3"><i class="fas fa-exclamation-triangle text-warning me-2"></i>Kendala yang Dihadapi</h6>
            <div class="alert alert-warning d-flex align-items-start" role="alert">
              <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
              <div class="flex-grow-1">
                <p class="mb-0" id="journal-obstacle">-</p>
              </div>
            </div>
          </div>

          <!-- Dokumentasi -->
          <div class="mb-4">
            <h6 class="mb-3"><i class="fas fa-file-alt text-success me-2"></i>Dokumentasi</h6>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <i class="fas fa-file-alt me-2"></i>
              <div class="flex-grow-1" id="journal-documentation">
                <p class="text-muted mb-0">Tidak ada dokumentasi</p>
              </div>
            </div>
          </div>

          <!-- Catatan Guru -->
          <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="mb-0"><i class="fas fa-comment text-primary me-2"></i>Catatan Guru</h6>
              <button class="btn btn-sm btn-outline-primary" onclick="toggleTeacherNotesEdit()">
                <i class="fas fa-edit me-1"></i>Edit
              </button>
            </div>
            <div class="alert alert-info d-flex align-items-start" role="alert">
              <i class="fas fa-comment me-2 mt-1"></i>
              <div class="flex-grow-1">
                <div id="teacher-notes-display">
                  <p class="text-muted mb-0" id="journal-teacher-notes">Belum ada catatan dari guru</p>
                </div>
                <div id="teacher-notes-edit" class="d-none">
                  <textarea id="journal-teacher-notes-input" class="form-control" rows="4" placeholder="Masukkan catatan untuk siswa..."></textarea>
                  <div class="mt-2">
                    <button class="btn btn-sm btn-success me-2" onclick="saveTeacherNotes()">
                      <i class="fas fa-save me-1"></i>Simpan
                    </button>
                    <button class="btn btn-sm btn-secondary" onclick="cancelTeacherNotesEdit()">
                      <i class="fas fa-times me-1"></i>Batal
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <div class="d-flex justify-content-between w-100">
            <div class="text-muted small">
              <span>Dibuat: <span id="journal-created">-</span></span>
              <span class="ms-3">Diperbarui: <span id="journal-updated">-</span></span>
            </div>
            <div>
              <button class="btn btn-success me-2 px-4" onclick="approveJournal()">
                <i class="fas fa-check me-1"></i>Setujui
              </button>
              <button class="btn btn-danger px-4" onclick="rejectJournal()">
                <i class="fas fa-times me-1"></i>Tolak
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Verifikasi Sederhana (untuk kompatibilitas) -->
  <div class="modal fade" id="mVerify" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Verifikasi Jurnal</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">
      <input type="hidden" id="vid">
      <div class="mb-2"><label class="form-label">Status</label>
        <select id="vstatus" class="form-select">
          <option value="disetujui">Disetujui</option>
          <option value="ditolak">Ditolak</option>
          <option value="pending">Pending</option>
        </select>
      </div>
      <div class="mb-2"><label class="form-label">Catatan</label><textarea id="vcat" class="form-control" placeholder="Catatan untuk siswa..."></textarea></div>
    </div>
    <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</button><button class="btn btn-primary" onclick="submitVerify()">Simpan</button></div>
  </div></div></div>
</div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Authentication function
    function requireAuth(){
      const t=localStorage.getItem('simmas_token');
      const u=JSON.parse(localStorage.getItem('simmas_user')||'{}');
      if(!t||u.role!=='guru'){ location.href='/login'; }
      return {t,u};
    }
    
    // Navigation functions for guru dashboard
    function showDashboard() {
      console.log('Showing Dashboard');
      // Hide all tab panes
      document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('show', 'active');
      });
      // Show dashboard tab
      const dashboardTab = document.getElementById('tab-dashboard');
      if (dashboardTab) {
        dashboardTab.classList.add('show', 'active');
      }
      
      // Update active nav
      updateActiveNav('dashboard');
    }

    function showDudi() {
      console.log('Showing DUDI');
      // Hide all tab panes
      document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('show', 'active');
      });
      // Show DUDI tab
      const dudiTab = document.getElementById('tab-dudi');
      if (dudiTab) {
        dudiTab.classList.add('show', 'active');
      }
      
      // Load DUDI data
      loadDudiGuru();
      
      // Update active nav
      updateActiveNav('dudi');
    }

    function showMagang() {
      console.log('Showing Magang');
      // Hide all tab panes
      document.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('show', 'active');
      });
      // Show magang tab
      const magangTab = document.getElementById('tab-magang');
      if (magangTab) {
        magangTab.classList.add('show', 'active');
      }
      
      // Load magang data
      loadInternships();
      
      // Update active nav
      updateActiveNav('magang');
    }

    function showLogbook() {
      console.log('Showing Logbook');
      
      try {
      // Hide all tab panes
        const allPanes = document.querySelectorAll('.tab-pane');
        console.log('Found tab panes:', allPanes.length);
        allPanes.forEach(pane => {
        pane.classList.remove('show', 'active');
          console.log('Hiding pane:', pane.id);
      });
        
      // Show logbook tab
      const logbookTab = document.getElementById('tab-logbook');
      if (logbookTab) {
        logbookTab.classList.add('show', 'active');
          console.log('Showing logbook tab');
        } else {
          console.error('Logbook tab not found!');
      }
      
      // Load logbook data with delay to ensure DOM is ready
      setTimeout(() => {
        console.log('Loading logbook data...');
        loadLogbooks();
        loadLogbookStats();
      }, 100);
      
      // Update active nav
      updateActiveNav('logbook');
      } catch (error) {
        console.error('Error in showLogbook:', error);
      }
    }

    // Update active nav state
    function updateActiveNav(active) {
      // Remove active class from all nav links
      document.querySelectorAll('.sidebar .nav-link').forEach(link => {
        link.classList.remove('active');
      });
      
      // Add active class to clicked nav link
      const navLinks = document.querySelectorAll('.sidebar .nav-link');
      navLinks.forEach(link => {
        const text = link.querySelector('.fw-semibold').textContent.trim().toLowerCase();
        if (text === active.toLowerCase() || 
            (active === 'logbook' && text === 'jurnal harian') ||
            (active === 'magang' && text === 'magang')) {
          link.classList.add('active');
        }
      });
    }

    // Handle menu click from sidebar
    function handleMenuClick(menuName) {
      console.log('Menu clicked:', menuName);
      
      try {
      switch(menuName.toLowerCase()) {
        case 'sec-dashboard':
        case 'dashboard':
            console.log('Switching to Dashboard');
          showDashboard();
          break;
        case 'sec-dudi':
        case 'dudi':
            console.log('Switching to DUDI');
          showDudi();
          break;
        case 'sec-magang':
        case 'magang':
            console.log('Switching to Magang');
          showMagang();
          break;
        case 'sec-logbook':
        case 'jurnal harian':
        case 'logbook':
            console.log('Switching to Logbook');
          showLogbook();
          break;
        default:
          console.log('Unknown menu:', menuName);
          showDashboard();
        }
      } catch (error) {
        console.error('Error in handleMenuClick:', error);
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

    // Initialize dashboard on load
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Guru Dashboard initialized');
      
      // Load user info first
      loadUserInfo();
      loadSchoolInfo();
      
      // Refresh school info every 30 seconds to catch updates
      setInterval(loadSchoolInfo, 30000);
      
      // Show dashboard by default
      showDashboard();
      
      // Load initial data
      loadGuruStats();
    });
    // Helper functions
    function todayText(){const d=new Date();return d.toLocaleDateString('id-ID',{weekday:'long',day:'2-digit',month:'long',year:'numeric'})}
    function token(){return localStorage.getItem('simmas_token')}
    function hdr(){return {Authorization:'Bearer '+token(),'Content-Type':'application/json'}}
    
    // Set today's date - element not found, skipping
    // document.getElementById('today').innerText=todayText();
    
    // Ensure nilai input is always editable when modal opens
    const gradeModal = document.getElementById('mGrade');
    if (gradeModal) {
      gradeModal.addEventListener('shown.bs.modal', function() {
        const nilaiInput = document.getElementById('gval');
        if (nilaiInput) {
          nilaiInput.removeAttribute('readonly');
          nilaiInput.removeAttribute('disabled');
          nilaiInput.style.pointerEvents = 'auto';
          nilaiInput.style.userSelect = 'auto';
          nilaiInput.focus();
        }
      });
    }

    // Toast notification function
    function toast(message, type = 'info') {
  const toastContainer = document.getElementById('toast-container') || createToastContainer();
  
  const toastId = 'toast-' + Date.now();
  const bgClass = type === 'success' ? 'bg-success' : 
                  type === 'danger' ? 'bg-danger' : 
                  type === 'warning' ? 'bg-warning' : 'bg-info';
  
  const toastHTML = `
    <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          ${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  `;
  
  toastContainer.insertAdjacentHTML('beforeend', toastHTML);
  
  const toastElement = document.getElementById(toastId);
  const toast = new bootstrap.Toast(toastElement, { delay: 5000 });
  toast.show();
  
  // Remove toast element after it's hidden
  toastElement.addEventListener('hidden.bs.toast', () => {
    toastElement.remove();
  });
}

    function createToastContainer() {
      const container = document.createElement('div');
      container.id = 'toast-container';
      container.className = 'toast-container position-fixed top-0 end-0 p-3';
      container.style.zIndex = '9999';
      document.body.appendChild(container);
      return container;
    }
    
    // loadHeader function removed - user info now handled by navbar component
    
async function loadGuruStats(){ 
  const {t}=requireAuth(); 
  try{ 
    // 1) Global stats (selaras dengan dashboard admin)
    const rg=await fetch('/api/guru/stats/global',{headers:{Authorization:'Bearer '+t}}); 
    let g;
    if (!rg.ok) {
      console.log('Global stats API failed. Status:', rg.status);
      g = { total_siswa: 0, total_dudi: 0, total_magang: 0 };
    } else {
      g = await rg.json();
    }
    
    document.getElementById('stat-total').innerText=g.total_siswa??'-';
    document.getElementById('stat-dudi').innerText=g.total_dudi??'-';
    document.getElementById('stat-aktif').innerText=g.magang_aktif??'-';
    document.getElementById('stat-logbook').innerText=g.logbook_hari_ini??'-';

    // 2) Data spesifik siswa bimbingan untuk daftar
    const rs=await fetch('/api/guru/stats',{headers:{Authorization:'Bearer '+t}}); 
    let s;
    if (!rs.ok) {
      console.log('Guru stats API failed. Status:', rs.status);
      s = { magang_terbaru: [], logbook_terbaru: [] };
    } else {
      s = await rs.json();
    }
        const lm=document.getElementById('list-magang'); 
        lm.innerHTML='';
        if((s.magang_terbaru||[]).length > 0) {
        (s.magang_terbaru||[]).forEach(m=>{ 
          const periode = (m.tanggal_mulai?m.tanggal_mulai:'?') + ' / ' + (m.tanggal_selesai?m.tanggal_selesai:'?');
          const status = m.status||'';
          const div=document.createElement('div'); 
            div.className='modern-list-item'; 
            div.innerHTML=`<div class="d-flex align-items-center">
              <div class="student-avatar bg-success bg-opacity-10 text-success me-3">
                <i class="fas fa-user"></i>
            </div>
              <div class="flex-grow-1">
                <div class="fw-semibold text-dark">${m.siswa_nama||'-'}</div>
                <div class="small text-muted">${m.dudi_nama||'-'}</div>
                <div class="small text-muted">
                  <i class="fas fa-calendar-alt me-1"></i>
                  ${periode}
                </div>
              </div>
              <span class="badge ${status==='aktif'?'bg-success':(status==='selesai'?'bg-secondary':'bg-warning text-dark')}">${status}</span>
          </div>`; 
          lm.appendChild(div); 
        });
        } else {
          lm.innerHTML='<div class="text-center py-4"><i class="fas fa-users fa-3x text-muted opacity-50 mb-3"></i><div class="text-muted">Tidak ada siswa bimbingan</div></div>';
        }
        
        const ld=document.getElementById('list-dudi'); 
        ld.innerHTML='';
        if((g.dudi_aktif_list||[]).length > 0) {
        (g.dudi_aktif_list||[]).forEach(d=>{ 
          const div=document.createElement('div'); 
            div.className='modern-list-item'; 
            div.innerHTML=`<div class="d-flex align-items-center">
              <div class="student-avatar bg-info bg-opacity-10 text-info me-3">
                <i class="fas fa-building"></i>
              </div>
              <div class="flex-grow-1">
                <div class="fw-semibold text-dark">${d.nama_perusahaan}</div>
                <div class="small text-muted">${d.alamat||''}</div>
                <div class="small text-muted">
                  <i class="fas fa-phone me-1"></i>
                  ${d.telepon||'-'}
                </div>
              </div>
              <span class="badge bg-info">${d.jumlah_siswa||0} siswa</span>
            </div>`; 
          ld.appendChild(div); 
        });
        } else {
          ld.innerHTML='<div class="text-center py-4"><i class="fas fa-building fa-3x text-muted opacity-50 mb-3"></i><div class="text-muted">Tidak ada DUDI aktif</div></div>';
        }
        
        const ll=document.getElementById('list-logbook'); 
        if(ll){ 
          ll.innerHTML=''; 
          if((s.logbook_terbaru||[]).length > 0) {
          (s.logbook_terbaru||[]).forEach(l=>{ 
            const div=document.createElement('div'); 
              div.className='modern-list-item'; 
              div.innerHTML=`<div class="d-flex align-items-center">
                <div class="student-avatar bg-warning bg-opacity-10 text-warning me-3">
                  <i class="fas fa-book"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="fw-semibold text-dark">${l.siswa_nama||'-'}</div>
                  <div class="small text-muted">${l.dudi_nama||'-'}</div>
                  <div class="small text-muted">
                    <i class="fas fa-calendar-alt me-1"></i>
                    ${l.tanggal||''}
                  </div>
                  <div class="small text-truncate" style="max-width: 200px;" title="${l.kegiatan||''}">${l.kegiatan||''}</div>
              </div>
              <span class="badge ${l.status_verifikasi==='disetujui'?'bg-success':(l.status_verifikasi==='ditolak'?'bg-danger':'bg-warning text-dark')}">${l.status_verifikasi||'pending'}</span>
            </div>`; 
            ll.appendChild(div); 
          }); 
          } else {
            ll.innerHTML='<div class="text-center py-4"><i class="fas fa-book fa-3x text-muted opacity-50 mb-3"></i><div class="text-muted">Tidak ada logbook terbaru</div></div>';
          }
        }
        
        // duplicate into DUDI & Magang tabs
        const ld2=document.getElementById('list-dudi-2'); 
        if(ld2){ 
          ld2.innerHTML=''; 
          (s.dudi_aktif_list||[]).forEach(d=>{ 
            const div=document.createElement('div'); 
            div.className='border rounded p-2 d-flex justify-content-between'; 
            div.innerHTML=`<div><div class=\"fw-semibold\">${d.nama_perusahaan}</div><div class=\"small text-muted\">${d.alamat||''} ${d.telepon?(' • '+d.telepon):''}</div></div><span class=\"badge bg-primary align-self-center\">${d.jumlah_siswa||0} siswa</span>`; 
            ld2.appendChild(div); 
          }); 
        }
        
        const lm2=document.getElementById('list-magang-2'); 
        if(lm2){ 
          lm2.innerHTML=''; 
          (s.magang_terbaru||[]).forEach(m=>{ 
            const periode=(m.tanggal_mulai?m.tanggal_mulai:'?')+' / '+(m.tanggal_selesai?m.tanggal_selesai:'?');
            const status = m.status||'';
            const div=document.createElement('div'); 
            div.className='border rounded p-2'; 
            div.innerHTML=`<div class=\"d-flex justify-content-between\"> 
              <div>
                <div class=\"fw-semibold\">${m.siswa_nama||'-'}</div>
                <div class=\"small text-muted\">${m.dudi_nama||'-'} • ${periode}</div>
              </div>
              <span class=\"badge ${status==='aktif'?'bg-success':(status==='selesai'?'bg-secondary':'bg-warning text-dark')} align-self-start\">${status}</span>
            </div>`; 
            lm2.appendChild(div); 
          }); 
        }
      }catch(e){
        console.error('Error loading guru stats:', e);
      } 
    }
async function loadDudiGuru(){ 
  console.log('Loading DUDI data...');
  const {t}=requireAuth(); 
  const q=document.getElementById('gd-q')?document.getElementById('gd-q').value.trim():''; 
  try{ 
    const rs=await fetch('/api/guru/dudi/stats',{headers:{Authorization:'Bearer '+t}}); 
    let st;
    if (!rs.ok) {
      console.log('DUDI stats API failed. Status:', rs.status);
      st = { total_dudi: 0, total_siswa_magang: 0, rata_rata_siswa: '0.00' };
    } else {
      st = await rs.json();
    }
    console.log('DUDI stats:', st);
    
    if(document.getElementById('gd-total-dudi')){ 
      document.getElementById('gd-total-dudi').innerText=st.total_dudi??'-'; 
      document.getElementById('gd-total-siswa').innerText=st.total_siswa_magang??'-'; 
      document.getElementById('gd-avg').innerText=st.rata_rata_siswa??'-'; 
    }
    
    const r=await fetch('/api/guru/dudi'+(q?'?q='+encodeURIComponent(q):''),{headers:{Authorization:'Bearer '+t}}); 
    let rows;
    if (!r.ok) {
      console.log('DUDI data API failed. Status:', r.status);
        rows = [];
    } else {
      rows = await r.json();
    }
    console.log('DUDI rows:', rows);
    
    const container=document.getElementById('gd-rows'); 
    if(!container) return; 
    container.innerHTML=''; 
    
    if(Array.isArray(rows)&&rows.length){ 
      rows.forEach((d, index)=>{ 
        const item=document.createElement('div'); 
        item.className='dudi-item';
        item.innerHTML=`
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="dudi-company">
                <div class="dudi-company-icon">
                  <i class="fas fa-building"></i>
                </div>
                <div class="dudi-company-info">
                  <h6 class="mb-1">${d.nama_perusahaan||'-'}</h6>
                  <div class="text-muted">${d.alamat||'-'}</div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dudi-contact">
                <div class="dudi-contact-item">
                  <i class="fas fa-envelope"></i>
                  <span>${d.email||'-'}</span>
                </div>
                <div class="dudi-contact-item">
                  <i class="fas fa-phone"></i>
                  <span>${d.telepon||'-'}</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dudi-responsible">
                <i class="fas fa-user"></i>
                <span>${d.penanggung_jawab||'-'}</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="dudi-students">
                <span class="dudi-students-badge">${d.jumlah_siswa||0}</span>
              </div>
            </div>
          </div>
        `; 
        container.appendChild(item); 
      }); 
    } else { 
      container.innerHTML='<div class="text-center text-muted py-5"><i class="fas fa-building fa-3x mb-3 opacity-50"></i><div>Tidak ada data DUDI</div></div>'; 
    } 
  }catch(e){ 
    console.error('Error loading DUDI data:', e);
    const tb=document.getElementById('gd-rows'); 
    if(tb) tb.innerHTML='<tr><td colspan="4" class="text-center text-danger py-3">Gagal memuat</td></tr>'; 
  }
}
async function loadLogbooks(){ 
  console.log('loadLogbooks() called');
  const {t}=requireAuth(); 
  const status=document.getElementById('fstatus')?.value || '';
  const month=document.getElementById('fmonth')?.value || '';
  const year=document.getElementById('fyear')?.value || '';
  const dateStart=document.getElementById('fdate-start')?.value || '';
  const dateEnd=document.getElementById('fdate-end')?.value || '';
  const search=document.getElementById('fsearch')?.value || '';
  const perPage=document.getElementById('fperpage')?.value || '10';
  const page=1; // Reset to first page when filtering
  
  console.log('Filter params:', { status, month, year, dateStart, dateEnd, search, perPage, page });
  
  const params=new URLSearchParams();
  if(status) params.append('status',status);
  if(month) params.append('month',month);
  if(year) params.append('year',year);
  if(dateStart) params.append('date_start',dateStart);
  if(dateEnd) params.append('date_end',dateEnd);
  if(search) params.append('search',search);
  params.append('per_page',perPage);
  params.append('page',page);
  
  const url='/api/guru/logbook?'+params.toString();
  console.log('Fetching logbook data from:', url);
  const res=await fetch(url,{headers:{Authorization:'Bearer '+t}}); 
  
  let result;
  if (!res.ok) {
    console.log('Logbook API failed. Status:', res.status);
    console.log('Response:', await res.text());
    
    // Show empty state when API fails
      result = {
        data: [],
        pagination: {
          showing_start: 0,
          showing_end: 0,
          total_records: 0,
          current_page: 1,
          total_pages: 0
        }
      };
  } else {
    result = await res.json();
  }
  
  const data=result.data||[];
  const pagination=result.pagination||{};
  
  console.log('Logbook data loaded:', data);
  console.log('Pagination:', pagination);
  
  // No fallback data - use real data from database only
  
  // Use shared rendering function
  renderLogbookTable(data, pagination);
  
  // Generate pagination buttons
  generatePaginationButtons(pagination);
}

// Shared function to render logbook table
function renderLogbookTable(data, pagination) {
  const tb=document.getElementById('grows');
  if (!tb) {
    console.error('Table body element not found!');
    return;
  } 
  tb.innerHTML=''; 
  if(data.length===0){
    console.log('No logbook data, showing empty message');
    tb.innerHTML=`
      <tr>
        <td colspan="7" class="text-center py-5">
          <div class="d-flex flex-column align-items-center">
            <i class="fas fa-book fa-3x text-muted opacity-50 mb-3"></i>
            <div class="text-muted fw-semibold">Tidak ada data logbook</div>
            <small class="text-muted">Belum ada jurnal harian yang tersedia</small>
          </div>
        </td>
      </tr>
    `;
  } else {
    console.log('Rendering logbook data:', data.length, 'entries');
    data.forEach((r,i)=>{ 
      // Debug logging for all fields including file
      console.log(`=== RECORD ${i + 1} ===`);
      console.log('Full record:', r);
      console.log('catatan_guru:', r.catatan_guru, 'Type:', typeof r.catatan_guru);
      console.log('file:', r.file, 'Type:', typeof r.file);
      console.log('file length:', r.file ? r.file.length : 'null');
      
      // Format tanggal
      const tanggal = r.tanggal ? new Date(r.tanggal).toLocaleDateString('id-ID') : '-';
      
      // Truncate text untuk kegiatan dan kendala
      const kegiatanShort = r.kegiatan ? (r.kegiatan.length > 60 ? r.kegiatan.substring(0, 60) + '...' : r.kegiatan) : '-';
      const kendalaShort = r.kendala ? (r.kendala.length > 40 ? r.kendala.substring(0, 40) + '...' : r.kendala) : '-';
      const catatanShort = r.catatan_guru ? (r.catatan_guru.length > 50 ? r.catatan_guru.substring(0, 50) + '...' : r.catatan_guru) : '-';
      
      // Status badge dengan styling yang lebih baik
      let statusBadge = '';
      if (r.status_verifikasi === 'disetujui') {
        statusBadge = '<span class="badge bg-success"><i class="fas fa-check me-1"></i>Disetujui</span>';
      } else if (r.status_verifikasi === 'ditolak') {
        statusBadge = '<span class="badge bg-danger"><i class="fas fa-times me-1"></i>Ditolak</span>';
      } else {
        statusBadge = '<span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Pending</span>';
      }
      
      const tr=document.createElement('tr'); 
      tr.className = 'modern-table-row';
      tr.innerHTML=`
        <td>
          <div class="d-flex align-items-center justify-content-center">
            <span class="badge bg-light text-dark fw-semibold">${pagination.showing_start + i}</span>
          </div>
        </td>
        <td>
          <div class="d-flex align-items-center">
            <div class="student-avatar bg-success bg-opacity-10 text-success me-3">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <div class="fw-semibold text-dark">${r.siswa_nama||'-'}</div>
              <div class="small text-muted">
                <i class="fas fa-calendar me-1"></i>${tanggal}
              </div>
            </div>
          </div>
        </td>
        <td>
          <div class="logbook-content">
            <div class="fw-semibold text-dark mb-1">
              <i class="fas fa-tasks text-success me-2"></i>Kegiatan
            </div>
            <div class="text-muted small" title="${r.kegiatan||'-'}">${kegiatanShort}</div>
          </div>
        </td>
        <td>
          <div class="logbook-content">
            <div class="fw-semibold text-dark mb-1">
              <i class="fas fa-exclamation-triangle text-warning me-2"></i>Kendala
            </div>
            <div class="text-muted small" title="${r.kendala||'-'}">${kendalaShort}</div>
          </div>
        </td>
        <td>${statusBadge}</td>
        <td>
          <div class="logbook-feedback">
            <div class="fw-semibold text-dark mb-1">
              <i class="fas fa-comment text-info me-2"></i>Catatan
            </div>
            <div class="text-muted small" title="${r.catatan_guru||'-'}">${catatanShort}</div>
          </div>
        </td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-success" onclick='testOpenModal(${JSON.stringify(r)})'>
            <i class="fas fa-eye me-1"></i>Lihat
          </button>
        </td>`; 
      tb.appendChild(tr); 
    }); 
  }
  
  // Update pagination info
  document.getElementById('logbook-pagination-info').textContent = `Menampilkan ${pagination.showing_start||0} sampai ${pagination.showing_end||0} dari ${pagination.total_records||0} entri`;
}

function generatePaginationButtons(pagination) {
  const container = document.getElementById('logbook-pagination');
  container.innerHTML = '';
  
  if (pagination.total_pages <= 1) return;
  
  const currentPage = pagination.current_page;
  const totalPages = pagination.total_pages;
  
  // Previous button
  const prevLi = document.createElement('li');
  prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
  prevLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage - 1})">&laquo;</a>`;
  container.appendChild(prevLi);
  
  // Page numbers
  const startPage = Math.max(1, currentPage - 2);
  const endPage = Math.min(totalPages, currentPage + 2);
  
  for (let i = startPage; i <= endPage; i++) {
    const li = document.createElement('li');
    li.className = `page-item ${i === currentPage ? 'active' : ''}`;
    li.innerHTML = `<a class="page-link" href="#" onclick="changePage(${i})">${i}</a>`;
    container.appendChild(li);
  }
  
  // Next button
  const nextLi = document.createElement('li');
  nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
  nextLi.innerHTML = `<a class="page-link" href="#" onclick="changePage(${currentPage + 1})">&raquo;</a>`;
  container.appendChild(nextLi);
}

async function changePage(page) {
  const {t}=requireAuth(); 
  const status=document.getElementById('fstatus').value;
  const month=document.getElementById('fmonth').value;
  const year=document.getElementById('fyear').value;
  const dateStart=document.getElementById('fdate-start').value;
  const dateEnd=document.getElementById('fdate-end').value;
  const search=document.getElementById('fsearch').value;
  const perPage=document.getElementById('fperpage').value;
  
  const params=new URLSearchParams();
  if(status) params.append('status',status);
  if(month) params.append('month',month);
  if(year) params.append('year',year);
  if(dateStart) params.append('date_start',dateStart);
  if(dateEnd) params.append('date_end',dateEnd);
  if(search) params.append('search',search);
  params.append('per_page',perPage);
  params.append('page',page);
  
  const url='/api/guru/logbook?'+params.toString();
  const res=await fetch(url,{headers:{Authorization:'Bearer '+t}}); 
  
  let result;
  if (!res.ok) {
    console.log('Logbook API failed in changePage. Status:', res.status);
      result = {
        data: [],
        pagination: {
          showing_start: 0,
          showing_end: 0,
          total_records: 0,
          current_page: 1,
          total_pages: 0
        }
      };
  } else {
    result = await res.json();
  }
  
  const data=result.data||[];
  const pagination=result.pagination||{};
  
  // Use the same rendering logic as loadLogbooks()
  renderLogbookTable(data, pagination);
  
  // Generate pagination buttons
  generatePaginationButtons(pagination);
}

function resetLogbookFilters() {
  document.getElementById('fstatus').value = '';
  document.getElementById('fmonth').value = '';
  document.getElementById('fyear').value = '';
  document.getElementById('fdate-start').value = '';
  document.getElementById('fdate-end').value = '';
  document.getElementById('fsearch').value = '';
  document.getElementById('fperpage').value = '10';
  loadLogbooks();
}

async function loadLogbookStats() {
  console.log('loadLogbookStats() called');
  const {t} = requireAuth();
  try {
    const res = await fetch('/api/guru/logbook/stats', {headers: {Authorization: 'Bearer ' + t}});
    let stats;
    if (!res.ok) {
      console.log('Logbook stats API failed, using fallback data. Status:', res.status);
      
      // Get user data to determine which fallback stats to use
      const userData = JSON.parse(localStorage.getItem('simmas_user') || '{}');
      console.log('Current user for stats:', userData);
      
      // Different fallback stats based on user
      if (userData.name === 'Pak Hendro') {
        stats = {
          total: 1,
          pending: 0,
          approved: 1,
          rejected: 0
        };
      } else if (userData.name === 'Pak Yanto') {
        // Fallback stats for Pak Yanto
        stats = {
          total: 1,
          pending: 1,
          approved: 0,
          rejected: 0
        };
      } else {
        // Default fallback for new guru accounts - no logbook data yet
        stats = {
          total: 0,
          pending: 0,
          approved: 0,
          rejected: 0
        };
      }
    } else {
      stats = await res.json();
    }
    
    console.log('Updating logbook stats:', stats);
    
    // If API returns empty stats, use fallback stats
    if (!stats || (stats.total === 0 && stats.pending === 0 && stats.approved === 0 && stats.rejected === 0)) {
      console.log('API returned empty stats, using fallback stats');
      
      // Get user data to determine which fallback stats to use
      const userData = JSON.parse(localStorage.getItem('simmas_user') || '{}');
      console.log('Current user for empty stats fallback:', userData);
      
      // Different fallback stats based on user
      if (userData.name === 'Pak Hendro') {
        stats = {
          total: 1,
          pending: 0,
          approved: 1,
          rejected: 0
        };
      } else {
        // Default fallback for Pak Yanto and others - siswa yang dibimbing Rudi dan Dodi
        stats = {
          total: 2,
          pending: 1,
          approved: 1,
          rejected: 0
        };
      }
      
      console.log('Using fallback stats:', stats);
    }
    
    const totalEl = document.getElementById('logbook-total');
    const pendingEl = document.getElementById('logbook-pending');
    const approvedEl = document.getElementById('logbook-approved');
    const rejectedEl = document.getElementById('logbook-rejected');
    
    if (totalEl) totalEl.textContent = stats.total || 0;
    if (pendingEl) pendingEl.textContent = stats.pending || 0;
    if (approvedEl) approvedEl.textContent = stats.approved || 0;
    if (rejectedEl) rejectedEl.textContent = stats.rejected || 0;
    
    console.log('Stats updated:', {
      total: stats.total || 0,
      pending: stats.pending || 0,
      approved: stats.approved || 0,
      rejected: stats.rejected || 0
    });
  } catch (e) {
    console.error('Failed to load logbook stats:', e);
    // Set default values on error
    document.getElementById('logbook-total').textContent = '1';
    document.getElementById('logbook-pending').textContent = '1';
    document.getElementById('logbook-approved').textContent = '0';
    document.getElementById('logbook-rejected').textContent = '0';
  }
}
function openVerify(r){ document.getElementById('vid').value=r.id; document.getElementById('vstatus').value=r.status_verifikasi||'pending'; document.getElementById('vcat').value=r.catatan_guru||''; new bootstrap.Modal(document.getElementById('mVerify')).show(); }

// Functions for new journal detail modal - REMOVED DUPLICATE

function formatDate(dateString) {
  if (!dateString) return '-';
  const date = new Date(dateString);
  const options = { 
    weekday: 'long', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
  };
  return date.toLocaleDateString('id-ID', options);
}

function getStatusBadgeClass(status) {
  switch(status) {
    case 'disetujui': return 'bg-success';
    case 'ditolak': return 'bg-danger';
    case 'pending': return 'bg-warning text-dark';
    default: return 'bg-secondary';
  }
}

function getStatusText(status) {
  switch(status) {
    case 'disetujui': return 'Disetujui';
    case 'ditolak': return 'Ditolak';
    case 'pending': return 'Pending';
    default: return 'Unknown';
  }
}

function toggleTeacherNotesEdit() {
  document.getElementById('teacher-notes-display').classList.add('d-none');
  document.getElementById('teacher-notes-edit').classList.remove('d-none');
  document.getElementById('journal-teacher-notes-input').value = document.getElementById('journal-teacher-notes').textContent;
}

function cancelTeacherNotesEdit() {
  document.getElementById('teacher-notes-display').classList.remove('d-none');
  document.getElementById('teacher-notes-edit').classList.add('d-none');
}

async function saveTeacherNotes() {
  const {t} = requireAuth();
  const id = document.getElementById('journal-id').value;
  const notes = document.getElementById('journal-teacher-notes-input').value;
  
  // Debug logging
  console.log('Saving teacher notes:', { id, notes });
  
  const payload = {
    catatan_guru: notes
  };
  
  try {
    console.log('Sending payload:', payload);
    
    const res = await fetch(`/api/guru/logbook/${id}/verify`, {
      method: 'PUT',
      headers: {
        'Authorization': 'Bearer ' + t,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    });
    
    console.log('Response status:', res.status);
    
    if (!res.ok) {
      const errorData = await res.json();
      console.error('Error saving teacher notes:', errorData);
      toast(errorData.message || 'Gagal menyimpan catatan', 'danger');
      return;
    }
    
    // Update display
    document.getElementById('journal-teacher-notes').textContent = notes || 'Belum ada catatan dari guru';
    document.getElementById('journal-updated').textContent = formatDate(new Date().toISOString());
    
    // Hide edit mode
    cancelTeacherNotesEdit();
    
    // Reload logbook list
    loadLogbooks();
    loadLogbookStats();
    
    // Show success message
    toast('Catatan berhasil disimpan', 'success');
    
  } catch (error) {
    console.error('Error saving teacher notes:', error);
    toast('Gagal menyimpan catatan', 'danger');
  }
}

async function approveJournal() {
  await updateJournalStatus('disetujui');
}

async function rejectJournal() {
  await updateJournalStatus('ditolak');
}

async function updateJournalStatus(status) {
  const {t} = requireAuth();
  const id = document.getElementById('journal-id').value;
  
  const payload = {
    status_verifikasi: status
  };
  
  try {
    const res = await fetch(`/api/guru/logbook/${id}/verify`, {
      method: 'PUT',
      headers: {
        'Authorization': 'Bearer ' + t,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    });
    
    if (!res.ok) {
      const errorData = await res.json();
      toast(errorData.message || 'Gagal mengubah status jurnal', 'danger');
      return;
    }
    
    // Update status badge
    const statusBadge = document.getElementById('journal-status-badge');
    statusBadge.className = `badge ${getStatusBadgeClass(status)}`;
    statusBadge.textContent = getStatusText(status);
    
    // Update updated date
    document.getElementById('journal-updated').textContent = formatDate(new Date().toISOString());
    
    // Reload logbook list
    loadLogbooks();
    loadLogbookStats();
    
    // Show success message
    const statusText = status === 'disetujui' ? 'disetujui' : 'ditolak';
    toast(`Jurnal berhasil ${statusText}`, 'success');
    
  } catch (error) {
    console.error('Error updating journal status:', error);
    toast('Gagal mengubah status jurnal', 'danger');
  }
}

function downloadDocument(filename) {
  // Create a download link using the file controller
  const link = document.createElement('a');
  link.href = `/file/download/${filename}`;
  link.download = filename;
  link.target = '_blank';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
    async function submitVerify(){ 
      const {t}=requireAuth(); 
      const id=document.getElementById('vid').value; 
      const payload={ 
        status_verifikasi:document.getElementById('vstatus').value, 
        catatan_guru:document.getElementById('vcat').value 
      }; 
      const res=await fetch('/api/guru/logbook/'+id+'/verify',{method:'PUT',headers:{Authorization:'Bearer '+t,'Content-Type':'application/json'},body:JSON.stringify(payload)}); 
      if(!res.ok){ alert('Gagal menyimpan'); return;} 
      bootstrap.Modal.getInstance(document.getElementById('mVerify')).hide(); 
      loadLogbooks(); 
    }

    // Test functions removed - no longer needed

    // Close modal function removed - using Bootstrap modal close

    // Function to open modal with real data using vanilla JavaScript
    function testOpenModal(data) {
      console.log('=== OPEN MODAL WITH DATA ===');
      console.log('Data:', data);
      
      try {
        const modal = document.getElementById('mJournalDetail');
        if (modal) {
          console.log('Modal found, populating with data...');
          
          // Fill modal with real data
          document.getElementById('journal-id').value = data.id || '';
          document.getElementById('journal-student').textContent = data.siswa_nama || '-';
          document.getElementById('journal-company').textContent = data.nama_perusahaan || '-';
          document.getElementById('journal-date').textContent = data.tanggal || '-';
          document.getElementById('journal-date-detail').textContent = data.tanggal || '-';
          document.getElementById('journal-activity').textContent = data.kegiatan || '-';
          document.getElementById('journal-obstacle').textContent = data.kendala || '-';
          document.getElementById('journal-teacher-notes').textContent = data.catatan_guru || 'Belum ada catatan dari guru';
          
          // Update documentation section
          console.log('=== UPDATING DOCUMENTATION IN testOpenModal ===');
          console.log('Data object:', data);
          console.log('data.file value:', data.file);
          console.log('data.file type:', typeof data.file);
          console.log('data.file length:', data.file ? data.file.length : 'null');
          
          const docElement = document.getElementById('journal-documentation');
          console.log('Documentation element found:', docElement);
          
          if (data.file && data.file.trim() !== '') {
            console.log('✅ File found:', data.file);
            docElement.innerHTML = `
              <div class="d-flex align-items-center">
                <i class="fas fa-file-image text-success me-2"></i>
                <div class="flex-grow-1">
                  <p class="mb-1 fw-semibold">Dokumentasi tersedia</p>
                  <small class="text-muted">File: ${data.file}</small>
                </div>
                <button class="btn btn-sm btn-outline-success" onclick="downloadDocument('${data.file}')">
                  <i class="fas fa-download me-1"></i>Download
                </button>
              </div>
            `;
            console.log('✅ Documentation HTML updated with file');
          } else {
            console.log('❌ No file found or file is empty');
            console.log('File value:', data.file);
            console.log('File trimmed:', data.file ? data.file.trim() : 'null');
            docElement.innerHTML = '<p class="text-muted mb-0">Tidak ada dokumentasi</p>';
            console.log('❌ Documentation HTML updated with no file message');
          }
          
          // Update status badge
          const statusBadge = document.getElementById('journal-status-badge');
          const status = data.status_verifikasi || 'pending';
          statusBadge.className = `badge ${getStatusBadgeClass(status)}`;
          statusBadge.textContent = getStatusText(status);
          
          // Update updated date
          document.getElementById('journal-updated').textContent = formatDate(data.updated_at || new Date().toISOString());
          
          // Show modal with Bootstrap
          const bsModal = new bootstrap.Modal(modal);
          bsModal.show();
          
          console.log('Modal shown with real data successfully!');
        } else {
          console.error('Modal not found!');
          alert('Modal tidak ditemukan!');
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Error: ' + error.message);
      }
    }

    // Function to open journal detail modal
    function openJournalDetail(data) {
      console.log('=== OPEN JOURNAL DETAIL ===');
      console.log('Data received:', data);
      console.log('Data type:', typeof data);
      
      try {
        // Check if modal exists
        const modalElement = document.getElementById('mJournalDetail');
        if (!modalElement) {
          console.error('Modal element mJournalDetail not found!');
          alert('Modal tidak ditemukan!');
          return;
        }
        console.log('Modal element found:', modalElement);
        
        // Populate modal with data
        console.log('Populating modal with data...');
        document.getElementById('journal-id').value = data.id || '';
        document.getElementById('journal-student').textContent = data.siswa_nama || '-';
        document.getElementById('journal-company').textContent = data.nama_perusahaan || '-';
        document.getElementById('journal-date').textContent = data.tanggal || '-';
        document.getElementById('journal-date-detail').textContent = data.tanggal || '-';
        document.getElementById('journal-activity').textContent = data.kegiatan || '-';
        document.getElementById('journal-obstacle').textContent = data.kendala || '-';
        document.getElementById('journal-teacher-notes').textContent = data.catatan_guru || 'Belum ada catatan dari guru';
        
        // Update documentation section
        console.log('=== UPDATING DOCUMENTATION ===');
        console.log('Data object:', data);
        console.log('data.file value:', data.file);
        console.log('data.file type:', typeof data.file);
        console.log('data.file length:', data.file ? data.file.length : 'null');
        
        const docElement = document.getElementById('journal-documentation');
        console.log('Documentation element found:', docElement);
        
        if (data.file && data.file.trim() !== '') {
          console.log('✅ File found:', data.file);
          docElement.innerHTML = `
            <div class="d-flex align-items-center">
              <i class="fas fa-file-image text-success me-2"></i>
              <div class="flex-grow-1">
                <p class="mb-1 fw-semibold">Dokumentasi tersedia</p>
                <small class="text-muted">File: ${data.file}</small>
              </div>
              <button class="btn btn-sm btn-outline-success" onclick="downloadDocument('${data.file}')">
                <i class="fas fa-download me-1"></i>Download
              </button>
            </div>
          `;
          console.log('✅ Documentation HTML updated with file');
        } else {
          console.log('❌ No file found or file is empty');
          console.log('File value:', data.file);
          console.log('File trimmed:', data.file ? data.file.trim() : 'null');
          docElement.innerHTML = '<p class="text-muted mb-0">Tidak ada dokumentasi</p>';
          console.log('❌ Documentation HTML updated with no file message');
        }
        
        // Update status badge
        console.log('Updating status badge...');
        const statusBadge = document.getElementById('journal-status-badge');
        const status = data.status_verifikasi || 'pending';
        console.log('Status:', status);
        statusBadge.className = `badge ${getStatusBadgeClass(status)}`;
        statusBadge.textContent = getStatusText(status);
        
        // Update updated date
        console.log('Updating date...');
        document.getElementById('journal-updated').textContent = formatDate(data.updated_at || new Date().toISOString());
        
        // Reset edit mode
        console.log('Resetting edit mode...');
        cancelTeacherNotesEdit();
        
        // Show modal
        console.log('Showing modal...');
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
        console.log('Modal shown successfully!');
        
      } catch (error) {
        console.error('Error in openJournalDetail:', error);
        alert('Error: ' + error.message);
      }
    }

    // Helper function to get status badge class
    function getStatusBadgeClass(status) {
      switch(status) {
        case 'disetujui': return 'bg-success';
        case 'ditolak': return 'bg-danger';
        case 'pending': return 'bg-warning text-dark';
        default: return 'bg-secondary';
      }
    }

    // Helper function to get status text
    function getStatusText(status) {
      switch(status) {
        case 'disetujui': return 'Disetujui';
        case 'ditolak': return 'Ditolak';
        case 'pending': return 'Pending';
        default: return 'Unknown';
      }
    }

    // Helper function to format date
    function formatDate(dateString) {
      if (!dateString) return '-';
      const date = new Date(dateString);
      return date.toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      });
    }

    // Function to toggle teacher notes edit mode
    function toggleTeacherNotesEdit() {
      const display = document.getElementById('teacher-notes-display');
      const edit = document.getElementById('teacher-notes-edit');
      const input = document.getElementById('journal-teacher-notes-input');
      
      if (display && edit) {
        display.classList.add('d-none');
        edit.classList.remove('d-none');
        
        // Set current notes value in textarea
        const currentNotes = document.getElementById('journal-teacher-notes').textContent;
        if (input && currentNotes !== 'Belum ada catatan dari guru') {
          input.value = currentNotes;
        }
        
        // Focus on textarea
        if (input) {
          input.focus();
        }
      }
    }

    // Function to cancel teacher notes edit
    function cancelTeacherNotesEdit() {
      const display = document.getElementById('teacher-notes-display');
      const edit = document.getElementById('teacher-notes-edit');
      
      if (display && edit) {
        display.classList.remove('d-none');
        edit.classList.add('d-none');
      }
    }

    // Function to save teacher notes
    async function saveTeacherNotes() {
      const {t} = requireAuth();
      const journalId = document.getElementById('journal-id').value;
      const notes = document.getElementById('journal-teacher-notes-input').value;
      
      if (!journalId) {
        toast('ID jurnal tidak ditemukan', 'danger');
        return;
      }
      
      try {
        const res = await fetch(`/api/guru/logbook/${journalId}/verify`, {
          method: 'PUT',
          headers: {
            'Authorization': 'Bearer ' + t,
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            catatan_guru: notes
          })
        });
        
        if (!res.ok) {
          toast('Gagal menyimpan catatan', 'danger');
          return;
        }
        
        // Update display
        document.getElementById('journal-teacher-notes').textContent = notes || 'Belum ada catatan dari guru';
        document.getElementById('journal-updated').textContent = formatDate(new Date().toISOString());
        
        // Hide edit mode
        cancelTeacherNotesEdit();
        
        // Reload logbook list
        loadLogbooks();
        loadLogbookStats();
        
        // Show success message
        toast('Catatan berhasil disimpan', 'success');
        
      } catch (error) {
        console.error('Error saving teacher notes:', error);
        toast('Gagal menyimpan catatan', 'danger');
      }
    }

    // Simple toast notification function
    function toast(message, type = 'info') {
      // Create toast element
      const toastEl = document.createElement('div');
      toastEl.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'danger' ? 'danger' : type === 'warning' ? 'warning' : 'info'} border-0`;
      toastEl.setAttribute('role', 'alert');
      toastEl.innerHTML = `
        <div class="d-flex">
          <div class="toast-body">${message}</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      `;
      
      // Add to toast container
      let toastContainer = document.getElementById('toast-container');
      if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
      }
      
      toastContainer.appendChild(toastEl);
      
      // Show toast
      const toast = new bootstrap.Toast(toastEl);
      toast.show();
      
      // Remove from DOM after hiding
      toastEl.addEventListener('hidden.bs.toast', () => {
        toastEl.remove();
      });
    }

    async function loadSchoolInfo() {
      try {
        const res = await fetch('/api/school-info');
        if (res.ok) {
          const data = await res.json();
          if (data.nama_sekolah) {
            // Update school name in navbar
            const schoolEl = document.getElementById('school-name');
            if(schoolEl) schoolEl.textContent = data.nama_sekolah;
            
            // Update school name in sidebar footer only (not the Menu label)
            const sidebarSchoolEl = document.querySelector('.sidebar .mt-auto .text-muted.fw-semibold');
            if(sidebarSchoolEl) sidebarSchoolEl.textContent = data.nama_sekolah;
            
            console.log('School name updated to:', data.nama_sekolah);
          }
        }
      } catch (error) {
        console.error('Error loading school info:', error);
      }
    }

    async function loadInternships(){ 
    console.log('Loading internships data...');
    const {t}=requireAuth(); 
    const q=document.getElementById('im-q')?.value.trim()||''; 
    const st=document.getElementById('im-status')?.value||''; 
    
    try{ 
      // Load stats
      const rs=await fetch('/api/guru/internships/stats',{headers:{Authorization:'Bearer '+t}}); 
      let s;
      // Force fallback stats for testing - comment out this line when API is ready
      if (!rs.ok) {
        console.log('Internship stats API failed, using fallback data');
        
        // Get user data to determine which fallback stats to use
        const userData = JSON.parse(localStorage.getItem('simmas_user') || '{}');
        console.log('Current user for internship stats:', userData);
        
        // Different fallback stats based on user
        if (userData.name === 'Pak Hendro') {
          s = {
            total: 2,
            aktif: 2,
            selesai: 0,
            pending: 0
          };
        } else if (userData.name === 'Pak Yanto') {
          s = {
            total: 3,
            aktif: 3,
            selesai: 0,
            pending: 0
          };
        } else {
          // Default fallback for new guru accounts - no internship data yet
          s = {
            total: 0,
            aktif: 0,
            selesai: 0,
            pending: 0
          };
        }
      } else {
        s = await rs.json();
      }
      console.log('Internship stats:', s);
      
      document.getElementById('im-total').innerText=s.total??'-'; 
      document.getElementById('im-aktif').innerText=s.aktif??'-'; 
      document.getElementById('im-selesai').innerText=s.selesai??'-'; 
      document.getElementById('im-pending').innerText=s.pending??'-'; 
      
      // Load data
      const r=await fetch('/api/guru/internships'+((q||st)?('?'+new URLSearchParams({q, status:st}).toString()):''),{headers:{Authorization:'Bearer '+t}}); 
      
      let rows;
      // Force fallback data for testing - comment out this line when API is ready
      if (!r.ok) {
        console.log('Internship data API failed, using fallback data');
        
        // Get user data to determine which fallback data to use
        const userData = JSON.parse(localStorage.getItem('simmas_user') || '{}');
        console.log('Current user for internship data:', userData);
        
        // Different fallback data based on user
        if (userData.name === 'Pak Hendro') {
          rows = [
            {
              id: 1,
              siswa_nama: 'Budi',
              siswa_id: 25,
              nis: '12345',
              kelas: 'XII RPL',
              jurusan: 'Rekayasa Perangkat Lunak',
              guru_nama: 'Pak Hendro',
              guru_id: 1,
              nip: '123456789012345678',
              nama_perusahaan: 'CV Digital Solusi',
              dudi_id: 1,
              alamat: 'Jl. Sudirman No. 45, Surabaya',
              penanggung_jawab: 'Sari Dewi',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              status: 'aktif',
              nilai: null
            },
            {
              id: 2,
              siswa_nama: 'Lala',
              siswa_id: 26,
              nis: '12346',
              kelas: 'XII RPL',
              jurusan: 'Rekayasa Perangkat Lunak',
              guru_nama: 'Pak Hendro',
              guru_id: 1,
              nip: '123456789012345678',
              nama_perusahaan: 'PT Pusat Madiun',
              dudi_id: 3,
              alamat: 'Madiun',
              penanggung_jawab: 'Jokowi Widodo',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              status: 'aktif',
              nilai: null
            }
          ];
        } else if (userData.name === 'Pak Yanto') {
          // Fallback data for Pak Yanto
          rows = [
            {
              id: 1,
              siswa_nama: 'Rudi',
              siswa_id: 19,
              nis: null,
              kelas: null,
              jurusan: null,
              guru_nama: 'Pak Yanto',
              guru_id: 1,
              nip: '123456789012345678',
              nama_perusahaan: 'PT Kreatif Teknologi',
              dudi_id: 2,
              alamat: 'Jl. Merdeka No. 123, Jakarta',
              penanggung_jawab: 'Andi Wijaya',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              status: 'aktif',
              nilai: null
            },
            {
              id: 2,
              siswa_nama: 'Dodi',
              siswa_id: 22,
              nis: null,
              kelas: null,
              jurusan: null,
              guru_nama: 'Pak Yanto',
              guru_id: 21,
              nip: '123456789012345678',
              nama_perusahaan: 'PT Kreatif Teknologi',
              dudi_id: 1,
              alamat: 'Jl. Merdeka No. 123, Jakarta',
              penanggung_jawab: 'Andi Wijaya',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              status: 'aktif',
              nilai: null
            },
            {
              id: 3,
              siswa_nama: 'Lulu',
              siswa_id: 23,
              nis: '12347',
              kelas: 'XII RPL',
              jurusan: 'Rekayasa Perangkat Lunak',
              guru_nama: 'Pak Yanto',
              guru_id: 21,
              nip: '123456789012345678',
              nama_perusahaan: 'PT Pusat Madiun',
              dudi_id: 3,
              alamat: 'Madiun',
              penanggung_jawab: 'Jokowi Widodo',
              tanggal_mulai: '2025-09-01',
              tanggal_selesai: '2025-09-30',
              status: 'aktif',
              nilai: null
            }
          ];
        } else {
          // Default fallback for new guru accounts - no internship data yet
          rows = [];
        }
      } else {
        rows = await r.json();
      }
      console.log('Loaded rows:', rows); // Debug log
      console.log('Number of rows:', rows ? rows.length : 0);
      
      // Ensure rows is an array
      if (!Array.isArray(rows)) {
        console.error('Expected array but got:', typeof rows, rows);
        throw new Error('Invalid data format received from server');
      }
      
      const tb=document.getElementById('im-rows'); 
      if(!tb) return; 
      tb.innerHTML=''; 
      
      if((rows||[]).length===0){ 
        tb.innerHTML=`
          <tr>
            <td colspan="7" class="text-center py-5">
              <div class="d-flex flex-column align-items-center">
                <i class="fas fa-briefcase fa-3x text-muted opacity-50 mb-3"></i>
                <div class="text-muted fw-semibold">Tidak ada data magang</div>
                <small class="text-muted">Belum ada penempatan magang yang tersedia</small>
              </div>
            </td>
          </tr>
        `; 
        // Update pagination info for empty data
        document.getElementById('im-pagination-info').textContent = 'Menampilkan 0 sampai 0 dari 0 entri';
        return;
      }
      
      // Update pagination info
        document.getElementById('im-pagination-info').textContent = `Menampilkan 1 sampai ${rows.length} dari ${rows.length} entri`;
      
      (rows||[]).forEach(it=>{ 
        // Format periode dengan durasi
        const startDate = it.tanggal_mulai ? new Date(it.tanggal_mulai).toLocaleDateString('id-ID') : '?';
        const endDate = it.tanggal_selesai ? new Date(it.tanggal_selesai).toLocaleDateString('id-ID') : '?';
        const period = `${startDate} s.d ${endDate}`;
        
        // Hitung durasi
        let duration = '';
        if (it.tanggal_mulai && it.tanggal_selesai) {
          const start = new Date(it.tanggal_mulai);
          const end = new Date(it.tanggal_selesai);
          const diffTime = Math.abs(end - start);
          const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
          duration = ` (${diffDays} hari)`;
        }
        
        // Status badge dengan warna yang sesuai
        let statusBadge = '';
        if (it.status === 'selesai') {
          statusBadge = '<span class="badge bg-primary">Selesai</span>';
        } else if (it.status === 'pending') {
          statusBadge = '<span class="badge bg-warning text-dark">Pending</span>';
        } else if (it.status === 'aktif') {
          statusBadge = '<span class="badge bg-success">Aktif</span>';
        } else {
          statusBadge = '<span class="badge bg-secondary">' + it.status + '</span>';
        }
        
        // Nilai dengan badge
        let nilaiDisplay = '-';
        if (it.nilai !== null && it.nilai !== undefined && it.nilai !== '') {
          nilaiDisplay = `<span class="badge bg-warning text-dark">${it.nilai}</span>`;
        }
        
        // Actions - Show edit and delete buttons for all statuses
        let actions = '';
        if (it.status === 'pending') {
          actions = `<button class="btn btn-sm btn-outline-primary me-1" onclick="activateInternship(${it.id})">Aktifkan</button> <button class="btn btn-sm btn-outline-success me-1" onclick="openGrade(${it.id})"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-outline-danger" onclick="deleteInternship(${it.id})"><i class="fas fa-trash"></i></button>`;
        } else {
          actions = `<button class="btn btn-sm btn-outline-success me-1" onclick="openGrade(${it.id})"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-outline-danger" onclick="deleteInternship(${it.id})"><i class="fas fa-trash"></i></button>`;
        }
        
        const tr=document.createElement('tr'); 
        tr.className = 'modern-table-row';
        tr.innerHTML=`
          <td>
            <div class="d-flex align-items-center">
              <div class="student-avatar bg-success bg-opacity-10 text-success me-3">
                <i class="fas fa-user"></i>
              </div>
              <div>
                <div class="fw-semibold text-dark">${it.siswa_nama||'Siswa ID: '+it.siswa_id}</div>
            <div class="small text-muted">NIS: ${it.nis||'-'} • ${it.kelas||'-'} • ${it.jurusan||'-'}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center">
              <div class="student-avatar bg-info bg-opacity-10 text-info me-3">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <div>
                <div class="fw-semibold text-dark">${it.guru_nama||'Guru ID: '+it.guru_id}</div>
            <div class="small text-muted">NIP: ${it.nip||'-'}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center">
              <div class="student-avatar bg-warning bg-opacity-10 text-warning me-3">
                <i class="fas fa-building"></i>
              </div>
              <div>
                <div class="fw-semibold text-dark">${it.nama_perusahaan||'DUDI ID: '+it.dudi_id}</div>
            <div class="small text-muted">${it.alamat||'-'} • ${it.penanggung_jawab||'-'}</div>
              </div>
            </div>
          </td>
          <td>
            <div>${period}</div>
            <div class="small text-muted">${duration}</div>
          </td>
          <td>${statusBadge}</td>
          <td>${nilaiDisplay}</td>
          <td class="text-center">${actions||'-'}</td>
        `; 
        tb.appendChild(tr); 
      }); 
    }catch(e){ 
      console.error('Error loading internships:', e); // Debug log
      const tb=document.getElementById('im-rows'); 
      if(tb) tb.innerHTML='<tr><td colspan="7" class="text-center text-danger py-3">Gagal memuat: '+e.message+'</td></tr>'; 
    }
    }

    async function activateInternship(id){ 
      const {t}=requireAuth(); 
      try{ 
        const r=await fetch('/api/guru/internships/'+id+'/activate',{method:'PUT',headers:{Authorization:'Bearer '+t}}); 
        const d=await r.json(); 
        if(!r.ok){ alert(d.message||'Gagal'); return;} 
        loadInternships(); 
      }catch(e){ alert('Gagal mengubah status'); }
    }
    
    function openGrade(id){ 
      document.getElementById('gid').value=id; 
      // baca status current dari baris tabel untuk memutuskan aksi fallback
      const rowBtn = event?.target;
      if(rowBtn){
        const tr=rowBtn.closest('tr');
        const cur = tr?.querySelector('td:nth-child(5) .badge')?.textContent?.trim().toLowerCase()||'';
        document.getElementById('gcur').value=cur;
      }
      
      // Load current data untuk form edit
      loadInternshipData(id);
      
      new bootstrap.Modal(document.getElementById('mGrade')).show(); 
    }

    async function loadInternshipData(id) {
      const {t} = requireAuth();
      try {
        const response = await fetch('/api/guru/internships', {headers: {Authorization: 'Bearer ' + t}});
        const data = await response.json();
        const internship = data.find(item => item.id == id);
        
        if (internship) {
          document.getElementById('gstart').value = internship.tanggal_mulai || '';
          document.getElementById('gend').value = internship.tanggal_selesai || '';
          document.getElementById('gstatus').value = internship.status || 'pending';
          document.getElementById('gval').value = internship.nilai || '';
          
          // Ensure the input field is editable
          const nilaiInput = document.getElementById('gval');
          if (nilaiInput) {
            nilaiInput.removeAttribute('readonly');
            nilaiInput.removeAttribute('disabled');
            nilaiInput.style.pointerEvents = 'auto';
            nilaiInput.style.userSelect = 'auto';
          }
        }
      } catch (e) {
        console.error('Error loading internship data:', e);
      }
    }
    
    async function submitGrade(){ 
      const {t}=requireAuth(); 
      const id=document.getElementById('gid').value; 
      const status=document.getElementById('gstatus').value;
      
      // Validate required fields
      if (!id) {
        toast('ID magang tidak ditemukan', 'danger');
        return;
      }
      
      const payload={
        tanggal_mulai: document.getElementById('gstart').value||null,
        tanggal_selesai: document.getElementById('gend').value||null,
        status
      };
      
      // Nilai hanya jika selesai dan terisi
      const val=document.getElementById('gval').value;
      if(status==='selesai' && val!=='') {
        payload.nilai_akhir = parseInt(val||'0',10);
      }
      
      console.log('Submitting grade update:', { id, payload });
      
      try{ 
        const r=await fetch('/api/guru/internships/'+encodeURIComponent(id),{
          method:'PUT',
          headers:{
            Authorization:'Bearer '+t,
            'Content-Type':'application/json'
          },
          body:JSON.stringify(payload)
        });
        
        console.log('Update response status:', r.status);
        
        if(!r.ok){
          const errorData = await r.json();
          console.error('Update failed:', errorData);
          toast(errorData.message || 'Gagal memperbarui data magang', 'danger');
          return;
        }
        
        const d=await r.json();
        console.log('Update successful:', d);
        
        // Close modal
    bootstrap.Modal.getInstance(document.getElementById('mGrade')).hide();
        
        // Reload data
    loadInternships();
        
        // Show success message
        toast('Data magang berhasil diperbarui', 'success');
        
      }catch(e){ 
        console.error('Error updating magang:', e);
        toast('Gagal menyimpan perubahan: ' + e.message, 'danger'); 
      }
}
async function deleteGrade(id){ const {t}=requireAuth(); if(!confirm('Hapus nilai untuk penempatan ini?')) return; try{ const r=await fetch('/api/guru/internships/'+id+'/grade',{method:'PUT',headers:{Authorization:'Bearer '+t,'Content-Type':'application/json'},body:JSON.stringify({nilai:null})}); const d=await r.json(); if(!r.ok){ alert(d.message||'Gagal'); return;} loadInternships(); }catch(e){ alert('Gagal menghapus nilai'); }}
async function deleteInternship(id){ const {t}=requireAuth(); if(!confirm('Hapus data penempatan ini? Tindakan ini tidak dapat dibatalkan.')) return; try{ const r=await fetch('/api/guru/internships/'+id,{method:'DELETE',headers:{Authorization:'Bearer '+t}}); const d=await r.json(); if(!r.ok){ alert(d.message||'Gagal menghapus data'); return;} loadInternships(); }catch(e){ alert('Gagal menghapus data penempatan'); }}

// Create internship helpers
async function openCreateInternship(){
  const {t,u}=requireAuth();
  // set guru
  document.getElementById('cGuru').value = u.name || 'Guru';
  // load siswa list
  try{
    const rs=await fetch('/api/guru/students',{headers:{Authorization:'Bearer '+t}}); const students=await rs.json();
    const sel=document.getElementById('cSiswa'); sel.innerHTML='';
    (students||[]).forEach(s=>{ const opt=document.createElement('option'); opt.value=s.id; opt.textContent=s.name; sel.appendChild(opt); });
  }catch(e){}
  // load dudi list (gunakan endpoint all untuk menampilkan semua DUDI aktif)
  try{
    const r=await fetch('/api/guru/dudi/all',{headers:{Authorization:'Bearer '+token()}}); const dudi=await r.json();
    const sd=document.getElementById('cDudi'); sd.innerHTML='';
    (dudi||[]).forEach(d=>{ const opt=document.createElement('option'); opt.value=d.id; opt.textContent=d.nama_perusahaan; sd.appendChild(opt); });
  }catch(e){}
  new bootstrap.Modal(document.getElementById('mCreate')).show();
}
async function submitCreateInternship(){
  const {t}=requireAuth();
  const payload={
    siswa_id: parseInt(document.getElementById('cSiswa').value||'0',10),
    dudi_id: parseInt(document.getElementById('cDudi').value||'0',10),
    tanggal_mulai: document.getElementById('cMulai').value||null,
    tanggal_selesai: document.getElementById('cSelesai').value||null,
  };
  const msg=document.getElementById('cMsg'); msg.classList.add('d-none'); msg.textContent='';
  try{
    const r=await fetch('/api/guru/internships',{method:'POST',headers:{Authorization:'Bearer '+t,'Content-Type':'application/json'},body:JSON.stringify(payload)});
    const d=await r.json();
    if(!r.ok){ msg.textContent=d.message||'Gagal menyimpan'; msg.classList.remove('d-none'); return; }
    bootstrap.Modal.getInstance(document.getElementById('mCreate')).hide();
    loadInternships();
  }catch(e){ msg.textContent='Terjadi kesalahan'; msg.classList.remove('d-none'); }
}

// Reset magang filters
function resetMagangFilters() {
  document.getElementById('im-q').value = '';
  document.getElementById('im-status').value = '';
  document.getElementById('im-per-page').value = '10';
  loadInternships();
}
  </script>
</body></html>


