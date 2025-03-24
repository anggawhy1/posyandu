<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Ibu Hamil</h2>

    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <form method="GET" class="flex">
            <input type="text" name="search" id="search" class="border p-2 w-64"
                placeholder="Cari Nama atau NIK..." value="<?= esc($searchQuery ?? '') ?>">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded">Cari</button>
        </form>

        <button class="bg-green-500 text-white px-4 py-2 rounded">Tambah Data</button>
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
                        <tr class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-green-100' ?>">
                            <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nik']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nama_ibu_hamil']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nik_suami']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nama_suami']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['pekerjaan_ibu_hamil']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['pekerjaan_suami']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['tgl_mulai_hamil']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['tgl_perkiraan_lahir']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['usia_kehamilan']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['golDarah_ibu_hamil']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['golDarah_suami']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['kadar_hb']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['bb_sebelum_hamil']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['no_telepon']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['alamat']) ?></td>
                            <td class="border border-gray-400 p-2 text-center">
                                <button class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
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

<?= $this->endSection() ?>
