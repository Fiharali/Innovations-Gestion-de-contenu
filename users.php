<?php

require_once 'connection.php';

?>




<?php

$sql = "SELECT * FROM chefs";
$result = $conn->query($sql);




?>



<div class="relative overflow-x-auto  sm:rounded-lg sm:ml-64 w2/3 px-32 mt-10">
	<button type="button" class="text-white float-right  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="#ajouterChefs">ajouter</a></button>
	<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  text-center">
		<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
			<tr>
				<th scope="col" class="px-6 py-3">
					Id
				</th>
				<th scope="col" class="px-6 py-3">
					Name
				</th>
				<th scope="col" class="px-6 py-3">
					Age
				</th>
				<th scope="col" class="px-6 py-3">
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = $result->fetch_assoc()) {
				// echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["age"] . "<br>";
			?>
				<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<?= $row['id'] ?>
					</th>
					<td class="px-6 py-4">
						<?= $row['name'] ?>
					</td>
					<td class="px-6 py-4">
						<?= $row['age'] ?>
					</td>
					<td class="px-6 py-4">
						<button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
						<button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


	<section class="bg-white dark:bg-gray-900  mt-10" id="ajouterChefs">
		<div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Add a new employe</h2>
			<form method="post" class="mt-8">
				<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
					<div class="sm:col-span-2">
						<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Name</label>
						<input type="text" name="name" value="" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe name">
					</div>
					<div class=" sm:col-span-2">
						<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Age</label>
						<input type="number	" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe email">
					</div>
					<div class="sm:col-span-2 mt-12">
						<input type="submit" name="submit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
					</div>
			</form>
		</div>
	</section>

	<?php
	if (isset($_POST['submit'])) {
		if (!empty($_POST['name']) && !empty($_POST['age'])) {
			$name = $_POST['name'];
			$age = $_POST['age'];
			$stmt = "INSERT INTO chefs(name, age) VALUES ('$name', '$age')";
			mysqli_query($conn, $stmt);
			// $stmt->execute([$_POST['name'], $_POST['email'], $_POST['departement'], $_POST['post']]);
			$_POST['name'] = " ";
			$_POST['age'] = " ";
			$check = "success";
		} else {
			$check = "error";
		}
	}
	?>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script>
	var jsCheck = <?php echo json_encode($check); ?>;
	console.log(jsCheck);
	if (jsCheck == 'success') {
		Swal.fire({
			title: 'successfully!',
			text: ' insertion successfully',
			icon: 'success',
			confirmButtonText: 'ok'
		})
	} else if (jsCheck == 'error') {
		Swal.fire({
			title: 'Error!',
			text: 'all champs are required',
			icon: 'error',
			confirmButtonText: 'ok'
		})
	} else {

	}
</script>

</body>

</html>