<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukti Pendaftaran Santri Baru</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      line-height: 1.6;
      color: #333333;
      background-color: #FAF7F0;
      margin: 0;
      padding: 0;
    }
    .email-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      border: 1px solid #eeeeee;
    }
    .header {
      background: linear-gradient(135deg, #0B3B2C 0%, #175440 100%);
      color: #ffffff;
      padding: 30px 25px;
      text-align: center;
    }
    .header h1 {
      margin: 0;
      font-size: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 800;
    }
    .header p {
      margin: 6px 0 0;
      font-size: 13px;
      color: #d1fae5;
    }
    .content {
      padding: 30px 25px;
    }
    .card-reg {
      background-color: #FFFBEB;
      border: 2px dashed #F59E0B;
      border-radius: 16px;
      padding: 20px;
      text-align: center;
      margin-bottom: 25px;
    }
    .card-reg .label {
      font-size: 11px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #B45309;
      margin-bottom: 4px;
    }
    .card-reg .reg-number {
      font-family: monospace;
      font-size: 26px;
      font-weight: 900;
      color: #78350F;
      letter-spacing: 2px;
      margin: 4px 0;
    }
    .card-reg .badge-jenjang {
      display: inline-block;
      margin-top: 6px;
      padding: 4px 14px;
      background-color: #0B3B2C;
      color: #ffffff;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
    }
    .info-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 25px;
      font-size: 13px;
    }
    .info-table td {
      padding: 10px 12px;
      border-bottom: 1px solid #f0f0f0;
      vertical-align: top;
    }
    .info-table td.label {
      width: 38%;
      color: #666666;
      font-weight: 500;
    }
    .info-table td.value {
      width: 62%;
      color: #111827;
      font-weight: 700;
    }
    .steps-box {
      background-color: #F8FAFC;
      border-radius: 14px;
      padding: 18px 20px;
      margin-bottom: 25px;
      border: 1px solid #E2E8F0;
    }
    .steps-box h3 {
      margin-top: 0;
      font-size: 14px;
      color: #0B3B2C;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .steps-box ol {
      margin: 0;
      padding-left: 20px;
      font-size: 12px;
      color: #475569;
      line-height: 1.7;
    }
    .btn-wa {
      display: block;
      background-color: #059669;
      color: #ffffff !important;
      text-align: center;
      padding: 14px 20px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: bold;
      font-size: 13px;
      letter-spacing: 0.5px;
      margin-top: 15px;
    }
    .footer {
      background-color: #F8FAFC;
      border-top: 1px solid #E2E8F0;
      padding: 20px 25px;
      text-align: center;
      font-size: 11px;
      color: #64748B;
      line-height: 1.6;
    }
  </style>
