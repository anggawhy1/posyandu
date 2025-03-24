<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="w-64 min-h-screen bg-gray-900 text-white flex flex-col fixed">
    <!-- Header Sidebar -->
    <div class="p-4 text-center font-bold text-lg border-b border-gray-700">
        Admin Posyandu
    </div>

    <!-- Profil Admin -->
    <div class="flex items-center p-4 border-b border-gray-700">
        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full mr-3" alt="Foto Profil">
        <span>Angga Dwi</span>
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
                <button onclick="toggleDropdown('kelolaData')" class="w-full flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-database mr-3"></i> Kelola Data
                    <i id="icon-kelolaData" class="fas fa-chevron-down ml-auto transition-transform duration-300"></i>
                </button>
                <ul id="dropdown-kelolaData" class="hidden pl-6 space-y-2">

                    <li>
                        <a href="<?= base_url('admin/data-balita') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-child text-blue-400 mr-3"></i> Data Balita
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/pemantauan-balita') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-child text-blue-400 mr-3"></i> Pemantauan Balita
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-ibu-hamil') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-user-nurse text-green-400 mr-3"></i> Data Ibu Hamil
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-remaja-putri') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-user-friends text-purple-400 mr-3"></i> Data Remaja Putri
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-lansia') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-blind text-red-400 mr-3"></i> Data Lansia
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/data-usia-produktif') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-briefcase text-yellow-400 mr-3"></i> Data Usia Produktif
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Dropdown Data Arsip -->
            <li>
                <button onclick="toggleDropdown('dataArsip')" class="w-full flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-archive mr-3"></i> Data Arsip
                    <i id="icon-dataArsip" class="fas fa-chevron-down ml-auto transition-transform duration-300"></i>
                </button>
                <ul id="dropdown-dataArsip" class="hidden pl-6 space-y-2">
                    <li>
                        <a href="<?= base_url('admin/data-baru') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-file text-blue-400 mr-3"></i> Data Baru
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/riwayat-data') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-history text-green-400 mr-3"></i> Riwayat Data
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="<?= base_url('admin/dokumentasi') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-folder-open mr-3"></i> Dokumentasi
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/jadwal') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-folder-open mr-3"></i> Jadwal
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

<!-- Script -->
<script>
    function toggleDropdown(id) {
        let dropdown = document.getElementById("dropdown-" + id);
        let icon = document.getElementById("icon-" + id);
        dropdown.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
    }
</script>

<!-- CSS tambahan untuk animasi -->
<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>