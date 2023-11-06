import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function expandSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.ml-16');

    if (sidebar.style.width === '16rem') {
        sidebar.style.width = '4rem';
        mainContent.style.marginLeft = '4rem';
        sidebar.classList.remove('text-left', 'px-6');
        sidebar.classList.add('text-center', 'px-0');
    } else {
        sidebar.style.width = '16rem';
        mainContent.style.marginLeft = '16rem';
        sidebar.classList.add('text-left', 'px-6');
        sidebar.classList.remove('text-center', 'px-0');
    }

    const labels = sidebar.querySelectorAll('span');
    labels.forEach(label => label.classList.toggle('opacity-0'));
}



