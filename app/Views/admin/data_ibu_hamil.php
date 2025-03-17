<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Ibu Hamil</h2>

    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama Ibu Hamil...">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2">No</th>
                    <th class="border border-gray-500 p-2">Nama Ibu Hamil</th>
                    <th class="border border-gray-500 p-2">NIK</th>
                    <th class="border border-gray-500 p-2">Nama Suami</th>
                    <th class="border border-gray-500 p-2">NIK Suami</th>
                    <th class="border border-gray-500 p-2">Pekerjaan Ibu</th>
                    <th class="border border-gray-500 p-2">Pekerjaan Suami</th>
                    <th class="border border-gray-500 p-2">Tgl Mulai Hamil</th>
                    <th class="border border-gray-500 p-2">Hari Perkiraan Lahir</th>
                    <th class="border border-gray-500 p-2">Usia Kehamilan</th>
                    <th class="border border-gray-500 p-2">Golongan Darah Ibu</th>
                    <th class="border border-gray-500 p-2">Golongan Darah Suami</th>
                    <th class="border border-gray-500 p-2">Kadar HB</th>
                    <th class="border border-gray-500 p-2">BB Sebelum Hamil</th>
                    <th class="border border-gray-500 p-2">No Telepon</th>
                    <th class="border border-gray-500 p-2">Alamat</th>
                    <th class="border border-gray-500 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php $no = 1; foreach ($ibuHamil as $ibu) : ?>
                <tr class="bg-white">
                    <td class="border border-gray-400 p-2 text-center"><?= $no++ ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['nama_ibu_hamil']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['nik']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['nama_suami']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['nik_suami']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['pekerjaan_ibu_hamil']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['pekerjaan_suami']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['tgl_mulai_hamil']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['tgl_perkiraan_lahir']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['usia_kehamilan']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['golDarah_ibu_hamil']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['golDarah_suami']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['kadar_hb']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['bb_sebelum_hamil']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['no_telepon']) ?></td>
                    <td class="border border-gray-400 p-2"><?= esc($ibu['alamat']) ?></td>
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
    document.getElementById("search").addEventListener("input", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#dataTable tr");

        rows.forEach(row => {
            let namaIbu = row.cells[1].innerText.toLowerCase();
            row.style.display = namaIbu.includes(filter) ? "" : "none";
        });
    });
</script>

<?= $this->endSection() ?>
