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


@includes('components.nav')

@yield('content')

@includes('components.footer')

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
