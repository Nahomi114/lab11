<!-- resources/views/contacts/show.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-4">
                <h1 class="text-lg font-semibold text-gray-900">Detalles del contacto</h1>
                <div class="mt-4">
                    <!-- Mostrar otros detalles del contacto -->
                    <p>Nombre: {{ $contact->first_name }} {{ $contact->last_name }}</p>
                    <p>Correo electrónico: {{ $contact->email }}</p>
                    <p>Número de teléfono: {{ $contact->phone }}</p>
                    <!-- Mostrar la foto de perfil si está disponible -->
                    @if ($contact->profile_picture)
                        <img src="{{ asset($contact->profile_picture) }}" alt="Foto de perfil" class="mt-4">
                    @else
                        <p class="mt-4">No hay foto de perfil disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
