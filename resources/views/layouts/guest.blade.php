<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white dark:bg-gray-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('mss.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-sans antialiased text-gray-900">
        <div class="flex min-h-full">
            
            <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white dark:bg-gray-900">
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <a href="/" wire:navigate>
                            <x-application-logo class="h-20 w-auto text-indigo-600 dark:text-indigo-400 fill-current" />
                        </a>
                        <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">
                            Sign in to your account
                        </h2>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Welcome back! Please enter your details.
                        </p>
                    </div>

                    <div class="mt-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>

            <div class="relative hidden w-0 flex-1 lg:block">
                <img class="absolute inset-0 h-full w-full object-cover" 
                     src="/images/01.png" 
                     alt="Background Office">
                <div class="absolute inset-0 bg-indigo-900/20 mix-blend-multiply"></div>
            </div>
            
        </div>
    </body>
</html>