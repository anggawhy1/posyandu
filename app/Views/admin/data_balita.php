<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Pemantauan Balita</h2>

    <!-- Filter & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <div>
            <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama Anak..." onkeyup="searchTable()">
            <select id="genderFilter" class="border p-2 ml-2" onchange="filterGender()">
                <option value="all">Semua</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">No</th>
                    <th class="border border-gray-500 p-2 text-center">NIK Anak</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Anak</th>
                    <th class="border border-gray-500 p-2 text-center">Tanggal Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Jenis Kelamin</th>
                    <th class="border border-gray-500 p-2 text-center">Berat Badan Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Panjang Badan Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Lingkar Kepala Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Premature / Mature</th>
                    <th class="border border-gray-500 p-2 text-center">No KK</th>
                    <th class="border border-gray-500 p-2 text-center">NIK Ibu</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Ibu</th>
                    <th class="border border-gray-500 p-2 text-center">NIK Ayah</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Ayah</th>
                    <th class="border border-gray-500 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php if (!empty($balita)): ?>
                    <?php foreach ($balita as $index => $row): ?>
                        <tr class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-green-100' ?>" data-gender="<?= $row['jenis_kelamin'] ?>">
                            <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nik_anak'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nama_anak'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['tgl_lahir'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['jenis_kelamin'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['berat_badan_lahir'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['panjang_badan_lahir'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['lingkar_kepala_lahir'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['premature_mature'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['no_kk'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nik_ibu'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nama_ibu'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nik_ayah'] ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= $row['nama_ayah'] ?></td>
                            <td class="border border-gray-400 p-2 text-center">
                                <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="confirmUpdate(this)">Update</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="confirmDelete(this)">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="15" class="border border-gray-400 p-2 text-center">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function searchTable() {
        let input = document.getElementById("search").value.toLowerCase();
        document.querySelectorAll("#dataTable tr").forEach(row => {
            row.style.display = row.cells[2].textContent.toLowerCase().includes(input) ? "" : "none";
        });
    }

    function filterGender() {
        let filter = document.getElementById("genderFilter").value;
        document.querySelectorAll("#dataTable tr").forEach(row => {
            row.style.display = (filter === "all" || row.getAttribute("data-gender") === filter) ? "" : "none";
        });
    }

    function confirmUpdate(button) {
        alert("Data berhasil diperbarui!");
    }

    function confirmDelete(button) {
        if (confirm("Hapus data ini?")) button.closest("tr").remove();
    }
</script>

<?= $this->endSection() ?>
