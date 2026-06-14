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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-0">

                    <div class="border-bottom p-3 d-flex align-items-start">
                        <div>
                            <span>A</span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Ibnu Sadun</h6>


                            <div class="badge bg-primary d-flex flex-column">
                                <span>PAI - Kelas 7</span>
                                <span>A.1</span>
                            </div>
                            <div class="badge bg-primary d-flex flex-column">
                                <span>Ke-NU-an - Kelas 9</span>
                                <span>A.13</span>
                            </div>


                        </div>
                    </div>
                    <div class="border-bottom p-3 d-flex align-items-start">
                        <div>
                            <span>A</span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Ibnu Sadun</h6>


                            <div class="badge bg-primary d-flex flex-column">
                                <span>PAI - Kelas 7</span>
                                <span>A.1</span>
                            </div>
                            <div class="badge bg-primary d-flex flex-column">
                                <span>Ke-NU-an - Kelas 9</span>
                                <span>A.13</span>
                            </div>


                        </div>
                    </div>

                    <!--table>
                        <thead>
                            <tr>
                                <td>KODE</td>
                                <td>NAMA GURU</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A</td>
                                <td>Ibnu Sadun</td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td>Ratman</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Ahmad</td>
                            </tr>
                        </tbody>
                    </table-->

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-0">

                    <table>
                        <thead>
                            <tr>
                                <td>NO</td>
                                <td>MATA PELAJARAN</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>PAI</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>PPKN</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>B. INDONESIA</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>
</div>


@include('footerbar')
