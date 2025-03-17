<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Pemantauan Balita</h2>
    
    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama Anak..." onkeyup="searchTable()">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">No</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Nama Anak</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Tanggal Lahir</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Nama Orang Tua</th>
                    
                    <!-- Header Tanggal -->
                    <th class="border border-gray-500 p-2 text-center" colspan="6">20 Januari 2025</th>
                    <th class="border border-gray-500 p-2 text-center" colspan="6">17 Februari 2025</th>
                    <th class="border border-gray-500 p-2 text-center" colspan="6">16 Maret 2025</th>
                    <th class="border border-gray-500 p-2 text-center" colspan="6">20 April 2025</th>
                    <th class="border border-gray-500 p-2 text-center" colspan="6">18 Mei 2025</th>
                    
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Aksi</th>
                </tr>
                <tr class="bg-gray-600">
                    <!-- Sub-header BB, TB, LILA, LK, Vit A, ASI -->
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <th class="border border-gray-500 p-2 text-center">BB (kg)</th>
                        <th class="border border-gray-500 p-2 text-center">TB (cm)</th>
                        <th class="border border-gray-500 p-2 text-center">LILA</th>
                        <th class="border border-gray-500 p-2 text-center">LK</th>
                        <th class="border border-gray-500 p-2 text-center">Vit A</th>
                        <th class="border border-gray-500 p-2 text-center">ASI</th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody id="dataTable">
                <tr class="bg-white">
                    <td class="border border-gray-400 p-2 text-center">1</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Raka</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">2020-09-02</td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Sri Utami</td>

                    <!-- Dummy Data BB, TB, LILA, LK, Vit A, ASI -->
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">12,05</td>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">91,5</td>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">14</td>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">15</td>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">Ya</td>
                        <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
                    <?php endfor; ?>

                    <!-- Kolom Aksi -->
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
    // Fungsi Search Nama Anak
    function searchTable() {
        let input = document.getElementById("search").value.toLowerCase();
        let table = document.getElementById("dataTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let nameCell = rows[i].getElementsByTagName("td")[1]; // Kolom Nama Anak
            if (nameCell) {
                let nameText = nameCell.textContent || nameCell.innerText;
                rows[i].style.display = nameText.toLowerCase().includes(input) ? "" : "none";
            }
        }
    }

    // Tambah Baris
    function addRow() {
        let table = document.getElementById("dataTable");
        let row = table.insertRow();
        let rowCount = table.rows.length;
        
        row.className = rowCount % 2 === 0 ? "bg-green-100" : "bg-white";
        row.innerHTML = `
            <td class="border border-gray-400 p-2 text-center">${rowCount}</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Nama Baru</td>
            <td class="border border-gray-400 p-2" contenteditable="true">2020-01-01</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Orang Tua</td>

            ${`<td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">-</td>`.repeat(5)}

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

    // Update Baris (Sementara Hanya Console.log)
    function updateRow(button) {
        let row = button.parentElement.parentElement;
        let cells = row.getElementsByTagName("td");
        let data = [];
        
        for (let i = 1; i < cells.length - 1; i++) {  // Skip No & Aksi
            data.push(cells[i].innerText.trim());
        }

        console.log("Data Updated:", data);
        alert("Data berhasil diperbarui! (Simulasi)");
    }
</script>

<?= $this->endSection() ?>
