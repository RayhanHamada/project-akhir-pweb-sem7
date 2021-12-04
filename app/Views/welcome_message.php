<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Todo App</title>
	<meta name="description" content="The small framework with powerful features" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
	<!-- STYLES -->

	<script>
		/**
		 * @param id {number}
		 */
		function toggleSelesai(id) {
			console.log('hello');
			fetch(`http://localhost:8080/Home/toggleSelesai/${id}`).then(() => {
				window.location.reload();
			});
		}

		function hapusTodo(id) {
			console.log('hello');
			fetch(`http://localhost:8080/Home/hapusTodo/${id}`).then(() => {
				window.location.reload();
			});
		}
	</script>
</head>

<body class="h-96 flex flex-col items-center">
	<h1 class="text-2xl font-bold text-center mt-48">TODO APP</h1>
	<p class="text-center">By kelompok 10 4IA12</p>
	<form class="w-full flex mt-5 mb-5 justify-center" action="/Home/bikinTodo" method="POST">
		<div class="flex flex-col items-center">
			<input class="border-2 border-r-4 border-t-4 w-96 border-black text-center" type="text" name="deskripsi" placeholder="Masukkan aktivitas yang akan dilakukan...">
			<br>
			<button class="border-r-4 border-t-4 rounded-lg w-80 border-2 border-black hover:bg-black hover:text-white" type="submit">Tambahkan</button>
		</div>
	</form>

	<div class="flex flex-col w-full items-center">
		<div>
			<?php foreach ($todo as $i => $t) : ?>
				<div class="grid grid-cols-2 grid- cursor-pointer mb-1" onclick="return toggleSelesai(<?= $t['id'] ?>)">
					<?php if ($t['selesai']) : ?>
						<strike><?= ($i + 1) . '. ' . $t['deskripsi'] ?></strike>
					<?php else : ?>
						<p><?= ($i + 1) . '. ' . $t['deskripsi'] ?></p>
					<?php endif; ?>
					<a class="ml-2 border-2 border-black w-20 text-center" onclick="return hapusTodo(<?= $t['id'] ?>)">Hapus</a>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="absolute float-right bottom-2 right-2">klik todo untuk menandakan telah selesai !</p>
</body>

</html>