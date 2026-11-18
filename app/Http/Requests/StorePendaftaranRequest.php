<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
     * Intercept honeypot bot submissions early before validation, file processing, or database access.
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('website')) {
            Log::warning('Honeypot terpicu: Percobaan spam pendaftaran bot digagalkan dari IP '.$this->ip());

            // Kembalikan respon seolah-olah berhasil agar bot mencatat selesai dan tidak mencari celah lain
            if ($this->expectsJson() || $this->ajax()) {
                throw new HttpResponseException(response()->json([
                    'success' => true,
                    'message' => 'Alhamdulillah, formulir pendaftaran calon santri baru berhasil disimpan. Bukti pendaftaran telah dikirim ke email Anda.',
                    'registration_number' => 'PSB-2027-'.rand(100, 999),
                ]));
            }

            throw new HttpResponseException(redirect()->route('pendaftaran')->with('success', 'Alhamdulillah, pendaftaran berhasil disimpan.'));
        }
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
            'santri_nama' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'\.\,\-]+$/u'],
            'santri_gender' => ['required', 'string', 'in:Putra,Putri'],
            'santri_tempat_lahir' => ['required', 'string', 'max:100', 'regex:/^[\pL\s\'\.\-]+$/u'],
            'santri_tanggal_lahir' => ['required', 'date'],
            'santri_alamat' => ['required', 'string', 'max:1000', 'not_regex:/[<>]/', 'not_regex:/https?:\/\//i'],
            'santri_asal_sekolah' => ['required', 'string', 'max:255', 'regex:/^[\pL\pN\s\'\.\,\-\(\)\/]+$/u'],
            'santri_email' => ['required', 'string', 'email', 'max:255'],
            'santri_hp' => ['nullable', 'string', 'min:9', 'max:25', 'regex:/^(\+?[0-9\s\-]+)$/'],
            'santri_tinggal_bersama' => ['required', 'string', 'in:Orang Tua,Wali'],
            'file_pas_foto' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'file_kk' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
            'file_raport' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
            'ayah_nama' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'\.\,\-]+$/u'],
            'ayah_hp' => ['required', 'string', 'min:9', 'max:25', 'regex:/^(\+?[0-9\s\-]+)$/'],
            'ayah_pekerjaan' => ['required', 'string', 'max:100'],
            'ayah_penghasilan' => ['required', 'string', 'max:100'],
            'ibu_nama' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'\.\,\-]+$/u'],
            'ibu_hp' => ['required', 'string', 'min:9', 'max:25', 'regex:/^(\+?[0-9\s\-]+)$/'],
            'ibu_pekerjaan' => ['required', 'string', 'max:100'],
            'ibu_penghasilan' => ['required', 'string', 'max:100'],
            'cf-turnstile-response' => [
                Rule::when(
                    ! empty(config('services.turnstile.secret_key')) && ! app()->environment('testing'),
                    ['required', new Turnstile],
                    ['nullable']
                ),
            ],
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
            'santri_nama.regex' => 'Nama calon santri hanya boleh berisi huruf alfabet, spasi, titik, koma, tanda petik, dan tanda hubung (-).',
            'santri_gender.required' => 'Jenis kelamin calon santri wajib dipilih.',
            'santri_tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'santri_tempat_lahir.regex' => 'Tempat lahir hanya boleh berisi huruf alfabet, spasi, titik, tanda petik, dan tanda hubung (-).',
            'santri_tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'santri_tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'santri_alamat.required' => 'Alamat lengkap wajib diisi.',
            'santri_alamat.not_regex' => 'Alamat tidak boleh mengandung tag HTML atau tautan link URL.',
            'santri_asal_sekolah.required' => 'Asal sekolah wajib diisi.',
            'santri_asal_sekolah.regex' => 'Asal sekolah tidak boleh mengandung tag HTML, tautan web, atau simbol terlarang.',
            'santri_email.required' => 'Alamat email aktif wajib diisi untuk pengiriman bukti pendaftaran.',
            'santri_email.email' => 'Format alamat email tidak valid.',
            'santri_hp.regex' => 'Nomor HP calon santri harus berupa nomor telepon yang valid.',
            'santri_hp.min' => 'Nomor HP calon santri minimal 9 digit.',
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
            'ayah_nama.regex' => 'Nama ayah hanya boleh berisi huruf alfabet, spasi, titik, koma, tanda petik, dan tanda hubung (-).',
            'ayah_hp.required' => 'Nomor HP/WA ayah wajib diisi.',
            'ayah_hp.regex' => 'Nomor HP/WA ayah harus berupa nomor telepon yang valid.',
            'ayah_hp.min' => 'Nomor HP/WA ayah minimal 9 digit.',
            'ayah_pekerjaan.required' => 'Pekerjaan ayah wajib diisi.',
            'ayah_penghasilan.required' => 'Rentang penghasilan ayah wajib dipilih.',
            'ibu_nama.required' => 'Nama lengkap ibu kandung wajib diisi.',
            'ibu_nama.regex' => 'Nama ibu hanya boleh berisi huruf alfabet, spasi, titik, koma, tanda petik, dan tanda hubung (-).',
            'ibu_hp.required' => 'Nomor HP/WA ibu wajib diisi.',
            'ibu_hp.regex' => 'Nomor HP/WA ibu harus berupa nomor telepon yang valid.',
            'ibu_hp.min' => 'Nomor HP/WA ibu minimal 9 digit.',
            'ibu_pekerjaan.required' => 'Pekerjaan ibu wajib diisi.',
            'ibu_penghasilan.required' => 'Rentang penghasilan ibu wajib dipilih.',
            'cf-turnstile-response.required' => 'Mohon selesaikan verifikasi keamanan (CAPTCHA) terlebih dahulu.',
        ];
    }
}
