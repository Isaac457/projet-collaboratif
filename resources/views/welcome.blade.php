<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Gestion de Projets Collaboratifs</title>
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">

</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl font-bold">{{ config('app.name') }}</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/home') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Connexion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Inscription</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative min-h-screen">
        <!-- Hero Section -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        Gérez vos projets efficacement
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Une plateforme collaborative pour organiser, suivre et réussir vos projets en équipe.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 md:py-4 md:text-lg md:px-10">
                                Commencer gratuitement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Gestion de Projets</h3>
                        <p class="mt-2 text-gray-600">Créez et gérez vos projets avec une interface intuitive.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Collaboration en Temps Réel</h3>
                        <p class="mt-2 text-gray-600">Travaillez en équipe avec des mises à jour en temps réel.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Suivi des Tâches</h3>
                        <p class="mt-2 text-gray-600">Suivez l'avancement de vos tâches et respectez vos délais.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>