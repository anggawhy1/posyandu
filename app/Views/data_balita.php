<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-6 py-6">
    <!-- Breadcrumb -->
    <nav class="text-gray-700 text-sm mb-4">
        <a href="<?= base_url('/') ?>" class="text-primary font-semibold hover:text-green-600 transition duration-300 ease-in-out">
            Beranda
        </a> 
        / Data Ibu Hamil
    </nav>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Form Data Ibu Hamil</h2>
        <form action="<?= base_url('/data-ibu-hamil/store') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6" onsubmit="submitForm(event)">

            <!-- NIK Ibu Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">NIK Ibu Hamil <span class="text-red-500">*</span></label>
                <input type="text" name="nik" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Nama Ibu Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Nama Ibu Hamil <span class="text-red-500">*</span></label>
                <input type="text" name="nama_ibu_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- NIK Suami -->
            <div>
                <label class="block text-gray-700 font-medium">NIK Suami <span class="text-red-500">*</span></label>
                <input type="text" name="nik_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Nama Suami -->
            <div>
                <label class="block text-gray-700 font-medium">Nama Suami <span class="text-red-500">*</span></label>
                <input type="text" name="nama_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Pekerjaan Ibu Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Pekerjaan Ibu Hamil <span class="text-red-500">*</span></label>
                <input type="text" name="pekerjaan_ibu_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Pekerjaan Suami -->
            <div>
                <label class="block text-gray-700 font-medium">Pekerjaan Suami <span class="text-red-500">*</span></label>
                <input type="text" name="pekerjaan_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Tanggal Mulai Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Tanggal Mulai Hamil <span class="text-red-500">*</span></label>
                <input type="date" name="tgl_mulai_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Tanggal Perkiraan Lahir -->
            <div>
                <label class="block text-gray-700 font-medium">Tanggal Perkiraan Lahir <span class="text-red-500">*</span></label>
                <input type="date" name="tgl_perkiraan_lahir" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Usia Kehamilan -->
            <div>
                <label class="block text-gray-700 font-medium">Usia Kehamilan (minggu) <span class="text-red-500">*</span></label>
                <input type="number" name="usia_kehamilan" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Golongan Darah Ibu Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Golongan Darah Ibu Hamil <span class="text-red-500">*</span></label>
                <select name="golDarah_ibu_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <!-- Golongan Darah Suami -->
            <div>
                <label class="block text-gray-700 font-medium">Golongan Darah Suami <span class="text-red-500">*</span></label>
                <select name="golDarah_suami" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <!-- Kadar HB -->
            <div>
                <label class="block text-gray-700 font-medium">Kadar HB (g/dL) <span class="text-red-500">*</span></label>
                <input type="number" step="0.1" name="kadar_hb" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Berat Badan Sebelum Hamil -->
            <div>
                <label class="block text-gray-700 font-medium">Berat Badan Sebelum Hamil (kg) <span class="text-red-500">*</span></label>
                <input type="number" step="0.1" name="bb_sebelum_hamil" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- No Telepon -->
            <div>
                <label class="block text-gray-700 font-medium">No Telepon <span class="text-red-500">*</span></label>
                <input type="text" name="no_telepon" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>

            <!-- Alamat -->
            <div class="col-span-2">
                <label class="block text-gray-700 font-medium">Alamat <span class="text-red-500">*</span></label>
                <textarea name="alamat" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required></textarea>
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
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("successModal").classList.remove("hidden");
                setTimeout(() => { 
                    closeModal();
                    window.location.reload();
                }, 2000);
            }
        });
    }

    function closeModal() {
        document.getElementById("successModal").classList.add("hidden");
    }
</script>

<?= $this->endSection() ?>
