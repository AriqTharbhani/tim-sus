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
            <h1 class="m-0 text-dark">{{$title_menu}}</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
                <h3 class="card-title"><i class="fas fa-user-tie nav-icon"></i> {{$title}}</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-tambah">
                    <i class="fas fa-plus"></i>Tambah Data
                  </button>
                </div> 
              </div>

                <!-- Modal tambah  -->
              <div class="modal fade" id="modal-tambah">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah {{$title}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('guru.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{old('username')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nip" class="col-sm-3 col-form-label">NIP<small><i> (18 digits)</i></small></label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{old('nip')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nuptk" class="col-sm-3 col-form-label">NUPTK<small><i> (16 digits)</i></small></label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="nuptk" name="nuptk" placeholder="NUPTK" value="{{old('nuptk')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9 pt-1">
                            <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="L" @if (old('jenis_kelamin')=='L' ) checked @endif required> Laki-Laki</label>
                            <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="P" @if (old('jenis_kelamin')=='P' ) checked @endif required> Perempuan</label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                          <div class="col-sm-3">
                              <select class="form-control" name="agama" required>
                                  <option value="">-- Pilih Agama --</option>
                                  <option value="1">Islam</option>
                                  <option value="2">Protestan</option>
                                  <option value="3">Katolik</option>
                                  <option value="4">Hindu</option>
                                  <option value="5">Budha</option>
                                  <option value="6">Khonghucu</option>
                              </select>
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="nuptk" class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{old('alamat')}}</textarea>
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
              <!-- End Modal tambah -->

              <!-- START MODAL INDEX -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-striped table-valign-middle table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>Tanggal Lahir</th>
                        <th>L/P</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                      @foreach($data_guru as $key => $guru)
                      <?php $no++; ?>
                      <tr>
                      <td>{{$data_guru->firstItem() + $key}}</td>
                        <td>{{$guru->nama_lengkap}}</td>
                        <td>{{$guru->nip}}</td>
                        <td>{{$guru->nuptk}}</td>
                        <td>{{$guru->tanggal_lahir}}</td>
                        <td>{{$guru->jenis_kelamin}}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm mt-1" data-toggle="modal" data-target="#modal-edit{{$guru->id}}">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" href="/guru/delete/{{ $guru->id}}" class="btn btn-danger btn-sm mt-1">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                            </a>
                          </form>
                        </td>
                      </tr>
                      <!-- Modal edit  -->
                    <div class="modal fade" id="modal-edit{{$guru->id}}">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit {{$title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                          @method('PUT')
                            @csrf
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$guru->nama_lengkap}}" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" id="nip" name="nip" value="{{$guru->nip}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nuptk" class="col-sm-3 col-form-label">NUPTK <small><i>(opsional)</i></small></label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" id="nuptk" name="nuptk" value="{{$guru->nuptk}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9 pt-1">
                                  <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="L" @if ($guru->jenis_kelamin=='L' ) checked @endif required> Laki-Laki</label>
                                  <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="P" @if ($guru->jenis_kelamin=='P' ) checked @endif required> Perempuan</label>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$guru->tempat_lahir}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$guru->tanggal_lahir}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-3">
                                  <select class="form-control" name="agama" required>
                                    <option value="{{$guru->agama}}" selected>
                                      @if($guru->agama == 1)
                                      Islam
                                      @elseif($guru->agama == 2)
                                      Protestan
                                      @elseif($guru->agama == 3)
                                      Katolik
                                      @elseif($guru->agama == 4)
                                      Hindu
                                      @elseif($guru->agama == 5)
                                      Budha
                                      @elseif($guru->agama == 6)
                                      Khonghucu
                                      @endif
                                    </option>
                                    <option value="1">Islam</option>
                                    <option value="2">Protestan</option>
                                    <option value="3">Katolik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Budha</option>
                                    <option value="6">Khonghucu</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="nuptk" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" id="alamat" name="alamat">{{$guru->alamat}}</textarea>
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
                {{ $data_guru->links() }}
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