<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Usia Produktif</h2>
    
    <!-- Search & Tambah Data -->
    <div class="mb-4 flex justify-between">
        <input type="text" id="search" class="border p-2 w-1/3" placeholder="Cari Nama atau NIK..." onkeyup="searchTable()">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addRow()">Tambah Data</button>
    </div>

    <!-- Table Wrapper -->
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
                <?php 
                $dataUsiaProduktif = [
                    ["3402171007690002", "GIMAN", "SUROBAYAN RT 08", "56", "L"],
                    ["3402174107760001", "MURTIYEM", "SUROBAYAN RT 08", "49", "P"],
                    ["3402174307030001", "ZULIAN AYU", "SUROBAYAN RT 08", "22", "P"],
                    ["3402170712800002", "SUTRISNO", "SUROBAYAN RT 08", "45", "L"],
                    ["3402176106800001", "SUGIYATUN", "SUROBAYAN RT 08", "45", "P"]
                ];
                
                foreach ($dataUsiaProduktif as $index => $data) :
                    $bgColor = $index % 2 == 0 ? "bg-white" : "bg-green-100";
                ?>
                <tr class="<?= $bgColor ?>">
                    <td class="border border-gray-400 p-2 text-center"><?= $index + 1 ?></td>
                    <td class="border border-gray-400 p-2" contenteditable="true"><?= $data[0] ?></td>
                    <td class="border border-gray-400 p-2" contenteditable="true"><?= $data[1] ?></td>
                    <td class="border border-gray-400 p-2" contenteditable="true"><?= $data[2] ?></td>
                    <td class="border border-gray-400 p-2 text-center" contenteditable="true"><?= $data[3] ?></td>
                    <td class="border border-gray-400 p-2 text-center" contenteditable="true"><?= $data[4] ?></td>
                    <td class="border border-gray-400 p-2 text-center">
                        <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="updateRow(this)">Update</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this)">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Fungsi Search Nama atau NIK
    function searchTable() {
        let input = document.getElementById("search").value.toLowerCase();
        let table = document.getElementById("dataTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let nikCell = rows[i].getElementsByTagName("td")[1]; // Kolom NIK
            let nameCell = rows[i].getElementsByTagName("td")[2]; // Kolom Nama
            
            if (nikCell && nameCell) {
                let nikText = nikCell.textContent || nikCell.innerText;
                let nameText = nameCell.textContent || nameCell.innerText;
                rows[i].style.display = (nikText.toLowerCase().includes(input) || nameText.toLowerCase().includes(input)) ? "" : "none";
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
            <td class="border border-gray-400 p-2" contenteditable="true">3402170000000000</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Nama Baru</td>
            <td class="border border-gray-400 p-2" contenteditable="true">Alamat Baru</td>
            <td class="border border-gray-400 p-2 text-center" contenteditable="true">40</td>
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
