<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Kelola Dokumentasi</h2>
    
    <!-- Form Upload -->
    <div class="mb-4">
        <input type="file" id="uploadFile" class="border p-2 w-1/3" accept="image/*" onchange="previewImage(event)">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="addImage()">Upload</button>
    </div>

    <!-- Preview Image -->
    <div id="previewContainer" class="mb-4 hidden">
        <img id="previewImage" class="max-w-xs border rounded-lg">
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto border rounded-lg shadow">
        <table class="table-auto min-w-max w-full border-collapse border border-gray-400">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-500 p-2 text-center">No</th>
                    <th class="border border-gray-500 p-2 text-center">Gambar</th>
                    <th class="border border-gray-500 p-2 text-center">Nama Dokumentasi</th>
                    <th class="border border-gray-500 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <!-- Dummy Data -->
                <tr class="bg-white">
                    <td class="border border-gray-400 p-2 text-center">1</td>
                    <td class="border border-gray-400 p-2 text-center">
                        <img src="https://via.placeholder.com/100" class="w-20 h-20 object-cover rounded-lg">
                    </td>
                    <td class="border border-gray-400 p-2" contenteditable="true">Kegiatan Posyandu</td>
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
    // Preview Image sebelum Upload
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function(){
            let output = document.getElementById('previewImage');
            output.src = reader.result;
            document.getElementById('previewContainer').classList.remove("hidden");
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    // Tambah Gambar ke Tabel
    function addImage() {
        let fileInput = document.getElementById("uploadFile");
        if (!fileInput.files.length) {
            alert("Pilih gambar terlebih dahulu!");
            return;
        }

        let file = fileInput.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            let table = document.getElementById("dataTable");
            let rowCount = table.rows.length + 1;
            let row = table.insertRow();
            row.className = rowCount % 2 === 0 ? "bg-green-100" : "bg-white";
            row.innerHTML = `
                <td class="border border-gray-400 p-2 text-center">${rowCount}</td>
                <td class="border border-gray-400 p-2 text-center">
                    <img src="${reader.result}" class="w-20 h-20 object-cover rounded-lg">
                </td>
                <td class="border border-gray-400 p-2" contenteditable="true">Nama Baru</td>
                <td class="border border-gray-400 p-2 text-center">
                    <button class="bg-green-500 text-white px-3 py-1 rounded" onclick="updateRow(this)">Update</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this)">Hapus</button>
                </td>
            `;

            // Reset input
            fileInput.value = "";
            document.getElementById('previewContainer').classList.add("hidden");
        };
        reader.readAsDataURL(file);
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
        let data = cells[2].innerText.trim();

        console.log("Data Updated:", data);
        alert("Data berhasil diperbarui! (Simulasi)");
    }
</script>

<?= $this->endSection() ?>
