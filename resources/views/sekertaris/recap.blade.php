<x-layouts.app title="Rekapan Absensi">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Rekapan Absensi</h1>
            <p class="text-sm text-gray-500 mt-1">Laporan kehadiran siswa per hari</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('sekertaris.scan') }}"
               class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                </svg>
                Scan QR
            </a>
            <a href="{{ route('sekertaris.recap.export', request()->all()) }}"
               class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Export .CSV
            </a>
            <button onclick="window.print()"
                    class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.728 6.75H17.272M6.728 6.75C6.014 6.75 5.5 7.158 5.5 7.786v3.428c0 .628.514 1.036 1.228 1.036h10.544c.714 0 1.228-.408 1.228-1.036V7.786c0-.628-.514-1.036-1.228-1.036H6.728z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 12.25h7.5v6H8.25v-6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75v-3h7.5v3" />
                </svg>
                Print
            </button>
            {{-- Filter --}}
            <form action="{{ route('sekertaris.recap') }}" method="GET" class="flex flex-wrap items-center gap-2">
                @include('sekertaris.partials.filter')
            </form>
        </div>
    </div>

    {{-- Print Header --}}
    <div class="hidden print:block mb-6">
        <h1 class="text-xl font-bold text-gray-900">Rekap Absensi Harian</h1>
        <p class="text-sm text-gray-600">Periode: {{ $label }}</p>
    </div>

    <style>
        @media print {
            nav, header, footer { display: none !important; }
            body { background: white !important; }
            .print\:hidden { display: none !important; }
            .shadow-sm { box-shadow: none !important; }
            .border { border: 1px solid #ddd !important; }
            /* Hide Stats Cards */
            .grid-cols-2.md\:grid-cols-5 { display: none !important; }
        }
    </style>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8 print:hidden">
        {{-- Hadir --}}
        <div class="rounded-xl bg-white p-4 shadow-sm border border-green-100">
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <div>
                    <p class="text-xs font-medium text-gray-500">Hadir</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['hadir'] }}</p>
                </div>
            </div>
        </div>

        {{-- Terlambat --}}
        <div class="rounded-xl bg-white p-4 shadow-sm border border-yellow-100">
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <div>
                    <p class="text-xs font-medium text-gray-500">Terlambat</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['terlambat'] }}</p>
                </div>
            </div>
        </div>

        {{-- Izin --}}
        <div class="rounded-xl bg-white p-4 shadow-sm border border-blue-100">
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </span>
                <div>
                    <p class="text-xs font-medium text-gray-500">Izin</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['izin'] }}</p>
                </div>
            </div>
        </div>

        {{-- Sakit --}}
        <div class="rounded-xl bg-white p-4 shadow-sm border border-purple-100">
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </span>
                <div>
                    <p class="text-xs font-medium text-gray-500">Sakit</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['sakit'] }}</p>
                </div>
            </div>
        </div>

        {{-- Alfa --}}
        <div class="rounded-xl bg-white p-4 shadow-sm border border-red-100">
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
                <div>
                    <p class="text-xs font-medium text-gray-500">Alfa</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['alfa'] }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Attendance Table --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jam Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jam Pulang</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Bukti</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($attendances as $row)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 mr-3">
                                        {{ substr($row->user->name, 0, 2) }}
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">{{ $row->user->name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-mono">
                                {{ $row->time_in ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-mono">
                                {{ $row->time_out ?? '—' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                                    {{ match($row->status) {
                                        'hadir' => 'bg-green-100 text-green-700',
                                        'terlambat' => 'bg-yellow-100 text-yellow-700',
                                        'izin' => 'bg-blue-100 text-blue-700',
                                        'sakit' => 'bg-purple-100 text-purple-700',
                                        'alfa' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    } }}">
                                    {{ ucfirst($row->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $row->notes ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($row->letter_file)
                                    <a href="{{ Storage::url($row->letter_file) }}" target="_blank"
                                       class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:underline">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-gray-300">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="h-10 w-10 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-900">Tidak ada data absensi</p>
                                    <p class="text-xs text-gray-500 mt-1">Belum ada rekaman absensi untuk tanggal ini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
