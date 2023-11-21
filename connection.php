<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>







</head>

<body class="bg-gray-100 dark:bg-gray-700">
	<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
		<span class="sr-only">Open sidebar</span>
		<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
			<path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
		</svg>
	</button>
	<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
		<div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
			<h1 class="text-center text-2xl text-slate-50 p-5">LOGO</h1>
			<ul class="space-y-2 font-medium">
				<li>
					<a href="index.php" class="flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
						<lord-icon src="https://cdn.lordicon.com/eodavnff.json" trigger="hover" style="width:25px;height:25px">
						</lord-icon>
						<span class="ms-3">Dashboard</span>
					</a>
				</li>


				<li>
					<a href="users.php" class="flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
						<lord-icon src="https://cdn.lordicon.com/mebvgwrs.json" trigger="hover" style="width:25px;height:25px">
						</lord-icon>
						<span class="ms-3">Users</span>
					</a>
				</li>

				<li>
					<a href="#" class="flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
						<lord-icon src="https://cdn.lordicon.com/knfxypdv.json" trigger="hover" style="width:25px;height:25px">
						</lord-icon>
						<span class="ms-3">Chefs</span>
					</a>
				</li>

				<li>
					<a href="#" class="flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
						<lord-icon src="https://cdn.lordicon.com/rztizmkk.json" trigger="hover" style="width:25px;height:25px">
						</lord-icon>
						<span class="ms-3">Plats</span>
					</a>
				</li>

				<li>
					<a href="#" class="flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
						<lord-icon src="https://cdn.lordicon.com/evvwiruv.json" trigger="hover" style="width:25px;height:25px">
						</lord-icon>
						<span class="ms-3">Ingredients</span>
					</a>
				</li>

			</ul>
		</div>
	</aside>
	<nav class="bg-white border-gray-200 dark:bg-gray-900 sm:ml-64 text-slate-50 sticky top-0 z-50">
		ali
		<br>
	</nav>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "res");

	?>