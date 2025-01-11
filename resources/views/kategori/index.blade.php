<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-kategori')">
                            {{ __('Add Kategori') }}
                        </x-primary-button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="display w-full border">
                            <thead>
                                <tr>
                                    <th class="border">ID</th>
                                    <th class="border">Kategori</th>
                                    <th class="border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                    <tr>
                                        <td class="border">{{ $x->id }}</td>
                                        <td class="border">{{ $x->nama_kategori }}</td>
                                        <td class="border">
                                            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-kategori-{{ $x->id }}')">
                                                {{ __('Edit') }}
                                            </x-primary-button>
                                            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-kategori-{{ $x->id }}')">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="add-kategori" focusable>
        <form method="post" action="{{ route('kategori.store') }}" class="p-6">
            @csrf
            <div>
                <x-input-label for="nama_kategori" value="{{ __('Kategori Name') }}" />
                <x-text-input id="nama_kategori" name="nama_kategori" type="text" class="mt-1 block w-3/4" required autofocus />
                <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    @foreach ($data as $x)
        <x-modal name="edit-kategori-{{ $x->id }}" focusable>
            <form method="post" action="{{ route('kategori.update', $x->id) }}" class="p-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="nama_kategori" value="{{ __('Kategori Name') }}" />
                    <x-text-input id="nama_kategori" name="nama_kategori" type="text" class="mt-1 block w-3/4" value="{{ $x->nama_kategori }}" required autofocus />
                    <x-input-error :messages="$errors->get('nama_kategori')" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button class="ms-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="delete-kategori-{{ $x->id }}" focusable>
            <form method="post" action="{{ route('kategori.destroy', $x->id) }}" class="p-6">
                @csrf
                @method('DELETE')
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete this kategori?') }}
                </h2>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-danger-button class="ms-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endforeach
</x-app-layout>
