<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Simple Blog')</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#1e40af',
                    'primary-dark': '#1e3a8a',
                    secondary: '#f59e0b',
                    accent: '#10b981',
                    dark: '#1f2937',
                    light: '#f3f4f6'
                },
                fontFamily: {
                    'bengali': ['Hind Siliguri', 'sans-serif'],
                    'sans': ['Inter', 'sans-serif']
                }
            }
        }
    }
</script>
<style>
    body { font-family: 'Inter', 'Hind Siliguri', sans-serif; }
</style>