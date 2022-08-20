<div>
    <div class="flex justify-center my-3">
        <h1 class="text-2xl">Notificación en tiempo real con <span class="font-bold">laravel-websockets</span></h1>
    </div>
    <div class="flex justify-center mb-6">
        <form >
            <div class="mt-6">
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="mt-1 block w-full rounded-md border-gray-300" wire:model="name" />
                    @error('name') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="text" class="mt-1 block w-full rounded-md border-gray-300" wire:model="email" />
                    @error('email') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-6 sm:col-span-4 mb-3">
                    <label for="name">{{ __('Contraseña') }}</label>
                    <input id="password" type="text" class="mt-1 block w-full rounded-md border-gray-300" wire:model="password" />
                    @error('password') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <button class="bg-green-600 py-2 px-4 rounded-md text-white hover:bg-green-800" wire:click='store'>Crear
                    usuario</button>
            </div>
        </form>
    </div>
    <div class="w-full overflow-x-auto h-full">
        <table class="table-auto w-full border-separate border-spacing-0 shadow-md">
            <thead>
                <tr class="text-white bg-indigo-800 h-16 text-center uppercase">
                    <th class="px-4 py-2 rounded-tl-2xl">#</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo</th>
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
                        {{-- <td class="p-4">
                            <span class="uppercase {!! $user->resident == 'No' ? 'text-red-600 font-bold' : 'text-emerald-600 font-bold' !!}">
                                {{ $user->resident }}
                            </span>
                        </td> --}}
                        {{-- <td class="p-4">
                            <span class="uppercase {!! ($user->voter == 'No'
                                    ? 'text-red-600 font-bold'
                                    : is_null($user->voter))
                                ? 'text-amber-600 font-bold'
                                : 'text-emerald-600 font-bold' !!}">
                                {!! is_null($user->voter) ? 'Por revisar' : ($user->voter == 1 ? 'SI' : 'NO') !!}
                            </span>
                        </td> --}}
                        {{-- <td class="w-60">
                            <div class="flex justify-center items-center">
                                <div
                                    class="px-2 py-1 w-32 flex justify-center items-center font-bold text-white
                            {!! $user->status == 2 ? 'bg-amber-500' : ($user->status == 1 ? 'bg-emerald-500' : 'bg-red-500') !!}">
                                    {{ $user->statusType($user->id) }}
                                </div>
                            </div>
                        </td> --}}

                        {{-- <td class="p-4">
                            <div class="flex items-center justify-center space-x-2">
                                <button title="Editar" wire:click='show({{ $user->id }})'
                                    class="p-1 bg-emerald-500 hover:bg-emerald-500/80 shadow-md flex justify-center items-center w-10 h-10 rounded-xl focus:border-green-500 focus:ring-opacity-40 focus:ring-green-500 focus:ring focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </td> --}}
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
</div>
