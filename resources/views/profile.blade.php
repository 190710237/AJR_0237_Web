<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>AJR | Profile</title>
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
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                      @if (file_exists('images/users/'.auth()->user()->id.'/face.jpg'))
                                        <img class="profile-user-img img-fluid img-circle"
                                          src="{{ asset($data->foto) }}"
                                          alt="User profile picture">
                                      @else
                                        <img class="profile-user-img img-fluid img-circle"
                                              src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                                              alt="User profile picture">
                                      @endif
                                        
                                    </div>

                                    <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>

                                    <p class="text-muted text-center">{{ $data->id_kartu }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{ $data->email }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Alamat</b> <a class="float-right">{{ $data->alamat }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tanggal Lahir</b> <a
                                                class="float-right">{{ date('d-m-Y', strtotime($data->tanggal_lahir)) }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jenis Kelamin</b> <a class="float-right">
                                                @if($data->jenis_kelamin == 0) Laki-laki
                                                    @else Perempuan
                                                    @endif</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No. Telepon</b> <a class="float-right">{{ $data->nomor_telepon }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No. KTP</b> <a class="float-right">{{ $data->nomor_ktp }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No. SIM</b> <a class="float-right">{{ $data->nomor_sim }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tanggal Daftar</b> <a
                                                class="float-right">{{ date('d-m-Y', strtotime($data->created_at)) }}</a>
                                        </li>
                                    </ul>

                                    <a href="{{ url('profile/edit', auth()->user()->id) }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <!-- About Me Box -->
                            {{-- <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Kelengkapan Dokumen</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                    <p class="text-muted">
                                        <span class="tag tag-danger">UI Design</span>
                                        <span class="tag tag-success">Coding</span>
                                        <span class="tag tag-info">Javascript</span>
                                        <span class="tag tag-warning">PHP</span>
                                        <span class="tag tag-primary">Node.js</span>
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                        fermentum enim neque.</p>
                                </div>
                                <!-- /.card-body -->
                            </div> --}}
                            <!-- /.card -->
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
