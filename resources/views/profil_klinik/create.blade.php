<div id="modalProfil" class="modal">

    <div class="modal-content">

        <h2>Tambah Profil Klinik</h2>

        <form action="{{ route('profil_klinik.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Nama Klinik</label>

                <input type="text"
                       name="nama_klinik"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>

                <textarea name="alamat"
                          rows="3"
                          required></textarea>
            </div>

            <div class="form-group">
              <label>No. HP</label>

              <input type="text"
                     name="no_hp"
                     required>
            </div>

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email">
            </div>

            <div class="form-group">
                <label>Deskripsi Klinik</label>

                <textarea name="deskripsi"
                        rows="4"
                        required></textarea>
            </div>

            <div class="form-group">
                <label>Logo Klinik</label>

                <input type="file"
                       name="logo">
            </div>

            <div class="button-group">

                <button type="submit"
                        class="btn">
                    Simpan
                </button>

                <button type="button"
                        class="btn-danger"
                        onclick="closeModal()">
                    Batal
                </button>

            </div>

        </form>

    </div>

</div>