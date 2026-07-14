<div id="editModal" class="modal">

    <div class="modal-content">

        <h2>Edit Layanan</h2>

        <form
            id="editForm"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Nama Layanan</label>

                <input
                    type="text"
                    id="edit_nama"
                    name="nama_layanan"
                    required>

            </div>

            <div class="form-group">

                <label>Biaya</label>

                <input
                    type="number"
                    id="edit_biaya"
                    name="biaya"
                    min="0"
                    required>

            </div>

            <div class="form-group">

                <label>Foto Saat Ini</label>

                <div style="text-align:center;margin-bottom:15px;">

                    <img
                        id="edit_foto_preview"
                        src=""
                        width="150"
                        style="display:none;border-radius:10px;object-fit:cover;">

                </div>

            </div>

            <div class="form-group">

                <label>Ganti Foto</label>

                <input
                    type="file"
                    name="foto"
                    accept="image/*">

                <small style="color:#777;">
                    Kosongkan jika foto tidak ingin diganti.
                </small>

            </div>

            <div class="button-group">

                <button type="submit" class="btn">
                    Update
                </button>

                <button
                    type="button"
                    class="btn-danger"
                    onclick="closeEditModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>