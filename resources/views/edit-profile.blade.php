<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>AJR | Edit Profile</title>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">

                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ auth()->user()->nama }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form
                                    action="{{ url('profile/update', auth()->user()->id) }}"
                                    method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Nama Lengkap" value="{{ auth()->user()->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" value="{{ $data->email }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Alamat" value="{{ $data->alamat }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="custom-select rounded-0" id="jenis_kelamin"
                                                name="jenis_kelamin">
                                                <option value="0" 
                                                    @if($data->jenis_kelamin == 0) selected="selected"
                                                    @endif>Laki-laki</option>
                                                <option value="1" 
                                                    @if($data->jenis_kelamin == 1) selected="selected"
                                                    @endif>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_telepon">No. Telepon</label>
                                            <input type="text" class="form-control" id="nomor_telepon"
                                                name="nomor_telepon" placeholder="Nomor Telepon"
                                                value="{{ $data->nomor_telepon }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_ktp">No. KTP</label>
                                            <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp"
                                                placeholder="Nomor KTP" value="{{ $data->nomor_ktp }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_sim">No. SIM</label>
                                            <input type="text" class="form-control" id="nomor_sim" name="nomor_sim"
                                                placeholder="Nomor SIM" value="{{ $data->nomor_sim }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Konfirmasi Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto Profil</label>
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
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
