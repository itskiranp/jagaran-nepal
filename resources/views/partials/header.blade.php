<header id="header" class="header d-flex align-items-start custom-header">
    <div class="overlay"></div> <!-- overlay for image opacity -->

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="JN Logo">
        </a>

        <button class="mobile-nav-toggle mobile-nav-show bi bi-list" aria-label="Open menu"></button>
        <button class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x" aria-label="Close menu"></button>
        
        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-trigger"><span>About Us</span> <i class="fas fa-chevron-down dropdown-indicator"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('about') }}">Our Info</a></li>
                        <li><a href="{{ route('team') }}">Our Team</a></li>
                        <li><a href="{{ route('alumni') }}">Our Alumni</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-trigger"><span>Publication</span> <i class="fas fa-chevron-down dropdown-indicator"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('resources') }}">Resources</a></li>
                        <li><a href="{{ route('blog.list') }}">Blog</a></li>
                        <li><a href="{{ route('reports') }}">Reports</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-trigger"><span>Thematic Areas</span> <i class="fas fa-chevron-down dropdown-indicator"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('thematic.area', 'active-citizenship') }}">Youth Empowerment</a></li>
                        <li><a href="{{ route('thematic.area', 'srhr') }}">Research</a></li>
                        <li><a href="{{ route('thematic.area', 'research-unit') }}">Coming Soon</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('career') }}">Career</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                
                <li class="action-btn"><a href="#" target="_blank">KYB</a></li>
                <li class="action-btn"><a href="#" target="_blank">Gaming</a></li>
                <li class="action-btn"><a href="#" target="_blank">E-Learning</a></li>
                <li class="donate-btn"><a href="{{ route('donate') }}">DONATE HERE</a></li>
            </ul>
        </nav>
    </div>
</header>