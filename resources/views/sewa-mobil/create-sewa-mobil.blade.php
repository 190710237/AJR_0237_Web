<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Sewa Mobil</title>
    @include('templates.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('templates.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('templates.sidebar')
  <!-- /.sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sewa Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sewa Mobil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card card-info card-outline">
          <div class="card-header">
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                {{-- <th>ID</th> --}}
                <th>Foto</th>
                <th>Nama Mobil</th>
                <th>Tipe Mobil</th>
                <th style="width: 40px">Transmisi</th>
                {{-- <th>Bahan Bakar</th> --}}
                {{-- <th>Volume Bahan Bakar</th> --}}
                <th>Warna Mobil</th>
                {{-- <th>Kapasitas</th> --}}
                {{-- <th>Fasilitas</th> --}}
                <th>No. Plat</th>
                {{-- <th>No. STNK</th> --}}
                <th>Harga Sewa</th>
                {{-- <th>Tanggal Servis Terakhir</th>
                <th>Periode Kontrak Mulai</th>
                <th>Periode Kontrak Akhir</th> --}}
                <th style="width: 80px">Aksi</th>
              </tr>
              @foreach ($mobil as $item)
              <tr>
                {{-- <td>{{ $item->id_mobil }}</td> --}}
                <td>
                  @if (file_exists('images/mobils/'.$item->id_mobil.'.jpg')) 
                    <img src="{{ asset('images/mobils/'.$item->id_mobil.'.jpg') }}"
                    class="img-thumbnail" style="height:200px;" alt="Mobil Image">
                  @else
                    <img src="{{ asset('adminlte/dist/img/car.jpg') }}"
                    class="img-thumbnail" alt="Mobil Image">
                  @endif
                </td>
                <td>{{ $item->nama_mobil }}</td>
                <td>{{ $item->tipe_mobil }}</td>
                <td>{{ $item->jenis_transmisi }}</td>
                <td>{{ $item->warna_mobil }}</td>
                <td>{{ $item->pelat_nomor }}</td>
                <td>{{ $item->harga_sewa }}</td>
                <td><a href="{{ url('transaksi/create', $item->id_mobil) }}" class="btn btn-primary">Sewa Mobil</a>
              </tr>
              @endforeach
            </table>
          </div>
          <div class="card-footer">
            {{ $mobil->links() }}
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('templates.r-sidebar')
  <!-- /.control-sidebar -->
  
  <!-- Main Footer -->
  @include('templates.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('templates.scripts')

</body>
</html>