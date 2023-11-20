@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile Admin</li>
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

              <h3 class="profile-username text-center">{{$admin->nama_lengkap}}</h3>

              <p class="text-muted text-center">Administrator</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Username :</b> <a class="float-right">{{$admin->user->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email :</b> <a class="float-right">{{$admin->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin :</b> <a class="float-right">{{$admin->jenis_kelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir :</b> <a class="float-right">{{$admin->tanggal_lahir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nomor HP :</b> <a class="float-right">{{$admin->nomor_hp}}</a>
                </li>
              </ul>
               <!-- Tombol Kembali -->
               <a href="{{ route('dashboard.admin') }}" class="btn btn-success btn-block">Kembali</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>
  </div>

@include('layouts.main.footer')