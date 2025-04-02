@extends('layouts.app')

@section('title', 'Accueil - Ma Boutique en Ligne')

@section('header')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Ma Boutique en Ligne" class="h-10">
                    <span class="ml-3 text-xl font-bold text-gray-900">Ma Boutique</span>
                </a>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('categories.show', 'vetements') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 font-medium">Vêtements</a>
                <a href="{{ route('categories.show', 'electronique') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 font-medium">Électronique</a>
                <a href="{{ route('categories.show', 'maison') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 font-medium">Maison</a>
                <a href="{{ route('categories.show', 'beaute') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 font-medium">Beauté</a>
                <a href="{{ route('categories.show', 'sport') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 font-medium">Sport</a>
            </nav>
            <div class="flex items-center">
                <a href="#" class="text-gray-600 hover:text-gray-900 p-2">
                    <i class="fas fa-search text-xl"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-gray-900 p-2 ml-4">
                    <i class="fas fa-shopping-cart text-xl"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-gray-900 p-2 ml-4">
                    <i class="fas fa-user text-xl"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Bannière principale -->
    <div class="relative bg-indigo-700 rounded-lg overflow-hidden mb-12">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-700 opacity-90"></div>
        <div class="relative max-w-7xl mx-auto py-12 px-4 sm:py-20 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Bienvenue sur Ma Boutique</h1>
            <p class="mt-6 max-w-lg mx-auto text-xl text-indigo-100 sm:max-w-3xl">Découvrez notre nouvelle collection et profitez de nos offres exclusives.</p>
            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                        Acheter maintenant
                    </a>
                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">
                        Voir les promotions
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section des produits en vedette -->
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Produits en Vedette</h2>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Voir tout</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <a href="{{ route('products.show', $product->id) }}">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover object-center">
                    </a>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                        <p class="mt-2 text-gray-600 text-sm line-clamp-2">{{ $product->description }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">{{ number_format($product->price, 2) }} €</span>
                            <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <p class="text-center text-gray-500">Aucun produit en vedette pour le moment.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Section des promotions -->
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Promotions</h2>
            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Voir toutes les offres</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($promotions as $promotion)
                <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-lg shadow-md overflow-hidden text-white">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold">{{ $promotion->title }}</h3>
                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-white text-indigo-700 font-bold text-lg">-{{ $promotion->discount_percentage }}%</span>
                        </div>
                        <p class="mt-3 text-indigo-100">{{ $promotion->description }}</p>
                        <div class="mt-5">
                            <a href="{{ route('promotions.show', $promotion->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:bg-indigo-50">
                                En profiter
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <p class="text-center text-gray-500">Aucune promotion en cours.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Section des catégories -->
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Nos Catégories</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <a href="{{ route('categories.show', 'vetements') }}" class="bg-indigo-100 rounded-lg p-4 text-center transition-all hover:bg-indigo-200">
                <div class="text-indigo-600 text-3xl mb-2">
                    <i class="fas fa-tshirt"></i>
                </div>
                <h3 class="font-medium text-gray-900">Vêtements</h3>
            </a>
            <a href="{{ route('categories.show', 'electronique') }}" class="bg-purple-100 rounded-lg p-4 text-center transition-all hover:bg-purple-200">
                <div class="text-purple-600 text-3xl mb-2">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="font-medium text-gray-900">Électronique</h3>
            </a>
            <a href="{{ route('categories.show', 'maison') }}" class="bg-blue-100 rounded-lg p-4 text-center transition-all hover:bg-blue-200">
                <div class="text-blue-600 text-3xl mb-2">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="font-medium text-gray-900">Maison</h3>
            </a>
            <a href="{{ route('categories.show', 'beaute') }}" class="bg-pink-100 rounded-lg p-4 text-center transition-all hover:bg-pink-200">
                <div class="text-pink-600 text-3xl mb-2">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 class="font-medium text-gray-900">Beauté</h3>
            </a>
            <a href="{{ route('categories.show', 'sport') }}" class="bg-green-100 rounded-lg p-4 text-center transition-all hover:bg-green-200">
                <div class="text-green-600 text-3xl mb-2">
                    <i class="fas fa-running"></i>
                </div>
                <h3 class="font-medium text-gray-900">Sport</h3>
            </a>
        </div>
    </section>
@endsection

@section('footer')
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Ma Boutique</h3>
                <p class="text-gray-300">Votre destination shopping en ligne pour des articles de qualité à prix abordables.</p>
                <div class="mt-4 flex space-x-4">
                    <a href="https://facebook.com/maboutique" target="_blank" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com/maboutique" target="_blank" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://twitter.com/maboutique" target="_blank" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Liens Rapides</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('pages.about') }}" class="text-gray-300 hover:text-white">À propos</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                    <li><a href="{{ route('pages.terms') }}" class="text-gray-300 hover:text-white">CGV</a></li>
                    <li><a href="{{ route('pages.privacy') }}" class="text-gray-300 hover:text-white">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Catégories</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('categories.show', 'vetements') }}" class="text-gray-300 hover:text-white">Vêtements</a></li>
                    <li><a href="{{ route('categories.show', 'electronique') }}" class="text-gray-300 hover:text-white">Électronique</a></li>
                    <li><a href="{{ route('categories.show', 'maison') }}" class="text-gray-300 hover:text-white">Maison</a></li>
                    <li><a href="{{ route('categories.show', 'beaute') }}" class="text-gray-300 hover:text-white">Beauté</a></li>
                    <li><a href="{{ route('categories.show', 'sport') }}" class="text-gray-300 hover:text-white">Sport</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Newsletter</h3>
                <p class="text-gray-300 mb-4">Inscrivez-vous pour recevoir nos offres exclusives</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Votre adresse email" required
                           class="px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-indigo-500">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 rounded-md text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Ma Boutique en Ligne. Tous droits réservés.</p>
        </div>
    </div>
@endsection
