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

                    <h6 class="mb-0 fw-bold">Tambah Pelajaran</h6>



                </div>
                <div class="card-body p-0">

                    <form action="{{ route('savepelajaran') }}" method="POST">
                        @csrf

                        <!-- hidden id guru -->
                        <input type="hidden" name="id_guru" value="{{ $data['id_guru'] }}">

                        <div>

                            <!-- Pilih Pelajaran -->
                            <div>
                                <label>Pilih Pelajaran</label>

                                <select name="id_pelajaran" required>
                                    <option value="">-- Pilih Pelajaran --</option>

                                    @foreach ($data['pelajaran'] as $pelajaran)
                                        <option value="{{ $pelajaran->id }}">
                                            {{ $pelajaran->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <!-- Pilih Kelas -->
                            <div>
                                <label>Pilih Kelas</label>

                                <select name="id_kelas" required>
                                    <option value="">-- Pilih Kelas --</option>

                                    @foreach ($data['kelas'] as $kelas)
                                        <option value="{{ $kelas->id }}">
                                            {{ $kelas->kode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <br>

                            <!-- Submit -->
                            <div>
                                <button type="submit">
                                    Simpan
                                </button>

                                <a href="{{ route('jadwal') }}">
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
