<div id="editModal" class="modal">

    <div class="modal-content">

        <h2>Edit Dokter</h2>

        <form id="editForm"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Dokter</label>

                <input type="text"
                       id="edit_nama"
                       name="nama_dokter"
                       required>
            </div>
<div class="form-group">

    <label>Nomor WhatsApp</label>

    <input
        type="text"
        name="no_hp"
        value="{{ $dokter->no_hp }}"
        required>

</div>

<div class="form-group">

    <label>Alamat</label>

    <textarea
        name="alamat"
        rows="3"
        required>{{ $dokter->alamat }}</textarea>

</div>

<div class="form-group">

    <label>Status</label>

    <select
        name="status">

        <option
            value="aktif"
            {{ $dokter->status == 'aktif' ? 'selected' : '' }}>
            Aktif
        </option>

        <option
            value="cuti"
            {{ $dokter->status == 'cuti' ? 'selected' : '' }}>
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