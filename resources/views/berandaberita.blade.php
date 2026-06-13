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
                    <h5 class="mb-0">Semua Berita</h5>
                    <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                        data-bs-target="#tambahAdminModal">
                        Tambah Berita
                    </button>
                </div>

                <div class="card-body p-0">

                    @forelse ($databerita as $db)
                        <div class="border-bottom p-3 d-flex align-items-start">

                            <!-- THUMBNAIL
                            <div class="me-3">
                                <img src="{{ asset($db->gambar) }}"
                                    style="width:80px;height:80px;object-fit:cover;border-radius:8px;">
                            </div>-->

                            <!-- CONTENT -->
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">{{ $db->judul }}</h6>

                                <small class="text-muted">
                                    oleh <b>{{ $db->penulis }}</b> •
                                    {{ \Carbon\Carbon::parse($db->tanggal_publish)->translatedFormat('d M Y') }}
                                </small>

                                <div class="mt-1 text-muted small">
                                    {!! \Str::limit(strip_tags($db->isi), 100) !!}
                                </div>
                            </div>

                            <!-- ACTION -->
                            <div class="text-end ms-3">
                                <!--button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#editAdminModal" data-id="{{ $db->id_berita }}"
                                    data-judul="{{ $db->judul }}" data-isi="{{ $db->isi }}"
                                    data-penulis="{{ $db->penulis }}">
                                    Edit
                                </button-->
                                <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#editAdminModal" data-id="{{ $db->id_berita }}"
                                    data-judul="{{ $db->judul }}" data-isi="{{ $db->isi }}"
                                    data-penulis="{{ $db->penulis }}" data-gambar="{{ asset($db->gambar) }}">
                                    Edit
                                </button>

                                <form action="{{ route('berita.destroy', $db->id_berita) }}" method="POST">
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
                            Belum ada berita
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
                    <p>Total Berita: <b>{{ count($databerita) }}</b></p>
                    <p>Terbaru:
                        <br>
                        <small>
                            {{ optional($databerita->first())->judul ?? '-' }}
                        </small>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Tips</h6>
                </div>
                <div class="card-body small text-muted">
                    Gunakan judul yang menarik dan gambar berkualitas agar berita lebih engaging.
                </div>
            </div>
        </div>

    </div>
</div>


@include('footerbar')

<!-- MODAL TAMBAH BERITA -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('berita.tambahberita') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- JUDUL -->
                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <!-- ISI -->
                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea rows="10" name="isi" class="form-control"></textarea>
                    </div>

                    <!-- GAMBAR -->
                    <div class="mb-3">
                        <label class="form-label">Foto Utama</label>

                        <!-- input hidden -->
                        <input type="file" name="gambar" id="gambarInput" class="d-none" accept="image/*"
                            onchange="previewGambar(event)" required>

                        <!-- box -->
                        <div id="uploadBox"
                            class="w-25 border border-2 border-secondary rounded d-flex align-items-center justify-content-center position-relative overflow-hidden"
                            style="cursor: pointer; aspect-ratio:1/1;"
                            onclick="document.getElementById('gambarInput').click()">

                            <span id="iconPlus" class="fs-1 text-secondary">+</span>

                            <!-- preview -->
                            <img id="preview"
                                class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover d-none">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Album Foto</label>

                        <div class="row g-2">

                            @for ($i = 2; $i <= 10; $i++)
                                <div class="col-4 col-md-3">

                                    <!-- input hidden -->
                                    <input type="file" name="gambar{{ $i }}"
                                        id="gambarInput{{ $i }}" class="d-none" accept="image/*"
                                        onchange="previewGambar(event, {{ $i }})">

                                    <!-- box -->
                                    <div onclick="document.getElementById('gambarInput{{ $i }}').click()"
                                        class="border border-2 border-secondary rounded d-flex align-items-center justify-content-center position-relative overflow-hidden"
                                        style="cursor:pointer; aspect-ratio:1/1;">

                                        <!-- icon + -->
                                        <span id="iconPlus{{ $i }}" class="fs-3 text-secondary">+</span>

                                        <!-- preview -->
                                        <img id="preview{{ $i }}"
                                            class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover d-none">
                                    </div>

                                </div>
                            @endfor

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>

                </form>

            </div>

        </div>
    </div>
