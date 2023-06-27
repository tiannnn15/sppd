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
        <a class="nav-link" href="{{ url('laporan') }}">
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
          <li class="breadcrumb-item active">Dashboard</li>
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
                    <h5 class="card-title">Buat Laporan</h5>

                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mt-2">
                            <label for="sppd">Nomor SPPD</label>
                            <select class="form-control selectpicker border border-dark" required name="sppd_id" id="sppd" data-size="5" data-live-search="true" title="Pilih Nomor SPPD">
                              @foreach ($sppd as $item)
                                @if (old('sppd') == $item->id)
                                  <option value="{{ $item->id }}" selected="selected">{{ $item->nomer_sppd }}</option>
                                @else
                                  <option value="{{ $item->id }}">{{ $item->nomer_sppd }}</option>
                                @endif
                              @endforeach
                            </select>

                          </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Laporan Tentang</label>
                            <input type="text" class="form-control @error('laporan_tentang') is-invalid @enderror" name="laporan_tentang" value="{{ old('laporan_tentang') }}">

                            <!-- error message untuk title -->
                            @error('laporan_tentang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Latar Belakang</label>
                            <input type="text" class="form-control @error('latar_belakang') is-invalid @enderror" name="latar_belakang" value="{{ old('latar_belakang') }}">

                            <!-- error message untuk title -->
                            @error('latar_belakang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Landasan</label>
                            <input type="text" class="form-control @error('landasan') is-invalid @enderror" name="landasan" value="{{ old('landasan') }}">

                            <!-- error message untuk title -->
                            @error('landasan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Maksud dan Tujuan</label>
                            <input type="text" class="form-control @error('maksud_tujuan') is-invalid @enderror" name="maksud_tujuan" value="{{ old('maksud_tujuan') }}">

                            <!-- error message untuk title -->
                            @error('maksud_tujuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan yang dilakukan</label>
                            <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{ old('kegiatan') }}">

                            <!-- error message untuk title -->
                            @error('kegiatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Hal yang dicapai</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" name="perihal" value="{{ old('perihal') }}">

                            <!-- error message untuk title -->
                            @error('perihal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kesimpulan dan Saran</label>
                            <input type="text" class="form-control @error('kesimpulan') is-invalid @enderror" name="kesimpulan" value="{{ old('kesimpulan') }}">

                            <!-- error message untuk title -->
                            @error('kesimpulan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Laporan</label>
                            <input type="date" class="form-control @error('tgl_laporan') is-invalid @enderror" name="tgl_laporan" value="{{ old('tgl_laporan') }}">

                            <!-- error message untuk title -->
                            @error('tgl_laporan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Penutup</label>
                            <input type="text" class="form-control @error('penutup') is-invalid @enderror" name="penutup" value="{{ old('penutup') }}">

                            <!-- error message untuk title -->
                            @error('penutup')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}">
                              <option selected>Pilih</option>
                              <option value="Mengajukan">Mengajukan</option>
                            </select>
                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}" id="gambar"
                            accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">

                            <!-- error message untuk title -->
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-3"><img src="" id="output" width="500"></div>

                        <button type="submit" class="btn btn-md btn-primary mt-3">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>

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
