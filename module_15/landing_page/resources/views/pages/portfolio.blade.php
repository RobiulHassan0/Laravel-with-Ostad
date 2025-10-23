<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atik Bin Mustafij (Sobuj) | Full-Stack Laravel Developer</title>
    <meta
        name="description"
        content="Full-Stack Laravel Developer specializing in PHP, Laravel, JavaScript, Vue.js, and MySQL. Building robust web applications with elegant UX."
    />

    <!-- Open Graph -->
    <meta
        property="og:title"
        content="Atik Bin Mustafij (Sobuj) | Full-Stack Laravel Developer"
    />
    <meta
        property="og:description"
        content="Full-Stack Laravel Developer specializing in PHP, Laravel, JavaScript, Vue.js, and MySQL."
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://yourwebsite.com" />
    <meta
        property="og:image"
        content="https://yourwebsite.com/assets/img/og-image.jpg"
    />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta
        name="twitter:title"
        content="Atik Bin Mustafij (Sobuj) | Full-Stack Laravel Developer"
    />
    <meta
        name="twitter:description"
        content="Full-Stack Laravel Developer specializing in PHP, Laravel, JavaScript, Vue.js, and MySQL."
    />
    <meta
        name="twitter:image"
        content="https://yourwebsite.com/assets/img/og-image.jpg"
    />

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    />

    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="70">
