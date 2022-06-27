<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Data Driver</title>
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
            <h1 class="m-0">Data Driver</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Driver</li>
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
                <a href="{{ route('create-driver') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">ID</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                @foreach ($driver as $item)
                <tr>
                  <td>{{ $item->id_driver }}</td>
                  <td>
                    @if (file_exists('images/users/'.$item->id_foto.'/face.jpg')) 
                        <img src="{{ asset('images/users/'.$item->id_foto.'/face.jpg') }}"
                        class="img-thumbnail" style="height:200px;" alt="User Image">
                    @else
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                        class="img-thumbnail" alt="User Image">
                    @endif
                  </td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->tanggal_lahir }}</td>
                  <td>@if($item->jenis_kelamin == 0) Laki-laki
                    @else Perempuan
                    @endif</td>
                    <td>@if($item->status_driver == 0) Tidak Tersedia
                      @else Tersedia
                      @endif</td>
                  <td><a href="{{ url('driver/edit', $item->id_driver) }}"><i class="fas fa-edit"></i></a>
                     | <a href="{{ url('driver/delete', $item->id_driver) }}"><i class="fas fa-trash" style="color: red"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer">
              {{ $driver->links() }}
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
