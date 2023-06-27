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

  {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">  --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
  <link rel="{{ asset('NiceAdmin') }}/assets/select/bootstrap-select/bootstrap-select.css">
  <script src="{{ asset('NiceAdmin') }}/assets/select/bootstrap-select/bootstrap-select.js"></script>
  <script src="{{ asset('NiceAdmin') }}/assets/select/bootstrap-select/defaults-id_ID.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      <a class="nav-link" href="{{ url('kwitansi') }}">
        <i class="bi bi-bus-front"></i>
        <span>Kwitansi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('pengeluaran') }}">
        <i class="bi bi-person-add"></i>
        <span>Pengeluaran Riil</span>
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
          <li class="breadcrumb-item active">Kwitansi</li>
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
                    <h5 class="card-title">Buat SPT dan SPPD</h5>

                    <form action="{{ route('kwitansi.update', $kwitansi->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group mt-2">
                        <label for="sppd">Nomor SPPD</label>
                        <input type="text" class="form-control" name="sspd_id" value="{{ old('nomer_sppd', $kwitansi->sppd->nomer_sppd) }}" readonly>

                      </div>


                      <div class="form-group mt-2">
                          <label class="font-weight-bold">Lembar Ke</label>
                          <input type="text" class="form-control @error('lembar_ke') is-invalid @enderror" name="lembar_ke" value="{{ old('lembar_ke', $kwitansi->lembar_ke) }}">

                          <!-- error message untuk title -->
                          @error('lembar_ke')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Bukti Kas no</label>
                        <input type="text" class="form-control @error('no_kas') is-invalid @enderror" name="no_kas" value="{{ old('no_kas', $kwitansi->no_kas) }}">

                        <!-- error message untuk title -->
                        @error('no_kas')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Nomor Rekening</label>
                        <input type="text" class="form-control @error('kode_rekening') is-invalid @enderror" name="kode_rekening" value="{{ old('kode_rekening', $kwitansi->kode_rekening) }}">

                        <!-- error message untuk title -->
                        @error('kode_rekening')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Sudah Diterima dari</label>
                        <input type="text" class="form-control @error('terima_dari') is-invalid @enderror" name="terima_dari" value="{{ old('terima_dari', $kwitansi->terima_dari) }}">

                        <!-- error message untuk title -->
                        @error('terima_dari')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Banyaknya Uang</label>
                        <input type="text" class="form-control @error('banyaknya_uang') is-invalid @enderror" name="banyaknya_uang" value="{{ old('banyaknya_uang', $kwitansi->banyaknya_uang) }}">

                        <!-- error message untuk title -->
                        @error('banyaknya_uang')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Untuk Pembayaran</label>
                        <input type="text" class="form-control @error('untuk_pembayaran') is-invalid @enderror" name="untuk_pembayaran" value="{{ old('untuk_pembayaran', $kwitansi->untuk_pembayaran) }}">

                        <!-- error message untuk title -->
                        @error('untuk_pembayaran')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}">
                              @if ($kwitansi->status == 'Mengajukan')
                                <option>Pilih</option>
                                <option value="Mengajukan" selected>Mengajukan</option>
                              @else
                                <option selected>Pilih</option>
                                <option>Mengajukan</option>
                              @endif
                            </select>
                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                    </form>

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

  <script>
  $('.pengikut').selectpicker({
    dropupAuto: false
  });
  </script>
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


