@extends('layouts.app')

@section('content')
<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Tambah Film"
        subtitle="Tambahkan film baru ke koleksi"
        color="yellow"
        align="center"
        size="4xl"
    />

    <div class="max-w-xl p-8 mx-auto mt-8 bg-gray-800 shadow-lg rounded-2xl">
        @include('films.form', [
            'film' => null,
            'action' => route('films.store'),
            'method' => 'POST'
        ])
    </div>
</section>
@endsection
