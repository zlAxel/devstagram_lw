<div>
    <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $followers }}
        <span class="font-normal">@choice('Seguidor|Seguidores', $followers)</span>    
    </p>
    <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $follows }}
        <span class="font-normal">Siguiendo</span>    
    </p>
    <p class="text-gray-800 text-sm mb-5 font-bold">
        {{ $posts }}
        <span class="font-normal">Posts</span>    
    </p>

    @auth
        @if ($user->id !== auth()->id())
            <input wire:click.prevent="{{ $checkFollow ? 'unfollow' : 'follow' }}" type="submit" value="{{ $checkFollow ? 'Dejar de seguir' : 'Seguir' }}" wire:loading.attr="disabled" class="border-2 border-black uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
        @endif
    @endauth
</div>
