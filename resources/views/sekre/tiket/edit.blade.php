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
            <span class="d-none d-md-block ps-2">Sekretaris</span>
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
        <a class="nav-link collapsed" href="{{ url('sekre') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('pegawai') }}">
          <i class="bi bi-person-add"></i>
          <span>Data Master Pegawai</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('biaya') }}">
          <i class="bi bi-cash"></i>
          <span>Data Master Biaya</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('transportasi') }}">
        <i class="bi bi-bus-front"></i>
        <span>Data Master Transport</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('penginapan') }}">
        <i class="bi bi-house-door"></i>
        <span>Data Master Penginapan</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('tiket') }}">
          <i class="bi bi-taxi-front"></i>
          <span>Data Master Tiket</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-envelope-paper"></i>
          <span>Surat Masuk</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('sekre') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Tiket</li>
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
                  <h5 class="card-title">Edit Data Tiket</h5>

                  <form action="{{ route('tiket.update', $tiket->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="form-group">
                          <label class="font-weight-bold">Kota Asal</label>
                          <input type="text" class="form-control @error('kota_asal') is-invalid @enderror" name="kota_asal" value="{{ old('kota_asal', $tiket->kota_asal) }}">

                          <!-- error message untuk title -->
                          @error('kota_asal')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Kota Tujuan</label>
                          <input type="text" class="form-control @error('kota_tujuan') is-invalid @enderror" name="kota_tujuan" value="{{ old('kota_tujuan', $tiket->kota_tujuan) }}">

                          <!-- error message untuk title -->
                          @error('kota_tujuan')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Tiket Bisnis</label>
                          <input type="text" class="form-control @error('tiket_bisnis') is-invalid @enderror" name="tiket_bisnis" value="{{ old('tiket_bisnis', $tiket->tiket_bisnis) }}">

                          <!-- error message untuk title -->
                          @error('tiket_bisnis')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Tiket Ekonomi</label>
                          <input type="text" class="form-control @error('tiket_ekonomi') is-invalid @enderror" name="tiket_ekonomi" value="{{ old('tiket_ekonomi', $tiket->tiket_ekonomi) }}">

                          <!-- error message untuk title -->
                          @error('tiket_ekonomi')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <button type="submit" class="btn btn-md btn-primary mt-3">UPDATE</button>
                      <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>

                  </form>

                  <!-- End Table with stripped rows -->
                  {{--  {{ $pegawai->links() }}  --}}
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

  <script>
    //message with toastr
    @if(session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>

</body>

</html>
@endsection
