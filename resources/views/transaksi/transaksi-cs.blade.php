<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Daftar Transaksi</title>
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
            <h1 class="m-0">Daftar Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Transaksi</li>
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
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">ID Transaksi</th>
                  <th>Mobil</th>
                  <th>Driver</th>
                  <th>Promo</th>
                  <th>Tanggal Sewa</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status Transaksi</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                @foreach ($transaksi as $item)
                <tr>
                  <td>{{ $item->id_transaksi }}</td>
                  @foreach ($mobil as $car)
                    @if ($item->id_mobil == $car->id_mobil)
                    <td>{{ $car->nama_mobil }}</td>
                    @endif
                  @endforeach
                  @foreach( $driver as $driv)
                    @if( $item->id_driver == $driv->id_driver)
                    <td>{{ $driv->nama }}</td>
                    @else
                    <td></td>
                    @endif
                  @endforeach
                  @foreach( $promo as $promos)
                    @if( $item->id_promo == $promos->id_promo)
                    <td>{{ $promos->kode_promo }} </td>
                    @else
                    {{-- <td></td> --}}
                    @endif
                  @endforeach
                  <td>{{ $item->tanggal_waktu_mulai_sewa}}</td>
                  <td>{{ $item->tanggal_waktu_akhir_sewa}}</td>
                  <td>{{ $item->status_transaksi}}</td>
                  <td><a href="{{ url('transaksi/edit', $item->id_transaksi) }}" class="btn btn-primary">Update Status</a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer">
              {{-- {{ $transaksi->links() }} --}}
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
