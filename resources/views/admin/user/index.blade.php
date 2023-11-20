@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$title_menu}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

       <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- ./row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-user-friends"></i> {{$title}} </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fas fa-user-plus"></i>
                </button>
              </div>
            </div>
          <!-- <-- END -->

          <!-- Modal Tambah Data -->
        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-tambah-label">Tambah {{$title}} Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Username :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{old('username')}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-9 pt-1">
                          <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="L" @if (old('jenis_kelamin')=='L' ) checked @endif required> Laki-Laki</label>
                          <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="P" @if (old('jenis_kelamin')=='P' ) checked @endif required> Perempuan</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir :</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email :</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nomor_hp" class="col-sm-3 col-form-label">Nomor HP :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP" value="{{old('nomor_hp')}}">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                   </form>
                 </div>
                </div>
               </div>
              <!-- END MODAL TAMBAH-->

             <!-- START MODAL INDEX-->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped table-valign-middle table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0; ?>
                    @foreach ($user as $key => $u)
                    <?php $no++; ?>
                    <tr>
                      <td>{{$user->firstItem() + $key}}</td>
                      <td>
                         @if($u->role == 1)
                           {{$u->admin->nama_lengkap}}
                         @elseif($u->role == 2)
                           {{$u->guru->nama_lengkap}}
                         @elseif($u->role == 3)
                           {{$u->siswa->nama_lengkap}}
                         @endif
                      </td>
                    <td>{{ $u->username }}</td>
                    <td>
                        @if($u->role == 1)
                        Administrator
                        @elseif($u->role == 2)
                        Guru
                        @elseif($u->role == 3)
                        Siswa
                        @endif
                    </td>
                    <td>
                        @if($u->status == true)
                        <span class="badge bg-success">Aktif</span>
                        @else
                        <span class="badge bg-danger">Non Aktif</span>
                        @endif
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$u->id}}">
                          <i class="fas fa-pencil-alt"> Edit </i>
                      </button>
                    </td>
                    </tr>
                  <!-- END MODAL INDEX-->

                   <!-- Modal edit  -->
                   <div class="modal fade" id="modal-edit{{$u->id}}">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit {{$title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ route('user.update', $u->id) }}" method="POST">
                          @method('PUT')
                            @csrf
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                  @if($u->role == 1)
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$u->admin->nama_lengkap}}" readonly>
                                  @elseif($u->role == 2)
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$u->guru->nama_lengkap}}" readonly>
                                  @elseif($u->role == 3)
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$u->siswa->nama_lengkap}}" readonly>
                                  @endif
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="username" name="username" value="{{$u->username}}" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status Akun</label>
                                <div class="col-sm-9 pt-1">
                                  <label class="radio-inline mr-3"><input type="radio" name="status" value="1" @if ($u->status==1 ) checked @endif required> Aktif</label>
                                  <label class="radio-inline mr-3"><input type="radio" name="status" value="0" @if ($u->status==0 ) checked @endif required> Non Aktif</label>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal edit -->

                    @endforeach
                    </tbody>
                </table>
              </div>
                {{ $user->links() }}
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('layouts.main.footer')