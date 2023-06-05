<div>
    <section class="container mx-auto mt-20">
        @if ($titulo)
            <h2 class="text-4xl text-center font-black my-10">
                {{ $titulo }}
            </h2>
        @endif
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 text-center">
            @forelse ($posts as $post)
                <div>
                    {{-- <a href="{{ route('posts.show', ['user' => $user->username, 'post' => $post->postname]) }}"> --}}
                    <a href="{{ route('posts.show', $post->postname) }}">
                        <img src="{{ asset('uploads' . "/" . $post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @empty
                <p class="text-gray-600 uppercase text-sm text-center font-bold col-start-1 col-end-5">
                    No hay publicaciones aún
                </p>
            @endforelse
        </div>
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </section>
</div>