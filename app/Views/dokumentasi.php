<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-6 py-6">
    <!-- Breadcrumb -->
    <nav class="text-gray-700 text-sm mb-4" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li><a href="/" class="text-primary font-semibold hover:text-green-600 transition duration-300 ease-in-out">Home</a></li>
        <li><span class="mx-2">/</span></li>
        <li class="text-gray-500">Dokumentasi</li>
    </ol>
</nav>

    
    <!-- Gallery Section -->
    <h1 class="text-2xl font-bold mb-6 text-center">Dokumentasi Kegiatan</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
            <img src="/images/login.png" alt="Dokumentasi" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-semibold text-lg text-gray-800">12 Februari 2024 Posyandu Balita Windusari 3</h2>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
            <img src="/images/login.png" alt="Dokumentasi" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-semibold text-lg text-gray-800">12 Februari 2024 Posyandu Balita Windusari 3</h2>
            </div>
        </div>
        
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
            <img src="/images/login.png" alt="Dokumentasi" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-semibold text-lg text-gray-800">12 Februari 2024 Posyandu Balita Windusari 3</h2>
            </div>
        </div>

    </div>
    
    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <nav class="inline-flex space-x-2" aria-label="Pagination">
            <a href="#" class="px-3 py-1 bg-blue-600 text-white rounded-md">1</a>
            <a href="#" class="px-3 py-1 bg-gray-200 text-gray-800 rounded-md hover:bg-blue-500 hover:text-white">2</a>
            <a href="#" class="px-3 py-1 bg-gray-200 text-gray-800 rounded-md hover:bg-blue-500 hover:text-white">&gt;</a>
        </nav>
    </div>
</div>
<?= $this->endSection() ?>
