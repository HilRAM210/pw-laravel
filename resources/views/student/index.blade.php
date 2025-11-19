<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">Dashboard Mahasiswa</a>
    </div>
  </nav>

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="fw-bold">Daftar Mahasiswa</h3>
      <a href="{{ route('students.create') }}" class="btn btn-success">
        + Tambah Mahasiswa
      </a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-primary">
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Domisili</th>
              <th scope="col">Angkatan</th>
              <th scope="col">Prodi</th>
              <th scope="col">Fakultas</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($students as $index => $mhs)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->name }}</td>
                <td>{{ $mhs->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $mhs->domisili }}</td>
                <td>{{ $mhs->angkatan }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->fakultas }}</td>
                <td class="text-center">
                  <a href="{{ route('students.edit', $mhs->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('students.destroy', $mhs->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center text-muted">Belum ada data mahasiswa</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>