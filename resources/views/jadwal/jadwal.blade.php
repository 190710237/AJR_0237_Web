<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>AJR | Jadwal</title>
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
            <h1 class="m-0">Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
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
                <h5 class="m-0">Jadwal Admin</h5>
            </div>
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 100px">Shift</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
                  <th>Minggu</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                
                <tr>
                  <td>Shift 1<br>08.00 - 15.00</td>
                  <td>
                    @if ($pegawai[0]->id_role == 2)
                        {{ $pegawai[0]->nama }}
                    @endif
                  </td>
                  <td>
                      @if ($pegawai[2]->id_role == 2)
                        {{ $pegawai[2]->nama }}
                      @endif
                  </td>
                  <td>
                    @if ($pegawai[4]->id_role == 2)
                        {{ $pegawai[4]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[6]->id_role == 2)
                        {{ $pegawai[6]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[8]->id_role == 2)
                        {{ $pegawai[8]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[10]->id_role == 2)
                        {{ $pegawai[10]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[12]->id_role == 2)
                        {{ $pegawai[12]->nama }}
                    @endif
                  </td>
                  <td><a href="{{ url('jadwal/edit/1', ) }}"><i class="fas fa-edit"></i></a></td>
                </tr>

                <tr>
                    <td>Shift 2<br>15.00 - 22.00</td>
                    <td>
                        @if ($pegawai[1]->id_role == 2)
                            {{ $pegawai[1]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[3]->id_role == 2)
                            {{ $pegawai[3]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[5]->id_role == 2)
                            {{ $pegawai[5]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[7]->id_role == 2)
                            {{ $pegawai[7]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[9]->id_role == 2)
                            {{ $pegawai[9]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[11]->id_role == 2)
                            {{ $pegawai[11]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[13]->id_role == 2)
                            {{ $pegawai[13]->nama }}
                        @endif
                    </td>
                    <td><a href="{{ url('jadwal/edit/2', ) }}"><i class="fas fa-edit"></i></a></td>
                  </tr>

                {{-- @endforeach --}}
              </table>
            </div>
        </div>

        <div class="card card-info card-outline">
            <div class="card-header">
                <h5 class="m-0">Jadwal Customer Service</h5>
            </div>
  
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 100px">Shift</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
                  <th>Minggu</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
                {{-- @foreach ($jadwal as $item) --}}
                <tr>
                  <td>Shift 1<br>08.00 - 15.00</td>
                  <td>
                    @if ($pegawai[14]->id_role == 3)
                        {{ $pegawai[14]->nama }}
                    @endif
                  </td>
                  <td>
                      @if ($pegawai[16]->id_role == 3)
                        {{ $pegawai[16]->nama }}
                      @endif
                  </td>
                  <td>
                    @if ($pegawai[18]->id_role == 3)
                        {{ $pegawai[18]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[20]->id_role == 3)
                        {{ $pegawai[20]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[22]->id_role == 3)
                        {{ $pegawai[22]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[24]->id_role == 3)
                        {{ $pegawai[24]->nama }}
                    @endif
                  </td>
                  <td>
                    @if ($pegawai[26]->id_role == 3)
                        {{ $pegawai[26]->nama }}
                    @endif
                  </td>
                  <td><a href="{{ url('jadwal/edit/3', ) }}"><i class="fas fa-edit"></i></a></td>
                </tr>
                

                <tr>
                    <td>Shift 2<br>15.00 - 22.00</td>
                    <td>
                        @if ($pegawai[15]->id_role == 3)
                            {{ $pegawai[15]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[17]->id_role == 3)
                            {{ $pegawai[17]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[19]->id_role == 3)
                            {{ $pegawai[19]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[21]->id_role == 3)
                            {{ $pegawai[21]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[23]->id_role == 3)
                            {{ $pegawai[23]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[25]->id_role == 3)
                            {{ $pegawai[25]->nama }}
                        @endif
                    </td>
                    <td>
                        @if ($pegawai[27]->id_role == 3)
                            {{ $pegawai[27]->nama }}
                        @endif
                    </td>
                    <td><a href="{{ url('jadwal/edit/4', ) }}"><i class="fas fa-edit"></i></a></td>
                  </tr>

                {{-- @endforeach --}}
              </table>
            </div>
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
