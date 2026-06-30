(function () {
	const header = document.querySelector('.site-header');
	const toggle = document.querySelector('.menu-toggle');
	const menu = document.querySelector('#primary-menu');

	if (!header || !toggle || !menu) {
		return;
	}

	const closeMenu = () => {
		header.classList.remove('is-menu-open');
		toggle.setAttribute('aria-expanded', 'false');
	};

	toggle.addEventListener('click', () => {
		const isOpen = header.classList.toggle('is-menu-open');
		toggle.setAttribute('aria-expanded', String(isOpen));
	});

	menu.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			closeMenu();
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeMenu();
		}
	});
}());

(function () {
	if (typeof GLightbox !== 'function') {
		return;
	}

	GLightbox({
		selector: '.workflow-lightbox',
		touchNavigation: true,
		loop: true,
		zoomable: true
	});
}());
