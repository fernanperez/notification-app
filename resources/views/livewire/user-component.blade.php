<div>
    <div class="flex justify-center my-3">
        <h1 class="text-2xl">Notificación en tiempo real con <span class="font-bold">laravel-websockets</span></h1>
    </div>
    <div class="flex justify-center mb-6">
        <form>
            <div class="mt-6">
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="mt-1 block w-full rounded-md border-gray-300"
                        wire:model="name" />
                    @error('name')
                        <span class="error text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="text" class="mt-1 block w-full rounded-md border-gray-300"
                        wire:model="email" />
                    @error('email')
                        <span class="error text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Contraseña') }}</label>
                    <input id="password" type="text" class="mt-1 block w-full rounded-md border-gray-300"
                        wire:model="password" />
                    @error('password')
                        <span class="error text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <button class="bg-green-600 py-2 px-4 rounded-md text-white hover:bg-green-800"
                    wire:click.prevent='store'>Crear
                    usuario</button>
            </div>
        </form>
    </div>
    <div id="user_table" class="w-full overflow-x-auto h-full">
        <table class="table-auto w-full border-separate border-spacing-0 shadow-md">
            <thead>
                <tr class="text-white bg-indigo-800 h-16 text-center uppercase">
                    <th class="px-4 py-2 rounded-tl-2xl">#</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody class="" style="backdrop-filter: inherit;">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-200 text-center bg-white">
                        <td>
                            {{ $user->id }}
                        </td>
                        <td class="w-60">
                            <div class="w-60">{{ $user->name }} </div>
                        </td>

                        <td class="p-4">
                            {{ $user->email }}
                        </td>

                        <td class="p-4">
                            <span class="flex justify-center">
                                <button id="edit" title="edit"><svg class=""
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-edit-circle" width="44" height="44"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="#ff9300" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                        <path d="M16 5l3 3" />
                                        <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999" />
                                    </svg></button>
                                <button id="delete" title="delete" wire:click='destroy({{ $user->id }})'><svg
                                        xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="44" height="44" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg></button>
                            </span>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-12 text-center font-bold">
                            No hay datos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pt-5">
            {{ $users->links() }}
        </div>
    </div>
    @push('custom-scripts')
        <script>
            Echo.join("register_user")
                .listen('RegisterUser', (e) => {
                    Livewire.emit('render');
                });
        </script>
        <script>
            let authUser;
            window.onload = function() {
                axios.get('/auth/user').then(res => {
                    authUser = res.data.authUser
                });
            }
        </script>
    @endpush
</div>
