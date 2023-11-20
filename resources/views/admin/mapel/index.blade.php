@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.admin')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title_menu}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-book nav-icon"></i> {{$title}} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-tambah">
                                <i class="fas fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>

                        <!-- Modal tambah -->
                        <div class="modal fade" id="modal-tambah">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah {{$title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('mapel.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="kode_mapel" class="col-sm-3 col-form-label">Kode Mapel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Kode Mapel : (KM01)" value="{{old('kode_mapel')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama_mapel" class="col-sm-3 col-form-label">Nama Mapel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Mapel" value="{{old('nama_mapel')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ringkasan_mapel" class="col-sm-3 col-form-label">Ringkasan Mapel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="ringkasan_mapel" name="ringkasan_mapel" placeholder="Ringkasan Mapel" value="{{old('ringkasan_mapel')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="tingkatan_kelas" class="col-sm-3 col-form-label">Tingkatan Kelas</label>
                                              <div class="col-sm-9">
                                                  <select class="form-control" id="tingkatan_kelas" name="tingkatan_kelas">
                                                      <option value="">-- Pilih Tingkatan Kelas --</option>
                                                      <option value="10">10</option>
                                                      <option value="11">11</option>
                                                      <option value="12">12</option>
                                                  </select>
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

                        <!-- START MODAL INDEX-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-valign-middle table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mapel</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Ringkasan Mata Pelajaran</th>
                                            <th>Tingkatan Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0; ?>
                                        @foreach($data_mapel as $key => $mapel)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{$data_mapel->firstItem() + $key}}</td>
                                            <td>{{ $mapel->kode_mapel }}</td>
                                            <td>{{ $mapel->nama_mapel }}</td>
                                            <td>{{ $mapel->ringkasan_mapel }} </td>
                                            <td>{{ $mapel->tingkatan_kelas }} </td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$mapel->id}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <a href="/user/delete/{{ $mapel->id }}" button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>

                                         <!-- Modal edit -->
<div class="modal fade" id="modal-edit{{$mapel->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
      @method('PUT')
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label for="kode_mapel" class="col-sm-3 col-form-label">Kode Mapel</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" value="{{$mapel->kode_mapel}}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama_mapel" class="col-sm-3 col-form-label">Nama Mata Pelajaran</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{$mapel->nama_mapel}}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="ringkasan_mapel" class="col-sm-3 col-form-label">Ringkasan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="ringkasan_mapel" name="ringkasan_mapel" value="{{$mapel->ringkasan_mapel}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="tingkatan_kelas" class="col-sm-3 col-form-label">Tingkatan Kelas</label>
            <div class="col-sm-9">
              <select class="form-control" id="tingkatan_kelas" name="tingkatan_kelas">
                <option value="10" @if($mapel->tingkatan_kelas == 10) selected @endif>10</option>
                <option value="11" @if($mapel->tingkatan_kelas == 11) selected @endif>11</option>
                <option value="12" @if($mapel->tingkatan_kelas == 12) selected @endif>12</option>
              </select>
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
                            {{ $data_mapel->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.main.footer')
