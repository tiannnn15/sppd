<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  body{
    font-family: arial, sans-serif;
    font-size: 13px;
  }
  table{
    width: 100%;
    padding-left: 30px;
    padding-right: 30px;
  }
  td{
    text-align: left;
    padding: 5px 8px 5px 8px;
  }
  #main td {
    border:1px solid black;
  }
  #main {
    border-collapse: collapse;
  }
  </style>
</head>
<body>
  <table width="100%" border="0">
    <tbody>
          <tr>
              <td style="text-align: center;">
                <strong>DINAS LINGKUNGAN HIDUP</strong>
                <br>
                Jalan Raya Kedondong Nomor 01 Nganjuk Kode Pos 64461
                <br>
                Telepon (0358) 328380 / Fax (0358) 328475
              </td>
          </tr>
    </tbody>
</table>
<hr size="4">
  <table style="margin-bottom: 20px">
    <tr>
      <td width="70%"></td>
      <td>
        Lembar Ke: {{ $sppd->lembar_ke }}
        <br>
        Kode No: {{ $sppd->kode_no }}
        <br>
        Nomor: {{ $sppd->nomer_sppd }}
      </td>
    </tr>
  </table>
  <table width="100%" id="main">
    <tr>
      <td width="5%">1</td>
      <td width="45%">Penjabat yang Memberi Perintah</td>
      <td width="45%" style="margin-left: 10px">Kepala Dinas Lingkungan Hidup Kabupaten Nganjuk</td>
    </tr>
    <tr>
      <td width="5%">2</td>
      <td width="45%">
        a. Nama pegawai yang diperintah
        <br>b. NIP
      </td>
      <td width="45%" style="margin-left: 10px;">
        a. <span style="text-transform: capitalize;">{{ $sppd->pelaksana->pegawai->nama_pegawai }}</span>
        <br>
        b. {{ $sppd->pelaksana->pegawai->nip }}
      </td>
    </tr>
    <tr>
      <td width="5%">3</td>
      <td width="45%">a. Pangkat dan Golongan
        <br>b. Jabatan
        <br>c. Tingkat Menurut Peraturan Perjalanan
      </td>
      <td width="45%" style="margin-left: 10px">
        a. {{ $sppd->pelaksana->pegawai->pangkat }} ({{ $sppd->pelaksana->pegawai->golongan }})
        <br>
        b. {{ $sppd->pelaksana->pegawai->jabatan }}
        <br>
        c.
      </td>
    </tr>
    <tr>
      <td width="5%">4</td>
      <td width="45%">Maksud Perjalanan Dinas
      </td>
      <td width="45%" style="margin-left: 10px">{{ $sppd->maksud_perjalanan }}</td>
    </tr>
    <tr>
      <td width="5%">5</td>
      <td width="45%">Alat angkut yang dipergunakan
      </td>
      <td width="45%" style="margin-left: 10px">{{ $sppd->alat_angkut }}</td>
    </tr>
    <tr>
      <td width="5%">6</td>
      <td width="45%">
        a. Tempat berangkat
        <br>
        b. Tempat Tujuan
      </td>
      <td width="45%" style="margin-left: 10px">
        a. {{ $sppd->tempat_berangkat }}
        <br>
        b. {{ $sppd->tempat_tujuan }}
      </td>
    </tr>
    <tr>
      <td width="5%">7</td>
      <td width="45%">
        a. Lamanya perjalanan dinas
        <br>
        b. Tanggal Keberangkatan
        <br>
        c. Tanggal harus kembali
      </td>
      <td width="45%" style="margin-left: 10px">
        a. {{ $sppd->lama_perjalanan }} hari<br>
        b. {{  date("d-m-Y", strtotime($sppd->tgl_berangkat)) }}<br>
        c. {{  date("d-m-Y", strtotime($sppd->tgl_kembali)) }}<br>
      </td>
    </tr>
    <tr>
        <td width="5%">8</td>
        <td width="45%">Pengikut</td>
        <td width="45%" style="margin-left: 10px">
          @foreach ($pendamping as $item)
              {{ $loop->iteration }}. <span style="text-transform: capitalize;">{{ $item->pegawai->nama_pegawai }}</span> <br>
          @endforeach
        </td>
    </tr>
    <tr>
      <td width="5%">9</td>
      <td width="45%">
        Pembebanan<br>
        a. Instansi<br>
        b. Mata Anggaran<br>
      </td>
      <td width="45%">
        <br>
        a. Dinas Lingkungan Hidup Kabupaten Nganjuk
        <br>
        b.
      </td>
    </tr>
    <tr>
      <td width="5%">10</td>
      <td width="45%">Keterangan Lain-lain</td>
      <td width="45%" style="margin-left: 10px">{{ $sppd->keterangan }}</td>
    </tr>
  </table>
  <table style="margin-top: 20px">
    <tr>
      <td width="60%"></td>
      <td width="20%">
        Dikeluarkan di
        <br>
        Pada Tanggal
      </td>
      <td width="20%">
        : Nganjuk
        <br>
        : {{ date("d-m-Y", strtotime($sppd->tgl_sppd)) }}
      </td>
    </tr>
  </table>
  <table style="margin-top: 20px">
    <tr>
      <td width="55%"></td>
      <td width="45%" style="text-align: center">
        Nganjuk, {{ $sppd->tgl_sppd }}<br>
        KEPALA DINAS LINGKUNGAN HIDUP<br>
        KABUPATEN NGANJUK
        <br>
        <br>
        <br>
        <br>
        <u>SUBANI.SH., MM.</u>
        <br>Pembina Utama Muda
        <br>NIP. 196910051989031007
      </td>
    </tr>
  </table>
</body>
</html>
