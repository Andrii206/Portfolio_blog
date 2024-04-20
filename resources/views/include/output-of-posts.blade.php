<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="blog-post-card wow fadeInUp">
                <div class="blog-post-thumbnail-wrapper">
                    <img src="{{ url('storage/' . $post->image) }}" alt="blog">
                </div>
                <div class="d-flex justify-content-between">
                    <p class="blog-post-date">{{ $post->created_at->format('Y-m-d') }}</p>
                    @auth()
                        <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                            @csrf

                            <span>{{ $post->liked_users_count }}</span>
                            <button type="submit" class="border-0 bg-transparent">

                                @if (auth()->user()->likePosts->contains($post->id))
                                    <i class="bi bi-heart-fill"></i>
                                @else
                                    <i class="bi bi-heart"></i>
                                @endif

                            </button>
                        </form>
                    @endauth
                    @guest
                    <div>
                        <span>{{ $post->liked_users_count }}</span>
                        <i class="bi bi-heart"></i>
                    </div>
                    @endguest
                </div>
                <a href="{{ route('post.show', $post->id) }}" class="text-dark">
                    <h5 class="blog-post-title">{{ $post->title }}</h5>
                </a>

            </div>
        </div>
    @endforeach
</div>
