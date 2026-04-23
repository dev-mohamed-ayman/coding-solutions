<!doctype html>
<html class="dark" lang="en">
  @include('web.layouts.partials.head')
  <body class="font-body selection:bg-primary selection:text-on-primary">
    @include('web.layouts.partials.loader')
    @include('web.layouts.partials.background')
    @include('web.layouts.header')

    <main class="pt-28 pb-24 px-6 max-w-7xl mx-auto relative z-10">
      @yield('content')
    </main>

    @include('web.layouts.partials.floating-actions')
    @include('web.layouts.footer')
    @include('web.layouts.partials.scripts')
  </body>
</html>
