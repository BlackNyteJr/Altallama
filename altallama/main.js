document.addEventListener("DOMContentLoaded", () => {
	const bookButtons = document.querySelectorAll(".book-btn");
	bookButtons.forEach((button) => {
		button.addEventListener("click", (event) => {
			event.preventDefault();
			window.location.href = "reservations.php#request";
		});
	});

	const bagButtons = document.querySelectorAll(".bag-btn");
	bagButtons.forEach((button) => {
		button.addEventListener("click", (event) => {
			event.preventDefault();
			window.location.href = "catalog.php#checkout";
		});
	});
});
