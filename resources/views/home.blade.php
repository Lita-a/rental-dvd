<x-layout title="Rental DVD - Beranda">
    <x-home.hero />
    <x-home.koleksi :films="$films" />
    <x-home.top-movie :topMovies="$topMovies" />
    <x-home.panduan />
    <x-home.promo />
    <x-home.kontak />
</x-layout>
