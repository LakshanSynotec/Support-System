@extends('layout')

@section('content')
    {{-- <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if (Route::has('/'))
            <nav class="-mx-3 flex flex-1 ">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header> --}}
        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Submit a Support Ticket</h2>

            <form action="{{ url('/ticket/store') }}" method="POST">
                @csrf
                <label class="block mb-2">Customer Name</label>
                <input type="text" name="customer_name" class="w-full border p-2 rounded mb-4" required>

                <label class="block mb-2">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded mb-4" required>

                <label class="block mb-2">Phone</label>
                <input type="text" name="phone" class="w-full border p-2 rounded mb-4" required>

                <label class="block mb-2">Problem Description</label>
                <textarea name="problem_description" class="w-full border p-2 rounded mb-4" required></textarea>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </form>

            <form action="{{ url('/ticket/status') }}" method="GET">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Check Ticket</button>
            </form>

        </div>
@endsection
