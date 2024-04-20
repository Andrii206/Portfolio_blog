@extends('layouts.main')
@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ url('storage/' . $post->image) }}" alt="blog post" class="post-featured-image">
                        <p class="post-date">{{ $post->created_at->format('Y-m-d') }}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        {!! $post->content !!}
                    </div>
                    <div class="post-tags wow fadeInUp">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('post.tag', $tag->id) }}" class="post-tag">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                    <div class="post-navigation wow fadeInUp">
                        @if ($prevPost)
                            <button class="btn prev-post">
                                <a class="text-dark" href="{{ route('post.show', $prevPost->id) }}">
                                    {{ $prevPost->title }}
                                </a>
                            </button>
                        @endif
                        @if ($nextPost)
                            <button class="btn next-post">
                                <a class="text-dark" href="{{ route('post.show', $nextPost->id) }}">
                                    {{ $nextPost->title }}
                                </a>
                            </button>
                        @endif
                    </div>
                    @auth()
                    <div class="comment-section wow fadeInUp">                       
                        <h5 class="section-title">Прокометувати</h5>
                        <form action="{{ route('post.comment.store', $post->id) }}" class="oleez-comment-form"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="message">Напиши коментар</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Опублікувати</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endauth
                    <div class="comment-list my-3">
                        <h5 class="section-title">Коментарі({{$post -> comments -> count()}})</h5>
                        @if($post-> comments)
                        @foreach($post -> comments as $comment)
                        <div class="card-comment  border rounded p-2">        
                            <div class="comment-text">
                                <span class="username">
                                    <div>{{$comment->user->name}}</div>
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span><!-- /.username -->
                                {{ $comment->message }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Tags</h5>
                        <div class="widget-content">
                            @foreach ($tags as $tag)
                                <a href="{{ route('post.tag', $tag->id) }}" class="post-tag">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Пости які б ви можливо хотіли побачіти</h5>
                        <div class="widget-content">
                            <div class="row">
                                @foreach ($randomPosts as $post)
                                    <div class="container">
                                        <div class="row justify-content-center my-3">
                                            <div class="col-12">
                                                <div class="blog-post-card wow fadeInUp border rounded text-center">
                                                    <div class="blog-post-thumbnail-wrapper">
                                                        <img class="img-fluid w-100"
                                                            src="{{ url('storage/' . $post->image) }}" alt="blog">
                                                    </div>
                                                    <p class="blog-post-date">{{ $post->created_at->format('Y-m-d') }}</p>
                                                    <a href="{{ route('post.show', $post->id) }}" class="text-dark">
                                                        <h5 class="blog-post-title">{{ $post->title }}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('post.category', $category->id) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
