<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.lordicon.com/lordicon-1.3.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
	let table = new DataTable('#myTable', {
		// paging: false,
		// scrollCollapse: true,
		// select: true,
		// searching: false,
		// ordering: false,
		// scrollY: '400px'
		// compact: true

	});


	let jsCheck = <?php
					echo json_encode($check);

					?>;
	console.log(jsCheck);
	if (jsCheck == 'success') {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Your work has been saved",
			showConfirmButton: false,
			timer: 1500
		});
	} else if (jsCheck == 'error') {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Your work has been saved",
			showConfirmButton: false,
			timer: 1500
		});
	} else {

	}

	function checkDelete() {

	}
</script>
</body>

</html>