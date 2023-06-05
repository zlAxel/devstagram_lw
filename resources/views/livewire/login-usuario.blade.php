<div>
    <form wire:submit.prevent="loginUsuario" novalidate>
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
        <div class="mb-3 flex items-center gap-2">
            <input type="checkbox" wire:model="remember" id="remember">
            <label for="remember" class="text-gray-500 text-sm" style="user-select: none">Mantener mi sesión abierta</label>
        </div>

        @if (session('verifyUser'))
            <x-input-error :messages="session('verifyUser')" />
        @endif

        <input type="submit" value="Iniciar sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 mt-5 text-white rounded-lg">
    </form>
</div>
