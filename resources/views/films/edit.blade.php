@extends('layouts.app')

@section('content')
<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Edit Film"
        subtitle="Perbarui informasi film dengan mudah"
        color="yellow"
        align="center"
        size="4xl"
    />
    <div class="max-w-xl p-8 mx-auto mt-8 bg-gray-800 shadow-lg rounded-2xl">
        @include('films.form', [
            'film' => $film,
            'action' => route('films.update', $film),
            'method' => 'PUT'
        ])
    </div>
</section>
@endsection
