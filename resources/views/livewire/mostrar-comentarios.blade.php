<div>
    @forelse ($comentarios as $comentario)
        <div class="p-5 border-gray-300 border-b">
            <a href="{{ route('posts.profile', $comentario->user->username) }}" class="font-bold">
                {{ $comentario->user->username }}
            </a>
            <p>{{ $comentario->comentario }}</p>
            <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
        </div>
    @empty
        <p class="p-10 text-center">No hay comentarios aún</p>
    @endforelse
</div>
