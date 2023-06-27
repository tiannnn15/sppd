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
        <a class="nav-link" href="{{ url('veriflaporan') }}">
          <i class="bi bi-envelope-check"></i>
          <span>Verifikasi Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('verifkwitansi') }}">
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Laporan</h5>

                  <div class="invoice">
                    <div class="" style="position: relative;">
                        <div>
                            <table width="90%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="266" rowspan="6"><img src="{{ asset('NiceAdmin') }}/assets/img/Logo Nganjuk monocrome.jpg" width="75" alt=""/></td>
                                        <td width="1100" align="center"><strong>PEMERINTAH DAERAH KABUPATEN NGANJUK</strong></td>
                                      </tr>
                                      <tr>
                                          <td align="center"><strong>DINAS LINGKUNGAN HIDUP</strong></td>
                                      </tr>
                                      <tr>
                                          <td align="center">Jalan Raya Kedondong Nomor 01 Nganjuk Kode Pos 64461</td>
                                      </tr>
                                      <tr>
                                          <td align="center">Telepon (0358) 328380 / Fax (0358) 328475</td>
                                      </tr>
                                </tbody>
                            </table>
                            <hr size="5">
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td align="center">LAPORAN</td>
                                    </tr>
                                    <tr>
                                        <td align="center">TENTANG</td>
                                    </tr>
                                    <tr>
                                        <td align="center">{{ $laporan->laporan_tentang }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="200" align="right">I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>PENDAHULUAN</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>A. Umum/latar belakang</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $laporan->latar_belakang }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>B. Landasan Hukum</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $laporan->landasan }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>C. Maksud dan Tujuan</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $laporan->maksud_tujuan }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="200" align="right">II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>Kegiatan yang dilaksanakan</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>{{ $laporan->kegiatan }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="200" align="right">III&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>Hal yang dicapai</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>{{ $laporan->perihal }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="200" align="right">IV&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>Kesimpulan dan saran</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>{{ $laporan->kesimpulan }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                        <div>
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td width="200" align="right">V&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>Penutup</td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td>{{ $laporan->penutup }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                      <div>
                        <table width="100%" height="276" border="0">
                          <tbody>
                            <tr>
                              <td width="319" height="18">&nbsp;</td>
                              <td width="74">&nbsp;</td>
                              <td width="143">Dikeluarkan Di </td>
                              <td width="158">: Nganjuk </td>
                            </tr>
                            <tr>
                              <td height="18">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>Pada Tanggal </td>
                              <td>: </td>
                            </tr>
                            <tr>
                              <td height="18" colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="18">&nbsp;</td>
                              <td colspan="3" align="center">Nganjuk,  <br>
                                KEPALA DINAS LINGKUNGAN HIDUP <br>
                                KABUPATEN NGANJUK</td>
                            </tr>
                            <tr>
                              <td height="76" colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="18">&nbsp;</td>
                              <td colspan="3" align="center"><u>SUBANI, SH., MM. </u></td>
                            </tr>
                            <tr>
                              <td height="18">&nbsp;</td>
                              <td colspan="3" align="center">Pembina Utama Muda</td>
                            </tr>
                            <tr>
                              <td height="18">&nbsp;</td>
                              <td colspan="3" align="center">NIP. 196910051989031007</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    </div>
                </div><br><br>

                </div>


            </div>

            <div class="card">
                <div class="card-body">
                    <br><h5>Dokumentasi Kegiatan</h5>
                    <br>
                    <div>
                        <img src="{{ asset($laporan->gambar) }}" width="500">
                    </div>
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
