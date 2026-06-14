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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">

                    <!-- ITEM -->
                    <div class="border-bottom p-3 d-flex align-items-start gap-3">

                        <!-- Avatar -->
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width:45px; height:45px; font-size:18px;">
                            <span class="fw-bold">A</span>
                        </div>

                        <!-- Content -->
                        <div class="flex-grow-1">

                            <h5 class="mb-2 fw-bold">Ibnu Sadun</h5>

                            <div class="d-flex flex-wrap gap-2">

                                <div class="border rounded-pill px-3 py-2 d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill bg-primary">A.1</span>
                                    <span class="fw-bold">Ke-NU-an Kelas 9</span>
                                </div>

                                <div class="border rounded-pill px-3 py-2 d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill bg-success">B.2</span>
                                    <span class="fw-bold">PAI Kelas 7</span>
                                </div>

                                <div class="border rounded-pill px-3 py-2 d-flex align-items-center gap-2">
                                    <span class="badge rounded-pill bg-danger">C.3</span>
                                    <span class="fw-bold">Fiqih Kelas 8</span>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- END ITEM -->

                </div>
            </div>
        </div>
    </div>
</div>


@include('footerbar')
