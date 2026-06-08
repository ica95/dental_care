<div id="editModal" class="modal">

    <div class="modal-content">

        <h2>Edit Profil Klinik</h2>

        <form id="editForm"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Klinik</label>

                <input type="text"
                       id="edit_nama_klinik"
                       name="nama_klinik"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>

                <textarea id="edit_alamat"
                          name="alamat"
                          rows="3"
                          required></textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>

                <input type="text"
                       id="edit_no_hp"
                       name="no_hp"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       id="edit_email"
                       name="email"
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
                <label>Ganti Logo</label>

                <input type="file"
                       name="logo">
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