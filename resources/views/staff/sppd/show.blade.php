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
                  <h5 class="card-title">Data SPT dan SPPD</h5>

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">


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
                                                <td align="center"><u>SURAT PERINTAH TUGAS</u></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Nomor : {{ $sppd->nomer_sppd }}</td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                    <table width="100%" border="0">
                                        <tbody>
                                            <tr>
                                                <td width="200">DASAR</td>
                                                <td>: {{ $sppd->dasar }}</td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                    <table width="100%" border="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">MEMERINTAHKAN</td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                    <table width="90%">
                                        <tbody>
                                            <tr>
                                                <td rowspan="4" width="200">KEPADA</td>
                                                <td width="50">: 1)</td>
                                                <td width="100">Nama </td>
                                                <td>: {{ $sppd->pelaksana->pegawai->nama_pegawai }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td width="100">Pangkat/Gol.</td>
                                                <td>: {{ $sppd->pelaksana->pegawai->pangkat }}/{{ $sppd->pelaksana->pegawai->golongan }}</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                                <td width="100">NIP</td>
                                                <td> : {{ $sppd->pelaksana->pegawai->nip }}</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                                <td width="100">Jabatan</td>
                                                <td> : {{ $sppd->pelaksana->pegawai->jabatan }}</td>
                                            </tr>
                                            @foreach ($pendamping as $item)
                                            <tr>
                                                <td rowspan="4" width="200"></td>
                                                <td width="50"> {{ $loop->iteration }})</td>
                                                <td width="100">Nama </td>
                                                <td>: {{ $item->pegawai->nama_pegawai }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td width="100">Pangkat/Gol.</td>
                                                <td>: {{ $item->pegawai->pangkat }}/{{ $item->pegawai->golongan }}</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                                <td width="100">NIP</td>
                                                <td> : {{ $item->pegawai->nip }}</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                                <td width="100">Jabatan</td>
                                                <td> : {{ $item->pegawai->jabatan }}</td>
                                            </tr>
                                            @endforeach
                                          </td>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                  <table width="100%" border="0">
                                      <tbody>
                                          <tr>
                                              <td width="200">UNTUK</td>
                                              <td>: {{ $sppd->maksud_perjalanan }}</td>
                                          </tr>
                                      </tbody>
                                  </table><br><br>
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
                                      <td>: {{ $sppd->tgl_sppd }}</td>
                                    </tr>
                                    <tr>
                                      <td height="18" colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="18">&nbsp;</td>
                                      <td colspan="3" align="center">Nganjuk, {{ $sppd->tgl_sppd }} <br>
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
                                    <table width="90%" border="0">
                                        <tbody>
                                            <tr>
                                                <td width="800"></td>
                                                <td colspan="3">Lembar Ke : {{ $sppd->lembar_ke }}</td>
                                            </tr>
                                            <tr>
                                                <td width="800"></td>
                                                <td colspan="3">Kode No : {{ $sppd->kode_no }}</td>
                                            </tr>
                                            <tr>
                                                <td width="800"></td>
                                                <td colspan="3">Nomor : {{ $sppd->nomer_sppd }}</td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                </div>
                                <div>
                                    <table class="table table-bordered" width="100%">
                                      <tbody>

                                        <tr>
                                          <td width="16"> 1.</td>
                                          <td width="350">Pejabat yang memberi perintah </td>
                                          <td colspan="2">Kepala Dinas Lingkungan Hidup Kabupaten Nganjuk</td>
                                          </tr>
                                        <tr>
                                            <td>2. </td>
                                            <td> a. Nama Pegawai yang diperintah<br>
                                              b. NIP<br></td>
                                            <td colspan="2"> a. {{ $sppd->pelaksana->pegawai->nama_pegawai }}<br>
                                              b. {{ $sppd->pelaksana->pegawai->nip }}<br></td>
                                            </tr>
                                        </tr>
                                        <tr>
                                            <td>3. </td>
                                            <td> a. Pangkat dan Golongan<br>
                                              b. Jabatan<br>
                                              c. Tingkat menurut peraturan perjalanan <br></td>
                                            <td colspan="2"> a. {{ $sppd->pelaksana->pegawai->pangkat }} ({{ $sppd->pelaksana->pegawai->golongan }})<br>
                                              b. {{ $sppd->pelaksana->pegawai->jabatan }}<br></td>
                                            </tr>
                                        </tr>
                                        <tr>
                                          <td>4. </td>
                                          <td>Maksud Perjalanan </td>
                                          <td colspan="2">{{ $sppd->maksud_perjalanan }}</td>
                                        </tr>
                                        <tr>
                                          <td>5. </td>
                                          <td>Alat angkut yang dipergunakan </td>
                                          <td colspan="2">{{ $sppd->alat_angkut }}</td>
                                        </tr>
                                        <tr>
                                          <td>6. </td>
                                          <td> a. Tempat berangkat<br>
                                            b. Tempat tujuan<br></td>
                                          <td colspan="2"> a. {{ $sppd->tempat_berangkat }}<br>
                                            b. {{ $sppd->tempat_tujuan }}<br></td>
                                          </tr>
                                        <tr>
                                          <td>7. </td>
                                          <td>
                                              a. Lamanya perjalanan dinas <br>
                                              b. Tanggal Keberangkatan <br>
                                              c. Tanggal harus kembali
                                            </td>
                                          <td colspan="2">a. {{ $sppd->lama_perjalanan }} hari<br>
                                            b. {{ date("d-m-Y", strtotime($sppd->tgl_berangkat)) }}<br>
                                            c. {{ date("d-m-Y", strtotime($sppd->tgl_kembali)) }}<br></td>
                                        </tr>

                                        <tr>
                                          <td>8. </td>
                                          <td width="400">Pengikut</td>
                                          <td>
                                          @foreach ($pendamping as $item)
                                            {{ $loop->iteration }}. <span style="text-transform: capitalize;">{{ $item->pegawai->nama_pegawai }}</span> <br>
                                          @endforeach
                                          </td>
                                        </tr>
                                        {{--  @if ($pengikut)
                                          @foreach ($pengikut as $row) <?php $no++  ?>
                                          <tr>
                                              <td>&nbsp;</td>
                                              <td>{{ $no }}. {{ $row[0] }}</td>
                                              <td>{{ $row[1] }}</td>
                                              <td>{{ $row[2] }}</td>
                                          </tr>
                                          @endforeach
                                        @else
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                        @endif  --}}
                                        <tr>
                                          <td>9. </td>
                                          <td>Pembebanan<br>
                                            a. Instansi<br>
                                            b. Mata Anggaran<br></td>
                                          <td colspan="2"> <br> a. Dinas Lingkungan Hidup Kabupaten Nganjuk<br>
                                            b.<br></td>
                                          </tr>
                                        <tr>
                                          <td>10. </td>
                                          <td>Keterangan Lain-lain</td>
                                          <td colspan="2">{{ $sppd->keterangan }}</td>
                                          </tr>
                                      </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table width="100%" height="276" border="0">
                                      <tbody>
                                        <tr>
                                          <td width="319" height="18">&nbsp;</td>
                                          <td width="74">&nbsp;</td>
                                          <td width="143">Dikeluarkan Di </td>
                                          <td width="158">: Cirebon </td>
                                        </tr>
                                        <tr>
                                          <td height="18">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>Pada Tanggal </td>
                                          <td>: {{ $sppd->tgl_sppd }}</td>
                                        </tr>
                                        <tr>
                                          <td height="18" colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td height="18">&nbsp;</td>
                                          <td colspan="3" align="center">Nganjuk, {{ $sppd->tgl_sppd }} <br>
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
                                    </table><br><br>
                                </div>
                            </div>
                        </div>


                        <div class="invoice">
                          <div class="" style="position: relative;">
                            <div>
                              <table width="100%" class="table">
                                <tbody>
                                  <tr>
                                    <td width="500"></td>
                                    <td>SPPD No <br>
                                        Berangkat dari tempat kedudukan <br>
                                        Pada tanggal <br>
                                        Ke </td>
                                  </tr>
                                  <tr>
                                    <td width="500">
                                      II. Tiba di <br>
                                      Pada tanggal <br>
                                      Kepala
                                    </td>
                                    <td>Berangkat dari <br>
                                        Ke <br>
                                        Pada tanggal <br>
                                        Kepala </td>
                                  </tr>
                                  <tr>
                                    <td width="500">
                                      III. Tiba di <br>
                                      Pada tanggal <br>
                                      Kepala
                                    </td>
                                    <td>Berangkat dari <br>
                                        Ke <br>
                                        Pada tanggal <br>
                                        Kepala </td>
                                  </tr>
                                  <tr>
                                    <td width="500">
                                      IV. Tiba di <br>
                                      Pada tanggal <br>
                                      Kepala
                                    </td>
                                    <td>Berangkat dari <br>
                                        Ke <br>
                                        Pada tanggal <br>
                                        Kepala </td>
                                  </tr>
                                  <tr>
                                    <td width="300"></td>
                                    <td>V. Tiba kembali di <br>
                                        Pada tanggal <br>
                                        Telah diperiksa dengan keterangan bahwa perjalanan tersebut di ats benar dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya. </td>
                                  </tr>
                                  <tr>
                                    <td height="18">&nbsp;</td>
                                    <td colspan="3" align="center">KEPALA DINAS LINGKUNGAN HIDUP <br>
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
                                  <tr>
                                    <td colspan = "2">VI. CATATAN LAIN-LAIN</td>
                                  </tr>
                                  <tr>
                                    <td colspan = "2">VII. PERHATIAN <br>
                                      Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan
                                      perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba serta
                                      bendaharawan bertanggung jawab berdasarkan peraturan-peraturan Keuangan
                                      Negara apabila Negara mendapat rugi akibat kesalahan, kealpaannya.</td>
                                  </tr>
                                </tbody>
                              </table>
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

  <style>
    .invoice {
      font-family: 'Times New Roman', Times, serif;
      font-size: 100%;
    }
  </style>

</body>

</html>
@endsection
