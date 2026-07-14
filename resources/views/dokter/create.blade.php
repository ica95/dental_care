<div id="modalDokter" class="modal">

    <div class="modal-content">

        <h2>Tambah Data Dokter</h2>

        <form action="{{ route('dokter.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Nama Dokter</label>

                <input type="text"
                       name="nama_dokter"
                       required>
            </div>
            <div class="form-group">

    <label>Nomor WhatsApp</label>

    <input
        type="text"
        name="no_hp"
        required>

            </div>

            <div class="form-group">

                <label>Alamat</label>

                <textarea
                    name="alamat"
                    rows="3"
                    required></textarea>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select
                    name="status"
                    required>

                    <option value="aktif">
                        Aktif
                    </option>

                    <option value="cuti">
                        Cuti
                    </option>

                </select>

            </div>

            <div class="form-group">
                <label>Foto Dokter</label>

                <input type="file"
                       name="foto">
            </div>

            <div class="button-group">

                <button type="submit" class="btn">
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