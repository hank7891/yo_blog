<nav class="navbar navbar-inverse" role="navigation">
   <div class="container">
        {{-- nav header --}}
        <a class="navbar-brand" href="{{url('/')}}">Blog</a>

        {{-- search keyword --}}
        <ul class="nav navbar-nav pull-right">
            <li>
                <form class="navbar-form pull-right" action="{{url('search/')}}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search_key" method="GET" placeholder="請輸入關鍵字">
                    </div>
                    <button type="submit" class="btn btn-default">搜尋</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<!--

   <div class="container">
        {{-- nav header --}}
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">切換導航</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            {{-- index --}}
            <a class="navbar-brand" href="{{url('/')}}">Blog</a>
        </div>
        {{-- About --}}
        <ul class="nav navbar-nav">
            <li>
                <a href="{{url('/')}}">About</a>
            </li>
        </ul>
        {{-- search keyword --}}
        <ul class="nav navbar-nav pull-right">
            <li>
                <form class="navbar-form pull-right" action="{{url('search/')}}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" method="GET" placeholder="請輸入關鍵字">
                    </div>
                    <button type="submit" class="btn btn-default">搜尋</button>
                </form>
            </li>
            {{-- admin --}}
            <li>
              @if (Auth::check() and Auth::user()->isAdmin())
                <a class="navbar-brand" href="{{route('backstage')}}">後台</a>
              @endif
            </li>
        </ul>
    </div>
--!>