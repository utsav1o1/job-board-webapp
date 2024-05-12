<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    @vite('resources/css/app.css')
</head>

<body
    class="max-w-2xl mx-auto mt-10 bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-800">
    {{ auth()->user()->name ?? 'Guest' }}
    <nav class="flex justify-between mb-8 text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anynomus' }}: Applications
                      </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">Sign in</a>
                </li>
            @endauth
        </ul>
    </nav>
    @if (session('success'))
    <div role="alert"
      class="p-4 my-8 text-green-700 bg-green-100 border-l-4 border-green-300 rounded-md opacity-75">
      <p class="font-bold">Success!</p>
      <p>{{ session('success') }}</p>
    </div>
  @endif
    {{ $slot }}
</body>

</html>