<!-- Navbar -->
<nav
    id="navbar"
    class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#home">
            <span class="text-primary">SOBUJ</span>
        </a>

        <div class="d-flex align-items-center order-lg-3">
            <!-- Dark Mode Toggle -->
            <button
                class="btn btn-outline-secondary me-2"
                id="darkModeToggle"
                aria-label="Toggle dark mode"
            >
                <i class="bi bi-moon-fill"></i>
            </button>
            <!-- Hire Me Button -->
            <a href="#contact" class="btn btn-primary me-3">Hire Me</a>
            <!-- Mobile Menu Toggle -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projects">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#experience">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="hero-section py-5">
    <div class="container py-5">
        <!-- Reduced hero height from min-vh-100 to align-items-center for better spacing -->
        <div class="row align-items-center" style="min-height: 80vh">
            <div class="col-lg-6 fade-in">
                <h1 class="display-4 fw-bold mb-3">
                    Building robust
                    <span class="text-primary">Laravel apps</span> with elegant UX
                </h1>
                <p class="lead mb-4 text-muted">
                    Full-Stack Laravel Developer — PHP • Laravel • JavaScript • Vue.js
                    • MySQL
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#projects" class="btn btn-primary btn-lg"
                    >View Projects</a
                    >
                    <a href="#" class="btn btn-outline-primary btn-lg">Download CV</a>
                </div>
                <div class="d-flex flex-wrap gap-2">
              <span class="badge bg-primary-subtle text-primary px-3 py-2">
                <i class="bi bi-code-slash me-1"></i>Laravel
              </span>
                    <span class="badge bg-success-subtle text-success px-3 py-2">
                <i class="bi bi-filetype-php me-1"></i>PHP
              </span>
                    <span class="badge bg-warning-subtle text-warning px-3 py-2">
                <i class="bi bi-filetype-js me-1"></i>JavaScript
              </span>
                    <span class="badge bg-info-subtle text-info px-3 py-2">
                <i class="bi bi-bootstrap me-1"></i>Vue.js
              </span>
                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                <i class="bi bi-database me-1"></i>MySQL
              </span>
                </div>
            </div>
            <div class="col-lg-6 text-center fade-in">
                <div class="hero-image">
                    <!-- Replaced placeholder with real professional developer image -->
                    <img
                        src="{{asset('assets/images/person.jpg')}}"
                        alt="Atik Bin Mustafij - Laravel Developer"
                        class="img-fluid rounded-circle shadow-lg"
                        loading="lazy"
                    />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5 fade-in">
                <h2 class="display-5 fw-bold mb-3">About Me</h2>
                <p class="lead">
                    With over 5 years of experience in full-stack development, I
                    specialize in creating robust, scalable web applications using
                    Laravel and modern JavaScript frameworks. I've helped businesses
                    across various industries build efficient digital solutions that
                    drive growth and enhance user experience.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4 fade-in">
                <div class="card h-100 border-0 shadow-sm glass-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="feature-icon bg-primary text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-server"></i>
                        </div>
                        <h5 class="card-title">API-First Backend</h5>
                        <p class="card-text">
                            Building scalable REST APIs with Laravel, implementing clean
                            architecture and best practices for maintainable code.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fade-in">
                <div class="card h-100 border-0 shadow-sm glass-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="feature-icon bg-success text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-phone"></i>
                        </div>
                        <h5 class="card-title">SPA & PWA</h5>
                        <p class="card-text">
                            Creating responsive single-page applications and progressive
                            web apps using Vue.js with seamless user experiences.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fade-in">
                <div class="card h-100 border-0 shadow-sm glass-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="feature-icon bg-info text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-database-gear"></i>
                        </div>
                        <h5 class="card-title">Scalable MySQL Schema</h5>
                        <p class="card-text">
                            Designing optimized database structures and queries that
                            handle high traffic while maintaining data integrity.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Skills & Tech Stack</h2>
            <p class="lead">Technologies I work with to bring ideas to life</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-primary mb-3">
                            <i class="bi bi-server me-2"></i>Backend
                        </h6>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>PHP</span>
                                <span>95%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    style="width: 95%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Laravel</span>
                                <span>90%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    style="width: 90%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Node.js</span>
                                <span>75%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    style="width: 75%"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-success mb-3">
                            <i class="bi bi-palette me-2"></i>Frontend
                        </h6>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>JavaScript</span>
                                <span>88%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-success"
                                    style="width: 88%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Vue.js</span>
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-success"
                                    style="width: 85%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Bootstrap</span>
                                <span>92%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-success"
                                    style="width: 92%"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-info mb-3">
                            <i class="bi bi-database me-2"></i>Database
                        </h6>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>MySQL</span>
                                <span>90%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>PostgreSQL</span>
                                <span>80%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Redis</span>
                                <span>75%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-warning mb-3">
                            <i class="bi bi-tools me-2"></i>Tools & Cloud
                        </h6>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Git</span>
                                <span>95%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-warning"
                                    style="width: 95%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Docker</span>
                                <span>80%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-warning"
                                    style="width: 80%"
                                ></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span>AWS</span>
                                <span>70%</span>
                            </div>
                            <div class="progress">
                                <div
                                    class="progress-bar bg-warning"
                                    style="width: 70%"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Featured Projects</h2>
            <p class="lead">Some of my recent work that showcases my skills</p>
        </div>

        <!-- Project Filters -->
        <div class="text-center mb-5 fade-in">
            <div class="btn-group" role="group" aria-label="Project filters">
                <button
                    type="button"
                    class="btn btn-outline-primary active"
                    data-filter="all"
                >
                    All
                </button>
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-filter="laravel"
                >
                    Laravel
                </button>
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-filter="vue"
                >
                    Vue.js
                </button>
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-filter="fullstack"
                >
                    Full-Stack
                </button>
            </div>
        </div>

        <div class="row g-4" id="projectsGrid">
            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="laravel fullstack"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real e-commerce project image -->
                    <img
                        src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="E-commerce Platform"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">E-commerce Platform</h5>
                        <p class="card-text">
                            Full-featured e-commerce solution with inventory management,
                            payment integration, and admin dashboard.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-success me-1">Vue.js</span>
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-warning">Stripe</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="vue"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real task management app image -->
                    <img
                        src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Task Management App"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Task Management SPA</h5>
                        <p class="card-text">
                            Progressive web app for team collaboration with real-time
                            updates and drag-and-drop functionality.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-success me-1">Vue.js</span>
                            <span class="badge bg-primary me-1">Laravel API</span>
                            <span class="badge bg-info me-1">WebSocket</span>
                            <span class="badge bg-secondary">PWA</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="laravel"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real restaurant management image -->
                    <img
                        src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Restaurant Management"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Restaurant Management System</h5>
                        <p class="card-text">
                            Complete restaurant solution with POS, inventory tracking, and
                            customer management features.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-warning me-1">Bootstrap</span>
                            <span class="badge bg-success">bKash</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="fullstack"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real learning management system image -->
                    <img
                        src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Learning Management System"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Learning Management System</h5>
                        <p class="card-text">
                            Educational platform with course management, video streaming,
                            and progress tracking capabilities.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-success me-1">Vue.js</span>
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-danger">Redis</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="laravel"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real inventory management image -->
                    <img
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Inventory Management"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Inventory Management API</h5>
                        <p class="card-text">
                            RESTful API for warehouse management with barcode scanning and
                            automated reorder points.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-secondary me-1">REST API</span>
                            <span class="badge bg-warning">JWT</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-lg-4 col-md-6 project-item fade-in"
                data-category="vue fullstack"
            >
                <div class="card h-100 border-0 shadow-sm project-card">
                    <!-- Replaced placeholder with real real estate platform image -->
                    <img
                        src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&h=250&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Real Estate Platform"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <h5 class="card-title">Real Estate Platform</h5>
                        <p class="card-text">
                            Property listing platform with advanced search, virtual tours,
                            and agent management system.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-success me-1">Vue.js</span>
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-warning">Maps API</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-sm">Live Demo</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Professional Experience</h2>
            <p class="lead">My journey in full-stack development</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="timeline">
                    <div class="timeline-item fade-in">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5 class="fw-bold">Senior Laravel Developer</h5>
                            <p class="text-primary mb-2">
                                TechCorp Solutions • 2022 - Present
                            </p>
                            <ul class="mb-0">
                                <li>
                                    Led development of 5+ enterprise web applications serving
                                    10,000+ users
                                </li>
                                <li>
                                    Reduced page load times by 45% through database
                                    optimization and caching strategies
                                </li>
                                <li>
                                    Mentored junior developers and established coding
                                    standards for the team
                                </li>
                                <li>
                                    Implemented CI/CD pipelines reducing deployment time by
                                    60%
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="timeline-item fade-in">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5 class="fw-bold">Full-Stack Developer</h5>
                            <p class="text-primary mb-2">
                                Digital Innovations Ltd • 2020 - 2022
                            </p>
                            <ul class="mb-0">
                                <li>
                                    Developed and maintained 15+ Laravel applications with
                                    Vue.js frontends
                                </li>
                                <li>
                                    Integrated payment gateways (bKash, Nagad, Stripe)
                                    increasing conversion by 30%
                                </li>
                                <li>
                                    Built RESTful APIs serving mobile applications with 99.9%
                                    uptime
                                </li>
                                <li>
                                    Collaborated with cross-functional teams to deliver
                                    projects on time
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="timeline-item fade-in">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5 class="fw-bold">PHP Developer</h5>
                            <p class="text-primary mb-2">WebCraft Agency • 2019 - 2020</p>
                            <ul class="mb-0">
                                <li>
                                    Developed custom WordPress themes and plugins for 20+
                                    clients
                                </li>
                                <li>
                                    Migrated legacy PHP applications to Laravel framework
                                </li>
                                <li>
                                    Optimized MySQL queries improving application performance
                                    by 40%
                                </li>
                                <li>
                                    Provided technical support and maintenance for client
                                    websites
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="timeline-item fade-in">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5 class="fw-bold">Junior Web Developer</h5>
                            <p class="text-primary mb-2">StartUp Hub • 2018 - 2019</p>
                            <ul class="mb-0">
                                <li>
                                    Built responsive websites using HTML, CSS, JavaScript, and
                                    Bootstrap
                                </li>
                                <li>
                                    Learned Laravel framework and contributed to team projects
                                </li>
                                <li>
                                    Participated in code reviews and agile development
                                    processes
                                </li>
                                <li>
                                    Gained experience with version control systems and
                                    deployment workflows
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Services I Offer</h2>
            <p class="lead">
                Comprehensive web development solutions for your business
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-primary text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <h5 class="card-title">Custom Laravel APIs</h5>
                        <p class="card-text">
                            Build robust, scalable REST APIs with Laravel following best
                            practices and security standards.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-success text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-cart"></i>
                        </div>
                        <h5 class="card-title">E-commerce & Inventory</h5>
                        <p class="card-text">
                            Complete e-commerce solutions with inventory management,
                            payment processing, and admin dashboards.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-info text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="card-title">Dashboard & Analytics</h5>
                        <p class="card-text">
                            Interactive dashboards with real-time data visualization and
                            comprehensive analytics reporting.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-warning text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h5 class="card-title">Performance Optimization</h5>
                        <p class="card-text">
                            Optimize existing applications for better performance, faster
                            load times, and improved user experience.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-danger text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h5 class="card-title">Payment Integrations</h5>
                        <p class="card-text">
                            Integrate local and international payment gateways including
                            bKash, Nagad, Stripe, and PayPal.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div
                            class="service-icon bg-secondary text-white rounded-circle mx-auto mb-3"
                        >
                            <i class="bi bi-puzzle"></i>
                        </div>
                        <h5 class="card-title">Third-party Integrations</h5>
                        <p class="card-text">
                            Seamlessly integrate your applications with external APIs,
                            services, and business tools.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 fade-in">
            <a href="#contact" class="btn btn-primary btn-lg">Request a Quote</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Client Testimonials</h2>
            <p class="lead">What my clients say about working with me</p>
        </div>
        <div
            id="testimonialCarousel"
            class="carousel slide"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm glass-card">
                                <div class="card-body text-center p-5">
                                    <!-- Replaced placeholder with real professional woman image -->
                                    <img
                                        src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=80&h=80&fit=crop&crop=face&auto=format&q=80"
                                        class="rounded-circle mb-3"
                                        alt="Sarah Johnson"
                                        loading="lazy"
                                    />
                                    <blockquote class="blockquote mb-3">
                                        <p class="lead">
                                            "Atik delivered an exceptional e-commerce platform
                                            that exceeded our expectations. His attention to
                                            detail and technical expertise helped us increase our
                                            online sales by 150%."
                                        </p>
                                    </blockquote>
                                    <footer class="blockquote-footer">
                                        <strong>Sarah Johnson</strong>
                                        <cite title="Source Title"
                                        >CEO, Fashion Forward Ltd</cite
                                        >
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm glass-card">
                                <div class="card-body text-center p-5">
                                    <!-- Replaced placeholder with real professional man image -->
                                    <img
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face&auto=format&q=80"
                                        class="rounded-circle mb-3"
                                        alt="Michael Chen"
                                        loading="lazy"
                                    />
                                    <blockquote class="blockquote mb-3">
                                        <p class="lead">
                                            "Working with Atik was a game-changer for our startup.
                                            He built a scalable Laravel API that handles thousands
                                            of requests daily without any issues. Highly
                                            recommended!"
                                        </p>
                                    </blockquote>
                                    <footer class="blockquote-footer">
                                        <strong>Michael Chen</strong>
                                        <cite title="Source Title"
                                        >CTO, TechStart Solutions</cite
                                        >
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm glass-card">
                                <div class="card-body text-center p-5">
                                    <!-- Replaced placeholder with real professional man image -->
                                    <img
                                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face&auto=format&q=80"
                                        class="rounded-circle mb-3"
                                        alt="Ahmed Rahman"
                                        loading="lazy"
                                    />
                                    <blockquote class="blockquote mb-3">
                                        <p class="lead">
                                            "The restaurant management system Atik developed has
                                            streamlined our operations completely. Order
                                            processing time reduced by 40% and customer
                                            satisfaction improved significantly."
                                        </p>
                                    </blockquote>
                                    <footer class="blockquote-footer">
                                        <strong>Ahmed Rahman</strong>
                                        <cite title="Source Title"
                                        >Owner, Spice Garden Restaurant</cite
                                        >
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#testimonialCarousel"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#testimonialCarousel"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Latest Blog Posts</h2>
            <p class="lead">
                Sharing knowledge and insights about web development
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-in">
                <article class="card h-100 border-0 shadow-sm blog-card">
                    <!-- Replaced placeholder with real Laravel performance image -->
                    <img
                        src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=200&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Laravel Performance Tips"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-primary me-1">Laravel</span>
                            <span class="badge bg-warning">Performance</span>
                        </div>
                        <h5 class="card-title">
                            <a href="#" class="text-decoration-none"
                            >10 Laravel Performance Optimization Tips</a
                            >
                        </h5>
                        <p class="card-text">
                            Learn how to optimize your Laravel applications for better
                            performance and faster response times.
                        </p>
                        <small class="text-muted">December 15, 2024</small>
                    </div>
                </article>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <article class="card h-100 border-0 shadow-sm blog-card">
                    <!-- Replaced placeholder with real Vue.js coding image -->
                    <img
                        src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=200&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Vue.js Composition API"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-success me-1">Vue.js</span>
                            <span class="badge bg-info">Tutorial</span>
                        </div>
                        <h5 class="card-title">
                            <a href="#" class="text-decoration-none"
                            >Mastering Vue.js Composition API</a
                            >
                        </h5>
                        <p class="card-text">
                            A comprehensive guide to using Vue.js Composition API for
                            better code organization and reusability.
                        </p>
                        <small class="text-muted">December 10, 2024</small>
                    </div>
                </article>
            </div>

            <div class="col-lg-4 col-md-6 fade-in">
                <article class="card h-100 border-0 shadow-sm blog-card">
                    <!-- Replaced placeholder with real database design image -->
                    <img
                        src="https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=400&h=200&fit=crop&auto=format&q=80"
                        class="card-img-top"
                        alt="Database Design"
                        loading="lazy"
                    />
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-info me-1">MySQL</span>
                            <span class="badge bg-secondary">Database</span>
                        </div>
                        <h5 class="card-title">
                            <a href="#" class="text-decoration-none"
                            >Database Design Best Practices</a
                            >
                        </h5>
                        <p class="card-text">
                            Essential principles for designing scalable and efficient
                            database schemas for web applications.
                        </p>
                        <small class="text-muted">December 5, 2024</small>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <h2 class="display-5 fw-bold mb-3">Get In Touch</h2>
            <p class="lead">
                Ready to start your next project? Let's discuss how I can help
            </p>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 fade-in">
                <div class="contact-info">
                    <h4 class="mb-4">Contact Information</h4>
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="contact-icon bg-primary text-white rounded-circle me-3"
                        >
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Location</h6>
                            <p class="mb-0 text-muted">Dhaka, Bangladesh</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div
                            class="contact-icon bg-success text-white rounded-circle me-3"
                        >
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Email</h6>
                            <p class="mb-0 text-muted">atik.sobuj@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div
                            class="contact-icon bg-info text-white rounded-circle me-3"
                        >
                            <i class="bi bi-phone"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Phone</h6>
                            <p class="mb-0 text-muted">+880 1234 567890</p>
                        </div>
                    </div>

                    <h5 class="mb-3">Follow Me</h5>
                    <div class="social-links">
                        <a
                            href="#"
                            class="btn btn-outline-primary me-2"
                            aria-label="GitHub"
                        >
                            <i class="bi bi-github"></i>
                        </a>
                        <a
                            href="#"
                            class="btn btn-outline-primary me-2"
                            aria-label="LinkedIn"
                        >
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a
                            href="#"
                            class="btn btn-outline-primary me-2"
                            aria-label="Twitter"
                        >
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a
                            href="#"
                            class="btn btn-outline-primary"
                            aria-label="Stack Overflow"
                        >
                            <i class="bi bi-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 fade-in">
                <form class="contact-form" action="#" method="POST" novalidate>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                required
                            />
                            <div class="invalid-feedback">Please provide your name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                required
                            />
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="subject"
                                name="subject"
                                required
                            />
                            <div class="invalid-feedback">Please provide a subject.</div>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message *</label>
                            <textarea
                                class="form-control"
                                id="message"
                                name="message"
                                rows="5"
                                required
                            ></textarea>
                            <div class="invalid-feedback">Please provide a message.</div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                    <small class="text-muted mt-2 d-block"
                    >* Form will be wired to backend later</small
                    >
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5 class="mb-3">Atik Bin Mustafij (Sobuj)</h5>
                <p class="text-muted">
                    Full-Stack Laravel Developer passionate about creating robust web
                    applications that solve real-world problems.
                </p>
                <div class="social-links">
                    <a
                        href="#"
                        class="btn btn-outline-light btn-sm me-2"
                        aria-label="GitHub"
                    >
                        <i class="bi bi-github"></i>
                    </a>
                    <a
                        href="#"
                        class="btn btn-outline-light btn-sm me-2"
                        aria-label="LinkedIn"
                    >
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a
                        href="#"
                        class="btn btn-outline-light btn-sm me-2"
                        aria-label="Twitter"
                    >
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a
                        href="#"
                        class="btn btn-outline-light btn-sm"
                        aria-label="Stack Overflow"
                    >
                        <i class="bi bi-stack-overflow"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="#home" class="text-muted text-decoration-none">Home</a>
                    </li>
                    <li>
                        <a href="#about" class="text-muted text-decoration-none"
                        >About</a
                        >
                    </li>
                    <li>
                        <a href="#projects" class="text-muted text-decoration-none"
                        >Projects</a
                        >
                    </li>
                    <li>
                        <a href="#services" class="text-muted text-decoration-none"
                        >Services</a
                        >
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-3">Services</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="#services" class="text-muted text-decoration-none"
                        >Laravel APIs</a
                        >
                    </li>
                    <li>
                        <a href="#services" class="text-muted text-decoration-none"
                        >Vue.js Apps</a
                        >
                    </li>
                    <li>
                        <a href="#services" class="text-muted text-decoration-none"
                        >E-commerce</a
                        >
                    </li>
                    <li>
                        <a href="#services" class="text-muted text-decoration-none"
                        >Optimization</a
                        >
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="mb-3">Newsletter</h6>
                <p class="text-muted small">
                    Subscribe to get updates about new blog posts and projects.
                </p>
                <div class="input-group">
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Your email"
                        aria-label="Email"
                    />
                    <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
                <small class="text-muted">No backend integration yet</small>
            </div>
        </div>
        <hr class="my-4" />
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">
                    &copy; 2024 Atik Bin Mustafij (Sobuj). All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <button
                    class="btn btn-outline-light btn-sm"
                    id="backToTop"
                    aria-label="Back to top"
                >
                    <i class="bi bi-arrow-up"></i> Back to Top
                </button>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    // Dark Mode Toggle
    const darkModeToggle = document.getElementById("darkModeToggle");
    const html = document.documentElement;

    // Check for saved theme preference or default to 'light'
    const currentTheme =
        localStorage.getItem("theme") ||
        (window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light");

    html.setAttribute("data-bs-theme", currentTheme);
    updateDarkModeIcon(currentTheme);

    darkModeToggle.addEventListener("click", function () {
        const currentTheme = html.getAttribute("data-bs-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        html.setAttribute("data-bs-theme", newTheme);
        localStorage.setItem("theme", newTheme);
        updateDarkModeIcon(newTheme);
    });

    function updateDarkModeIcon(theme) {
        const icon = darkModeToggle.querySelector("i");
        icon.className =
            theme === "dark" ? "bi bi-sun-fill" : "bi bi-moon-fill";
    }

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Project Filtering
    const filterButtons = document.querySelectorAll("[data-filter]");
    const projectItems = document.querySelectorAll(".project-item");

    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const filter = this.getAttribute("data-filter");

            // Update active button
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            // Filter projects
            projectItems.forEach((item) => {
                if (
                    filter === "all" ||
                    item.getAttribute("data-category").includes(filter)
                ) {
                    item.style.display = "block";
                    setTimeout(() => {
                        item.style.opacity = "1";
                        item.style.transform = "translateY(0)";
                    }, 100);
                } else {
                    item.style.opacity = "0";
                    item.style.transform = "translateY(20px)";
                    setTimeout(() => {
                        item.style.display = "none";
                    }, 300);
                }
            });
        });
    });

    // Form Validation
    const contactForm = document.querySelector(".contact-form");
    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const inputs = this.querySelectorAll(
                "input[required], textarea[required]"
            );
            let isValid = true;

            inputs.forEach((input) => {
                if (!input.value.trim()) {
                    input.classList.add("is-invalid");
                    isValid = false;
                } else {
                    input.classList.remove("is-invalid");
                    input.classList.add("is-valid");
                }

                // Email validation
                if (input.type === "email" && input.value.trim()) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(input.value)) {
                        input.classList.add("is-invalid");
                        isValid = false;
                    }
                }
            });

            if (isValid) {
                alert("Form submitted successfully! (Backend integration pending)");
                this.reset();
                inputs.forEach((input) => {
                    input.classList.remove("is-valid", "is-invalid");
                });
            }
        });
    }

    // Back to Top Button
    const backToTopBtn = document.getElementById("backToTop");
    if (backToTopBtn) {
        backToTopBtn.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }

    // Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-in");
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    document.querySelectorAll(".fade-in").forEach((el) => {
        observer.observe(el);
    });

    // Respect reduced motion preference
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        document.documentElement.style.setProperty(
            "--animation-duration",
            "0s"
        );
    }

    // Project Card Hover Effects
    document.querySelectorAll(".project-card").forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-10px)";
            const img = this.querySelector(".card-img-top");
            if (img) {
                img.style.transform = "scale(1.05)";
            }
        });

        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
            const img = this.querySelector(".card-img-top");
            if (img) {
                img.style.transform = "scale(1)";
            }
        });
    });
</script>
</body>
</html>
