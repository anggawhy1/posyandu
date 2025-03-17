<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white h-screen fixed">
            <?= $this->include('partials/sidebar') ?>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6 overflow-auto">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</body>
</html>
