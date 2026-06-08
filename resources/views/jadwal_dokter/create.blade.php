<div id="modalJadwal" class="modal">

    <div class="modal-content">

        <h2>Tambah Jadwal Dokter</h2>

        <form action="{{ route('jadwal_dokter.store') }}"
              method="POST">

            @csrf

            <div class="form-group">
                <label>Dokter</label>

                <select name="dokter_id" required>
                    <option value="">-- Pilih Dokter --</option>

                    @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">
                        {{ $dokter->nama_dokter }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Hari</label>

                <select name="hari" required>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Mulai</label>
                <input type="time"
                       name="jam_mulai"
                       required>
            </div>

            <div class="form-group">
                <label>Jam Selesai</label>
                <input type="time"
                       name="jam_selesai"
                       required>
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