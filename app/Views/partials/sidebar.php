<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<div class="w-64 min-h-screen bg-gray-900 text-white flex flex-col fixed">
    <!-- Header Sidebar -->
    <div class="p-4 text-center font-bold text-lg border-b border-gray-700">
        Admin Posyandu
    </div>

    <!-- Navigasi Sidebar -->
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
            </li>

           <!-- Dropdown Kelola Data -->
<li>
    <button onclick="toggleDropdown()" class="w-full flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
        <i class="fas fa-database mr-3"></i> Kelola Data
        <i id="dropdown-icon" class="fas fa-chevron-down ml-auto text-white transition-transform duration-300"></i>
    </button>
    <ul id="dropdown" class="hidden pl-6 space-y-2">
        <li>
            <a href="<?= base_url('admin/data-balita') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <i class="fas fa-child text-blue-400 mr-3"></i> Data Balita
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/data-ibu-hamil') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <i class="fas fa-user-nurse text-green-400 mr-3"></i> Data Ibu Hamil
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/data-remaja') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <i class="fas fa-user-friends text-purple-400 mr-3"></i> Data Remaja Putri
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/data-lansia') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <i class="fas fa-blind text-red-400 mr-3"></i> Data Lansia
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/data-produktif') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <i class="fas fa-briefcase text-yellow-400 mr-3"></i> Data Usia Produktif
            </a>
        </li>
    </ul>
</li>

<script>
    function toggleDropdown() {
        let dropdown = document.getElementById("dropdown");
        let icon = document.getElementById("dropdown-icon");

        dropdown.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
    }
</script>



            <!-- <li>
                <a href="<?= base_url('admin/statistik') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-chart-bar mr-3"></i> Statistik & Grafik
                </a>
            </li> -->
            <li>
                <a href="<?= base_url('admin/dokumentasi') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-folder-open mr-3"></i> Dokumentasi
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/keluar') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-red-600">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    function toggleDropdown() {
        document.getElementById("dropdown").classList.toggle("hidden");
    }
</script>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown");
        const icon = document.getElementById("dropdown-icon");

        dropdown.classList.toggle("hidden");
        icon.classList.toggle("rotate-180"); // Membalik icon saat diklik
    }
</script>