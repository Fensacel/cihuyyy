<x-layouts.app title="Scan QR Code">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Scanner QR Code</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola sesi absensi dan scan QR Code siswa</p>
        </div>
        <a href="{{ route('sekertaris.recap') }}"
           class="inline-flex items-center justify-center gap-1.5 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
            Lihat Rekapan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Left Column --}}
        <div class="space-y-6">
            {{-- Session Controls --}}
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Kontrol Sesi Absensi</h2>

                <div class="grid grid-cols-2 gap-3">
                    {{-- Pagi --}}
                    <div class="rounded-xl border-2 p-4 transition-all {{ $morningActive ? 'border-green-400 bg-green-50' : 'border-gray-200 bg-gray-50' }}">
                        <div class="text-center mb-3 flex flex-col items-center">
                            <svg class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                            <p class="text-sm font-semibold text-gray-800 mt-2">Sesi Pagi</p>
                            <p class="text-xs {{ $morningActive ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                                {{ $morningActive ? '● AKTIF' : '○ Nonaktif' }}
                            </p>
                        </div>
                        @if(!$morningActive)
                            <button onclick="controlSession('morning', 'start')"
                                    class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg bg-green-600 px-3 py-2 text-xs font-semibold text-white hover:bg-green-700 transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653z" />
                                </svg>
                                Mulai Sesi
                            </button>
                        @else
                            <button onclick="controlSession('morning', 'stop')"
                                    class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25h-9a2.25 2.25 0 01-2.25-2.25v-9z" />
                                </svg>
                                Tutup Sesi
                            </button>
                        @endif
                    </div>

                    {{-- Sore --}}
                    <div class="rounded-xl border-2 p-4 transition-all {{ $afternoonActive ? 'border-blue-400 bg-blue-50' : 'border-gray-200 bg-gray-50' }}">
                        <div class="text-center mb-3 flex flex-col items-center">
                            <svg class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                            </svg>
                            <p class="text-sm font-semibold text-gray-800 mt-2">Sesi Sore</p>
                            <p class="text-xs {{ $afternoonActive ? 'text-blue-600 font-semibold' : 'text-gray-400' }}">
                                {{ $afternoonActive ? '● AKTIF' : '○ Nonaktif' }}
                            </p>
                        </div>
                        @if(!$afternoonActive)
                            <button onclick="controlSession('afternoon', 'start')"
                                    class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white hover:bg-blue-700 transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653z" />
                                </svg>
                                Mulai Sesi
                            </button>
                        @else
                            <button onclick="controlSession('afternoon', 'stop')"
                                    class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg bg-red-500 px-3 py-2 text-xs font-semibold text-white hover:bg-red-600 transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25h-9a2.25 2.25 0 01-2.25-2.25v-9z" />
                                </svg>
                                Tutup Sesi
                            </button>
                        @endif
                    </div>
                </div>

                {{-- Status Bar --}}
                <div class="mt-3 rounded-lg bg-gray-50 px-3 py-2 text-center">
                    <p class="text-xs text-gray-500">
                        Sudah absen: <span class="font-bold text-gray-800">{{ $todayAttendances->count() }}</span> / {{ $totalSiswa }} siswa
                    </p>
                </div>
            </div>

            {{-- Scanner Area (only visible when a session is active) --}}
            @if($morningActive || $afternoonActive)
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
                <div class="mb-3">
                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $morningActive ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                        Sesi {{ $morningActive ? 'Pagi' : 'Sore' }} aktif
                    </span>
                </div>

                {{-- Tab: Kamera / Manual --}}
                <div class="flex rounded-lg bg-gray-100 p-1 mb-4">
                    <button type="button" onclick="switchScanMode('camera')" id="tab-camera"
                            class="flex flex-1 items-center justify-center gap-2 rounded-md py-1.5 text-xs font-semibold transition-all bg-white text-gray-900 shadow-sm">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Kamera
                    </button>
                    <button type="button" onclick="switchScanMode('manual')" id="tab-manual"
                            class="flex flex-1 items-center justify-center gap-2 rounded-md py-1.5 text-xs font-semibold transition-all text-gray-500">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5h10.5M6.75 12h10.5m-10.5 4.5h10.5M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6z" />
                        </svg>
                        Input Manual
                    </button>
                </div>

                {{-- QR Reader (Camera) --}}
                <div id="panel-camera">
                    <div id="qr-reader" class="rounded-xl overflow-hidden bg-gray-900" style="min-height: 300px;"></div>
                </div>

                {{-- Manual Input --}}
                <div id="panel-manual" class="hidden">
                    <div class="rounded-xl border border-gray-200 p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Masukkan Kode QR</label>
                        <div class="flex gap-2">
                            <input type="text" id="manual-token" placeholder="Contoh: AB12CD34"
                                   class="flex-1 rounded-xl border border-gray-300 px-4 py-2.5 text-sm uppercase tracking-widest font-mono shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-200 focus:outline-none"
                                   maxlength="8">
                            <button type="button" onclick="submitManualToken()"
                                    class="rounded-xl bg-primary-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-primary-700 transition-colors">
                                Scan
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Result Area --}}
                <div id="scan-result" class="mt-4 hidden">
                    <div id="scan-result-content" class="rounded-xl p-4 text-sm"></div>
                </div>
            </div>
            @else
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100 text-center flex flex-col items-center justify-center">
                <div class="py-8 text-gray-400 flex flex-col items-center">
                    <svg class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                    <p class="text-sm mt-3 font-medium">Scanner tidak aktif</p>
                    <p class="text-xs mt-1">Mulai sesi absensi untuk mengaktifkan scanner</p>
                </div>
            </div>
            @endif
        </div>

        {{-- Right Column: Scan Log --}}
        <div class="rounded-2xl bg-white shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 pb-0">
                <h2 class="text-lg font-semibold text-gray-900">Log Kehadiran Hari Ini</h2>
                <p class="text-sm text-gray-500 mt-1">Total: {{ $todayAttendances->count() }} / {{ $totalSiswa }} siswa</p>
            </div>
            <div class="overflow-x-auto mt-4">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Masuk</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Pulang</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-log" class="divide-y divide-gray-50">
                        @forelse($todayAttendances as $att)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $att->user->name }}</td>
                                <td class="px-6 py-3 text-sm text-gray-600">{{ $att->time_in ?? '—' }}</td>
                                <td class="px-6 py-3 text-sm text-gray-600">{{ $att->time_out ?? '—' }}</td>
                                <td class="px-6 py-3">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-semibold
                                        {{ match($att->status) {
                                            'hadir' => 'bg-green-100 text-green-700',
                                            'terlambat' => 'bg-yellow-100 text-yellow-700',
                                            'izin' => 'bg-blue-100 text-blue-700',
                                            'sakit' => 'bg-purple-100 text-purple-700',
                                            'alfa' => 'bg-red-100 text-red-700',
                                            default => 'bg-gray-100 text-gray-700',
                                        } }}">
                                        {{ ucfirst($att->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-400">
                                    Belum ada data kehadiran hari ini
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @if($morningActive || $afternoonActive)
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    @endif

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // ── Session Control ──
        async function controlSession(session, action) {
            const url = action === 'start'
                ? '{{ route("sekertaris.session.start") }}'
                : '{{ route("sekertaris.session.stop") }}';

            const label = session === 'morning' ? 'Pagi' : 'Sore';

            if (action === 'stop') {
                if (!confirm(`Tutup Sesi ${label}?\n\nSiswa yang belum absen akan otomatis di-mark ALFA (tidak hadir).`)) {
                    return;
                }
            }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ session }),
                });

                const data = await response.json();
                alert(data.message);
                window.location.reload();
            } catch (error) {
                alert('Gagal: ' + error.message);
            }
        }

        // ── Scanner (only if session active) ──
        @if($morningActive || $afternoonActive)
        let html5QrCode = null;
        let isProcessing = false;

        const activeSession = '{{ $morningActive ? "morning" : "afternoon" }}';

        function switchScanMode(mode) {
            document.getElementById('panel-camera').classList.toggle('hidden', mode !== 'camera');
            document.getElementById('panel-manual').classList.toggle('hidden', mode !== 'manual');

            const cameraTab = document.getElementById('tab-camera');
            const manualTab = document.getElementById('tab-manual');

            if (mode === 'camera') {
                cameraTab.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
                cameraTab.classList.remove('text-gray-500');
                manualTab.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
                manualTab.classList.add('text-gray-500');
            } else {
                manualTab.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
                manualTab.classList.remove('text-gray-500');
                cameraTab.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
                cameraTab.classList.add('text-gray-500');
            }
        }

        function startScanner() {
            html5QrCode = new Html5Qrcode("qr-reader");

            html5QrCode.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: { width: 250, height: 250 }, aspectRatio: 1.0 },
                onScanSuccess,
                () => {}
            ).catch(err => {
                console.error('Camera error:', err);
                showResult(false, 'Gagal mengakses kamera. Gunakan tab "Input Manual".');
            });
        }

        async function onScanSuccess(decodedText) {
            if (isProcessing) return;
            await processScan(decodedText.trim());
        }

        function submitManualToken() {
            const token = document.getElementById('manual-token').value.trim().toUpperCase();
            if (!token) {
                showResult(false, 'Masukkan kode QR terlebih dahulu');
                return;
            }
            processScan(token);
        }

        async function processScan(qrData) {
            isProcessing = true;

            try {
                const response = await fetch('{{ route("sekertaris.attendance.scan") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        qr_data: qrData,
                        session: activeSession,
                    }),
                });

                const data = await response.json();
                showResult(data.success, data.message);

                if (data.success) {
                    setTimeout(() => window.location.reload(), 2000);
                }
            } catch (error) {
                showResult(false, 'Terjadi kesalahan saat memproses scan.');
            }

            setTimeout(() => { isProcessing = false; }, 3000);
        }

        function showResult(success, message) {
            const resultDiv = document.getElementById('scan-result');
            const contentDiv = document.getElementById('scan-result-content');

            resultDiv.classList.remove('hidden');
            contentDiv.className = `rounded-xl p-4 text-sm font-medium ${success ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200'}`;
            contentDiv.innerHTML = success 
                ? `<div class="flex items-center gap-2"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> <span>${message}</span></div>` 
                : `<div class="flex items-center gap-2"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" /></svg> <span>${message}</span></div>`;
        }

        // Auto-start scanner
        document.addEventListener('DOMContentLoaded', startScanner);
        @endif
    </script>
</x-layouts.app>
