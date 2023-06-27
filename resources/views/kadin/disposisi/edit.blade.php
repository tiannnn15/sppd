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
            <span class="d-none d-md-block ps-2">Kepala Dinas</span>
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
        <a class="nav-link collapsed" href="{{ url('kadin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('disposisi') }}">
          <i class="bi bi-envelope-check"></i>
          <span>Disposisi Surat Masuk</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('verifsppd') }}">
          <i class="bi bi-files"></i>
          <span>Verifikasi SPT SPPD</span>
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
          <li class="breadcrumb-item active">Disposisi Surat Masuk</li>
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
                    <h5 class="card-title">Edit Disposisi</h5>

                    <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nomer Surat Masuk</label>
                            <input type="text" class="form-control @error('suratmasuk_id') is-invalid @enderror" name="suratmasuk_id" value="{{ old('suratmasuk_id', $disposisi->suratmasuk_id) }}">

                            <!-- error message untuk title -->
                            @error('suratmasuk_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Pelaksana</label>
                            <input type="text" class="form-control @error('pegawai_id') is-invalid @enderror" name="pegawai_id" value="{{ old('pegawai_id', $disposisi->pegawai_id) }}">

                            <!-- error message untuk title -->
                            @error('pegawai_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{--  <div class="form-group">
                            <label class="font-weight-bold">Pengikut</label><br>
                            <select class="form-control selectpicker" multiple data-live-search="true" name="pengikut" value="{{ old('pengikut', $disposisi->pengikut) }}">
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                                @endforeach
                            </select>
                        </div>  --}}

                          <div class="form-group">
                              <label class="font-weight-bold">Tanggal Diterima</label>
                              <input type="date" class="form-control @error('tgl_diterima') is-invalid @enderror" name="tgl_diterima" value="{{ old('tgl_diterima', $disposisi->tgl_diterima) }}">

                              <!-- error message untuk title -->
                              @error('tgl_diterima')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label class="font-weight-bold">Nomer Agenda</label>
                              <input type="text" class="form-control @error('nomer_agenda') is-invalid @enderror" name="nomer_agenda" value="{{ old('nomer_agenda', $disposisi->nomer_agenda) }}">

                              <!-- error message untuk title -->
                              @error('nomer_agenda')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label class="font-weight-bold">Sifat Surat</label>
                              <input type="text" class="form-control @error('sifat_surat') is-invalid @enderror" name="sifat_surat" value="{{ old('sifat_surat', $disposisi->sifat_surat) }}">

                              <!-- error message untuk title -->
                              @error('sifat_surat')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label class="font-weight-bold">Hal Surat</label>
                              <input type="text" class="form-control @error('hal_surat') is-invalid @enderror" name="hal_surat" value="{{ old('hal_surat', $disposisi->hal_surat) }}">

                              <!-- error message untuk title -->
                              @error('hal_surat')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label class="font-weight-bold">Urgensi Surat</label>
                              <input type="text" class="form-control @error('urgensi_surat') is-invalid @enderror" name="urgensi_surat" value="{{ old('urgensi_surat', $disposisi->urgensi_surat) }}">

                              <!-- error message untuk title -->
                              @error('urgensi_surat')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="form-group">
                            <label class="font-weight-bold">Catatan</label>
                            <input type="text" class="form-control @error('catatan_disposisi') is-invalid @enderror" name="catatan_disposisi" value="{{ old('catatan_disposisi', $disposisi->catatan_disposisi) }}">

                            <!-- error message untuk title -->
                            @error('catatan_disposisi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Disposisi</label>
                            <input type="date" class="form-control @error('tgl_disposisi') is-invalid @enderror" name="tgl_disposisi" value="{{ old('tgl_disposisi', $disposisi->tgl_disposisi) }}">

                            <!-- error message untuk title -->
                            @error('tgl_disposisi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary mt-3">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>

                    </form>


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
