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
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold">Jadwal Pelajaran</h6>

                    <a class="btn btn-primary ms-auto" href="/aturhari">
                        
                        Lanjutkan <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h6 class="mb-0 fw-bold">Nama Guru</h6>

                    <a class="btn btn-primary ms-auto" href="/tambahguru">
                        Tambah Guru
                    </a>

                </div>
                <div class="card-body p-0">

                    @forelse ($data['guru'] as $guru)
                        <div class="border-bottom p-3 d-flex align-items-start gap-3">
                            @php
                                $totalJP = $data['jadwal']
                                    ->where('id_guru', $guru->id)
                                    ->sum(function ($jd) use ($data) {
                                        return $data['pelajaran']->firstWhere('id', $jd->id_pelajaran)->jp ?? 0;
                                    });
                            @endphp






                            <div class="flex-grow-1">

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex justify-content-start gap-3 align-items-center ">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:30px; height:30px; background: {{ $guru->kode_warna }};">
                                            <span class="fw-bold">{{ $guru->kode }}</span>
                                        </div>
                                        <h5 class="mb-0 fw-bold">{{ $guru->nama }}</h5>

                                        <button
                                            class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1 px-2 py-1 m-0">
                                            <i class="bi bi-pencil" style="font-size: 16px;"></i>
                                            <span>Edit Guru</span>
                                        </button>
                                    </div>

                                    <span class="fw-bold text-muted">Total: {{ $totalJP }} JP</span>

                                </div>
                                <div class="d-flex flex-wrap gap-2 align-items-center">

                                    @php
                                        $jadwalGuru = $data['jadwal']->where('id_guru', $guru->id);
                                    @endphp

                                    @forelse ($jadwalGuru as $jd)
                                        @php
                                            $kelas = $data['kelas']->firstWhere('id', $jd->id_kelas);
                                            $pelajaran = $data['pelajaran']->firstWhere('id', $jd->id_pelajaran);

                                        @endphp



                                        <div class="rounded border p-1 d-flex align-items-center gap-2">
                                            <span class="badge text-dark"
                                                style="background: {{ $guru->kode_warna }};">{{ $guru->kode }}.{{ $pelajaran->kode }}</span>
                                            <span class="fw-bold">{{ $pelajaran->nama ?? '-' }}
                                                ({{ $kelas->nama ?? '-' }})
                                            </span>

                                            <button
                                                class="btn btn-danger d-flex align-items-center justify-content-center m-0 p-1 rounded-2"
                                                title="Hapus">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>


                                    @empty
                                        <div class="p-4 text-center text-muted">
                                            Belum ada pelajaran
                                        </div>
                                    @endforelse



                                    <a href="/tambahpelajaran/{{ $guru->id }}"
                                        class="btn btn-primary btn-sm d-flex align-items-center gap-1 px-2 py-1 m-0">
                                        <i class="bi bi-plus" style="font-size: 20px;"></i>
                                        <span class="fw-bold">Tambah Pelajaran</span>
                                    </a>

                                </div>

                            </div>

                        </div>
                    @empty
                        <div class="p-4 text-center text-muted">
                            Belum ada guru
                        </div>
                    @endforelse



                    <!-- ITEM
                    <div class="border-bottom p-3 d-flex align-items-start gap-3">


                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width:45px; height:45px; font-size:18px;">
                            <span class="fw-bold">A</span>
                        </div>


                        <div class="flex-grow-1">


                            <div class="d-flex justify-content-start gap-3 align-items-center mb-2">
                                <h5 class="mb-0 fw-bold">Ibnu Sadun</h5>

                                <button
                                    class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1 px-2 py-1 m-0">
                                    <i class="bi bi-pencil" style="font-size: 16px;"></i>
                                    <span>Edit Guru</span>
                                </button>
                            </div>


                            <div class="d-flex flex-wrap gap-2 align-items-center">


                                <div class="border px-2 py-1 d-flex align-items-center gap-2">
                                    <span class="bg-primary text-white px-2 py-0">A.1</span>
                                    <span class="fw-bold">Ke-NU-an Kelas 9</span>

                                    <button
                                        class="btn btn-danger btn-sm p-1 d-flex align-items-center justify-content-center m-0">
                                        <i class="bi bi-trash" style="font-size: 20px;"></i>
                                    </button>
                                </div>


                                <button class="btn btn-primary btn-sm d-flex align-items-center gap-1 px-2 py-1 m-0">
                                    <i class="bi bi-plus" style="font-size: 20px;"></i>
                                    <span class="fw-bold">Tambah Pelajaran</span>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>
                 END ITEM -->

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header d-flex flex-column justify-content-between align-items-center gap-3">

                    <h6 class="mb-0 fw-bold">Mata Pelajaran</h6>

                    <a class="btn btn-primary m-0" href="/tambahmapel">
                        Tambah Mata Pelajaran
                    </a>

                </div>
                <div class="card-body p-0">

                    @forelse ($data['pelajaran'] as $pelajaran)
                        <div class="border-bottom px-3 py-2 d-flex justify-content-between align-items-center">

                            <!-- Kiri: kode + nama -->
                            <div class="d-flex flex-row gap-3">
                                <div class="fw-bold">{{ $pelajaran->kode }}</div>
                                <div class="text-muted">{{ $pelajaran->nama }}</div>
                            </div>

                            <!-- Kanan: JP -->
                            <div class="fw-semibold">
                                {{ $pelajaran->jp ?? '-' }} JP
                            </div>

                        </div>

                    @empty

                        <div class="p-3 text-center text-muted">
                            Belum ada pelajaran
                        </div>
                    @endforelse

                </div>
            </div>


        </div>
    </div>
</div>


@include('footerbar')
