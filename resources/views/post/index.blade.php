@extends('layouts.main')
@section('content')
    <main class="blog-grid-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Блог</h1>
            @include('include.output-of-posts')
            <div class="d-flex align-items-center justify-content-center">
                {{ $posts -> links() }}
            </div>
        </div>
    </main>

@endsection