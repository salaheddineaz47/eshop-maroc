@extends('layouts.app')

@section('title', $category->name . ' - Ma Boutique en Ligne')

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
    <div class="mb-8">
        <div class="text-sm breadcrumbs mb-4">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Accueil</a>
            <span class="mx-2 text-gray-500">/</span>
            <span class="text-gray-900 font-medium">{{ $category->name }}</span>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $category->name }}</h1>
            <p class="mt-2 text-gray-600">{{ $category->description }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
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
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <p class="text-gray-500">Aucun produit disponible dans cette catégorie pour le moment.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
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
