<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Edit Jadwal</title>
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
            <h1 class="m-0">Edit Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
              <li class="breadcrumb-item active">Edit Jadwal</li>
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
                @if ($session == 1 || $session == 2)
                    Jadwal Admin
                @elseif ($session == 3 || $session == 4)
                Jadwal Customer Service
                @endif
                
              {{-- <div class="card-tools">
                <a href="{{ route('create-jadwal') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              </div> --}}
            </div>
            
            <form action="{{ url('jadwal/update', $session) }}"
                method="post" enctype="multipart/form-data">
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>Shift</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
                  <th>Minggu</th>
                </tr>

                @if ($session == 1)
                {{ csrf_field() }}
                <tr>
                    <td>Shift 1<br>08.00 - 15.00</td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sen1"
                                name="sen1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sel1"
                                name="sel1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="rab1"
                                name="rab1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="kam1"
                                name="kam1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="jum1"
                                name="jum1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sab1"
                                name="sab1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="min1"
                                name="min1">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                  </tr>
                @endif

                @if ($session == 2)
                {{ csrf_field() }}
                <tr>
                    <td>Shift 2<br>15.00 - 22.00</td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sen2"
                                name="sen2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sel2"
                                name="sel2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="rab2"
                                name="rab2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="kam2"
                                name="kam2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="jum2"
                                name="jum2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sab2"
                                name="sab2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="min2"
                                name="min2">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 2)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                  </tr>
                @endif


                @if ($session == 3)
                {{ csrf_field() }}
                <tr>
                    <td>Shift 1<br>08.00 - 15.00</td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sen3"
                                name="sen3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sel3"
                                name="sel3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="rab3"
                                name="rab3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="kam3"
                                name="kam3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="jum3"
                                name="jum3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sab3"
                                name="sab3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="min3"
                                name="min3">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                  </tr>
                @endif

                @if ($session == 4)
                {{ csrf_field() }}
                <tr>
                    <td>Shift 2<br>15.00 - 22.00</td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sen4"
                                name="sen4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sel4"
                                name="sel4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="rab4"
                                name="rab4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="kam4"
                                name="kam4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="jum4"
                                name="jum4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="sab4"
                                name="sab4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="min4"
                                name="min4">
                                <option value="">
                                    --
                                </option>
                                @foreach ($pegawai as $data)
                                    @if ($data->id_role == 3)
                                        @if ($data->nama != null)
                                            <option value="{{ $data->id_pegawai }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                  </tr>
                @endif

                {{-- @endforeach --}}
              </table>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>

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
