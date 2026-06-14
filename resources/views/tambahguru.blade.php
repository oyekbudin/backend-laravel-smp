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

                    <h6 class="mb-0 fw-bold">Tambah Guru</h6>



                </div>
                <div class="card-body p-0">

                    <form action="{{ route('saveguru') }}" method="POST">
                        @csrf

                        <div class="p-3 border-bottom">

                            <!-- Kode -->
                            <div class="mb-2">
                                <label class="fw-bold">Kode (A-Z)</label>

                                <select name="kode" class="form-control" required>
                                    <option value="">-- Pilih Kode --</option>

                                    @foreach (range('A', 'Z') as $huruf)
                                        @if (!in_array($huruf, $kodeTerpakai))
                                            <option value="{{ $huruf }}">{{ $huruf }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nama -->
                            <div class="mb-2">
                                <label class="fw-bold">Nama Guru</label>
                                <input type="text" name="nama" class="form-control" required
                                    placeholder="Masukkan nama guru">
                            </div>

                            <!-- Warna -->
                            <div class="mb-2">
                                <label class="fw-bold">Pilih Warna</label>

                                <div class="d-flex flex-wrap gap-2 mt-2">

                                    @php
                                        $colors = [
                                            '#A8E6CF', // hijau muda
                                            '#D3D3D3', // abu muda
                                            '#A0C4FF', // biru muda
                                            '#FFF3B0', // kuning
                                            '#FFAFCC', // pink
                                            '#FFD6A5', // oren muda
                                            '#2ECC71', // hijau tua
                                            '#FF6B6B', // merah
                                            '#F4D03F', // kuning gelap
                                            '#C77DFF', // ungu
                                            '#00B4D8', // cyan
                                            '#BDB2FF', // ungu muda
                                            '#80ED99', // hijau fresh
                                            '#FFC8DD', // pink soft
                                            '#F28482', // merah soft
                                        ];
                                    @endphp

                                    @foreach ($colors as $color)
                                        @if (!in_array($color, $warnaTerpakai))
                                            <label class="color-option">
                                                <input type="radio" name="kode_warna" value="{{ $color }}"
                                                    required>
                                                <div class="color-box" style="background: {{ $color }}"></div>
                                            </label>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="mt-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary fw-bold flex-grow-1">
                                    Simpan Guru
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
