<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- <h1>{{ $kelasMhs }}</h1> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Product name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Color
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Category
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            @foreach ($kelasMhs as $item)
                                <td class="py-4 px-6">
                                    {{ $item->mahasiswa->name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->kelasKuliah }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
