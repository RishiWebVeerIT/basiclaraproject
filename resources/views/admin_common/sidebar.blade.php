<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{ Request::routeIs('admin.dashboard') ? '' : 'collapsed ' }}" href="{{Route('admin.dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Management</li>


  <li class="nav-item">
    <a class="nav-link {{ Request::routeIs('admin.add_member') ? '' : 'collapsed ' }} {{ Request::routeIs('admin.all_member') ? '' : 'collapsed ' }}" data-bs-target="#ccontact-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Member</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="ccontact-nav" class="nav-content collapse {{ Request::routeIs('admin.add_member') ? 'show' : '' }} {{ Request::routeIs('admin.all_member') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{Route('admin.add_member')}}" class="{{ Request::routeIs('admin.add_member') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Add Member</span>
        </a>
      </li>
      <li>
        <a href="{{Route('admin.all_member')}}"  class="{{ Request::routeIs('admin.all_member') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>All Members</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ Request::routeIs('admin.enquiry') ? '' : 'collapsed ' }}" href="{{Route('admin.enquiry')}}">
      <i class="bi bi-person-lines-fill"></i>
      <span>Enquiries</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ Request::routeIs('admin.revenue') ? '' : 'collapsed ' }} {{ Request::routeIs('admin.fees.structure') ? '' : 'collapsed ' }} {{ Request::routeIs('admin.dfc') ? '' : 'collapsed ' }}" data-bs-target="#fees-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Fees</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="fees-nav" class="nav-content collapse {{ Request::routeIs('admin.fees.structure') ? 'show' : '' }} {{ Request::routeIs('admin.revenue') ? 'show' : '' }} {{ Request::routeIs('admin.dfc') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{Route('admin.fees.structure')}}" class="{{ Request::routeIs('admin.fees.structure') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Fee Heads</span>
        </a>
      </li>
      <li>
        <a href="{{Route('admin.revenue')}}"  class="{{ Request::routeIs('admin.revenue') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>Bills</span>
        </a>
      </li>
      <!-- <li>
        <a href="{{Route('admin.dfc')}}"  class="{{ Request::routeIs('admin.dfc') ? 'active' : '' }}">
          <i class="bi bi-circle"></i><span>D.F.C</span>
        </a>
      </li> -->
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ Request::routeIs('admin.offer') ? '' : 'collapsed ' }}" href="{{Route('admin.offer')}}">
      <i class="bi bi-person-lines-fill"></i>
      <span>Manage Offers</span>
    </a>
  </li>

  <li class="nav-item d-none">
    <a class="nav-link {{ Request::routeIs('admin.member_attendance') ? '' : 'collapsed ' }}" href="{{Route('admin.member_attendance')}}">
      <i class="bi bi-person-lines-fill"></i>
      <span>Member Attendance</span>
    </a>
  </li>


</ul>

</aside><!-- End Sidebar-->
