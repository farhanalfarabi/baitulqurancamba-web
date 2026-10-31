<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenjang' => ['required', 'string', 'in:Wustho,Ulya'],
            'santri_nama' => ['required', 'string', 'max:255'],
            'santri_gender' => ['required', 'string', 'in:Putra,Putri'],
            'santri_tempat_lahir' => ['required', 'string', 'max:100'],
            'santri_tanggal_lahir' => ['required', 'date'],
            'santri_alamat' => ['required', 'string', 'max:1000'],
            'santri_asal_sekolah' => ['required', 'string', 'max:255'],
            'santri_email' => ['required', 'string', 'email', 'max:255'],
            'santri_hp' => ['nullable', 'string', 'max:30'],
            'santri_tinggal_bersama' => ['required', 'string', 'in:Orang Tua,Wali'],
            'file_pas_foto' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'file_kk' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
            'file_raport' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
            'ayah_nama' => ['required', 'string', 'max:255'],
            'ayah_hp' => ['required', 'string', 'max:30'],
            'ayah_pekerjaan' => ['required', 'string', 'max:100'],
            'ayah_penghasilan' => ['required', 'string', 'max:100'],
            'ibu_nama' => ['required', 'string', 'max:255'],
            'ibu_hp' => ['required', 'string', 'max:30'],
            'ibu_pekerjaan' => ['required', 'string', 'max:100'],
            'ibu_penghasilan' => ['required', 'string', 'max:100'],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'jenjang.required' => 'Silakan pilih jenjang pendidikan (Wustho atau Ulya).',
            'jenjang.in' => 'Pilihan jenjang harus Wustho atau Ulya.',
            'santri_nama.required' => 'Nama lengkap calon santri wajib diisi.',
            'santri_gender.required' => 'Jenis kelamin calon santri wajib dipilih.',
            'santri_tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'santri_tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'santri_tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'santri_alamat.required' => 'Alamat lengkap wajib diisi.',
            'santri_asal_sekolah.required' => 'Asal sekolah wajib diisi.',
            'santri_email.required' => 'Alamat email aktif wajib diisi untuk pengiriman bukti pendaftaran.',
            'santri_email.email' => 'Format alamat email tidak valid.',
            'santri_tinggal_bersama.required' => 'Pilihan status tinggal bersama wajib dipilih.',
            'file_pas_foto.required' => 'Pas foto calon santri wajib diunggah.',
            'file_pas_foto.mimes' => 'Format pas foto harus berupa gambar JPG, JPEG, atau PNG.',
            'file_pas_foto.max' => 'Ukuran pas foto maksimal 5 MB.',
            'file_kk.required' => 'Foto atau berkas Kartu Keluarga (KK) wajib diunggah.',
            'file_kk.mimes' => 'Format berkas KK harus JPG, JPEG, PNG, atau PDF.',
            'file_kk.max' => 'Ukuran berkas KK maksimal 10 MB.',
            'file_raport.required' => 'Foto atau berkas Raport / Transkrip Nilai wajib diunggah.',
            'file_raport.mimes' => 'Format berkas Raport harus JPG, JPEG, PNG, atau PDF.',
            'file_raport.max' => 'Ukuran berkas Raport maksimal 10 MB.',
            'ayah_nama.required' => 'Nama lengkap ayah kandung wajib diisi.',
            'ayah_hp.required' => 'Nomor HP/WA ayah wajib diisi.',
            'ayah_pekerjaan.required' => 'Pekerjaan ayah wajib diisi.',
            'ayah_penghasilan.required' => 'Rentang penghasilan ayah wajib dipilih.',
            'ibu_nama.required' => 'Nama lengkap ibu kandung wajib diisi.',
            'ibu_hp.required' => 'Nomor HP/WA ibu wajib diisi.',
            'ibu_pekerjaan.required' => 'Pekerjaan ibu wajib diisi.',
            'ibu_penghasilan.required' => 'Rentang penghasilan ibu wajib dipilih.',
        ];
    }
}
