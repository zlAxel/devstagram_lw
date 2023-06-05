<div>
    <form wire:submit.prevent="editarUsuario" novalidate>
        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Nombre de usuario
            </label>
            <input wire:model="username" id="username" type="text" placeholder="Ingresa el nombre de tu perfil" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('username')" />
        </div>
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Correo del usuario
            </label>
            <input wire:model="email" id="email" type="text" placeholder="Ingresa tu correo" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <div class="mb-5">
            <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Imagen del perfil
            </label>
            <input wire:model="imagen" id="imagen" type="file" accept="image/*" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('imagen')" />
        </div>
        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Ingresa tu contraseña para confirmar los cambios
            </label>
            <input wire:model="password" id="password" type="password" placeholder="Ingresa tu contraseña" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 mt-5 text-white rounded-lg">
    </form>
</div>
