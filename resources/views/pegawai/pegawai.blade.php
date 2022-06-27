<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Data Pegawai</title>
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
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
                <a href="{{ route('create-pegawai') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">ID</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                @foreach ($pegawai as $item)
                <tr>
                  <td>{{ $item->id_pegawai }}</td>
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
                  <td>@if($item->id_role == 1) Manager
                    @elseif ($item->id_role == 2) Admin
                    @else Customer Service
                    @endif</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->tanggal_lahir }}</td>
                  <td>@if($item->jenis_kelamin == 0) Laki-laki
                    @else Perempuan
                    @endif</td>
                  <td><a href="{{ url('pegawai/edit', $item->id_pegawai) }}"><i class="fas fa-edit"></i></a>
                     | <a href="{{ url('pegawai/delete', $item->id_pegawai) }}"><i class="fas fa-trash" style="color: red"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer">
              {{ $pegawai->links() }}
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
