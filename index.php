<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>PasswordUsed</title>

    <style>
        *:focus {
            outline: none !important;
            border: 1px solid green;
        }
    </style>
</head>

<body class="bg-gray-200">
<h1 class="uppercase text-center text-green-500 font-bold text-6xl mt-12">Create a secure account</h1>
<h2 class="text-center text-green-300 font-bold text-xl mb-12">for this secure website</h2>
<main class="grid place-items-center">
    <form action="createAccount.php" autocomplete="off" method="post" class="w-full grid place-items-center">
        <div class="my-8 w-64">
            <?php if (!empty($_SESSION['error']['email'])) : ?>
                <div class="bg-red-400 text-white px-4 py-2 mb-5 rounded-lg">
                    <?= $_SESSION['error']['email'] ?>
                </div>
                <?php unset($_SESSION['error']['email']); ?>
            <?php endif; ?>
            <label class="block uppercase text-gray-800 font-light" for="email">Email</label>
            <input class="px-4 py-2 w-full" type="text" name="email" required>
        </div>

        <div class="mb-8 w-64">
            <?php if (!empty($_SESSION['error']['password'])) : ?>
                <div class="bg-red-400 text-white px-4 py-2 mb-5 rounded-lg">
                    <?= $_SESSION['error']['password'] ?>
                </div>
                <?php unset($_SESSION['error']['password']); ?>
            <?php endif; ?>
            <label class="block uppercase text-gray-800 font-light" for="password">Password</label>
            <input class="px-4 py-2 w-full" type="password" name="password" required>
        </div>

        <button type="submit"
                class="bg-green-400 hover:bg-green-600 focus:bg-green-800 rounded-lg text-white font-bold uppercase px-10 py-5">
            Create account
        </button>
    </form>

    <?php if (!empty($_SESSION['success'])) : ?>
        <div class="bg-green-400 text-white px-4 py-2 my-5 rounded-lg">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</main>
<footer class="absolute bottom-0 left-0 w-screen px-4 py-2 bg-green-900 text-white">
    <p class="text-center">
        talented, brilliant, incredible, amazing, show stopping, spectacular, never the same, totally unique, completely
        not ever been done before, unafraid to reference or not reference, put it in a blender, shit on it, vomit on it,
        eat it, give birth to it.
    </p>
</footer>
</body>
</html>