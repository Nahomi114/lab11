<x-app-layout>
    <div class="max-w-lg mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-center mt-3">
            <x-secondary-button class="px-3 inline-flex items-center" onclick="location.href='{{ route('contacts.create') }}'">
                <svg viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                    <path d="M8 1a3 3 0 1 0 .002 6.002A3 3 0 0 0 8 1zM6.5 8A4.491 4.491 0 0 0 2 12.5v.5c0 1.11.89 2 2 2h6v-1H7v-4h3V8.027A4.243 4.243 0 0 0 9.5 8zM11 8v3H8v2h3v3h2v-3h3v-2h-3V8zm0 0" fill="#2e3436"/>
                </svg>
                Agregar Nuevo Contacto
            </x-secondary-button>
        </div>
        @foreach ($contacts as $contact)
            <div class="bg-white block mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
                <div class="flex justify-end">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('contacts.edit', $contact)">
                                Editar
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('contacts.destroy', $contact)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ asset($contact->profile_picture) }}" alt="Foto de perfil" class="h-12 w-12 rounded-full">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $contact->first_name }} {{ $contact->last_name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $contact->email }}
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600 -scale-x-100" viewBox="0 0 100 100" xml:space="preserve">
                            <path d="M72 23.199A6.2 6.2 0 0 0 65.8 17H35.2a6.2 6.2 0 0 0-6.2 6.199v55.602A6.2 6.2 0 0 0 35.2 85h30.6a6.2 6.2 0 0 0 6.2-6.199V23.199zm-4 55.602A2.2 2.2 0 0 1 65.8 81H35.2a2.2 2.2 0 0 1-2.2-2.199V23.199A2.2 2.2 0 0 1 35.2 21h30.6a2.2 2.2 0 0 1 2.2 2.199v55.602z"/>
                            <path d="M65 26a2 2 0 0 0-2-2H38a2 2 0 0 0-2 2v42a2 2 0 0 0 2 2h25a2 2 0 0 0 2-2V26zm-25 2h21v38H40V28z"/>
                            <circle cx="50.341" cy="75.003" r="3.455"/>
                        </svg>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        {{ $contact->phone }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
