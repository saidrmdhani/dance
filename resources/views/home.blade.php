<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>رقصة عتاب</title>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireStyles
</head>
<body>
    <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white text-center mt-5 mb-2">رقصة عتاب</h1>
          <p class="lead mb-5 text-white-50 text-center text-justified">قم بإضافة مقطع صوتي إلى رقصة عتاب بكل سهولة واستمتع بالرقص!</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container main-container">

    <div class="row justify-content-md-center">
      <div class="col-md-8 col-offset-2 mb-5 text-center">
          <h4>
              رابط الأغنية من اليوتيوب
          </h4>
          @livewire('youtube-url')
      </div>
    </div>
    <!-- /.row -->

    <div class="row justify-content-md-center">
        <div class="col-md-8 col-offset-2 mb-5 text-center">
            @livewire('duration-picker')
        </div>
      </div>
      <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">الحقوق محفوظة &copy; <a href="https://twitter.com/teahill_oman" target="_blank" class="copy-rights">رابية الشاي</a></p>
    </div>
    <!-- /.container -->
  </footer>
  @livewireScripts
</body>
</html>
