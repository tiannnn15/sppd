@extends('layouts.main')

{{--  @push('styles')
    <style>
      .invoice {
        font-family: 'Times New Roman', Times, serif;
        font-size: 100%;
      }
    </style>
@endpush  --}}

@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('NiceAdmin') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('NiceAdmin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('NiceAdmin') }}/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('NiceAdmin') }}/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SI -SPPD</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
            <img src="{{ asset('NiceAdmin') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">Staff</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
        <form action="/logout" method="post">
        <li class="nav-item dropdown">
            @csrf
            <a class="nav-link nav-icon">
                <button type="submit" style="background-color: #ffffff; border: none; box-shadow-none"><i class="bi bi-box-arrow-right"></i></button>
            </a><!-- End Notification Icon -->
        </li><!-- End Notification Nav -->
        </form>
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('staff') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('sppd') }}">
          <i class="bi bi-person-add"></i>
          <span>SPT dan SPPD</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-cash"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('kwitansi') }}">
        <i class="bi bi-bus-front"></i>
        <span>Kwitansi</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('pengeluaran') }}">
        <i class="bi bi-person-add"></i>
        <span>Pengeluaran Rill</span>
      </a>
    </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Pengeluaran Riil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="card">
                <div class="card-body">
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                      <input type="hidden" id="tgl" value="{{ $pengeluaran->sppd->tgl_sppd }}">
                        <div class="invoice">
                            <h4 class="mt-5 text-center"><b>DAFTAR PENGELUARAAN RIIL</b></h4>
                            <p>Yang bertanda tangan dibawah ini : </p>
                            <div>
                                <table width="90%" border="0">
                                    <tbody>
                                        <tr>
                                            <td width="10%">Nama</td>
                                            <td> : {{ $pengeluaran->sppd->pelaksana->pegawai->nama_pegawai }}</td>
                                        </tr>
                                        <tr>
                                            <td width="10%">NIP</td>
                                            <td> : {{ $pengeluaran->sppd->pelaksana->pegawai->nip }}</td>
                                        </tr>
                                        <tr>
                                            <td width="10%">Jabatan</td>
                                            <td> : {{ $pengeluaran->sppd->pelaksana->pegawai->jabatan }}</td>
                                        </tr>
                                    </tbody>
                                </table><br>
                            </div>
                            <p>Berdasarkan Surat Perintah Perjalanan Dinas (SPPD) tanggal <span id="tanggal"> {{ date("d-m-Y", strtotime($pengeluaran->sppd->tgl_sppd))}} </span> Nomor : {{ $pengeluaran->sppd->nomer_sppd }}, dengan ini meyatakan bahwa</p>
                            <table width="90%" border="0">
                              <tbody>
                                  <tr>
                                      <td width="5%">1.</td>
                                      <td>Bahwa transport pegawai dan / atau biaya penginapan dibawah ini yang dapat diperoleh bukti-bukti pengeluarannya, meliputi :</td>
                                  </tr>
                              </tbody>
                            </table><br>
                            <div>
                                <table class="table table-bordered" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="5%">No</th>
                                            <th width="65%">Uraian</th>
                                            <th width="30%">Jumlah (Rp)</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>
                                        <div class="row">
                                         <div class="col-lg-6">
                                          Taksi
                                         </div>
                                         <div class="col-lg-6">
                                          {{--  {{ $provinsi }}  --}}
                                         </div>
                                        </div>
                                      </td>
                                      <td style="text-align: right;">
                                        {{  number_format(((int)$pengeluaran->biaya_taksi), 0, ',', '.') }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td class="text-capitalize">
                                        {{ $pengeluaran->transportasi }}
                                      </td>
                                      <td style="text-align: right;">
                                        {{  number_format(((int)$pengeluaran->biaya_transportasi), 0, ',', '.') }}
                                      </td>
                                    </tr>
                                    @if ($pengeluaran->biaya_penginapan != null)
                                    <tr>
                                      <td>3</td>
                                      <td class="text-capitalize">
                                        Penginapan
                                      </td>
                                      <td style="text-align: right;">
                                        {{  number_format(((int)$pengeluaran->biaya_penginapan * $pegawai), 0, ',', '.') }}
                                      </td>
                                    </tr>
                                    @endif
                                    <tr>
                                      <td></td>
                                      <td class="text-center"><b>Jumlah</b></td>
                                      <td style="text-align: right;">
                                        {{  number_format(((int)$pengeluaran->biaya_penginapan * $pegawai) + ((int)$pengeluaran->biaya_transportasi) + ((int)$pengeluaran->biaya_taksi), 0, ',', '.') }}
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <table width="90%" border="0">
                              <tbody>
                                  <tr>
                                      <td width="5%">2.</td>
                                      <td>Jumlah uang tersebut pada angka 1 diatas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia menyetorkan kelebihan tersebut ke Kas Negara</td>
                                  </tr>
                              </tbody>
                            </table><br>
                            <p>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
                            <div class="row mb-4">
                              <div class="col-lg-1"></div>
                                <div class="col-lg-6 text-;eft">
                                    Mengetahui / Menyetujui
                                    <br>
                                    Penjabat Pembuat Komitmen
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Edi Wibowo<br>
                                    NIP. 197309281995011001
                                </div>
                                <div class="col-lg-5 text-left">
                                    Penjabat Negara / Pegawai Negeri
                                    <br>
                                    yang melakukan perjalanan dinas
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    {{ $pengeluaran->sppd->pelaksana->pegawai->nama_pegawai }}<br>
                                    NIP {{ $pengeluaran->sppd->pelaksana->pegawai->nip }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END CONTENT BODY -->
                </div>

                  <!-- Table with stripped rows -->

                  <!-- End Table with stripped rows -->
                </div>
            </div>


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('NiceAdmin') }}/assets/js/main.js"></script>

  <style>
    .invoice {
      font-family: 'Times New Roman', Times, serif;
      font-size: 100%;
    }

  </style>

  <script>
    moment.locale("id");
    var tgl = $('#tgl').val();
    var tanggal = moment(tgl).format("DD MMMM YYYY");
    $('#tanggal').html(tanggal);
  </script>

</body>

</html>
@endsection
