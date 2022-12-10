<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Widgets - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler-vendors.min.css">
</head>
  <body class="theme-light">
    <script src="./dist/js/demo-theme.min.js?1668288743"></script>
    <div class="page">
      @include('layouts.comopnents.site.header')
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                    @yield('page-title')
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
            @yield('content')
        </div>
        
      </div>
    </div>
</body>
</html>