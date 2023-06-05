<div>
    <form wire:submit.prevent="crearPost" novalidate>
        <div class="mb-5">
            <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Título
            </label>
            <input wire:model="titulo" id="titulo" type="text" placeholder="Ingresa el título de la publicación" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('titulo')" />
        </div>
        <div class="mb-5">
            <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Descripción
            </label>
            <textarea wire:model="descripcion" id="descripcion" rows="3" class="border p-3 w-full rounded-lg" placeholder="Ingresa la descripción de la publicación"></textarea>
            <x-input-error :messages="$errors->get('descripcion')" />
        </div>
        <div>
            <input wire:model="imagen" id="imagen" type="hidden">
            <x-input-error :messages="$errors->get('imagen')" />
        </div>

        <input type="submit" value="Crear post" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 mt-5 text-white rounded-lg">
    </form>
</div>
