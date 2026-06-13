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
                    <h5 class="mb-0">Semua Agenda</h5>
                    <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                        data-bs-target="#tambahAdminModal">
                        Tambah Agenda
                    </button>
                </div>

                <div class="card-body p-0">

                    @forelse ($datakaldik as $dk)
                        <div class="border-bottom p-3 d-flex align-items-start">

                            

                            <!-- CONTENT -->
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">{{ $dk->agenda }}</h6>

                                <small class="text-muted">
                                    {{ $dk->mulai }} - {{ $dk->selesai }}
                                </small>

                            </div>

                            <!-- ACTION -->
                            <div class="text-end ms-3">
                                
                                <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#editAdminModal" data-id="{{ $dk->id }}"
                                    data-agenda="{{ $dk->agenda }}" data-mulai="{{ $dk->mulai }}"
                                    data-selesai="{{ $dk->selesai }}">
                                    Edit
                                </button>

                                <form action="{{ route('kaldik.destroy', $dk->id) }}" method="POST">
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
                            Belum ada agenda
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
                    <p>Total Agenda: <b>{{ count($datakaldik) }}</b></p>
                    <p>Terbaru:
                        <br>
                        <small>
                            {{ optional($datakaldik->first())->agenda ?? '-' }}
                        </small>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Tips</h6>
                </div>
                <div class="card-body small text-muted">
                    Sesuaikan kalender pendidikan dengan kalender sekolah
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
                <h5 class="modal-title">Tambah Agenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('kaldik.tambahkaldik') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- JUDUL -->
                    <div class="mb-3">
                        <label class="form-label">Agenda</label>
                        <input type="text" name="agenda" class="form-control" required>
                    </div>

                    <!-- ISI -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="mulai" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="selesai" id="" class="form-control">
                    </div>

                    

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- MODAL EDIT -->
<div class="modal fade" id="editAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Agenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="formEditAdmin" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Agenda</label>
                        <input type="text" id="edit_agenda" name="agenda" class="form-control" required>
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
</div>


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

