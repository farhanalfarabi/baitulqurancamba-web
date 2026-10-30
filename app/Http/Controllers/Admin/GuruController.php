<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuruController extends Controller
{
    /**
     * Tampilkan halaman daftar dewan asatidz & tenaga pendidik.
     */
    public function index(Request $request): View|JsonResponse
    {
        $asatidz = Guru::query()
            ->orderBy('id', 'asc')
            ->get();

        $stats = [
            'total_guru' => Guru::count(),
            'guru_tahfizh' => Guru::where('kategori', 'tahfizh')->count(),
            'guru_formal' => Guru::where('kategori', 'formal')->count(),
            'guru_diniyah' => Guru::where('kategori', 'diniyah')->count(),
            'asatidz_mukim' => Guru::where('status_kepegawaian', 'like', '%Mukim%')->count(),
            'guru_ikhwan' => Guru::where('jenis_kelamin', 'Ustadz')->count(),
            'guru_akhwat' => Guru::where('jenis_kelamin', 'Ustadzah')->count(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $asatidz,
                'stats' => $stats,
            ]);
        }

        return view('admin.guru.index', [
            'asatidz' => $asatidz,
            'stats' => $stats,
        ]);
    }

    /**
     * Simpan data guru / asatidz baru.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:Ustadz,Ustadzah'],
            'jabatan' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'in:tahfizh,diniyah,formal,pengasuhan'],
            'spesialisasi' => ['nullable', 'string'],
            'almamater' => ['nullable', 'string', 'max:255'],
            'tanggung_jawab' => ['nullable', 'string', 'max:255'],
            'status_kepegawaian' => ['required', 'string', 'max:100'],
            'no_hp' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'alamat' => ['nullable', 'string'],
            'tahun_bergabung' => ['nullable', 'integer', 'min:1980', 'max:'.((int) date('Y') + 1)],
            'is_active' => ['nullable', 'boolean'],
            'foto' => ['nullable', 'image', 'max:3072'],
            'foto_path' => ['nullable', 'string', 'max:255'],
        ]);

        if (empty($validated['tahun_bergabung'])) {
            $validated['tahun_bergabung'] = (int) date('Y');
        }

        $validated['is_active'] = $validated['is_active'] ?? true;

        if ($request->hasFile('foto')) {
            $validated['foto_path'] = '/storage/'.$request->file('foto')->store('guru', 'public');
        } elseif (empty($validated['foto_path'])) {
            $validated['foto_path'] = $validated['jenis_kelamin'] === 'Ustadzah'
                ? '/assets/images/akhwat.png'
                : '/assets/images/ikhwan.png';
        }

        $guru = Guru::create($validated);

        return response()->json([
            'success' => true,
            'message' => "Data pendidik {$guru->nama} berhasil ditambahkan.",
            'data' => $guru,
        ], 201);
    }

    /**
     * Tampilkan detail spesifik satu asatidz (JSON).
     */
    public function show(int|string $id): JsonResponse
    {
        $guru = Guru::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $guru,
        ]);
    }

    /**
     * Perbarui data guru / asatidz yang ada.
     */
    public function update(Request $request, int|string $id): JsonResponse
    {
        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:Ustadz,Ustadzah'],
            'jabatan' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'in:tahfizh,diniyah,formal,pengasuhan'],
            'spesialisasi' => ['nullable', 'string'],
            'almamater' => ['nullable', 'string', 'max:255'],
            'tanggung_jawab' => ['nullable', 'string', 'max:255'],
            'status_kepegawaian' => ['required', 'string', 'max:100'],
            'no_hp' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'alamat' => ['nullable', 'string'],
            'tahun_bergabung' => ['nullable', 'integer', 'min:1980', 'max:'.((int) date('Y') + 1)],
            'is_active' => ['nullable', 'boolean'],
            'foto' => ['nullable', 'image', 'max:3072'],
            'foto_path' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto_path'] = '/storage/'.$request->file('foto')->store('guru', 'public');
        }

        $guru->update($validated);

        return response()->json([
            'success' => true,
            'message' => "Data {$guru->nama} berhasil diperbarui.",
            'data' => $guru,
        ]);
    }

    /**
     * Hapus data guru / asatidz.
     */
    public function destroy(int|string $id): JsonResponse
    {
        $guru = Guru::findOrFail($id);
        $nama = $guru->nama;
        $guru->delete();

        return response()->json([
            'success' => true,
            'message' => "Data {$nama} berhasil dihapus dari sistem.",
        ]);
    }
}
