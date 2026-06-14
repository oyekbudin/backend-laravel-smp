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

    <style>.color-option input {
        display: none;
    }

    .color-box {
        width: 35px;
        height: 35px;
        border: 2px solid #ccc;
        cursor: pointer;
        transition: 0.2s;
    }

    /* hover */
    .color-box:hover {
        transform: scale(1.1);
    }

    /* saat dipilih */
    .color-option input:checked+.color-box {
        border: 3px solid black;
        transform: scale(1.15);
        box-shadow: 0 0 0 2px white, 0 0 8px rgba(0, 0, 0, 0.4);
    }
</style>
</style>
<!-- Pell CSS -->
<link rel="stylesheet" href="https://unpkg.com/pell/dist/pell.min.css">

<!-- Pell JS -->
<script src="https://unpkg.com/pell"></script>


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h6 class="mb-0 fw-bold">Tambah Mata Pelajaran</h6>



                </div>
                <div class="card-body p-0">

                    <form action="{{ route('savemapel') }}" method="POST">
                        @csrf

                        <div class="p-3 border-bottom">

                            <!-- Kode -->
                            <div class="mb-2">
                                <label class="fw-bold">Kode Mata Pelajaran (Angka)</label>

                                <input type="text" class="form-control" name="kode" required>
                            </div>

                            <!-- Nama -->
                            <div class="mb-2">
                                <label class="fw-bold">Mata Pelajaran</label>
                                <input type="text" name="nama" class="form-control" required
                                    placeholder="Masukkan mata pelajaran">
                            </div>

                            <!-- Warna -->
                            <div class="mb-2">
                                <label class="fw-bold">Jumlah JP (Jam Pelajaran)</label>
                                <input type="number" name="jp" class="form-control" required
                                    placeholder="Masukkan JP">

                            </div>

                            <!-- Submit -->
                            <div class="mt-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary fw-bold flex-grow-1">
                                    Simpan Mata Pelajaran
                                </button>

                                <a href="{{ route('jadwal') }}" class="btn btn-secondary fw-bold">
                                    Batal
                                </a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@include('footerbar')
