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
                                <input type="text" name="hari" value="{{ $items->jadwal->first()->hari }}">
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
                                            <form action="" method="POST">
                                                @csrf
                                                @method("POST")
                                                <label for="">Hadir</label>
                                                <input class="form-control" type="radio" name="status[]" id="hadir">
                                                <hr>
                                                <label for="">Sakit</label>
                                                <input class="form-control" type="radio" name="status[]" id="alpha">
                                                <hr>
                                                <label for="">Izin</label>
                                                <input class="form-control" type="radio" name="status[]" id="alpha">

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endrole
</x-app-layout>
