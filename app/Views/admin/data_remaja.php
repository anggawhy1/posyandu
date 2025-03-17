<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Remaja Putri</h2>

    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama Remaja Putri...">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2">No</th>
                    <th class="border border-gray-500 p-2">Nama</th>
                    <th class="border border-gray-500 p-2">NIK</th>
                    <th class="border border-gray-500 p-2">Tgl Lahir</th>
                    <th class="border border-gray-500 p-2">Golongan Darah</th>
                    <th class="border border-gray-500 p-2">Kadar HB</th>
                    <th class="border border-gray-500 p-2">Alamat</th>
                    <th class="border border-gray-500 p-2">No Telepon</th>
                    <th class="border border-gray-500 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <!-- Dummy Data -->
                <tr class="bg-white">
                    <td class="border border-gray-400 p-2 text-center">1</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Ayu Lestari</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">3402171003050001</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">10-03-2005</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">B</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">12.1</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Surobayan RT 02</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">081234567890</td>
                    <td class="border border-gray-400 p-2 text-center">
                        <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="updateRow(this)">Update</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Search Data
    document.getElementById("search").addEventListener("input", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#dataTable tr");

        rows.forEach(row => {
            let nama = row.cells[1].innerText.toLowerCase();
            row.style.display = nama.includes(filter) ? "" : "none";
        });
    });

    // Tambah Baris Baru
    function addRow() {
        let table = document.getElementById("dataTable");
        let rowCount = table.rows.length + 1;
        let row = table.insertRow();
        row.className = rowCount % 2 === 0 ? "bg-green-100" : "bg-white";
        row.innerHTML = `
            <td class="border border-gray-400 p-2 text-center">${rowCount}</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Nama Baru</td>
            <td class="border border-gray-400 p-2" contenteditable="true">NIK</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Tgl Lahir</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Gol Darah</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Kadar HB</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Alamat</td>
            <td class="border border-gray-400 p-2" contenteditable="true">No Telepon</td>
            <td class="border border-gray-400 p-2 text-center">
                <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="updateRow(this)">Update</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this)">Hapus</button>
            </td>
        `;
    }

    // Hapus Baris
    function deleteRow(button) {
        let row = button.parentElement.parentElement;
        row.parentNode.removeChild(row);
    }
</script>

<?= $this->endSection() ?>
