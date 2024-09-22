@extends("layout.template")
@section("content")

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h1 class="h3 mb-2 text-gray-800" style="margin-top: 100px;">List Kategori</h1>
        </div>
        <div class="col-lg-12 text-right">
            <a href="{{ route('kategoris.tambah') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kategoris as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_kategori }}</td>
                            <td>
                                <!-- Delete Button -->
                                <form action="{{ route('kategoris.hapus', $row->id_kategori) }}" method="GET" style="display:inline;">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
