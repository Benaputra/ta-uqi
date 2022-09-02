<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <form method="POST" action="">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="border w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="">
              <tr>
                </th>
                <th scope="col" class="py-3 px-6">
                  Nama Mahasiswa
                </th>
                <th scope="col" class="py-3 px-6">
                  Keterangan
                </th>
                <th scope="col" class="py-3 px-6">
                  Status
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td class="py-4 px-6">
                  {{ $alpaName }}
                </td>
                <td class="py-4 px-6">
                  {{ $alpaKet }}
                </td>
                <td class="py-4 px-6">
                  {{ $alpaCount }}
                </td>
              </tr>
              <tr class="">
                <td class="py-4 px-6">
                  {{ $alpaName }}
                </td>
                <td class="py-4 px-6">
                  Sakit
                </td>
                <td class="py-4 px-6">
                  {{ $sakitCount }}
                </td>
              </tr>
              <tr class="">
                <td class="py-4 px-6">
                  {{ $alpaName }}
                </td>
                <td class="py-4 px-6">
                  Hadir
                </td>
                <td class="py-4 px-6">
                  {{ $hadirCount }}
                </td>
              </tr>
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
</x-app-layout>