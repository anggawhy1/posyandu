<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Riwayat Data</h2>

    <div id="dataSummary" class="mb-4 p-4 bg-gray-200 rounded shadow">
        <h3 class="text-lg font-bold">Kategori Data yang Diarsipkan:</h3>
        <ul id="categoryList" class="list-disc pl-6"></ul>
    </div>

    <div id="dataTables"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let storedData = localStorage.getItem("riwayatData");

        // Jika localStorage kosong, tambahkan data dummy
        if (!storedData) {
            let dummyData = {
                "Lansia": [
                    ["3201010101010001", "Siti Aminah", "75", "Perempuan", "Jl. Merdeka No. 10", "Pindah Posyandu"],
                    ["3201010101010002", "Budi Santoso", "80", "Laki-laki", "Jl. Sudirman No. 5", "Meninggal"],
                    ["3201010101010003", "Rina Wijaya", "72", "Perempuan", "Jl. Diponegoro No. 12", "Pindah ke rumah anak"],
                ],
                "Balita": [
                    ["3202010101010001", "Adit Wijaya", "3", "12 kg", "Jl. Melati No. 8", "Pindah domisili"],
                    ["3202010101010002", "Indah Permata", "2", "10 kg", "Jl. Kenanga No. 3", "Meninggal dunia"],
                ]
            };
            localStorage.setItem("riwayatData", JSON.stringify(dummyData));
            storedData = JSON.stringify(dummyData);
        }

        let data = JSON.parse(storedData);
        let categoryList = document.getElementById("categoryList");
        let dataTables = document.getElementById("dataTables");

        Object.keys(data).forEach(category => {
            if (data[category].length === 0) return;

            let listItem = document.createElement("li");
            listItem.textContent = category + " (" + data[category].length + " data)";
            categoryList.appendChild(listItem);

            let tableContainer = document.createElement("div");
            tableContainer.classList.add("overflow-x-auto", "border", "rounded-lg", "shadow", "mt-6");

            let tableTitle = document.createElement("h3");
            tableTitle.classList.add("text-lg", "font-bold", "bg-gray-300", "p-2");
            tableTitle.textContent = category;

            let table = document.createElement("table");
            table.classList.add("table-auto", "min-w-max", "w-full", "border-collapse", "border", "border-gray-400");

            let headerRow = document.createElement("tr");
            let headers = category === "Lansia" ? ["NIK", "Nama", "Umur", "Jenis Kelamin", "Alamat", "Keterangan"] : ["NIK", "Nama", "Umur", "Berat Badan", "Alamat", "Keterangan"];
            headers.forEach(header => {
                let th = document.createElement("th");
                th.classList.add("border", "border-gray-500", "p-2", "text-center");
                th.textContent = header;
                headerRow.appendChild(th);
            });

            let thead = document.createElement("thead");
            thead.classList.add("bg-gray-700", "text-white");
            thead.appendChild(headerRow);
            table.appendChild(thead);

            let tbody = document.createElement("tbody");
            data[category].forEach(row => {
                let tr = document.createElement("tr");
                row.forEach(value => {
                    let td = document.createElement("td");
                    td.classList.add("border", "border-gray-400", "p-2", "text-center");
                    td.textContent = value;
                    tr.appendChild(td);
                });
                tbody.appendChild(tr);
            });

            table.appendChild(tbody);
            tableContainer.appendChild(tableTitle);
            tableContainer.appendChild(table);
            dataTables.appendChild(tableContainer);
        });
    });
</script>

<?= $this->endSection() ?>
