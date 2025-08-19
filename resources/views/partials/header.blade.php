{{-- <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="JN Logo">
        </a>

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
                        <li><a href="{{ route('thematic-areas.index', 'youth_empowerment') }}">Youth Empowerment</a></li>
                        <li><a href="{{ route('thematic-areas.index', 'research') }}">Research</a></li>
                        <li><a href="{{ route('thematic-areas.index', 'comming_soon') }}">Coming Soon</a></li>
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
        
        <button class="mobile-nav-toggle mobile-nav-show bi bi-list" aria-label="Open menu"></button>
        <button class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x" aria-label="Close menu"></button>
    </div>
</header> --}}

{{-- <!-- header.blade.php -->
<header id="header" class="header fixed-top d-flex align-items-center ">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="JN Logo">
        </a>

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
                        <li><a href="{{ route('thematic-areas.index', 'youth_empowerment') }}">Youth Empowerment</a></li>
                        <li><a href="{{ route('thematic-areas.index', 'research') }}">Research</a></li>
                        <li><a href="{{ route('thematic-areas.index', 'comming_soon') }}">Coming Soon</a></li>
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
        
        <button class="mobile-nav-toggle mobile-nav-show bi bi-list" aria-label="Open menu"></button>
        <button class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x" aria-label="Close menu"></button>
    </div>
</header> --}}

<!-- header.blade.php -->
<header id="header" class="header fixed-top d-flex align-items-center" data-scroll-threshold="40">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/jn_logo.png') }}" alt="JN Logo">
        </a>

        <nav id="navbar" class="navbar" role="navigation" aria-label="Primary">
            <ul>
                <!-- About Us -->
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-trigger" id="about-trigger" aria-haspopup="true" aria-expanded="false" aria-controls="about-menu">
                        <span>About Us</span> <i class="fas fa-chevron-down dropdown-indicator" aria-hidden="true"></i>
                    </a>
                    <ul id="about-menu" class="dropdown-menu" role="menu" aria-labelledby="about-trigger">
                        <li role="none"><a role="menuitem" href="{{ route('about') }}">Our Info</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('team') }}">Our Team</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('alumni') }}">Our Alumni</a></li>
                    </ul>
                </li>

                <!-- Publication -->
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-trigger" id="publication-trigger" aria-haspopup="true" aria-expanded="false" aria-controls="publication-menu">
                        <span>Publication</span> <i class="fas fa-chevron-down dropdown-indicator" aria-hidden="true"></i>
                    </a>
                    <ul id="publication-menu" class="dropdown-menu" role="menu" aria-labelledby="publication-trigger">
                        <li role="none"><a role="menuitem" href="{{ route('resources') }}">Resources</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('blog.list') }}">Blog</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('reports') }}">Reports</a></li>
                    </ul>
                </li>

                <!-- Thematic Areas -->
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-trigger" id="thematic-trigger" aria-haspopup="true" aria-expanded="false" aria-controls="thematic-menu">
                        <span>Thematic Areas</span> <i class="fas fa-chevron-down dropdown-indicator" aria-hidden="true"></i>
                    </a>
                    <ul id="thematic-menu" class="dropdown-menu" role="menu" aria-labelledby="thematic-trigger">
                        <li role="none"><a role="menuitem" href="{{ route('thematic-areas.index', 'youth_empowerment') }}">Youth Empowerment</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('thematic-areas.research', 'research') }}">Research</a></li>
                        <li role="none"><a role="menuitem" href="{{ route('thematic-areas.coming-soon', 'commingsoon') }}">Coming Soon</a></li>
                    </ul>
                </li>

                <!-- Single links -->
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('career') }}">Career</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                
                <!-- Action buttons -->
                <li class="action-btn"><a href="#" target="_blank">KYB</a></li>
                <li class="action-btn"><a href="#" target="_blank">Gaming</a></li>
                <li class="action-btn"><a href="#" target="_blank">E-Learning</a></li>
                <li class="donate-btn"><a href="{{ route('donate') }}">DONATE HERE</a></li>
            </ul>
        </nav>
        
        <button class="mobile-nav-toggle mobile-nav-show bi bi-list" aria-label="Open menu" aria-expanded="false" aria-controls="navbar"></button>
        <button class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x" aria-label="Close menu" aria-expanded="true" aria-controls="navbar"></button>
    </div>
</header>