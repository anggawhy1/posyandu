<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Data Baru yang Diinputkan Masyarakat</h1>
        <p class="text-gray-600">Berikut adalah data-data baru yang telah diinputkan oleh masyarakat melalui sistem. Silakan klik untuk memverifikasi atau memproses lebih lanjut.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= base_url('admin/data-baru-balita') ?>" class="block bg-blue-100 hover:bg-blue-200 transition rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-blue-800">Data Balita</h2>
            <p class="text-sm text-gray-700 mt-2">Lihat dan kelola data balita terbaru yang telah ditambahkan oleh masyarakat.</p>
        </a>

        <a href="<?= base_url('admin/data-baru-remaja') ?>" class="block bg-pink-100 hover:bg-pink-200 transition rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-pink-800">Data Remaja Putri</h2>
            <p class="text-sm text-gray-700 mt-2">Lihat dan verifikasi data remaja putri yang baru diinputkan.</p>
        </a>

        <a href="<?= base_url('admin/data-baru-ibu-hamil') ?>" class="block bg-green-100 hover:bg-green-200 transition rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-green-800">Data Ibu Hamil</h2>
            <p class="text-sm text-gray-700 mt-2">Lihat dan tindak lanjuti data ibu hamil yang baru masuk.</p>
        </a>
    </div>
</div>
<?= $this->endSection() ?>