<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-green-400 to-blue-500">

    <div class="bg-white shadow-2xl rounded-2xl flex w-[700px] overflow-hidden">
        
        <!-- Bagian Kiri: Form Login -->
        <div class="w-1/2 p-8">
            
        <nav class="text-sm text-gray-600 mb-4">
                <a href="<?= base_url('/') ?>" class="text-primary font-semibold hover:text-green-600 transition duration-300 ease-in-out">
                    Home
                </a>
                <span class="mx-2">/</span>
                <span class="text-gray-500">Login</span>
            </nav>


            <h2 class="text-2xl font-bold text-gray-700 text-center">Login</h2>

            <form action="<?= base_url('/login') ?>" method="post" class="mt-6">
    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-semibold">Username</label>
        <input type="text" name="username" placeholder="Masukkan username"
            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-600 text-sm font-semibold">Password</label>
        <input type="password" name="password" placeholder="Masukkan password"
            class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
    </div>

    <div class="flex justify-between items-center text-sm text-gray-600">
        <label class="flex items-center">
            <input type="checkbox" class="mr-2">
            Ingat saya
        </label>
    </div>

    <button type="submit"
        class="w-full mt-4 bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg shadow-md hover:opacity-90 transition">
        Masuk
    </button>
</form>

        </div>

        <!-- Bagian Kanan: Gambar Lokal -->
        <div class="w-1/2 bg-cover bg-center" style="background-image: url('/images/login.png');">
        </div>

    </div>

</body>
</html>
