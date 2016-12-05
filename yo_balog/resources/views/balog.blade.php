<html lang="en">
    <head>
        @include('head')
    </head>
    <body>
        {{-- nav bar(狀態列表)--}}
        @include('nav')
        <div class="container">
          <div class="row">
            {{-- content page --}}
            @yield('content')
            
            {{-- right page --}}
            @include('blog_right')

          </div>
        </div>        
    </body>
    <footer class="footer">
        @include('footer') 
    </footer>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>