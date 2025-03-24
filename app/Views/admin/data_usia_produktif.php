<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Usia Produktif</h2>

    <!-- Search & Filter -->
    <div class="mb-4 flex justify-between">
        <form method="GET" id="filterForm" class="flex space-x-2">
            <input type="text" name="search" id="search" class="border p-2 w-64"
                placeholder="Cari Nama atau NIK..." value="<?= esc($_GET['search'] ?? '') ?>">

            <select name="alamat" id="filterAlamat" class="border p-2">
                <option value="">Semua RT</option>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="Surobayan RT0<?= $i ?>" <?= ($_GET['alamat'] ?? '') === "Surobayan RT0$i" ? 'selected' : '' ?>>
                        Surobayan RT0<?= $i ?>
                    </option>
                <?php endfor; ?>
            </select>

            <select name="jenis_kelamin" id="filterJK" class="border p-2">
                <option value="">Semua</option>
                <option value="L" <?= ($_GET['jenis_kelamin'] ?? '') === "L" ? "selected" : "" ?>>Laki-laki</option>
                <option value="P" <?= ($_GET['jenis_kelamin'] ?? '') === "P" ? "selected" : "" ?>>Perempuan</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
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
                    <th class="border border-gray-500 p-2 text-center">Nama</th>
                    <th class="border border-gray-500 p-2 text-center">Alamat</th>
                    <th class="border border-gray-500 p-2 text-center">Usia</th>
                    <th class="border border-gray-500 p-2 text-center">JK</th>
                    <th class="border border-gray-500 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php if (!empty($usiaProduktif)) : ?>
                    <?php foreach ($usiaProduktif as $index => $row) : ?>
                        <tr class="<?= $index % 2 == 0 ? 'bg-white' : 'bg-green-100' ?>">
                            <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nik']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['nama']) ?></td>
                            <td class="border border-gray-400 p-2"><?= esc($row['alamat']) ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= esc($row['usia']) ?></td>
                            <td class="border border-gray-400 p-2 text-center"><?= esc($row['jenis_kelamin']) ?></td>
                            <td class="border border-gray-400 p-2 text-center">
                                <button class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="border border-gray-400 p-2 text-center">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Search & Filter langsung tanpa reload
    document.querySelectorAll("#search, #filterAlamat, #filterJK").forEach(input => {
        input.addEventListener("input", () => {
            document.getElementById("filterForm").submit();
        });
    });
</script>

<?= $this->endSection() ?>
