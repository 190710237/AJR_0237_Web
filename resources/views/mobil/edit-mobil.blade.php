<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Edit Mobil</title>
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
            <h1 class="m-0">Edit Data Mobil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Mobil</a></li>
              <li class="breadcrumb-item active">Edit Data Mobil</li>
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
                            action="{{ url('mobil/update', $mobil->id_mobil) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="id_mobil">ID Mobil</label>
                                    <input type="text" class="form-control" id="id_mobil" name="id_mobil" placeholder="ID Mobil" value="{{ $mobil->id_mobil }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mobil">Nama Mobil</label>
                                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Nama Mobil" value="{{ $mobil->nama_mobil }}">
                                </div>
                                <div class="form-group">
                                    <label for="tipe_mobil">Tipe Mobil</label>
                                    <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" placeholder="Tipe Mobil" value="{{ $mobil->tipe_mobil }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_transmisi">Jenis Transmisi</label>
                                    <input type="text" class="form-control" id="jenis_transmisi" name="jenis_transmisi" placeholder="Jenis Transmisi" value="{{ $mobil->jenis_transmisi }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_bahan_bakar">Jenis Bahan Bakar</label>
                                    <input type="text" class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" placeholder="Jenis Bahan Bakar" value="{{ $mobil->jenis_bahan_bakar }}">
                                </div>
                                <div class="form-group">
                                    <label for="volume_bahan_bakar">Volume Bahan Bakar (Liter)</label>
                                    <input type="number" class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" placeholder="Volume Bahan Bakar" value="{{ $mobil->volume_bahan_bakar }}">
                                </div>
                                <div class="form-group">
                                    <label for="warna_mobil">Warna Mobil</label>
                                    <input type="text" class="form-control" id="warna_mobil" name="warna_mobil" placeholder="Warna Mobil" value="{{ $mobil->warna_mobil }}">
                                </div>
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas</label>
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" value="{{ $mobil->kapasitas }}">
                                </div>
                                <div class="form-group">
                                    <label for="pelat_nomor">Plat Nomor</label>
                                    <input type="text" class="form-control" id="pelat_nomor" name="pelat_nomor" placeholder="Pelat Nomor" value="{{ $mobil->pelat_nomor }}">
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas</label>
                                    <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Fasilitas" value="{{ $mobil->fasilitas }}">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_stnk">No. STNK</label>
                                    <input type="text" class="form-control" id="nomor_stnk" name="nomor_stnk" placeholder="No. STNK" value="{{ $mobil->nomor_stnk }}">
                                </div>
                                <div class="form-group">
                                    <label for="harga_sewa">Harga Sewa</label>
                                    <input type="text" class="form-control" id="harga_sewa" name="harga_sewa" placeholder="Harga Sewa" value="{{ $mobil->harga_sewa }}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori_aset">Kategori Aset</label>
                                            <select class="custom-select rounded-0" id="kategori_aset"
                                                name="kategori_aset">
                                                <option value="0" 
                                                    @if($mobil->kategori_aset == 0) selected="selected"
                                                    @endif>Perusahaan</option>
                                                <option value="1" 
                                                    @if($mobil->kategori_aset == 1) selected="selected"
                                                    @endif>Kontrak</option>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_servis_terakhir">Tanggal Servis Terakhir</label>
                                    <input type="date" class="form-control" id="tanggal_servis_terakhir"
                                        name="tanggal_servis_terakhir" value="{{ $mobil->tanggal_servis_terakhir }}">
                                </div>
                                <div class="form-group">
                                    <label for="periode_kontrak_mulai">Tanggal Mulai Kontrak</label>
                                    <input type="date" class="form-control" id="periode_kontrak_mulai"
                                        name="periode_kontrak_mulai" value="{{ $mobil->periode_kontrak_mulai }}">
                                </div>
                                <div class="form-group">
                                    <label for="periode_kontrak_akhir">Tanggal Akhir Kontrak</label>
                                    <input type="date" class="form-control" id="periode_kontrak_akhir"
                                        name="periode_kontrak_akhir" value="{{ $mobil->periode_kontrak_akhir }}">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Mobil</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto"
                                            name="foto">
                                        <label class="custom-file-label">Choose
                                            file</label>
                                    </div>
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
