<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark amber darken-3">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/"><i class="fas fa-beer mr-1"></i>Brewry Memo</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
            @endguest

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('breweries.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
            </li>
            @endauth

            @auth
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                    aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button"
                        onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
                        マイページ
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                        ログアウト
                    </button>
                </div>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
            <!-- Dropdown -->
            @endauth

        </ul>
        <!-- Links -->

        <!-- Search form -->
        <form class="form-inline" method="GET" action="{{ route('breweries.search_index') }}">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" name="search_word" placeholder="検索" aria-label="Search">
            </div>
        </form>
        <!-- Search form -->
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->