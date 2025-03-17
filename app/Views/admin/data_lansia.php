<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Lansia</h2>

    <!-- Search & Filter -->
    <div class="mb-4 flex justify-between">
        <div>
            <input type="text" id="search" class="border p-2 w-64" placeholder="Cari Nama atau NIK..." onkeyup="searchTable()">
            <select id="filterJK" class="border p-2 ml-2" onchange="filterGender()">
                <option value="">Semua</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
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
                <?php if (!empty($lansia)) : ?>
                    <?php foreach ($lansia as $index => $row) : ?>
                        <?php $bgColor = $index % 2 == 0 ? "bg-white" : "bg-green-100"; ?>
                        <tr class="<?= $bgColor ?>">
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
    // Fungsi Search
    function searchTable() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("#dataTable tr");

        rows.forEach(row => {
            let nik = row.cells[1].innerText.toLowerCase();
            let nama = row.cells[2].innerText.toLowerCase();
            row.style.display = (nik.includes(input) || nama.includes(input)) ? "" : "none";
        });
    }

    // Filter Jenis Kelamin
    function filterGender() {
        let filter = document.getElementById("filterJK").value;
        let rows = document.querySelectorAll("#dataTable tr");

        rows.forEach(row => {
            let gender = row.getAttribute("data-gender");
            row.style.display = (filter === "" || gender === filter) ? "" : "none";
        });
    }

    // Tambah Baris (Simulasi)
    function addRow() {
        let table = document.getElementById("dataTable");
        let row = table.insertRow();
        let rowCount = table.rows.length;

        row.className = rowCount % 2 === 0 ? "bg-green-100" : "bg-white";
        row.innerHTML = `
            <td class="border border-gray-400 p-2 text-center">${rowCount}</td>
            <td class="border border-gray-400 p-2" contenteditable="true">3402170000000000</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Nama Baru</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Alamat Baru</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">70</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">L</td>
            <td class="border border-gray-400 p-2 text-center">
                <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="updateRow(this)">Update</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this)">Hapus</button>
            </td>
        `;
    }

    // Hapus Baris
    function deleteRow(button) {
        let row = button.parentElement.parentElement;
        row.remove();
    }

    // Update Baris (Simulasi)
    function updateRow(button) {
        let row = button.parentElement.parentElement;
        let data = [];

        for (let i = 1; i < row.cells.length - 1; i++) {
            data.push(row.cells[i].innerText.trim());
        }

        console.log("Data Updated:", data);
        alert("Data berhasil diperbarui! (Simulasi)");
    }
</script>

<?= $this->endSection() ?>