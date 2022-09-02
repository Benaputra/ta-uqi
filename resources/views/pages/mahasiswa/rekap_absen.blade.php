<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- <h1>{{ $kelasMhs }}</h1> --}}

    @role('mahasiswa')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table
                        class="border-collapse border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="">
                            <tr>
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Pertemuan
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Keterangan
                                </th>
                         </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekapAbsenMhs as $item)
                                <tr class="">
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->first()->matakuliah->name_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->mahasiswa->first()->name_mahasiswa }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->keterangan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endrole


</x-app-layout>
