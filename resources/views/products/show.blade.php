@extends('layouts.app')

@section('title', $product->name . ' - Ma Boutique en Ligne')

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
                    <i class="fas fa-user
