<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | New Pemilik Mobil</title>
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
            <h1 class="m-0">Create Data Promo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Promo</a></li>
              <li class="breadcrumb-item active">Create Data Promo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        {{-- <div class="card-header">
                            <h3 class="card-title">placeholder</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            action="{{ url('promo/update', $promo->id_promo) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="kode_promo">Kode Promo</label>
                                    <input type="text" class="form-control" id="kode_promo" name="kode_promo" placeholder="Kode Promo"
                                    value="{{ $promo->kode_promo }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_promo">Jenis Promo</label>
                                    <input type="text" class="form-control" id="jenis_promo" name="jenis_promo"
                                        placeholder="Jenis Promo" value="{{ $promo->jenis_promo }}">
                                </div>
                                <div class="form-group">
                                    <label for="status_promo">Status Promo</label>
                                    <select class="custom-select rounded-0" id="status_promo"
                                        name="status_promo">
                                        <option value="1"
                                        @if($promo->status_promo == 1) selected="selected"
                                        @endif>Active</option>
                                        <option value="2"
                                        @if($promo->status_promo == 2) selected="selected"
                                        @endif>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan Promo" value="{{ $promo->keterangan }}">
                                </div>
                                <div class="form-group">
                                    <label for="diskon">Diskon (dalam %)</label>
                                    <input type="text" class="form-control" id="diskon" name="diskon"
                                        placeholder="1-99" value="{{ $promo->diskon }}">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
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
