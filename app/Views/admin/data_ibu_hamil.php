<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Ibu Hamil</h2>
    
    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama Ibu Hamil...">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <!-- Table Wrapper -->
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
                <!-- Dummy Data -->
                <tr class="bg-white">
                    <td class="border border-gray-400 p-2 text-center">1</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Siti Aminah</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">3402171009870001</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Joko Santoso</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">3402171009760002</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Ibu Rumah Tangga</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Petani</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">01-02-2024</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">10-11-2024</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">20 Minggu</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">O</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">A</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">11.5</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">50 kg</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">081234567890</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Surobayan RT 03</td>
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
            let namaIbu = row.cells[1].innerText.toLowerCase();
            row.style.display = namaIbu.includes(filter) ? "" : "none";
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
            <td class="border border-gray-400 p-2" contenteditable="true">Nama Suami</td>
            <td class="border border-gray-400 p-2" contenteditable="true">NIK Suami</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Pekerjaan Ibu</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Pekerjaan Suami</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Tgl Mulai Hamil</td>
            <td class="border border-gray-400 p-2" contenteditable="true">HPL</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Usia Kehamilan</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Gol Darah Ibu</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Gol Darah Suami</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Kadar HB</td>
            <td class="border border-gray-400 p-2" contenteditable="true">BB Seb Hamil</td>
            <td class="border border-gray-400 p-2" contenteditable="true">No Telp</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Alamat</td>
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
