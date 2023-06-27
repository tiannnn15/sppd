@extends('layouts.main')

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
            <span class="d-none d-md-block ps-2">Bendahara</span>
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
        <a class="nav-link collapsed" href="{{ url('bend') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('veriflaporan') }}">
          <i class="bi bi-envelope-check"></i>
          <span>Verifikasi Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('verifkwitansi') }}">
          <i class="bi bi-files"></i>
          <span>Verifikasi Kwitansi</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('verifpengeluaran') }}">
            <i class="bi bi-cash-coin"></i>
          <span>Verifikasi Pengeluaran</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Verifikasi Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <div class="page-content">
                            <div class="invoice">
                                <div class="mt-2" style="position: relative;">
                                    <div>
                                        <table width="90%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="750"></td>
                                                    <td colspan="3">Lembar Ke : {{ $kwitansi->lembar_ke }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="750"></td>
                                                    <td colspan="3">Bukti Kas No : {{ $kwitansi->no_kas }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="750"></td>
                                                    <td colspan="3">Kode Rekening : {{ $kwitansi->kode_rekening }}</td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                    </div>
                                </div>
                                <h4 class="text-center"><b>KWITANSI</b></h4>
                                <p class="text-center"><b>DAFTAR PENERIMAAN PERJALANAN DINAS LUAR DAERAH</b></p>
                                <div>
                                    <table width="90%" border="0">
                                        <tbody>
                                            <tr>
                                                <td width="40%">Sudah Terima Dari</td>
                                                <td> : {{ $kwitansi->terima_dari }}</td>
                                            </tr>
                                            <tr>
                                                <td width="40%">Banyaknya Uang</td>
                                                <td> : <b> {{ $kwitansi->banyaknya_uang }}</b> </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">Untuk Pembayaran</td>
                                                <td> : {{ $kwitansi->untuk_pembayaran }} </td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                    <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th width="15%">Nama</th>
                                                <th width="20%">Tujuan</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="15%">Rincian</th>
                                                <th width="15%">Jumlah Yang Diterima</th>
                                                <th width="20%">Tanda Tangan</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>{{ $kwitansi->nama_pegawai }}</td>
                                            <td>{{ $kwitansi->tempat_tujuan }}</td>
                                            <td>{{ date("d-m-Y", strtotime($kwitansi->tgl_sppd)) }}</td>
                                            <td> {{ $kwitansi->lama_perjalanan }} Hari x  {{  number_format((int)$kwitansi->rincian, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                Rp. {{  number_format((int)$kwitansi->jumlah_diterima, 0, ',', '.') }}
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="text-center"><b>Jumlah</b></td>
                                            <td>
                                                Rp. {{  number_format((int)$kwitansi->jumlah_diterima, 0, ',', '.') }}
                                            </td>
                                            <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-8"></div>
                                    <div class="col-lg-4">Lunas dibayar Tanggal</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-4 text-center">
                                        Mengetahui
                                        <br>
                                        Pengguna Anggaran
                                        <br>
                                        <br>
                                        <br>
                                        <b><u>{{ $kwitansi->nama_pegawai }}</u></b><br>
                                        NIP. {{ $kwitansi->nip }}
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        Menyetujui
                                        <br>
                                        PPTK-OPD
                                        <br>
                                        <br>
                                        <br>
                                        <b><u>AGUS HARIYADI, ST</u></b><br>
                                        NIP. 19770331 201001 1 001
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        Bendahara Pengeluaran
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <b><u>YUSNIANTO, SE</u></b><br>
                                        NIP. 19920510 2022012 1 005
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

</body>

</html>
@endsection

