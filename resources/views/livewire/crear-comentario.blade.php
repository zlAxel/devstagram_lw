<div>
    <form wire:submit.prevent="crearComentario" novalidate>
        <div class="mb-1 mt-10">
            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Comentar
            </label>
            <textarea wire:model="comentario" id="comentario" rows="3" class="border p-3 w-full rounded-lg" placeholder="Agrega un comentario"></textarea>
            <x-input-error :messages="$errors->get('comentario')" />
        </div>
        @if ($mensaje)
            <x-input-error :messages="$mensaje" class="text-green-600" />
        @endif

        <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 mt-5 text-white rounded-lg">
    </form>
</div>
