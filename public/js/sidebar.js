const buttonToggle = document.querySelector('.toggleSidebar');

buttonToggle.addEventListener('click', () => {
    document.querySelector('.sidebar').classList.toggle('closedSidebar');
})