<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master-data-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a class="{{ request()->is('admin/users/user') ? 'active' : '' }}" href="{{ route('admin.users.user.index') }}">
                    <i class="bi bi-circle"></i><span>All User</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin/users/guru') ? 'active' : '' }}" href="{{ route('admin.users.guru.index') }}">
                    <i class="bi bi-circle"></i><span>Guru</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin/users/murid') ? 'active' : '' }}" href="{{ route('admin.users.murid.index') }}">
                    <i class="bi bi-circle"></i><span>Murid</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="">
            <i class="bx bx-user"></i>
            <span>Testimonial</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="">
            <i class="bx bx-user"></i>
            <span>About Me</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="">
            <i class="bi bi-gear"></i>
            <span>Skill</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#resume-nav" data-bs-toggle="collapse" href="#">
            <i class="bx bx-book-content"></i></i><span>Resume</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="resume-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a class="{{ request()->is('admin') ? 'active' : '' }}" href="">
                    <i class="bi bi-circle"></i><span>Education</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin') ? 'active' : '' }}" href="">
                    <i class="bi bi-circle"></i><span>Professional Experience</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->is('admin') ? 'active' : '' }}" href="">
                    <i class="bi bi-circle"></i><span>Workshop and Training</span>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin') ? '' : 'collapsed' }}" href="">
            <i class="bx bx-book-content"></i>
            <span>Portfolio</span>
        </a>
    </li>

</ul>

</aside><!-- End Sidebar-->