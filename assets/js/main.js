
	// let table = new DataTable('#myTable', {
	// 	// paging: false,
	// 	// scrollCollapse: true,
	// 	// select: true,
	// 	// searching: false,
	// 	// ordering: false,
	// 	// scrollY: '400px'
	// 	// compact: true

	// });
	if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
		document.documentElement.classList.add('dark');
	} else {
		document.documentElement.classList.remove('dark')
	}





	var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
	var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

	// Change the icons inside the button based on previous settings
	if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
		themeToggleLightIcon.classList.remove('hidden');
	} else {
		themeToggleDarkIcon.classList.remove('hidden');
	}

	var themeToggleBtn = document.getElementById('theme-toggle');

	themeToggleBtn.addEventListener('click', function() {

		// toggle icons inside button
		themeToggleDarkIcon.classList.toggle('hidden');
		themeToggleLightIcon.classList.toggle('hidden');

		// if set via local storage previously
		if (localStorage.getItem('color-theme')) {
			if (localStorage.getItem('color-theme') === 'light') {
				document.documentElement.classList.add('dark');
				localStorage.setItem('color-theme', 'dark');
			} else {
				document.documentElement.classList.remove('dark');
				localStorage.setItem('color-theme', 'light');
			}

			// if NOT set via local storage previously
		} else {
			if (document.documentElement.classList.contains('dark')) {
				document.documentElement.classList.remove('dark');
				localStorage.setItem('color-theme', 'light');
			} else {
				document.documentElement.classList.add('dark');
				localStorage.setItem('color-theme', 'dark');
			}
		}

	});



	// let jsCheck = <?php
						// 				echo json_encode($check);


						// 				
						//?>;
	// console.log(jsCheck);
	// if (jsCheck == 'success') {
	// 	Swal.fire({
	// 		position: "top-end",
	// 		icon: "success",
	// 		title: "Your work has been saved",
	// 		showConfirmButton: false,
	// 		timer: 1500
	// 	});
	// } else if (jsCheck == 'error') {
	// 	Swal.fire({
	// 		position: "top-end",
	// 		icon: "success",
	// 		title: "Your work has been saved",
	// 		showConfirmButton: false,
	// 		timer: 1500
	// 	});
	// } else {

	// }
console.log("udggudgdu")