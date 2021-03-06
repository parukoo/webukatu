<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'STEP') | {{ config('app.name', 'step') }}</title>

  <meta name="description" content="STEPは、「良かった」と思う学習方法を共有できるサイトです。" />
  <meta name="keywords" content="学習方法, 勉強方法, 効果的, 効率, toeic">
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@step" />
  <meta property="og:url" content="{{ config('app.url') }}" />
  <meta property="og:title" content="step" />
  <meta property="og:description" content="STEPは、「良かった」と思う学習方法を共有できるサイトです。" />
  <meta property="og:image" content="https://step.chew.jp//img/twitter.jpg" />
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('/img/twitter.jpg') }}">
  <script src="https://kit.fontawesome.com/7f19bc1ee0.js" crossorigin="anonymous"></script>

  <!-- Styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
</head>
<body>
  @yield('content')
</body>
</html>
