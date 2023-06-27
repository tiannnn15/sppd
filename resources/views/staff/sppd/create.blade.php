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
        <a class="nav-link" href="{{ url('sppd') }}">
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
      <a class="nav-link collapsed" href="#">
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
          <li class="breadcrumb-item active">SPT dan SPPD</li>
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

                    <form action="{{ route('sppd.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                      {{-- <div class="form-group mt-2">
                          <label class="font-weight-bold">Nomer SPPD</label>
                          <input type="text" class="form-control @error('nomer_sppd') is-invalid @enderror" name="nomer_sppd" value="{{ old('nomer_sppd') }}">

                          <!-- error message untuk title -->
                          @error('nomer_sppd')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div> --}}

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Lembar Ke</label>
                        <input type="text" class="form-control @error('lembar_ke') is-invalid @enderror" name="lembar_ke" value="{{ old('lembar_ke') }}">

                        <!-- error message untuk title -->
                        @error('lembar_ke')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Nomer Kode</label>
                        <input type="text" class="form-control @error('kode_no') is-invalid @enderror" name="kode_no" value="{{ old('kode_no') }}">

                        <!-- error message untuk title -->
                        @error('kode_no')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Maksud Perjalanan</label>
                        <input type="text" class="form-control @error('maksud_perjalanan') is-invalid @enderror" name="maksud_perjalanan" value="{{ old('maksud_perjalanan') }}">

                        <!-- error message untuk title -->
                        @error('maksud_perjalanan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Alat Angkut</label>
                        <input type="text" class="form-control @error('alat_angkut') is-invalid @enderror" name="alat_angkut" value="{{ old('alat_angkut') }}">

                        <!-- error message untuk title -->
                        @error('alat_angkut')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Tempat Berangkat</label>
                        <input type="text" class="form-control @error('tempat_berangkat') is-invalid @enderror" name="tempat_berangkat" value="{{ old('tempat_berangkat') }}">

                        <!-- error message untuk title -->
                        @error('tempat_berangkat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label for="provinsi">Provinsi Tempat Tujuan</label>
                        <select class="form-control selectpicker border border-dark" required name="provinsi" id="provinsi"data-size="5" data-live-search="true" title="Pilih Provinsi Tempat Tujuan">
                          @foreach ($provinsi as $item)
                            @if (old('provinsi') == $item->id)
                              <option value="{{ $item->id }}" selected="selected">{{ $item->nama_provinsi }}</option>
                            @else
                              <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('provinsi')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>


                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Tempat Tujuan</label>
                        <input type="text" class="form-control @error('tempat_tujuan') is-invalid @enderror" name="tempat_tujuan" value="{{ old('tempat_tujuan') }}">

                        <!-- error message untuk title -->
                        @error('tempat_tujuan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label class="font-weight-bold">Lama Perjalanan</label>
                        <input type="number" class="form-control @error('lama_perjalanan') is-invalid @enderror" name="lama_perjalanan" value="{{ old('lama_perjalanan') }}">

                        <!-- error message untuk title -->
                        @error('lama_perjalanan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Tanggal Berangkat</label>
                            <input type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" name="tgl_berangkat" value="{{ old('tgl_berangkat') }}">

                            <!-- error message untuk title -->
                            @error('tgl_berangkat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali" value="{{ old('tgl_kembali') }}">

                            <!-- error message untuk title -->
                            @error('tgl_kembali')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        {{-- <div class="form-group" id="table">
                            <label for="exampleDataList" class="form-label">Pelaksana</label> --}}
                            {{--  <td><input type="text" name="inputs[0][pegawai_id]" placeholder="cari..." class="form-control"></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add more</button></td>  --}}

                            {{-- <input type="text" class="form-control @error('pegawai_id') is-invalid @enderror" name="pegawai_id" value="{{ old('pegawai_id') }}" list="datalistOptions" id="exampleDataList" placeholder="Cari pegawai..."> --}}
                            {{--  <button type="button" name="add" id="add" class="btn btn-success">Add more</button>  --}}
                            {{-- <datalist id="datalistOptions">
                                <option value="">Select pegawai</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                                @endforeach
                            </datalist>
                        </div> --}}

                        <div class="form-group mt-2">
                          <label for="pelaksana">Pegawai Pelaksana</label>
                          <select class="form-control selectpicker border border-dark" required name="pelaksana" id="pelaksana"data-size="5" data-live-search="true" title="Pilih Pegawai Pelaksana">
                            @foreach ($pegawai as $item)
                              @if (old('pelaksana') == $item->id)
                                <option value="{{ $item->id }}" selected="selected">{{ $item->nama_pegawai }}</option>
                              @else
                                <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('pelaksana')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>

                       <div class="form-group mt-2">
                        <label for="pengikut">Pegawai Pendamping (Optional)</label>
                        <select class="form-control selectpicker border border-dark" required name="pengikut[]" id="pengikut" multiple="multiple" data-size="5" data-live-search="true" title="Pilih Pegawai Pendamping" data-prefix="Pegawai Pendamping: " data-dropup-auto="false" data-dropdown-direction="down">
                            {{--  <option value="">-</option>  --}}
                            @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                          @endforeach
                        </select>
                       </div>

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">

                            <!-- error message untuk title -->
                            @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Tanggal SPPD</label>
                            <input type="date" class="form-control @error('tgl_sppd') is-invalid @enderror" name="tgl_sppd" value="{{ old('tgl_sppd') }}">

                            <!-- error message untuk title -->
                            @error('tgl_sppd')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Dasar</label>
                            <input type="text" class="form-control @error('dasar') is-invalid @enderror" name="dasar" value="{{ old('dasar') }}">

                            <!-- error message untuk title -->
                            @error('dasar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{--  <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}">

                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  --}}

                        <div class="form-group mt-2">
                            <label class="font-weight-bold">Status</label>
                            {{--  <input type="text" class="form-control @error('sifat_surat') is-invalid @enderror" name="sifat_surat" value="{{ old('sifat_surat') }}">  --}}
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

                        <button type="submit" class="btn btn-md btn-primary mt-3">AJUKAN</button>
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

  <script>
  $('.pengikut').selectpicker({
    dropupAuto: false
  });
  </script>
  <!-- Vendor JS Files -->

  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
  {{-- <script>
    $(document).ready(function() {
        $('.inputbox').select2();
    });
  </script>
  <script>
    $(document).ready(function() {

        $('select').selectpicker();

    });
    </script> --}}
    {{--  <script>
        var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `<tr>
                    <td>
                        <input type="text" name="inputs[`+i+`][pegawai_id]" placeholder="tambah pegawai" class="form-control"></input>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-table-row">
                            remove
                        </button>
                    </td>
                </tr>`);
        });
        $(document).on('click', '.remove-table-row', function(){
            $(this).parents('tr').remove();
        });
    </script>  --}}
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


