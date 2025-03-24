<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Remaja Putri</h2>

    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-64" placeholder="Cari Nama atau NIK...">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Data</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">No</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Lengkap</th>
                    <th class="border border-gray-500 p-2 text-center">NIK</th>
                    <th class="border border-gray-500 p-2 text-center">Tanggal Lahir</th>
                    <th class="border border-gray-500 p-2 text-center">Golongan Darah</th>
                    <th class="border border-gray-500 p-2 text-center">Kadar HB</th>
                    <th class="border border-gray-500 p-2 text-center">Alamat</th>
                    <th class="border border-gray-500 p-2 text-center">Nomor Telepon</th>
                    <th class="border border-gray-500 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php foreach ($remajaputri as $index => $row) : ?>
                    <tr class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-green-100' ?>">
                        <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                        <td class="border border-gray-400 p-2"><?= esc($row['nama_lengkap']) ?></td>
                        <td class="border border-gray-400 p-2"><?= esc($row['nik']) ?></td>
                        <td class="border border-gray-400 p-2"><?= esc($row['tanggal_lahir']) ?></td>
                        <td class="border border-gray-400 p-2 text-center"><?= esc($row['golongan_darah']) ?></td>
                        <td class="border border-gray-400 p-2 text-center"><?= esc($row['kadar_hb']) ?></td>
                        <td class="border border-gray-400 p-2"><?= esc($row['alamat']) ?></td>
                        <td class="border border-gray-400 p-2 text-center"><?= esc($row['nomor_telepon']) ?></td>
                        <td class="border border-gray-400 p-2 text-center">
                            <button class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById("search").addEventListener("keyup", function() {
        let keyword = this.value.toLowerCase();
        document.querySelectorAll("#dataTable tr").forEach(row => {
            let nama = row.cells[1].textContent.toLowerCase();
            let nik = row.cells[2].textContent.toLowerCase();
            row.style.display = (nama.includes(keyword) || nik.includes(keyword)) ? "" : "none";
        });
    });
</script>

<?= $this->endSection() ?>
