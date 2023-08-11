<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My app</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    {{-- blade-formatter-enable --}}
    <style type="text/tailwindcss">
        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-disable --}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-10">@yield('title')</h1>
    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative mb-10 rounded border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong>Success!</strong>
                <div>{{ session('success') }}</div>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x" viewBox="0 0 16 16" @click="flash = false">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </div>
        @endif
    </div>

    <div>
        @yield('content')
    </div>
</body>

</html>
