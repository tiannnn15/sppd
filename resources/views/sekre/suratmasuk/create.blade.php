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
        <a class="nav-link collapsed" href="{{ url('tiket') }}">
          <i class="bi bi-taxi-front"></i>
          <span>Data Master Tiket</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('suratmasuk') }}">
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
          <li class="breadcrumb-item active">Data Surat Masuk</li>
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
                  <h5 class="card-title">Tambah Data Surat Masuk</h5>

                  <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                          <label class="font-weight-bold">Sifat Surat</label>
                          {{--  <input type="text" class="form-control @error('sifat_surat_masuk') is-invalid @enderror" name="sifat_surat_masuk" value="{{ old('sifat_surat_masuk') }}">  --}}
                          <select class="form-control @error('sifat_surat_masuk') is-invalid @enderror" name="sifat_surat_masuk" value="{{ old('sifat_surat_masuk') }}">
                            <option selected>Pilih salah satu</option>
                            <option value="Penting">Penting</option>
                            <option value="Segera">Segera</option>
                          </select>
                          <!-- error message untuk title -->
                          @error('sifat_surat_masuk')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Nomer Surat</label>
                          <input type="text" class="form-control @error('nomer_surat_masuk') is-invalid @enderror" name="nomer_surat_masuk" value="{{ old('nomer_surat_masuk') }}">

                          <!-- error message untuk title -->
                          @error('nomer_surat_masuk')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Tanggal Surat</label>
                          <input type="date" class="form-control @error('tgl_surat_masuk') is-invalid @enderror" name="tgl_surat_masuk" value="{{ old('tgl_surat_masuk') }}">

                          <!-- error message untuk title -->
                          @error('tgl_surat_masuk')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="font-weight-bold">Ditujukan Kepada</label>
                          <input type="text" class="form-control @error('ditujukan_kepada') is-invalid @enderror" name="ditujukan_kepada" value="{{ old('ditujukan_kepada') }}">

                          <!-- error message untuk title -->
                          @error('ditujukan_kepada')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label class="font-weight-bold">Pengirim</label>
                        <input type="text" class="form-control @error('instansi_pengirim') is-invalid @enderror" name="instansi_pengirim" value="{{ old('instansi_pengirim') }}">

                        <!-- error message untuk title -->
                        @error('instansi_pengirim')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Perihal</label>
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" name="perihal" value="{{ old('perihal') }}">

                        <!-- error message untuk title -->
                        @error('perihal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}">
                          <option selected>Pilih</option>
                          <option value="Belum Didisposisi">Belum Didisposisi</option>
                        </select>
                        <!-- error message untuk title -->
                        @error('status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                      <button type="submit" class="btn btn-md btn-primary mt-3">SIMPAN</button>
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
