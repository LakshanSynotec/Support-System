<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Support System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white flex justify-between">
        <a href="/" class="text-lg font-bold">Support System</a>
        @auth
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-4 py-2 rounded">Logout</button>
            </form>
        @endauth
        <a href="{{ url('/login') }}">Login</a>
    </nav>

    <div class="container mx-auto mt-6">
        @if (session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-200 p-4 rounded mb-4">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>

</html>
