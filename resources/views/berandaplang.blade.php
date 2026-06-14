@include('sidebar')
@include('navbar')
<link rel="stylesheet" href="https://unpkg.com/trix@2.1.1/dist/trix.css">
<script src="https://unpkg.com/trix@2.1.1/dist/trix.umd.min.js"></script>
<style>
    .card {
        border-radius: 12px;
    }

    .border-bottom:hover {
        background: #f8f9fa;
        transition: 0.2s;
    }

    trix-editor {
        min-height: 300px;
        font-size: 17px;
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }
</style>
<!-- Pell CSS -->
<link rel="stylesheet" href="https://unpkg.com/pell/dist/pell.min.css">

<!-- Pell JS -->
<script src="https://unpkg.com/pell"></script>


<div class="container-fluid py-4">
    <div class="row">

        <!-- MAIN CONTENT -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0">Semua Papan Nama</h5>
                    <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                        data-bs-target="#tambahAdminModal">
                        Tambah Papan Nama
                    </button>
                </div>

                <div class="card-body p-0">

                    @forelse ($dataplang as $dk)
                        <div class="border-bottom p-3 d-flex align-items-start">



                            <!-- CONTENT -->
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">{{ $dk->nama }}</h6>

                                <small class="text-muted">
                                    {{ $dk->halaman }}
                                </small>

                            </div>

                            <!-- ACTION -->
                            <div class="text-end ms-3">

                                <!--button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#editAdminModal" data-id="{{ $dk->id }}"
                                    data-nama="{{ $dk->nama }}" data-gambar="{{ $dk->gambar }}"
                                    data-halaman="{{ $dk->halaman }}">
                                    Edit
                                </button-->

                                <form action="{{ route('kaldik.destroyplang', $dk->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="p-4 text-center text-muted">
                            Belum ada papan nama
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        <!-- SIDEBAR STYLE WORDPRESS -->
        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Ringkasan</h6>
                </div>
                <div class="card-body">
                    <p>Total Papan Nama: <b>{{ count($dataplang) }}</b></p>
                    <p>Terbaru:
                        <br>
                        <small>
                            {{ optional($dataplang->first())->nama ?? '-' }}
                        </small>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Tips</h6>
                </div>
                <div class="card-body small text-muted">
                    Tambahkan gambar untuk Papan Nama dan link ke halaman informasi
                </div>
            </div>
        </div>

    </div>
</div>


@include('footerbar')

<!-- MODAL TAMBAH kaldik -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Papan Nama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('kaldik.tambahplang') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- JUDUL -->
                    <div class="mb-3">
                        <label class="form-label">Judul Papan Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <!-- ISI -->
                    <div class="mb-3">
                        <label class="form-label">Gambar Papan Nama</label>
                        <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <img id="previewImage" src="#" alt="Preview Gambar"
                            class="img-fluid rounded border d-none" style="max-height: 200px; object-fit: cover;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Halaman Informasi</label>
                        <input type="text" name="halaman" id="" class="form-control">
                    </div>



                    <button type="submit" class="btn btn-primary w-100">Simpan</button>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- MODAL EDIT
<div class="modal fade" id="editAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Papan Nama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="formEditAdmin" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Papan Nama</label>
                        <input type="text" id="edit_nama" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="mulai" id="edit_mulai" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="selesai" id="edit_selesai" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>

            </div>

        </div>
    </div>
</div>-->
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.classList.add('d-none');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editAdminModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            var id = button.getAttribute('data-id');
            var agenda = button.getAttribute('data-agenda');
            var mulai = button.getAttribute('data-mulai');
            var selesai = button.getAttribute('data-selesai');

            // Isi form
            //document.getElementById('edit_id').value = id;
            document.getElementById('edit_agenda').value = agenda;
            document.getElementById('edit_mulai').value = mulai;
            document.getElementById('edit_selesai').value = selesai;

            // Set action URL untuk update
            document.getElementById('formEditAdmin').action = '/kaldik/' + id;
        });
    });
</script>
