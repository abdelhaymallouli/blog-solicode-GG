import './bootstrap';

import { createIcons, icons } from 'lucide';
import 'preline';

createIcons({ icons });

document.addEventListener('DOMContentLoaded', function () {
    const dropdownBtn = document.getElementById('categoriesDropdownBtn');
    const dropdown = document.getElementById('categoriesDropdown');
    const chevron = document.getElementById('categoriesChevron');

    if (dropdownBtn && dropdown) {
        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isHidden = dropdown.classList.contains('hidden');

            if (isHidden) {
                dropdown.classList.remove('hidden');
                if (chevron) chevron.classList.add('rotate-180');
            } else {
                dropdown.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');
            }
        });

        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target) && !dropdownBtn.contains(e.target)) {
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                }
            }
        });
    }

    // Keydown for Dropdown
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && dropdown && !dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
            if (chevron) chevron.classList.remove('rotate-180');
        }
    });

    // Mobile Navbar Toggle
    const navToggle = document.getElementById('navbar-toggle');
    const navCollapse = document.getElementById('navbar-collapse');

    if (navToggle && navCollapse) {
        navToggle.addEventListener('click', function () {
            navCollapse.classList.toggle('hidden');

            // Toggle icons
            const svgs = navToggle.querySelectorAll('svg');
            svgs.forEach(svg => svg.classList.toggle('hidden'));
        });
    }
});