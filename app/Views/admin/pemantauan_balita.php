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
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">No</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Nama Anak</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Jenis Kelamin</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Tanggal Lahir</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Nama Orang Tua</th>
                    
                    <!-- Header Tanggal -->
                    <?php
                    $months = ["20 Januari", "17 Februari", "16 Maret"];
                    foreach ($months as $month) {
                        echo "<th class='border border-gray-500 p-2 text-center' colspan='6'>$month 2025</th>";
                    }
                    ?>
                    
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Arsip</th>
                    <th class="border border-gray-500 p-2 text-center" rowspan="2">Aksi</th>
                </tr>
                <tr class="bg-gray-600">
                    <?php for ($i = 0; $i < count($months); $i++) : ?>
                        <th class="border border-gray-500 p-2 text-center">BB</th>
                        <th class="border border-gray-500 p-2 text-center">TB</th>
                        <th class="border border-gray-500 p-2 text-center">LILA</th>
                        <th class="border border-gray-500 p-2 text-center">LK</th>
                        <th class="border border-gray-500 p-2 text-center">Vit A</th>
                        <th class="border border-gray-500 p-2 text-center">ASI</th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody id="dataTable">
                <!-- 10 Data Default -->
                <?php
                $data = [
                    ["Raka", "L", "2020-09-02", "Sri Utami"],
                    ["Siti", "P", "2021-03-15", "Budi Santoso"],
                    ["Faris", "L", "2019-11-10", "Dewi Rahayu"],
                    ["Anisa", "P", "2020-06-22", "Adi Pratama"],
                    ["Dika", "L", "2021-01-05", "Sari Lestari"],
                    ["Nadia", "P", "2019-08-30", "Rizki Ramadhan"],
                    ["Bayu", "L", "2020-04-18", "Fitri Handayani"],
                    ["Lestari", "P", "2021-07-12", "Andi Saputra"],
                    ["Teguh", "L", "2020-10-01", "Ratna Dewi"],
                    ["Dewi", "P", "2019-12-25", "Rina Sari"]
                ];

                foreach ($data as $index => $row) {
                    $rowColor = $index % 2 == 0 ? 'bg-white' : 'bg-green-100';
                    echo "<tr class='$rowColor' data-gender='{$row[1]}'>";
                    echo "<td class='border border-gray-400 p-2 text-center'>" . ($index + 1) . "</td>";
                    echo "<td class='border border-gray-400 p-2'>$row[0]</td>";
                    echo "<td class='border border-gray-400 p-2 text-center'>$row[1]</td>";
                    echo "<td class='border border-gray-400 p-2'>$row[2]</td>";
                    echo "<td class='border border-gray-400 p-2'>$row[3]</td>";

                    for ($i = 0; $i < count($months); $i++) {
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>12</td>";
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>90</td>";
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>14</td>";
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>15</td>";
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>Ya</td>";
                        echo "<td class='border border-gray-400 p-2 text-center' contenteditable='true'>-</td>";
                    }

                    echo "<td class='border border-gray-400 p-2 text-center' data-arsip='false'></td>";
                    echo "<td class='border border-gray-400 p-2 text-center'>";
                    echo "<button class='bg-yellow-500 text-white px-3 py-1 rounded' onclick='confirmArsip(this)'>Arsipkan</button> ";
                    echo "<button class='bg-green-500 text-white px-3 py-1 rounded' onclick='confirmUpdate(this)'>Update</button> ";
                    echo "<button class='bg-red-500 text-white px-3 py-1 rounded' onclick='confirmDelete(this)'>Hapus</button>";
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function searchTable() {
        let input = document.getElementById("search").value.toLowerCase();
        document.querySelectorAll("#dataTable tr").forEach(row => {
            row.style.display = row.cells[1].textContent.toLowerCase().includes(input) ? "" : "none";
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

    function confirmArsip(button) {
        let row = button.closest("tr");
        row.cells[row.cells.length - 2].style.backgroundColor = "yellow";
        row.cells[row.cells.length - 2].textContent = "Diarsipkan";
    }
</script>

<?= $this->endSection() ?>
