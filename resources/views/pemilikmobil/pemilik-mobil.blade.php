<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Data Pemilik Mobil</title>
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
            <h1 class="m-0">Data Pemilik Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pemilik Mobil</li>
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
              <div class="card-tools">
                <a href="{{ route('create-pemilik') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th>Nomor KTP</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                @foreach ($pemilikMobil as $item)
                <tr>
                  <td>{{ $item->id_pemilik }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->nomor_telepon }} </td>
                  <td>{{ $item->nomor_ktp}}</td>
                  <td><a href="{{ url('pemilik/edit', $item->id_pemilik) }}"><i class="fas fa-edit"></i></a>
                     | <a href="{{ url('pemilik/delete', $item->id_pemilik) }}"><i class="fas fa-trash" style="color: red"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer">
              {{ $pemilikMobil->links() }}
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
