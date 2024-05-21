 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/bootstrap.min.css')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('books.index') }}">Գրքերի աշխարհ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">Գրքեր</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors.index') }}">Հեղինակներ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.create') }}">Ավելացնել գիրք</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors.create') }}">Ավելացնել Հեղինակ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    @if(View::hasSection('title'))
        <div class="page-header mb-4">
            <h1 class="text-center">@yield('title')</h1>
        </div>
    @endif

    @yield('content')
</div>

<footer class="bg-primary text-white py-3">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} MyBooks. All rights reserved.</p>
    </div>
</footer>
</body>
</html>


