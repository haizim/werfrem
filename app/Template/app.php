<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $_SESSION['user']['role'] }} - {{ $title ?? '' }}</title>
    
    <link href="/css/fontawesome.min.css" rel="stylesheet">
    <script src="/js/fontawesome.min.js"></script>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>
    
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    
</head>
<body>
    <div class="row border border-2 border-dark m-1">
        <div class="col-sm-2 bg-light border-end border-dark p-4" style="min-height: 97vh;">
            <div class="row menu-user">
                <div class="col-sm-4 p-1">
                    <i class="fa-solid fa-circle-user avatar-ico"></i>
                </div>
                <div class="col-sm-8 y-center">
                    <h5>{{ $user ?? 'User Satu' }}</h5>
                    <a href="/login" class="text-dark">logout</a>
                </div>
            </div>
            <hr/>
            <nav class="navbar">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        @if(isset($menu)):
                        @foreach($menu as $caption => $link):
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $link }}">{{ snake_to_capital($caption) }}</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-sm p-4">
            <h2>{{ $title ?? '' }}</h2>
            <br>
            {{ content }}
        </div>
    </div>
</body>
</html>
