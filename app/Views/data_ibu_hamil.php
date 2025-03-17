<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-6 py-6">
    <!-- Breadcrumb -->
    <nav class="text-gray-700 text-sm mb-4">
        <a href="<?= base_url('/') ?>" class="text-primary font-semibold hover:text-green-600 transition duration-300 ease-in-out">
            Beranda
        </a> / Data Ibu Hamil
    </nav>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Form Data Ibu Hamil</h2>
        <form action="<?= base_url('/data-ibu-hamil/store') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6 " onsubmit="return submitForm(event)">
            
            <!-- Nama Ibu Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Nama Ibu Hamil <span class="text-red-500">*</span></label>
                <input type="text" name="nama_ibu_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- NIK Ibu -->
            <div>
                <label class="block text-gray-700 font-medium">NIK Ibu <span class="text-red-500">*</span></label>
                <input type="text" name="nik" class="w-full border border-gray-300 rounded-lg p-2 mt-1" maxlength="16" required>
            </div>

            <!-- Nama Suami -->
            <div>
                <label class="block text-gray-700 font-medium">Nama Suami <span class="text-red-500">*</span></label>
                <input type="text" name="nama_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- NIK Suami -->
            <div>
                <label class="block text-gray-700 font-medium">NIK Suami <span class="text-red-500">*</span></label>
                <input type="text" name="nik_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" maxlength="16" required>
            </div>

            <!-- Pekerjaan Ibu -->
            <div>
                <label class="block text-gray-700 font-medium">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1">
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input type="number" name="no_telepon" class="w-full border border-gray-300 rounded-lg p-2 mt-1">
            </div>

            <!-- Alamat -->
            <div class="col-span-2">
                <label class="block text-gray-700 font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border border-gray-300 rounded-lg p-2 mt-1"></textarea>
            </div>

            <div class="col-span-2 flex justify-end">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sukses -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Data Berhasil Disimpan!</h2>
        <p class="text-gray-600">Terima kasih telah menginputkan data.</p>
        <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition">
            OK
        </button>
    </div>
</div>

<script>
    function submitForm(event) {
        event.preventDefault();
        let form = event.target;

        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response Data:", data); // Debugging

            if (data.success) {
                document.getElementById("successModal").classList.remove("hidden");
                setTimeout(() => { 
                    closeModal();
                    window.location.reload();
                }, 2000);
            } else {
                alert("Gagal menyimpan data: " + (data.error || "Terjadi kesalahan."));
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
            alert("Terjadi kesalahan saat mengirim data!");
        });
    }

    function closeModal() {
        console.log("Menutup modal..."); // Debugging
        document.getElementById("successModal").classList.add("hidden");
    }
</script>

<?= $this->endSection() ?>
