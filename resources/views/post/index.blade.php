@extends('layouts.master')

@section('title')
Dobrodošli na naš blog!
@endsection

@section('content')
<main role="main" class="container" style="margin-top:5px">

    <div class="row">
        <div class="col-sm-8 blog-main">
            @if($posts)
            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta"><small><i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }} by <a href="#">{{ $post->name}}</a><i></small></p>

                <p>{{ \Illuminate\Support\Str::words($post->description, 30, '...') }}</p>
                <blockquote>
                    <a href=" {{route ('post.read', ['id' => $post->id])}} " class="btn btn-primary btn-sm">See more</a>
                </blockquote>
            </div>
            @endforeach
            @endif
            <nav class="blog-pagination">
               {{ $posts -> links() }}
            </nav>

            <aside class="col-sm-3 ml-sm-auto blog-sidebar">
                <div class="sidebar-module">
                    <h4>Latest Posts</h4>
                    @foreach($archives as $archive)
                    <ol class="list-unstyled">
                        <li><a href=" {{route ('post.read', ['id' => $archive->id])}}">{{ \Illuminate\Support\Str::words($archive->title, 6, '...') }}</a></li>
                    </ol>
                    @endforeach
                </div>

                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twiter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside>
        </div>
</main>
@endsection