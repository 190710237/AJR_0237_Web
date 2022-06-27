<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AdminLTE 3 | Starter</title>
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
            <h1 class="m-0">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sewa Mobil</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_mobil">Foto Mobil</label><br>
                                    
                                    @if (file_exists('images/mobils/'.$mobil->id_mobil.'.jpg')) 
                                        <img src="{{ asset('images/mobils/'.$mobil->id_mobil.'.jpg') }}"
                                        class="img-thumbnail" style="height:200px;" alt="Mobil Image">
                                    @else
                                        <img src="{{ asset('adminlte/dist/img/car.jpg') }}"
                                        class="img-thumbnail" alt="Mobil Image">
                                    @endif
                                    
                                </div>
                                <div class="form-group">
                                    <label for="nama_mobil">Nama Mobil</label>
                                    <p class="card-text">{{ $mobil->nama_mobil }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tipe_mobil">Tipe Mobil</label>
                                    <p class="card-text">{{ $mobil->tipe_mobil }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_transmisi">Jenis Transmisi</label>
                                    <p class="card-text">{{ $mobil->jenis_transmisi }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_bahan_bakar">Bahan Bakar</label>
                                    <p class="card-text">{{ $mobil->jenis_bahan_bakar }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="volume_bahan_bakar">Volume Bahan Bakar</label>
                                    <p class="card-text">{{ $mobil->volume_bahan_bakar }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="warna_mobil">Warna Mobil</label>
                                    <p class="card-text">{{ $mobil->warna_mobil }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas</label>
                                    <p class="card-text">{{ $mobil->kapasitas }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="pelat_nomor">Pelat Nomor</label>
                                    <p class="card-text">{{ $mobil->pelat_nomor }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas</label>
                                    <p class="card-text">{{ $mobil->fasilitas }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="harga_sewa">Harga Sewa</label>
                                    <p class="card-text" name="harga_sewa">{{ $mobil->harga_sewa }}</p>
                                </div>

                            </div>
                            <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-5">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        {{-- <div class="card-header">
                            <h3 class="card-title">placeholder</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action=""
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="tanggal_waktu_mulai_sewa">Tanggal dan Waktu Sewa</label>
                                    <input type="datetime-local" class="form-control" id="tanggal_waktu_mulai_sewa" name="tanggal_waktu_mulai_sewa"
                                    value="{{ $request->tanggal_waktu_mulai_sewa }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_waktu_akhir_sewa">Tanggal dan Waktu Pengembalian</label>
                                    <input type="datetime-local" class="form-control" id="tanggal_waktu_akhir_sewa" name="tanggal_waktu_akhir_sewa"
                                    value="{{ $request->tanggal_waktu_akhir_sewa }}">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="nama">Kode Promo</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Kode Promo">
                                </div> -->
                                <div class="form-group">
                                    <label for="id_driver">Driver</label>
                                        <select class="custom-select rounded-0" id="id_driver"
                                            name="id_driver">
                                            <option value="0"
                                                @if($request->id_driver == 0) selected="selected"
                                                @endif>Tanpa Driver</option>
                                            @foreach ($driver as $item)
                                                <option value="{{ $item->id_driver }}"
                                                    @if($request->id_driver == $item->id_driver) selected="selected"
                                                    @endif>{{ $item->nama }} - Rp. {{ $item->tarif_driver }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                        <select class="custom-select rounded-0" id="metode_pembayaran"
                                            name="metode_pembayaran">
                                            <option value="Cash" 
                                                @if($request->metode_pembayaran == "Cash") selected="selected"
                                                @endif>Cash</option>
                                            <option value="Transfer Bank" 
                                                @if($request->metode_pembayaran == "Transfer Bank") selected="selected"
                                                @endif>Transfer Bank</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_promo">Kode Promo</label>
                                    <input type="text" class="form-control" id="kode_promo" name="kode_promo"
                                    placeholder="Kode Promo" value="{{ $request->kode_promo }}">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Cek Harga</button>
                            </div>
                        </form>
                    </div>

                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('store-transaksi') }}" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id_customer" value="{{ $customer->id_customer }}">
                                    <input type="hidden" name="tanggal_waktu_mulai_sewa" value="{{ $request->tanggal_waktu_mulai_sewa }}">
                                    <input type="hidden" name="tanggal_waktu_akhir_sewa" value="{{ $request->tanggal_waktu_akhir_sewa }}">
                                    <input type="hidden" name="id_driver" value="{{ $request->id_driver }}">
                                    <input type="hidden" name="metode_pembayaran" value="{{ $request->metode_pembayaran }}">
                                    <input type="hidden" name="id_mobil" value="{{ $mobil->id_mobil }}">
                                    <input type="hidden" name="id_promo" value="{{ $promo }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_waktu_mulai_sewa">Tanggal dan Waktu Sewa</label>
                                    <p class="card-text">{{ $request->tanggal_waktu_mulai_sewa }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_waktu_akhir_sewa">Tanggal dan Waktu Pengembalian</label>
                                    <p class="card-text">{{ $request->tanggal_waktu_akhir_sewa }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="id_driver">Driver</label>
                                    @if ($request->id_driver == 0)
                                            <p class="card-text">-</p>
                                        @endif
                                    @foreach ($driver as $item)
                                        @if ($request->id_driver == $item->id_driver)
                                            <p class="card-text">{{ $item->nama }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                    <p class="card-text">{{ $request->metode_pembayaran }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mobil">Biaya Sewa Mobil</label>
                                    <p class="card-text">Rp. {{ $harga[0] }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="tipe_mobil">Tarif Driver</label>
                                    <p class="card-text">Rp. {{ $harga[1] }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_transmisi">Total Pembayaran</label>
                                    <p class="card-text">Rp. {{ $harga[2] }}</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Sewa Mobil</button>
                            </div>
                        </form>
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        
      </div><!-- /.container-fluid -->
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
