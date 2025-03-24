<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Tambah Dokumentasi</h1>

    <!-- Form Upload Dokumentasi -->
    <form action="/admin/dokumentasi/store" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Nama Dokumentasi</label>
            <input type="text" name="nama_dokumentasi" class="w-full p-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Upload Gambar</label>
            <input type="file" name="gambar" class="w-full p-2 border rounded-lg" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="/admin/dokumentasi" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>
