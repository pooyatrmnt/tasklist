<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    {{-- blade-formatter-disable --}}

    <style type="text/tailwindcss">

        .btn {
            @apply bg-green-200 rounded-md px-2 py-1 mt-3 text-center font-medium shadow-sm ring-1 ring-green-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-center rounded-md mt-3 px-3 py-1 shadow-sm ring-1 ring-pink-500 bg-pink-50 hover:bg-pink-500
        }

        label {
            @apply block uppercase text-slate-500 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
        }

    </style>

    {{-- blade-formatter-enable --}}

    <title>@yield('tab_title')</title>
    @yield('styles')
</head>

<body class="bg-slate-50">
    <div class="container mx-auto mb-10 pb-10 max-w-lg">
        <div class="px-4 py-4 bg-slate-200/90">
            @if (session()->has('success'))
                <div x-data="{ flash: true }">
                    <div x-show="flash">
                        <div class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <div>
                                {{ session('success') }}
                            </div>

                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" @click="flash = false" stroke="currentColor"
                                    class="h-6 w-6 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>

                        </div>
                    </div>
                </div>
            @endif

            <h1 class="text-3xl mb-4">@yield('title')</h1>
            <div>
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
