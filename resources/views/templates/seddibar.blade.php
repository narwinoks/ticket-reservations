		<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Gent<span>X</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Master</li>
          <li class="nav-item">
            <a href="{{ route('ticket.index') }}" class="nav-link">
              <i class="link-icon" data-feather="credit-card"></i>
              <span class="link-title">Tikets</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data</li>
          <li class="nav-item">
            <a href="{{ route('checkin.index') }}" class="nav-link">
              <i class="link-icon" data-feather="external-link"></i>
              <span class="link-title">Check in</span>
            </a>
          <li class="nav-item">
            <a href="{{ route('booking.index') }}" class="nav-link">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Booking</span>
            </a>
        </ul>
      </div>
    </nav>
		<!-- partial -->