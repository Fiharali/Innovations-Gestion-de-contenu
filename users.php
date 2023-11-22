<?php
require_once 'connection.php';

?>




<?php

$sql = "SELECT * FROM chefs";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
	if (!empty($_POST['name']) && !empty($_POST['age'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$stmt = "INSERT INTO chefs(name, age) VALUES ('$name', '$age')";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['age'] = "";
		$check = "success";
		$result = $conn->query($sql);
	} else {
		$check = "error";
	}
}

if (isset($_POST['submitUpdate'])) {
	if (!empty($_POST['name']) && !empty($_POST['age'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$id = $_POST['id'];
		$stmt = "update  chefs set  name='$name', age='$age' where id=$id";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['age'] = "";
		$check = "success";
		$result = $conn->query($sql);
	} else {
		$check = "error";
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$stmt = "delete from chefs  where id=$id";
	mysqli_query($conn, $stmt);
	$result = $conn->query($sql);
?>

<?php
}
?>



<div class="relative overflow-x-auto  sm:rounded-lg sm:ml-64 w2/3 px-32  mt-10">
	<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
		<div class="relative p-4 w-full max-w-2xl max-h-full">
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
				<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
					<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
						Add a new employe
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
						<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
						</svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
					<form method="post" id="submitForm">
						<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
							<div class="sm:col-span-2">
								<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Name</label>
								<input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe name">
							</div>
							<div class=" sm:col-span-2">
								<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Age</label>
								<input type="number	" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe email">
							</div>
							<div class="sm:col-span-2 mt-12">
								<input type="submit" name="submit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-white float-right  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter</button>
	<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  sm:mx-auto" id="myTable">
		<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
			<tr>
				<th scope="col" class="px-6 py-3 ">
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
			<?php while ($row = $result->fetch_assoc()) { ?>
				<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
						<?= $row['id'] ?>
					</th>
					<td class="px-6 py-4">
						<?= $row['name'] ?>
					</td>
					<td class="px-6 py-4">
						<?= $row['age'] ?>
					</td>
					<td class="px-6 py-4 flex ml-auto">
						<button type="button" data-modal-target="updateModal<?= $row['id'] ?>" data-modal-toggle="updateModal<?= $row['id'] ?>" type="button" class="text-white justify-center  bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
						<form method="post">
							<input type="hidden" name="id" value="<?= $row['id'] ?>" />
							<input type="submit" name="delete" onclick="return confirm('Are you sure?')" value="delete" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
						</form>
					</td>
				</tr>
				<div id="updateModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
					<div class="relative p-4 w-full max-w-2xl max-h-full">
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
							<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
								<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
									Update a new employe
								</h3>
								<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateModal<?= $row['id'] ?>">
									<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
									</svg>
									<span class="sr-only">Close modal</span>
								</button>
							</div>
							<div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
								<form method="post">
									<input type="hidden" name="id" value="<?= $row['id'] ?>" />
									<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
										<div class="sm:col-span-2">
											<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Name</label>
											<input type="text" name="name" value="<?= $row['name'] ?>" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe name">
										</div>
										<div class=" sm:col-span-2">
											<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chef Age</label>
											<input type="number	" value="<?= $row['age'] ?>" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Employe email">
										</div>
										<div class="sm:col-span-2 mt-12">
											<input type="submit" name="submitUpdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</tbody>
	</table>

	<?php




	?>
</div>
<?php
require_once 'footer.php';

?>