<div>
    <form wire:submit.prevent="registrarUsuario" novalidate>
        <div class="mb-5">
            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Nombre
            </label>
            <input wire:model="name" id="name" type="text" placeholder="Ingresa tu nombre" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('name')" />
        </div>
        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Username
            </label>
            <input wire:model="username" id="username" type="text" placeholder="Ingresa tu nombre de usuario" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('username')" />
        </div>
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Correo
            </label>
            <input wire:model="email" id="email" type="email" placeholder="Ingresa tu correo electrónico" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Contraseña
            </label>
            <input wire:model="password" id="password" type="password" placeholder="Ingresa tu contraseña" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('password')" />
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold pl-3">
                Confirmar contraseña
            </label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" placeholder="Vuelve a ingresar tu contraseña" class="border p-3 w-full rounded-lg">
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 mt-5 text-white rounded-lg">
    </form>
</div>
