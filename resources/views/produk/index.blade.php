<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between">
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-produk')">
                            {{ __('Add Produk') }}
                        </x-primary-button>
                        <div class="flex space-x-4">
                            <form method="GET" action="{{ route('produk.index') }}" class="flex space-x-2">
                                <x-text-input id="search" name="search" type="text" placeholder="Search Nama Produk..." class="block w-full" value="{{ request('search') }}" />
                                <x-primary-button type="submit">{{ __('Search Nama Produk') }}</x-primary-button>
                            </form>
                            <form method="GET" action="{{ route('produk.index') }}" class="flex space-x-2">
                                <select id="kategori_filter" name="kategori_filter" class="block w-full dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">{{ __('All Categories') }}</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ request('kategori_filter') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <select id="status_filter" name="status_filter" class="block w-full dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">{{ __('All Statuses') }}</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ request('status_filter') == $status->id ? 'selected' : '' }}>{{ $status->nama_status }}</option>
                                    @endforeach
                                </select>
                                <x-primary-button type="submit">{{ __('Filter') }}</x-primary-button>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="display w-full border">
                            <thead>
                                <tr>
                                    <th class="border">No</th>
                                    <th class="border">Produk</th>
                                    <th class="border">Kategori</th>
                                    <th class="border">Harga</th>
                                    <th class="border">Status</th>
                                    <th class="border" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                <tr>
                                    <td class="border">{{ $x->id }}</td>
                                    <td class="border">{{ $x->nama_produk }}</td>
                                    <td class="border">{{ $x->kategori->nama_kategori }}</td>
                                    <td class="border">{{ $x->harga }}</td>
                                    <td class="border">{{ $x->status->nama_status }}</td>
                                    <td class="border">
                                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-produk-{{ $x->id }}')">
                                            {{ __('Edit') }}
                                        </x-primary-button>
                                    </td>
                                    <td class="border">
                                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-produk-{{ $x->id }}')">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="add-produk" focusable>
        <form method="post" action="{{ route('produk.store') }}" class="p-6">
            @csrf
            <div>
                <x-input-label for="nama_produk" value="{{ __('Produk Name') }}" />
                <x-text-input id="nama_produk" name="nama_produk" type="text" class="mt-1 block w-full" required autofocus />
                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="kategori_id" value="{{ __('Kategori') }}" />
                <select id="kategori_id" name="kategori_id" class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="harga" value="{{ __('Harga') }}" />
                <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="status_id" value="{{ __('Status') }}" />
                <select id="status_id" name="status_id" class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
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
    <x-modal name="edit-produk-{{ $x->id }}" focusable>
        <form method="post" action="{{ route('produk.update', $x->id) }}" class="p-6">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="nama_produk" value="{{ __('Produk Name') }}" />
                <x-text-input id="nama_produk" name="nama_produk" type="text" class="mt-1 block w-full" value="{{ $x->nama_produk }}" required autofocus />
                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="kategori_id" value="{{ __('Kategori') }}" />
                <select id="kategori_id" name="kategori_id" class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $x->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="harga" value="{{ __('Harga') }}" />
                <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" value="{{ $x->harga }}" required />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="status_id" value="{{ __('Status') }}" />
                <select id="status_id" name="status_id" class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ $x->status_id == $status->id ? 'selected' : '' }}>{{ $status->nama_status }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
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

    <x-modal name="delete-produk-{{ $x->id }}" focusable>
        <form method="post" action="{{ route('produk.destroy', $x->id) }}" class="p-6">
            @csrf
            @method('DELETE')
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this produk?') }}
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