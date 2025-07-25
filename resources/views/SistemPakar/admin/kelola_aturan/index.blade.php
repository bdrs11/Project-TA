<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-primary-button onclick="window.location='{{ route('SistemPakar.admin.kelola_aturan.create') }}'">
                        Tambah Aturan
                    </x-primary-button>
                    <br>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                          <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                  <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Kategori Usia</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Kategori IMT</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Kategori Aktivitas Fisik</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Kategori Gula Darah</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php $num=1; @endphp
                                    @foreach($rules as $rule)
                                  <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $num++ }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $rule->ageCategory->rentan_usia ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $rule->imtCategory->rentan_imt ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $rule->activity->kategori ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $rule->sugarCategory->rentan ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $rule->keterangan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <div x-data="{ action: '' }">
                                            <x-primary-button tag="a" href="{{ route('SistemPakar.admin.kelola_aturan.edit', ['id' => $rule->id]) }}"> Edit </x-primary-button>
                                            <x-danger-button
                                                x-on:click.prevent="
                                                    action = '{{ route('SistemPakar.admin.kelola_aturan.destroy', $rule->id) }}';
                                                    $dispatch('open-modal', 'confirm-user-deletion-{{ $rule->id }}')
                                                "
                                            >
                                                {{ __('Hapus') }}
                                            </x-danger-button>

                                            {{-- Modal Delete --}}
                                            <x-modal name="confirm-user-deletion-{{ $rule->id }}" focusable>
                                                <form method="post" x-bind:action="action" class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Apakah anda yakin akan menghapus data?') }}
                                                    </h2>

                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ __('Setelah proses dilakukan, maka data tidak dapat dikembalikan.') }}
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ml-3">
                                                            {{ __('Delete Data') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                      </td>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>