@include('layouts.main.header')
@include('layouts.main.navbar')
@include('layouts.sidebar.admin')
@include('loading')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard Admin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

    <div class="callout callout-info">
    <h5>{{ $sekolah }}</h5>
    </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $jumlah_user }}</h3>
              <p><b>Data User</b></p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-users"></i>
            </div>
            <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $jumlah_siswa }}</h3>
              <p><b>Data Siswa</b></p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-user-friends"></i>
            </div>
            <a href="{{ route('siswa.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $jumlah_guru }}</h3>
              <p><b>Data Guru</b></p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-user"></i>
            </div>
            <a href="{{ route('guru.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $jumlah_mapel }}</h3>
              <p><b>Data Mapel</b></p>
            </div>
            <div class="icon">
              <i class="fas fa-book nav-icon"></i>
            </div>
            <a href="{{ route('mapel.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ $jumlah_kelas }}</h3>
              <p><b>Data Kelas</b></p>
            </div>
            <div class="icon">
              <i class="fas fa-layer-group nav-icon"></i>
            </div>
            <a href="{{ route('kelas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Combined Chart for Siswa and Guru -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <canvas id="combinedChart" width="800" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Combined Chart Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
  var siswaData = JSON.parse('{!! json_encode($jumlah_siswa) !!}');
  var guruData = JSON.parse('{!! json_encode($jumlah_guru) !!}');

    var ctx = document.getElementById('combinedChart').getContext('2d');
    var combinedChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jumlah Siswa', 'Jumlah Guru'],
        datasets: [{
          label: 'Jumlah Siswa',
          data: [siswaData, 0],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }, {
          label: 'Jumlah Guru',
          data: [0, guruData],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>

@include('layouts.main.footer')
</body>
</html>
