<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('mss.png') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <livewire:sidebaradmin />
        <div class="flex-1 flex flex-col h-screen overflow-y-auto">
            <header class="bg-white shadow-sm h-16 flex items-center px-6 justify-between sticky top-0 z-10">
                <h1 class="text-xl font-bold text-gray-800">Inbox Pesan</h1>
                <div class="text-sm text-gray-600">Admin Panel</div>
            </header>
            <main class="p-6">
                <livewire:admin.messages />
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>