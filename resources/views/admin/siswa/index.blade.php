@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.admin')
@include('sweetalert::alert')

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


<!-- Modal tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('siswa.store') }}" id="form-tambah" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Siswa" value="{{old('nama_lengkap')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username" value="{{old('username')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9 pt-1">
                            <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="L"
                                    @if (old('jenis_kelamin')=='L' ) checked @endif required> Laki-Laki</label>
                            <label class="form-check-label mr-3"><input type="radio" name="jenis_kelamin" value="P"
                                    @if (old('jenis_kelamin')=='P' ) checked @endif required> Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="kelas_id" class="col-sm-3 col-form-label">Pilih Kelas</label>
                      <div class="col-sm-9">
                          <select class="form-control" id="kelas_id" name="kelas_id" required>
                              <option value="">-- Pilih Kelas --</option>
                              @foreach($data_kelas as $kelas)
                                  <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                    <div class="form-group row">
                        <label for="nis" class="col-sm-3 col-form-label">NIS<small><i> (10 digits)</i></small></label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS"
                                value="{{old('nis')}}">
                        </div>
                        <label for="nisn" class="col-sm-2 col-form-label">NISN<small><i> (10 digits)</i></small></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN"
                                value="{{old('nisn')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                        </div>
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{old('tanggal_lahir')}}">
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
                          <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap">{{old('alamat')}}</textarea>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="nomor_hp" class="col-sm-3 col-form-label">Nomor HP</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp"
                                placeholder="Nomor HP" value="{{old('nomor_hp')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah"
                                value="{{old('nama_ayah')}}">
                        </div>
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu"
                                value="{{old('nama_ibu')}}">
                        </div>
                    </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button form="form-tambah" type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal tambah -->

<!-- START MODAL INDEX -->
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-users"></i> {{$title}}</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-lg" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Tambah Data
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-striped table-valign-middle table-hover">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Tanggal Lahir</th>
                      <th>L/P</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0; ?>
                    @foreach($data_siswa as $key => $siswa)
                    <?php $no++; ?>
                    <tr>
                      <td>{{$data_siswa->firstItem() + $key}}</td>
                      <td>{{$siswa->nis}}</td>
                      <td>{{$siswa->nisn}}</td>
                      <td>{{$siswa->nama_lengkap}}</td>
                      <td>{{$siswa->tanggal_lahir->format('d-M-Y')}}</td>
                      <td>{{$siswa->jenis_kelamin}}</td>
                      <td>
                        @if($siswa->kelas)
                          {{ $siswa->kelas->tingkatan_kelas }} - {{ $siswa->kelas->nama_kelas }}
                        @else
                            <span class="badge light badge-warning">Belum masuk anggota kelas</span>
                        @endif
                        </td>
                      <td>
                          <button type="button" class="btn btn-warning btn-sm mt-1" data-toggle="modal" data-target="#modal-edit{{$siswa->id}}">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="button" href="/siswa/delete/{{ $siswa->id}}" class="btn btn-danger btn-sm mt-1">
                          <i class="fas fa-trash-alt"></i>
                          </button>
                          </a>
                      
                        </form>
                      </td>
                    </tr>

                       <!-- Modal edit -->
<div class="modal fade" id="modal-edit{{$siswa->id}}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
      @method('PUT')
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Siswa</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Siswa" value="{{$siswa->nama_lengkap}}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9 pt-1">
              <label class="form-check-label mr-3">
                <input type="radio" name="jenis_kelamin" value="L" @if ($siswa->jenis_kelamin=='L' ) checked @endif required> Laki-Laki
              </label>
              <label class="form-check-label mr-3">
                <input type="radio" name="jenis_kelamin" value="P" @if ($siswa->jenis_kelamin=='P' ) checked @endif required> Perempuan
              </label>
            </div>
          </div>
          <div class="form-group row">
            <label for="nis" class="col-sm-3 col-form-label">NIS</label>
            <div class="col-sm-3">
              <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" value="{{$siswa->nis}}">
            </div>
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN" value="{{$siswa->nisn}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$siswa->tempat_lahir}}">
            </div>
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$siswa->tanggal_lahir->format('Y-m-d')}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="agama" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-3">
              <select class="form-control" name="agama" required>
                <option value="{{$siswa->agama}}" selected>
                  @if($siswa->agama == 1)
                  Islam
                  @elseif($siswa->agama == 2)
                  Protestan
                  @elseif($siswa->agama == 3)
                  Katolik
                  @elseif($siswa->agama == 4)
                  Hindu
                  @elseif($siswa->agama == 5)
                  Budha
                  @elseif($siswa->agama == 6)
                  Khonghucu
                  @elseif($siswa->agama == 7)
                  Kepercayaan
                  @endif
                </option>
                <option value="1">Islam</option>
                <option value="2">Protestan</option>
                <option value="3">Katolik</option>
                <option value="4">Hindu</option>
                <option value="5">Budha</option>
                <option value="6">Khonghucu</option>
                <option value="7">Kepercayaan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap">{{$siswa->alamat}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="nomor_hp" class="col-sm-3 col-form-label">Nomor HP</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP" value="{{$siswa->nomor_hp}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" value="{{$siswa->nama_ayah}}">
            </div>
            <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" value="{{$siswa->nama_ibu}}">
            </div>
          </div>
          <div class="modal-footer justify-content-end">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
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
                {{ $data_siswa->links() }}
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