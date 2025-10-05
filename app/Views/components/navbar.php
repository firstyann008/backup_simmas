<?php
// Get user data from passed data or session
$user = $user ?? session('user') ?? null;
$userRole = $user['role'] ?? 'guest';
$userName = $user['name'] ?? 'User';

// Load school info from database
$db = db_connect();
$schoolInfo = $db->table('settings')->get()->getRowArray();
$schoolName = $schoolInfo['nama_sekolah'] ?? 'SMK Negeri 1 Surabaya';
$logoUrl = $schoolInfo['logo_url'] ?? null;

// Debug logging
log_message('debug', 'Navbar school name loaded: ' . $schoolName);
$appName = 'Sistem Manajemen Magang Siswa';
$appVersion = 'v1.0';

// Role-based panel text
$panelText = match($userRole) {
    'admin' => 'Panel Admin',
    'guru' => 'Panel Guru',
    'siswa' => 'Panel Siswa',
    default => 'Panel User'
};

// Role-based avatar color
$avatarColor = match($userRole) {
    'admin' => 'bg-primary',
    'guru' => 'bg-success', 
    'siswa' => 'bg-info',
    default => 'bg-secondary'
};
?>

<!-- Navbar Component -->
<nav class="navbar navbar-expand-lg shadow-sm border-bottom" style="background: var(--bg-surface); margin-bottom: 0;">
  <div class="container-fluid" style="padding: 0.25rem 1.0rem; height: 64px; display: flex; align-items: center; justify-content: space-between;">
    <!-- Left Side: Toggle Button and School Info -->
    <div class="d-flex align-items-center">
      <!-- Sidebar Toggle Button -->
      <button class="btn btn-link me-3" type="button" onclick="toggleSidebar()" aria-label="Toggle sidebar" style="color: var(--text-primary);">
        <i class="fas fa-bars fs-5"></i>
      </button>
      
      <!-- School Name -->
      <div class="d-flex align-items-center me-4" style="min-width:0;">
        <?php if (!empty($logoUrl)): ?>
          <img src="<?= esc($logoUrl) ?>" alt="Logo" class="me-2" style="width:36px;height:36px;object-fit:contain;border-radius:8px;background:#fff;">
        <?php endif; ?>
        <div class="d-flex flex-column justify-content-center" style="line-height:1.1;">
          <h5 class="mb-0 fw-bold" style="color: var(--text-primary);"><?= esc($schoolName) ?></h5>
          <small style="color: var(--text-secondary);"><?= $appName ?></small>
        </div>
      </div>
      
    </div>

    <!-- Right Side: User Info and Actions -->
    <div class="d-flex align-items-center">
      <!-- User Avatar with Dropdown -->
      <div class="dropdown">
        <button class="btn btn-link text-decoration-none p-0 d-flex align-items-center" type="button" id="userDropdown" aria-expanded="false" style="color: var(--text-primary);">
          <div class="d-flex align-items-center">
            <!-- Avatar -->
            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; background: var(--brand-600);">
              <i class="fas fa-user" style="color:#fff;"></i>
            </div>
            <!-- User Info -->
            <div class="text-start d-none d-md-block">
              <div class="fw-semibold" id="navbar-user-name" style="color: var(--text-primary);"><?= $userName ?></div>
              <small class="text-capitalize" id="navbar-user-role" style="color: var(--text-secondary);"><?= $userRole ?></small>
            </div>
            <!-- Dropdown Arrow -->
            <i class="fas fa-chevron-down ms-2" style="color: var(--text-secondary);"></i>
          </div>
        </button>
        
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 200px;">
          <li class="px-3 py-2 border-bottom">
            <div class="d-flex align-items-center">
              <div class="rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; background: var(--brand-600);">
                <i class="fas fa-user small" style="color:#fff;"></i>
              </div>
              <div>
                <div class="fw-semibold" id="dropdown-user-name"><?= $userName ?></div>
                <small class="text-capitalize" id="dropdown-user-role" style="color: var(--text-secondary);">
                  <?= $userRole ?>
                </small>
              </div>
            </div>
          </li>
          <li><hr class="dropdown-divider my-1"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#" onclick="showProfile()">
              <i class="fas fa-user-cog me-2 text-muted"></i>
              Profil Saya
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#" onclick="showSettings()">
              <i class="fas fa-cog me-2 text-muted"></i>
              Pengaturan
            </a>
          </li>
          <li><hr class="dropdown-divider my-1"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center text-danger" href="#" onclick="logout()">
              <i class="fas fa-sign-out-alt me-2"></i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- Sidebar Overlay for Mobile -->
