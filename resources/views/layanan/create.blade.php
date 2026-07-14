<div id="modalLayanan" class="modal">

    <div class="modal-content">

        <h2>Tambah Layanan</h2>

        <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>Nama Layanan</label>

                <input
                    type="text"
                    name="nama_layanan"
                    required>

            </div>

            <div class="form-group">

                <label>Biaya</label>

                <input
                    type="number"
                    name="biaya"
                    placeholder="Contoh : 150000"
                    min="0"
                    required>

            </div>

            <div class="form-group">

                <label>Foto</label>

                <input
                    type="file"
                    name="foto"
                    accept="image/*">

            </div>

            <div class="button-group">

                <button type="submit" class="btn">
                    Simpan
                </button>

                <button type="button" class="btn-danger" onclick="closeModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>