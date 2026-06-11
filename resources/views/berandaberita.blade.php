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
          <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
            Tambah Berita
          </button>
        </div>

        <div class="card-body p-0">

          @forelse ($databerita as $db)
          <div class="border-bottom p-3 d-flex align-items-start">

            <!-- THUMBNAIL -->
            <div class="me-3">
              <img src="{{ asset($db->gambar) }}" 
                   style="width:80px;height:80px;object-fit:cover;border-radius:8px;">
            </div>

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
              <button class="btn btn-warning btn-sm mb-1"
                data-bs-toggle="modal"
                data-bs-target="#editAdminModal"
                data-id="{{ $db->id_berita }}"
                data-judul="{{ $db->judul }}"
                data-isi="{{ $db->isi }}"
                data-penulis="{{ $db->penulis }}">
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

<!--div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Daftar Berita</p>
            <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#tambahAdminModal">
              Tambah Berita
            </button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal Publish</th>
              
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
    @forelse ($databerita as $db)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $db->judul }}</td>
            <td>{{ $db->penulis }}</td>
            <td>{{ $db->tanggal_publish }}</td>
            
            <td>
               
                <button class="btn btn-warning btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#editAdminModal"
        data-id="{{ $db->id_berita }}"
        data-judul="{{ $db->judul }}"
        data-isi="{{ $db->isi }}"
        data-penulis="{{ $db->penulis }}">
        Edit
    </button>

                
                <form action="{{ route('berita.destroy', $db->id_berita) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Belum ada Berita.</td>
        </tr>
    @endforelse
</tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div-->

@include('footerbar')

<!-- MODAL TAMBAH berita -->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--script src="https://cdn.jsdelivr.net/npm/tinymce@7.2.1/tinymce.min.js"></script-->
        
        <form action="{{ route('berita.tambahberita') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control">
      </div>
    </div>
    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea id="" name="isi" class="form-control"></textarea>
        
      </div>
    </div>
    <div class="col-md-12">
      <div class="mb-3">
    <label class="form-label">Gambar Berita</label>
    <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
</div>
    </div>
    <div class="col-md-12">
      <div class="mb-3">
    <label class="form-label">Thumbnail (opsional)</label>
    <input type="file" name="thumbnail" class="form-control" accept="image/*">
    <small class="text-muted">Jika kosong, otomatis pakai gambar pertama</small>
</div>
    </div>
  </div>
  <div class="text-end">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT ADMIN -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAdminModalLabel">Edit Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditAdmin" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" id="edit_judul" name="judul" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" id="edit_penulis" name="penulis" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <input type="text" id="edit_isi" name="isi" class="form-control">
              </div>
            </div>
            
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editAdminModal');
    editModal.addEventListener('show.bs.modal', function (event) {
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
        'undo','redo','|',
        'heading','|',
        'bold','italic','underline','|',
        'bulletedList','numberedList','|',
        'link','imageUpload','insertTable','blockQuote'
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
