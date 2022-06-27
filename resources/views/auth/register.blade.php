<!DOCTYPE html>
<html lang="en">

<head>
    <title>AJR | Register</title>

    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    --}}
    @include('templates.header')
</head>

<body class="hold-transition register-page">

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('welcome') }}" class="h1"><b>Atma Jaya</b> Rental</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">New Member Registration</p>

                <form action="{{ route('register-post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-signs"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir"
                            onfocus="(this.type='date')" onblur="if(this.value=='')
                            {this.type='text'}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" id="jenis_kelamin"
                            name="jenis_kelamin">
                            <option value="" disabled selected hidden>Jenis Kelamin</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-question-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="No. Telepon" name="nomor_telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p></p>
                <p>Already a member? <a href="{{ route('login') }}" ><u>Login</u></a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @include('templates.scripts')

</body>

</html>
