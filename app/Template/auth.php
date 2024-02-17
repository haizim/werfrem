<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>
    <link href="/css/style.css" rel="stylesheet">
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>
    
    <script src="/js/jquery.min.js"></script>
    
    <link href="/css/fontawesome.min.css" rel="stylesheet">
    <script src="/js/fontawesome.min.js"></script>
    
</head>
<body>
    <div class="bg-secondary auth-content">
        <div class="card">
            <div class="card-header">{{ $title ?? '' }}</div>
            <div class="card-body">
                {{ content }}
            </div> 
            <div class="card-footer">
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</body>
</html>