<div id="sidebar-overlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

<style>
/* Custom styles for navbar */
.navbar {
  width: 100%;
  max-width: 100%;
}

.logo-icon {
  transition: transform 0.2s ease;
}

.logo-icon:hover {
  transform: scale(1.05);
}

.dropdown-toggle::after {
  display: none;
}

.dropdown-menu {
  border-radius: 0.5rem;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  z-index: 1050;
}

.dropdown-menu.show {
  display: block !important;
  opacity: 1 !important;
  visibility: visible !important;
}

.dropdown-item {
  padding: 0.5rem 1rem;
  transition: background-color 0.2s ease;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
}

.dropdown-item:active {
  background-color: #e9ecef;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .navbar .container-fluid {
    padding: 0.4rem 1rem !important;
    height: 70px !important;
  }
  
  .navbar .d-none.d-lg-block {
    display: none !important;
  }
  
  .navbar .d-none.d-md-block {
    display: none !important;
  }
}

/* Animation for dropdown */
.dropdown-menu {
  animation: fadeInDown 0.2s ease;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

<script>
// Navbar functionality
function showProfile() {
  // Implement profile functionality
  console.log('Show profile');
  // You can add modal or redirect logic here
}

function showSettings() {
  // Implement settings functionality
  console.log('Show settings');
  // You can add modal or redirect logic here
}

function logout() {
  if (confirm('Apakah Anda yakin ingin logout?')) {
    // Clear local storage
    localStorage.removeItem('simmas_token');
    localStorage.removeItem('simmas_user');
    
    // Redirect to logout
    window.location.href = '/logout';
  }
}

// Load user info from localStorage
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

// Initialize dropdown and tooltips
document.addEventListener('DOMContentLoaded', function() {
  console.log('Initializing navbar dropdown...');
  
  // Load user info from localStorage
  loadUserInfo();
  
  // Initialize Bootstrap tooltips
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
  
  // Manual dropdown toggle for user avatar
  const userDropdown = document.getElementById('userDropdown');
  if (userDropdown) {
    console.log('User dropdown found:', userDropdown);
    
    userDropdown.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      console.log('User dropdown clicked');
      
      // Toggle dropdown manually
      const dropdownMenu = userDropdown.nextElementSibling;
      if (dropdownMenu) {
        console.log('Toggling dropdown menu');
        console.log('Dropdown menu element:', dropdownMenu);
        console.log('Current classes:', dropdownMenu.className);
        
        // Remove show class from all other dropdowns
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
          if (menu !== dropdownMenu) {
            menu.classList.remove('show');
          }
        });
        
        // Toggle current dropdown
        dropdownMenu.classList.toggle('show');
        
        // Update aria-expanded
        const isExpanded = dropdownMenu.classList.contains('show');
        userDropdown.setAttribute('aria-expanded', isExpanded);
        
        console.log('Dropdown toggled. Show class:', dropdownMenu.classList.contains('show'));
      } else {
        console.error('Dropdown menu not found!');
      }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      if (!userDropdown.contains(e.target)) {
        const dropdownMenu = userDropdown.nextElementSibling;
        if (dropdownMenu) {
          dropdownMenu.classList.remove('show');
          userDropdown.setAttribute('aria-expanded', 'false');
        }
      }
    });
  } else {
    console.error('User dropdown not found!');
  }
});
</script>
