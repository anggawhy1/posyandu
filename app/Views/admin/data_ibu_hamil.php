<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Ibu Hamil</h2>

    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between items-center">
        <input type="text" id="searchInput" placeholder="Cari NIK atau Nama..."
            class="border p-2 text-sm w-64 rounded focus:outline-none focus:ring focus:border-blue-300">
        <a href="<?= base_url('tambah-ibu-hamil') ?>" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Data</a>
    </div>


    <!-- Table -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">No</th>
                    <th class="border border-gray-500 p-2 text-center">NIK</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Ibu</th>
                    <th class="border border-gray-500 p-2 text-center">NIK Suami</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Suami</th>
                    <th class="border border-gray-500 p-2 text-center">Pekerjaan Ibu</th>
                    <th class="border border-gray-500 p-2 text-center">Pekerjaan Suami</th>
                    <th class="border border-gray-500 p-2 text-center">Tgl Mulai Hamil</th>
                    <th class="border border-gray-500 p-2 text-center">Tgl Perkiraan Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Usia Kehamilan</th>
                    <th class="border border-gray-500 p-2 text-center">Gol. Darah Ibu</th>
                    <th class="border border-gray-500 p-2 text-center">Gol. Darah Suami</th>
                    <th class="border border-gray-500 p-2 text-center">Kadar HB</th>
                    <th class="border border-gray-500 p-2 text-center">BB Sebelum Hamil</th>
                    <th class="border border-gray-500 p-2 text-center">No Telepon</th>
                    <th class="border border-gray-500 p-2 text-center">Alamat</th>
                    <th class="border border-gray-500 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ibuHamil)) : ?>
                    <?php foreach ($ibuHamil as $index => $row) : ?>
                        <tr class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' ?>">
                            <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="nik" value="<?= esc($row['nik']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="nama_ibu_hamil" value="<?= esc($row['nama_ibu_hamil']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="nik_suami" value="<?= esc($row['nik_suami']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="nama_suami" value="<?= esc($row['nama_suami']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="pekerjaan_ibu_hamil" value="<?= esc($row['pekerjaan_ibu_hamil']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="pekerjaan_suami" value="<?= esc($row['pekerjaan_suami']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="tgl_mulai_hamil" value="<?= esc($row['tgl_mulai_hamil']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="tgl_perkiraan_lahir" value="<?= esc($row['tgl_perkiraan_lahir']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="usia_kehamilan" value="<?= esc($row['usia_kehamilan']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="golDarah_ibu_hamil" value="<?= esc($row['golDarah_ibu_hamil']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="golDarah_suami" value="<?= esc($row['golDarah_suami']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="kadar_hb" value="<?= esc($row['kadar_hb']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="bb_sebelum_hamil" value="<?= esc($row['bb_sebelum_hamil']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="no_telepon" value="<?= esc($row['no_telepon']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <input type="text" class="w-full bg-transparent text-center editable" data-id="<?= $row['id'] ?>" data-field="alamat" value="<?= esc($row['alamat']) ?>">
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                <button onclick="updateData(<?= $row['id'] ?>)" class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                                <button onclick="hapusData(<?= $row['id'] ?>)" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                                <button onclick="showArsipModal(<?= $row['id'] ?>)" class="bg-yellow-500 text-white px-3 py-1 rounded">Arsipkan</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="17" class="border border-gray-400 p-2 text-center">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>


<!-- Modal Popup Sukses -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg text-center">
        <h2 class="text-lg font-semibold mb-4">Berhasil!</h2>
        <p id="successMessage" class="mb-4"></p>
        <button onclick="closeSuccessModal()" class="bg-blue-500 text-white px-4 py-2 rounded">OK</button>
    </div>
</div>


<!-- Modal Arsip -->
<div id="arsipModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg">
        <h2 class="text-lg font-semibold mb-4">Pilih Kategori Arsip</h2>
        <input type="hidden" id="arsipId">
        <select id="kategoriArsip" class="border p-2 w-full">
            <option value="meninggal">Meninggal</option>
            <option value="keguguran">Keguguran</option>
            <option value="melahirkan">Melahirkan</option>
        </select>
        <div class="flex justify-end mt-4">
            <button onclick="closeArsipModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
            <button onclick="submitArsip()" class="bg-blue-500 text-white px-4 py-2 rounded">OK</button>
        </div>
    </div>
</div>



<!-- Modal Konfirmasi -->
<div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg text-center">
        <h2 class="text-lg font-semibold mb-4" id="confirmMessage">Apakah Anda yakin?</h2>
        <input type="hidden" id="confirmActionId">
        <button onclick="closeConfirmModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
        <button id="confirmActionBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Ya, Lanjutkan</button>
    </div>
</div>

<!-- Modal Sukses -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg text-center">
        <h2 class="text-lg font-semibold mb-4" id="successMessage">Berhasil!</h2>
        <button onclick="closeSuccessModal()" class="bg-green-500 text-white px-4 py-2 rounded">OK</button>
    </div>
</div>


<script>
    function showConfirmModal(message, action, id) {
        document.getElementById("confirmMessage").innerText = message;
        document.getElementById("confirmActionId").value = id;
        document.getElementById("confirmActionBtn").onclick = action;
        document.getElementById("confirmModal").classList.remove("hidden");
    }

    function closeConfirmModal() {
        document.getElementById("confirmModal").classList.add("hidden");
    }

    function showSuccessModal(message) {
        document.getElementById("successMessage").innerText = message;
        document.getElementById("successModal").classList.remove("hidden");
    }

    function closeSuccessModal() {
        document.getElementById("successModal").classList.add("hidden");
        location.reload();
    }
</script>


<script>
    function showArsipModal(id) {
        document.getElementById("arsipId").value = id;
        document.getElementById("arsipModal").classList.remove("hidden");
    }

    function closeArsipModal() {
        document.getElementById("arsipModal").classList.add("hidden");
    }

    function submitArsip() {
        const id = document.getElementById("arsipId").value;
        const kategori = document.getElementById("kategoriArsip").value;

        fetch("<?= base_url('arsipkan-ibu-hamil') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    id,
                    kategori
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    location.reload();
                } else {
                    alert("Gagal mengarsipkan: " + data.message);
                }
            })
            .catch(error => {
                alert("Terjadi kesalahan. Cek konsol untuk detail.");
            });
    }

    function hapusData(id) {
        showConfirmModal("Apakah Anda yakin ingin menghapus data ini?", function() {
            fetch("<?= base_url('hapus-ibu-hamil') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        closeConfirmModal();
                        showSuccessModal("Data berhasil dihapus!");
                    } else {
                        alert("Gagal menghapus: " + data.message);
                    }
                });
        }, id);
    }
</script>

<script>
    function updateData(id) {
        showConfirmModal("Apakah Anda yakin ingin memperbarui data ini?", function() {
            let inputs = document.querySelectorAll(`input[data-id='${id}']`);
            let data = {
                id: id
            };

            inputs.forEach(input => {
                let field = input.getAttribute("data-field");
                let value = input.value.trim();

                // Validasi NIK (harus angka & 16 digit)
                if (field === "nik" && (!/^\d{16}$/.test(value))) {
                    alert("NIK harus 16 digit angka!");
                    return;
                }

                data[field] = value;
            });

            fetch("<?= base_url('update-ibu-hamil') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        closeConfirmModal();
                        showSuccessModal("Data berhasil diperbarui!");
                    } else {
                        alert("Gagal memperbarui data: " + data.message);
                    }
                })
                .catch(error => {
                    alert("Terjadi kesalahan. Silakan coba lagi.");
                });
        }, id);
    }
</script>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let nik = row.querySelector("td:nth-child(2) input").value.toLowerCase(); // Ambil dari input
            let nama = row.querySelector("td:nth-child(3) input").value.toLowerCase(); // Ambil dari input

            if (nik.includes(keyword) || nama.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>




<?= $this->endSection() ?>