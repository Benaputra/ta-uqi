<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @role('dosen')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="border w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    NIM
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelasByMhs as $items)
                                <tr class="">
                                    <td class="py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->mahasiswa->first()->nim }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->mahasiswa->first()->name_mahasiswa }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <form action="{{ route('dashboard.save_absen') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id[]" value="{{ $items->id }}">
                                            <label for="">Hadir</label>
                                            <input class="form-control {{ $items->id }}" type="checkbox"
                                                name="keterangan[]" value="Hadir">
                                            <hr>
                                            <label for="">Sakit</label>
                                            <input class="form-control {{ $items->id }}" type="checkbox"
                                                name="keterangan[]" value="Sakit">
                                            <hr>
                                            <label for="">Izin</label>
                                            <input class="form-control {{ $items->id }}" type="checkbox"
                                                name="keterangan[]" value="Absen">

                                            <input type="hidden" name="jadwal_id[]" value="{{ $items->jadwal_id }}">
                                            <input type="hidden" name="mahasiswa_id[]"
                                                value="{{ $items->mahasiswa->first()->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button
                        class=" justify-center float:left inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        type="submit">
                        Simpan
                    </button>
                    </form>
                </div>
            </div>
        @endrole
</x-app-layout>
