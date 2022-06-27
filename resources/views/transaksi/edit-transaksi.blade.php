<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Update Status Transaksi</title>
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
            <h1 class="m-0">Update Status Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Update Status Transaksi</li>
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
                        <form action=" {{ url('transaksi/update', $transaksi->id_transaksi) }} "
                        method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Email Customer</label>
                                    @foreach ($customer as $cust)
                                        @if ($transaksi->id_customer == $cust->id_customer)
                                        <p class="card-text">{{ $cust->email }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="nama_mobil">Nama Mobil</label>
                                    @foreach ($mobil as $car)
                                        @if ($transaksi->id_mobil == $car->id_mobil)
                                        <p class="card-text">{{ $car->nama_mobil }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- <div class="form-group">
                                    <label for="nama">Kode Promo</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Kode Promo">
                                </div> -->
                                <div class="form-group">
                                    <label for="id_driver">Driver</label>
                                        <select class="custom-select rounded-0" id="id_driver"
                                            name="id_driver" disabled>
                                            <option value="0"
                                                @if($transaksi->id_driver == 0) selected="selected"
                                                @endif>Tanpa Driver</option>
                                            @foreach ($driver as $item)
                                                <option value="{{ $item->id_driver }}"
                                                    @if($transaksi->id_driver == $item->id_driver) selected="selected"
                                                    @endif>{{ $item->nama }} - Rp. {{ $item->tarif_driver }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                        <select class="custom-select rounded-0" id="metode_pembayaran"
                                            name="metode_pembayaran" disabled>
                                            <option value="Cash" 
                                                @if($transaksi->metode_pembayaran == "Cash") selected="selected"
                                                @endif>Cash</option>
                                            <option value="Transfer Bank" 
                                                @if($transaksi->metode_pembayaran == "Transfer Bank") selected="selected"
                                                @endif>Transfer Bank</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_promo">Kode Promo</label>
                                    <input type="text" class="form-control" id="kode_promo" name="kode_promo"
                                    placeholder="Kode Promo" value="{{ $transaksi->kode_promo }}" disabled>
                                </div>
                                @if(auth()->user()->access_level == "cs")
                                <div class="form-group">
                                    <label for="status_transaksi">Status Transaksi</label>
                                        <select class="custom-select rounded-0" id="status_transaksi"
                                            name="status_transaksi" >
                                            <option value="Menunggu Verifikasi" 
                                                @if($transaksi->status_transaksi == "Menunggu Verifikasi") selected="selected"
                                                @endif>Menunggu Verifikasi</option>
                                            <option value="Sedang Berjalan" 
                                                @if($transaksi->status_transaksi == "Sedang Berjalan") selected="selected"
                                                @endif>Sedang Berjalan</option>
                                            <option value="Selesai" 
                                                @if($transaksi->status_transaksi == "Selesai") selected="selected"
                                                @endif>Selesai</option>
                                        </select>
                                </div>
                                @endif
                                @if(auth()->user()->access_level == "customer")
                                <div class="form-group">
                                    <label for="status_transaksi">Status Transaksi</label>
                                        <select class="custom-select rounded-0" id="status_transaksi"
                                            name="status_transaksi" disabled>
                                            <option value="Menunggu Verifikasi" 
                                                @if($transaksi->status_transaksi == "Menunggu Verifikasi") selected="selected"
                                                @endif>Menunggu Verifikasi</option>
                                            <option value="Sedang Berjalan" 
                                                @if($transaksi->status_transaksi == "Sedang Berjalan") selected="selected"
                                                @endif>Sedang Berjalan</option>
                                            <option value="Selesai" 
                                                @if($transaksi->status_transaksi == "Selesai") selected="selected"
                                                @endif>Selesai</option>
                                        </select>
                                </div>
                                @endif
                                @if(auth()->user()->access_level == "customer")
                                <div class="form-group">
                                    <label for="rating_driver">Rating Driver</label>
                                        <select class="custom-select rounded-0" id="rating_driver"
                                            name="rating_driver">
                                            <option value=1 
                                                @if($transaksi->rating_driver == 1 || $transaksi->rating_driver == NULL) selected="selected"
                                                @endif>1</option>
                                            <option value=2 
                                                @if($transaksi->status_transaksi == 2) selected="selected"
                                                @endif>2</option>
                                            <option value=3 
                                                @if($transaksi->status_transaksi == 3) selected="selected"
                                                @endif>3</option>
                                            <option value=4 
                                                @if($transaksi->status_transaksi == 4) selected="selected"
                                                @endif>4</option>
                                            <option value=5 
                                                @if($transaksi->status_transaksi == 5) selected="selected"
                                                @endif>5</option>
                                        </select>
                                </div>
                                @endif

                            </div>
                            <!-- /.card-body -->
                            @if(auth()->user()->access_level == "cs")
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                            @endif
                            @if(auth()->user()->access_level == "customer")
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Ubah Rating</button>
                            </div>
                            @endif
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