</div>
<script>
    function previewGambar(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        const icon = document.getElementById('iconPlus');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
            icon.classList.add('d-none');
        }
    }
</script>
<script>
    function previewGambar(event, index) {
        const input = event.target;
        const preview = document.getElementById('preview' + index);
        const icon = document.getElementById('iconPlus' + index);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                icon.classList.add('d-none');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modalElement = document.getElementById('tambahAdminModal');
            if (modalElement) {
                var myModal = new bootstrap.Modal(modalElement);
                myModal.show();
            }
        });
    </script>
@endif

<!-- MODAL EDIT berita -->
<!-- MODAL EDIT BERITA (SAMA SEPERTI TAMBAH) -->
<div class="modal fade" id="editAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="formEditAdmin" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" id="edit_judul" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea id="edit_isi" name="isi" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" id="edit_penulis" name="penulis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Berita</label>

                        <input type="file" name="gambar" class="form-control mb-2"
                            onchange="previewEditGambar(event)">

                        <img id="previewEdit" style="width:100%; display:none; margin-top:10px; border-radius:8px;">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    function previewEditGambar(event) {
        const img = document.getElementById('previewEdit');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editAdminModal');

        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            var id = button.getAttribute('data-id');
            var judul = button.getAttribute('data-judul');
            var isi = button.getAttribute('data-isi');
            var penulis = button.getAttribute('data-penulis');
            var gambar = button.getAttribute('data-gambar');

            document.getElementById('edit_judul').value = judul;
            document.getElementById('edit_isi').value = isi;
            document.getElementById('edit_penulis').value = penulis;

            // 🔥 tampilkan gambar lama
            const preview = document.getElementById('previewEdit');
            if (gambar) {
                preview.src = gambar;
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }

            document.getElementById('formEditAdmin').action = '/berita/' + id;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editAdminModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            var id = button.getAttribute('data-id');
            var judul = button.getAttribute('data-judul');
            var isi = button.getAttribute('data-isi');
            var penulis = button.getAttribute('data-penulis');

            // Isi form
            //document.getElementById('edit_id').value = id;
            document.getElementById('edit_judul').value = judul;
            document.getElementById('edit_isi').value = isi;
            document.getElementById('edit_penulis').value = penulis;

            // Set action URL untuk update
            document.getElementById('formEditAdmin').action = '/berita/' + id;
        });
    });
</script>
<script>
    tinymce.init({
        selector: '#isi',
        plugins: 'image link media code lists table',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',
        menubar: 'insert',
        image_caption: true,
        automatic_uploads: true,
        relative_urls: false,
    });
</script>


<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor.create(document.querySelector('#editor'), {

            toolbar: [
                'undo', 'redo', '|',
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'imageUpload', 'insertTable', 'blockQuote'
            ]

        })
        .then(editor => {

            // 🔥 CUSTOM IMAGE UPLOAD ADAPTER
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };

        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => new Promise((resolve, reject) => {

                    let data = new FormData();
                    data.append('upload', file);
                    data.append('_token', '{{ csrf_token() }}');

                    fetch("{{ url('/upload-image') }}", {
                            method: 'POST',
                            body: data
                        })
                        .then(response => response.json())
                        .then(result => {
                            resolve({
                                default: result.url
                            });
                        })
                        .catch(error => {
                            reject(error);
                        });

                }));
        }

        abort() {}
    }
</script>
<script>
    document.addEventListener("trix-attachment-add", function(event) {

        if (event.attachment.file) {
            uploadAttachment(event.attachment);
        }

    });

    function uploadAttachment(attachment) {

        let file = attachment.file;
        let formData = new FormData();

        formData.append("upload", file);
        formData.append("_token", "{{ csrf_token() }}");

        fetch("{{ url('/upload-image') }}", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                console.log("UPLOAD RESULT:", data);

                // 🔥 INI KUNCI TRIX
                attachment.setAttributes({
                    url: data.url,
                    href: data.url
                });

            })
            .catch(error => {
                console.error("UPLOAD ERROR:", error);
            });

    }
</script>
