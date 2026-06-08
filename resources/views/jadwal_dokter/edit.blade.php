<div id="editModal" class="modal">

    <div class="modal-content">

        <h2>Edit Jadwal Dokter</h2>

        <form id="editForm"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Dokter</label>

                <select id="edit_dokter"
                        name="dokter_id"
                        required>

                    @foreach($dokters as $dokter)

                    <option value="{{ $dokter->id }}">
                        {{ $dokter->nama_dokter }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Hari</label>

                <select id="edit_hari"
                        name="hari"
                        required>

                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>

                </select>

            </div>

            <div class="form-group">

                <label>Jam Mulai</label>

                <input type="time"
                       id="edit_mulai"
                       name="jam_mulai">

            </div>

            <div class="form-group">

                <label>Jam Selesai</label>

                <input type="time"
                       id="edit_selesai"
                       name="jam_selesai">

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