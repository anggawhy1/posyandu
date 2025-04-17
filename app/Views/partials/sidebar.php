<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="w-64 min-h-screen bg-gray-900 text-white flex flex-col fixed">
    <!-- Header Sidebar -->
    <div class="p-4 text-center font-bold text-lg border-b border-gray-700">
        Admin Posyandu
    </div>

    <!-- Profil Admin -->
    <div class="flex items-center p-4 border-b border-gray-700">
        <?php
        // Jika foto profil disimpan di database, kita bisa menambahkannya di sini.
        // Misalnya kita simpan URL foto di tabel users. Bisa diganti dengan logic yang sesuai.
        $profilePic = 'https://via.placeholder.com/40'; // Ganti dengan URL foto pengguna jika ada
        ?>
        <img src="<?= $profilePic ?>" class="w-10 h-10 rounded-full mr-3" alt="Foto Profil">
        <span><?= session()->get('nama') ?></span>
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
                            <i class="fas fa-baby text-blue-400 mr-3"></i> Data Balita
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/pemantauan-balita') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-notes-medical text-blue-400 mr-3"></i> Pemantauan Balita
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
                    <i class="fas fa-folder-open mr-3"></i> Data Arsip
                    <i id="icon-dataArsip" class="fas fa-chevron-down ml-auto transition-transform duration-300"></i>
                </button>
                <ul id="dropdown-dataArsip" class="hidden pl-6 space-y-2">
                    <li>
                        <a href="<?= base_url('admin/data-baru') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-plus-square text-blue-400 mr-3"></i> Data Baru
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/riwayat-data') ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                            <i class="fas fa-clock text-green-400 mr-3"></i> Riwayat Data
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
                <a href="#" id="logoutButton" class="flex items-center px-4 py-2 rounded-lg hover:bg-red-600">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Modal Konfirmasi Logout -->
<div id="modalLogout" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <!-- Judul modal dengan teks hitam -->
        <h2 class="text-xl font-bold mb-4 text-black">Konfirmasi Logout</h2>

        <!-- Isi modal dengan teks hitam -->
        <p class="mb-4 text-black">Apakah Anda yakin ingin keluar?</p>

        <div class="flex justify-end mt-4">
            <button id="closeModal" class="bg-gray-500 text-white px-3 py-1 rounded mr-2">Batal</button>
            <a href="<?= base_url('logout') ?>" id="confirmLogout" class="bg-red-500 text-white px-3 py-1 rounded">Keluar</a>
        </div>
    </div>
</div>



<script>
    // Ambil elemen modal dan tombol-tombol
    const modal = document.getElementById("modalLogout");
    const closeModalButton = document.getElementById("closeModal");
    const confirmLogoutButton = document.getElementById("confirmLogout");

    // Ambil tombol logout di sidebar
    const logoutButton = document.querySelector("#logoutButton");

    // Ketika tombol logout diklik, tampilkan modal konfirmasi logout
    logoutButton.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah aksi default (yaitu logout langsung)
        modal.classList.remove("hidden"); // Tampilkan modal
        modal.classList.add("show"); // Gunakan class show untuk menampilkan modal
    });

    // Ketika tombol batal diklik, sembunyikan modal
    closeModalButton.addEventListener("click", function() {
        modal.classList.remove("show"); // Sembunyikan modal
        modal.classList.add("hidden");
    });

    // Ketika tombol konfirmasi logout diklik, modal akan tetap tersembunyi dan logout terjadi
    confirmLogoutButton.addEventListener("click", function() {
        modal.classList.remove("show"); // Sembunyikan modal
        modal.classList.add("hidden");
    });
</script>

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