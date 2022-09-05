@section('title')
    <title>Detail Kelas | Presensi Teknik Elektro</title>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @role('dosen')
        <form method="POST" action="{{ route('absen.store') }}">
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
                                <select class="form-control" name="pertemuan" id="pertemuan">
                                    <option value="">Silahkan pilih pertemuan</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
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
                                            <form action="{{ route('absen.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id{{ $items->id }}"
                                                    value="{{ $items->id }}">
                                                <label for="">Hadir</label>
                                                <input class="form-control {{ $items->id }}" type="radio"
                                                    name="keterangan{{ $items->id }}" value="Hadir">
                                                <hr>
                                                <label for="">Sakit</label>
                                                <input class="form-control {{ $items->id }}" type="radio"
                                                    name="keterangan{{ $items->id }}" value="Sakit">
                                                <hr>
                                                <label for="">Izin</label>
                                                <input class="form-control {{ $items->id }}" type="radio"
                                                    name="keterangan{{ $items->id }}" value="Absen">

                                                <input type="hidden" name="mahasiswa_id{{ $items->id }}"
                                                    value="{{ $items->mahasiswa->first()->id }}">
                                                <input type="hidden" name="dosen_id{{ $items->id }}"
                                                    value="{{ auth()->id() }}">
                                        </td>
                                    </tr>
                                @endforeach
                                <input type="hidden" name="jadwal_id" value="{{ $items->jadwal_id }}">
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
