<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Data Baru</h2>

    <div class="mb-4 flex justify-between">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="submitSelected()">Masukkan ke Kelola Data</button>
    </div>

    <div class="overflow-x-auto border rounded-lg shadow">
        <h3 class="text-lg font-bold bg-gray-300 p-2">Lansia</h3>
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">Pilih</th>
                    <th class="border border-gray-500 p-2 text-center">NIK</th>
                    <th class="border border-gray-500 p-2 text-center">Nama</th>
                    <th class="border border-gray-500 p-2 text-center">Umur</th>
                    <th class="border border-gray-500 p-2 text-center">Jenis Kelamin</th>
                    <th class="border border-gray-500 p-2 text-center">Alamat</th>
                </tr>
            </thead>
            <tbody id="newDataTableLansia">
                <!-- Data Dummy Lansia -->
                <?php
                $data_lansia = [
                    ["1234567890123", "Pak Budi", 70, "L", "Jl. Merdeka No. 10"],
                    ["2345678901234", "Bu Siti", 68, "P", "Jl. Sudirman No. 5"]
                ];

                foreach ($data_lansia as $row) {
                    echo "<tr>";
                    echo "<td class='border border-gray-400 p-2 text-center'><input type='checkbox' class='select-data' data-category='Lansia' value='" . json_encode($row) . "'></td>";
                    foreach ($row as $value) {
                        echo "<td class='border border-gray-400 p-2 text-center'>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="overflow-x-auto border rounded-lg shadow mt-6">
        <h3 class="text-lg font-bold bg-gray-300 p-2">Balita</h3>
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">Pilih</th>
                    <th class="border border-gray-500 p-2 text-center">NIK</th>
                    <th class="border border-gray-500 p-2 text-center">Nama</th>
                    <th class="border border-gray-500 p-2 text-center">Umur</th>
                    <th class="border border-gray-500 p-2 text-center">Berat Badan</th>
                    <th class="border border-gray-500 p-2 text-center">Alamat</th>
                </tr>
            </thead>
            <tbody id="newDataTableBalita">
                <!-- Data Dummy Balita -->
                <?php
                $data_balita = [
                    ["3456789012345", "Dika", 3, "12kg", "Jl. Diponegoro No. 7"],
                    ["4567890123456", "Mila", 2, "10kg", "Jl. Kartini No. 9"]
                ];

                foreach ($data_balita as $row) {
                    echo "<tr>";
                    echo "<td class='border border-gray-400 p-2 text-center'><input type='checkbox' class='select-data' data-category='Balita' value='" . json_encode($row) . "'></td>";
                    foreach ($row as $value) {
                        echo "<td class='border border-gray-400 p-2 text-center'>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function submitSelected() {
        let selectedData = {
            Lansia: [],
            Balita: []
        };

        document.querySelectorAll('.select-data:checked').forEach(checkbox => {
            let category = checkbox.dataset.category;
            selectedData[category].push(JSON.parse(checkbox.value));
        });

        if (selectedData.Lansia.length === 0 && selectedData.Balita.length === 0) {
            alert("Pilih minimal satu data untuk dipindahkan.");
            return;
        }

        localStorage.setItem("kelolaData", JSON.stringify(selectedData));
        alert("Data berhasil dimasukkan ke Kelola Data.");
        window.location.href = "kelola_data.php";
    }
</script>

<?= $this->endSection() ?>
