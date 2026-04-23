<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>@yield('title', 'Coding Solutions | Digital Architect')</title>
  <meta name="description" content="@yield('meta_description', 'Premium digital experiences — Web, Mobile, AI & Cloud solutions built with cutting-edge technology.')" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Manrope:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet"
  />
  @stack('head')
</head>
