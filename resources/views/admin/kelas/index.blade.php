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
              <h3 class="card-title"><i class="fas fa-layer-group nav-icon"></i> {{$title}} </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Tambah Data
                </button>
              </div>
            </div>
          <!-- <-- END -->

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
                                    <form action="{{ route('kelas.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="kode_kelas" class="col-sm-3 col-form-label">Kode Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Kode Kelas" value="{{old('kode_kelas')}}">
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
                                            <div class="form-group row">
                                                <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="{{old('nama_kelas')}}">
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
                      <th>Kode Kelas</th>
                      <th>Tingkatan Kelas</th>
                      <th>Nama Kelas</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0; ?>
                    @foreach ($data_kelas as $key => $kelas)
                    <?php $no++; ?>
                    <tr>
                    <td>{{$data_kelas->firstItem() + $key}}</td>
                    <td>{{ $kelas->kode_kelas}}</td>
                    <td>{{ $kelas->tingkatan_kelas }}</td>
                    <td>{{ $kelas->nama_kelas }} </td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{$kelas->id}}">
                          <i class="fas fa-pencil-alt"></i>
                      </button>
                      <a href="/user/delete/{{ $kelas->id }}" button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                    </tr>
                  <!-- END MODAL INDEX-->
                  @endforeach
                    </tbody>
                </table>
                {{ $data_kelas->links() }}
                </div>
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
