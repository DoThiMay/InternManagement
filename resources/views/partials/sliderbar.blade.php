<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background: linear-gradient(to bottom, #004e92, #000428); color: #ffffff; width: 250px;">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link d-flex align-items-center" style="background-color: transparent; padding-left: 15px;">
    <img src="{{ asset('adminlte/dist/img/deha.png') }}" alt="Deha Logo" 
         class="brand-image img-circle elevation-3" 
         style="opacity: 0.95; width: 35px; margin-right: 10px;">
    <span class="brand-text font-weight-bold" style="color: #ffffff; font-size: 18px;">DEHA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">
      <div class="image">
        <img src="{{ asset('adminlte/dist/img/user2.png') }}" class="img-circle elevation-2" alt="User Image" style="width: 35px;">
      </div>
      <div class="info ml-2">
        @if(Auth::guard('intern')->check())
          <a href="#" class="d-block text-white font-weight-bold">Nhân viên</a>
          <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger w-100">Đăng xuất</button>
          </form>
        @endif
        @if(Auth::guard('web')->check())
          <a href="#" class="d-block text-white font-weight-bold">Nguyễn Minh Anh (DEV) </a>
          <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger w-100">Đăng xuất</button>
          </form>
        @endif
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="padding-left: 10px;">
        <li class="nav-item mb-1">
          <a href="{{ route('interns.index') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-users" style="color: #00c3ff; width: 20px;"></i>
            <p class="ml-2">
              Quản lý thực tập sinh
              <span class="right badge badge-info">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="{{ route('programs.index') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-list" style="color: #00c3ff; width: 20px;"></i>
            <p class="ml-2">Quản lý chương trình</p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="{{ route('lich.index') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-calendar-alt" style="color: #00c3ff; width: 20px;"></i>
            <p class="ml-2">Đăng ký lịch thực tập</p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="{{ route('lich.index') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-tasks" style="color: #00c3ff; width: 20px;"></i>
            <p class="ml-2">Quản lý tiến độ</p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="{{ route('lich.index') }}" class="nav-link text-white">
            <i class="nav-icon fas fa-tasks" style="color: #00c3ff; width: 20px;"></i>
            <p class="ml-2">Báo cáo thống kê</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>