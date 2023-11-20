@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.siswa')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.siswa') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile Siswa</li>
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
        <div class="col-md-12">

          <!-- Profile -->
          <div class="card card-success card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
              </div>

              <h3 class="profile-username text-center">{{$siswa->nama_lengkap}}</h3>

              <p class="text-muted text-center">Siswa</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Username :</b> <a class="float-right">{{$siswa->user->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>NIS :</b> <a class="float-right">{{$siswa->nis}}</a>
                </li>
                <li class="list-group-item">
                  <b>NISN :</b> <a class="float-right">{{$siswa->nisn}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tempat Lahir :</b> <a class="float-right">{{$siswa->tempat_lahir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir :</b> <a class="float-right">{{$siswa->tanggal_lahir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin :</b> <a class="float-right">{{$siswa->jenis_kelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama :</b> <a class="float-right">{{$siswa->agama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat :</b> <a class="float-right">{{$siswa->alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nomor Hp :</b> <a class="float-right">{{$siswa->nomor_hp}}</a>
                </li>
              </ul>
               <!-- Tombol Kembali -->
               <a href="{{ route('dashboard.siswa') }}" class="btn btn-success btn-block">Kembali</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>
  </div>

@include('layouts.main.footer')