<?= $this->extend('layout/main2') ?>

<?= $this->section('content') ?>

<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

    <!-- Kartu Statistik Total Data -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
        <?php
        $dataKategori = [
            ['label' => 'Balita', 'total' => $balita['total'] ?? 0, 'cewek' => $balita['perempuan'] ?? 0, 'cowok' => $balita['laki'] ?? 0, 'color' => 'blue'],
            ['label' => 'Remaja Putri', 'total' => $remaja_putri['total'] ?? 0, 'cewek' => $remaja_putri['perempuan'] ?? 0, 'cowok' => $remaja_putri['laki'] ?? 0, 'color' => 'purple'],
            ['label' => 'Ibu Hamil', 'total' => $ibu_hamil['total'] ?? 0, 'cewek' => $ibu_hamil['perempuan'] ?? 0, 'cowok' => $ibu_hamil['laki'] ?? 0, 'color' => 'green'],
            ['label' => 'Lansia', 'total' => $lansia['total'] ?? 0, 'cewek' => $lansia['perempuan'] ?? 0, 'cowok' => $lansia['laki'] ?? 0, 'color' => 'red'],
            ['label' => 'Usia Produktif', 'total' => $usia_produktif['total'] ?? 0, 'cewek' => $usia_produktif['perempuan'] ?? 0, 'cowok' => $usia_produktif['laki'] ?? 0, 'color' => 'yellow']
        ];
        ?>

        <?php foreach ($dataKategori as $kategori) : ?>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-gray-600"><?= $kategori['label'] ?></h2>
                <p class="text-3xl font-bold text-<?= $kategori['color'] ?>-600"><?= $kategori['total'] ?></p>
                <div class="mt-2 text-sm text-gray-500">
                    <p class="text-pink-500 font-semibold">♀ Perempuan: <?= $kategori['cewek'] ?></p>
                    <p class="text-blue-500 font-semibold">♂ Laki-Laki: <?= $kategori['cowok'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>











    <!-- Statistik Pengunjung (Chart) -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistik Pengunjung (Jan - Apr 2025)</h2>
        <div class="w-full h-64">
            <canvas id="statistikChart"></canvas>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h2>
        <ul class="divide-y divide-gray-200">
            <li class="py-2 flex justify-between">
                <span>Data balita baru ditambahkan</span>
                <span class="text-gray-500 text-sm">10 Menit Lalu</span>
            </li>
            <li class="py-2 flex justify-between">
                <span>Data ibu hamil diperbarui</span>
                <span class="text-gray-500 text-sm">30 Menit Lalu</span>
            </li>
            <li class="py-2 flex justify-between">
                <span>Admin menambahkan dokumentasi baru</span>
                <span class="text-gray-500 text-sm">1 Jam Lalu</span>
            </li>
        </ul>
    </div>

    <!-- Data Terbaru -->
    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Data Terbaru</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Kategori</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2">Budi Santoso</td>
                    <td class="border border-gray-300 px-4 py-2 text-blue-600">Balita</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">13 Maret 2025</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">2</td>
                    <td class="border border-gray-300 px-4 py-2">Siti Aminah</td>
                    <td class="border border-gray-300 px-4 py-2 text-purple-600">Remaja Putri</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">12 Maret 2025</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Dokumentasi Kegiatan -->
    <div class="bg-white p-6 rounded-lg shadow mt-6">
        <h2 class="text-lg font-semibold mb-3">Dokumentasi Terbaru</h2>
        <div class="grid grid-cols-3 gap-4">
            <img src="<?= base_url('uploads/dokumentasi1.jpg') ?>" class="rounded-lg">
            <img src="<?= base_url('uploads/dokumentasi2.jpg') ?>" class="rounded-lg">
            <img src="<?= base_url('uploads/dokumentasi3.jpg') ?>" class="rounded-lg">
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('statistikChart').getContext('2d');
    var statistikChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April'],
            datasets: [{
                    label: 'Balita',
                    data: [30, 35, 40, 45],
                    backgroundColor: 'blue'
                },
                {
                    label: 'Remaja Putri',
                    data: [25, 30, 32, 33],
                    backgroundColor: 'purple'
                },
                {
                    label: 'Ibu Hamil',
                    data: [8, 10, 7, 10],
                    backgroundColor: 'green'
                },
                {
                    label: 'Lansia',
                    data: [20, 22, 18, 25],
                    backgroundColor: 'red'
                },
                {
                    label: 'Usia Produktif',
                    data: [40, 45, 48, 50],
                    backgroundColor: 'yellow'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>