</head>
<body>

  <div class="email-container">
    
    <!-- Header -->
    <div class="header">
      <h1>Pondok Pesantren Tahfizh Baitul Qur'an Camba</h1>
      <p>Bukti Tanda Terima Pendaftaran Santri Baru (PSB 2027/2028)</p>
    </div>

    <!-- Content -->
    <div class="content">
      <p style="margin-top: 0; font-size: 14px; color: #111827;">
        Assalamu’alaikum Warahmatullahi Wabarakatuh 🤲✨
      </p>
      <p style="font-size: 13px; color: #4B5563; line-height: 1.6;">
        Alhamdulillah, formulir pendaftaran calon santri baru atas nama <strong>{{ $pendaftaran->nama_santri }}</strong> telah berhasil kami terima dan tercatat di sistem PSB resmi Pondok Pesantren Tahfizh Baitul Qur'an Camba.
      </p>

      <!-- Registration Card -->
      <div class="card-reg">
        <div class="label">Nomor Registrasi Resmi:</div>
        <div class="reg-number">{{ $pendaftaran->registration_number }}</div>
        <div class="badge-jenjang">
          Jenjang: {{ $pendaftaran->jenjang === 'MTs' ? 'MTs (Madrasah Tsanawiyah / SMP)' : 'MA (Madrasah Aliyah / SMA)' }}
        </div>
      </div>

      <!-- Detail Table -->
      <table class="info-table">
        <tr>
          <td class="label">Nama Calon Santri</td>
          <td class="value">{{ $pendaftaran->nama_santri }}</td>
        </tr>
        <tr>
          <td class="label">Jenis Kelamin</td>
          <td class="value">{{ $pendaftaran->jenis_kelamin }}</td>
        </tr>
        <tr>
          <td class="label">Tempat, Tanggal Lahir & Usia</td>
          <td class="value">
            {{ $pendaftaran->tempat_lahir }}, 
            {{ $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('d F Y') : '-' }}
            @if($pendaftaran->umur)
              ({{ $pendaftaran->umur }} Tahun)
            @endif
          </td>
        </tr>
        <tr>
          <td class="label">Asal Sekolah</td>
          <td class="value">{{ $pendaftaran->asal_sekolah }}</td>
        </tr>
        <tr>
          <td class="label">Email Pendaftar</td>
          <td class="value">{{ $pendaftaran->email ?? '-' }}</td>
        </tr>
        <tr>
          <td class="label">Nama Ayah / No. WA</td>
          <td class="value">{{ $pendaftaran->nama_ayah }} ({{ $pendaftaran->no_hp_ayah }})</td>
        </tr>
        <tr>
          <td class="label">Nama Ibu / No. WA</td>
          <td class="value">{{ $pendaftaran->nama_ibu }} ({{ $pendaftaran->no_hp_ibu }})</td>
        </tr>
        <tr>
          <td class="label">Alamat Lengkap</td>
          <td class="value">{{ $pendaftaran->alamat_lengkap }}</td>
        </tr>
      </table>

      <!-- Next Steps -->
      <div class="steps-box">
        <h3>📌 Tahapan Selanjutnya:</h3>
        <ol>
          <li><strong>Simpan Email & Nomor Registrasi:</strong> Harap simpan email ini atau catat nomor registrasi <code>{{ $pendaftaran->registration_number }}</code> sebagai tanda bukti pendaftaran resmi Anda.</li>
          <li><strong>Verifikasi Dokumen:</strong> Panitia PSB akan memverifikasi berkas (Pas Foto, KK, dan Raport) dalam 1-3 hari kerja.</li>
          <li><strong>Konfirmasi WhatsApp:</strong> Silakan lakukan konfirmasi singkat ke WhatsApp resmi panitia PSB untuk mempermudah koordinasi tes seleksi dan jadwal wawancara.</li>
        </ol>

        @php
          $targetPhone = $pendaftaran->jenis_kelamin === 'Putri' ? '6282195682105' : '6282124880061';
          $waMsg = rawurlencode(
            "Assalamu'alaikum Warahmatullahi Wabarakatuh Panitia PSB Baitul Qur'an Camba.\n\n" .
            "Saya telah menerima bukti pendaftaran via email:\n" .
            "• No. Registrasi: {$pendaftaran->registration_number}\n" .
            "• Jenjang: {$pendaftaran->jenjang}\n" .
            "• Nama Santri: {$pendaftaran->nama_santri}\n\n" .
            "Mohon petunjuk untuk jadwal verifikasi berkas dan tes seleksi. Syukran."
          );
        @endphp

        <a href="https://wa.me/{{ $targetPhone }}?text={{ $waMsg }}" target="_blank" class="btn-wa">
          💬 Konfirmasi ke WhatsApp Panitia
        </a>
      </div>

    </div>

    <!-- Footer -->
    <div class="footer">
      <p style="margin: 0 0 5px; font-weight: bold; color: #334155;">Pondok Pesantren Tahfizh Baitul Qur'an Camba</p>
      <p style="margin: 0 0 5px;">Kecamatan Camba, Kabupaten Maros, Sulawesi Selatan</p>
      <p style="margin: 0; color: #94a3b8;">Email ini dibuat secara otomatis oleh sistem PSB Digital Baitul Qur'an Camba.</p>
    </div>

  </div>

</body>
</html>

