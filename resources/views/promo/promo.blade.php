<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Data Promo</title>
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
            <h1 class="m-0">Data Promo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Promo</li>
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
          @if(auth()->user()->access_level == "manager")
            <div class="card-header">
              <div class="card-tools">
                <a href="{{ route('create-promo') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>
          @endif
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">ID</th>
                  <th>Kode promo</th>
                  <th>Jenis Promo</th>
                  <th>Status Promo</th>
                  <th>Keterangan</th>
                  <th>Diskon (%)</th>
                  @if(auth()->user()->access_level == "manager")
                  <th style="width: 80px">Aksi</th>
                  @endif
                </tr>
                @foreach ($promo as $item)
                <tr>
                  <td>{{ $item->id_promo }}</td>
                  <td>{{ $item->kode_promo }}</td>
                  <td>{{ $item->jenis_promo }}</td>
                  <td>@if($item->status_promo == 1) Active
                    @elseif ($item->status_promo == 2) Inactive
                    @endif</td>
                  <td>{{ $item->keterangan}}</td>
                  <td>{{ $item->diskon}}</td>
                  @if(auth()->user()->access_level == "manager")
                  <td><a href="{{ url('promo/edit', $item->id_promo) }}"><i class="fas fa-edit"></i></a>
                     | <a href="{{ url('promo/delete', $item->id_promo) }}"><i class="fas fa-trash" style="color: red"></i></a></td>
                  @endif
                </tr>
                @endforeach
              </table>
            </div>
            <div class="card-footer">
              {{ $promo->links() }}
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
