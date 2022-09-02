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
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    Kode Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Hari
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Jam
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Detail
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getKelasMhs as $item)
                                <tr class="">
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->first()->matakuliah->kode_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->first()->matakuliah->name_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->first()->hari }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->first()->jam_mulai }} - {{ $item->jadwal->first()->jam_selesai }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        <a href="{{ route('dashboard.rekap_absen') }}">
                                            <button class="form-control btn btn-success"></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endrole

        @role('dosen')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Kode Matakuliah
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Nama Matakuliah
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Program Studi
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Semester
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Hari
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Jam
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Ruangan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <a href="absensi">Detail</a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getKelasDosen as $items)
                                    <tr class="">
                                        <td class="py-4 px-6">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->matakuliah->kode_matakuliah }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->matakuliah->name_matakuliah }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->prodi->name_prodi }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->semester->name_semester }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->hari }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->jam_mulai }} - {{ $items->jam_selesai }}

                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $items->ruangan->name_ruangan }}

                                        </td>
                                        <td class="py-4 px-6">
                                            <a href="{{ route('dashboard_showKelas', ['id' => $items->id]) }}">
                                                <button class="form-control btn btn-success">Detail</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endrole
</x-app-layout>
