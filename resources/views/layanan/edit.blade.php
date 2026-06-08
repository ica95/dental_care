<div id="editModal" class="modal">

    <div class="modal-content">

        <h2>Edit Layanan</h2>

        <form id="editForm"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Nama Layanan</label>

                <input type="text"
                       id="edit_nama"
                       name="nama_layanan"
                       required>

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea id="edit_deskripsi"
                          name="deskripsi"
                          rows="4"
                          required></textarea>

            </div>

            <div class="form-group">

                <label>Ganti Foto</label>

                <input type="file"
                       name="foto">

            </div>

            <div class="button-group">

                <button type="submit"
                        class="btn">
                    Update
                </button>

                <button type="button"
                        class="btn-danger"
                        onclick="closeEditModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>