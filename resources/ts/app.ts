import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
    const popup: HTMLElement | null = document.querySelector('.popup');

    if (popup) {
        setTimeout(() => {
            popup.style.opacity = '0';
        }, 5000);
        setTimeout(() => {
            popup.style.display = 'none';
        }, 5500);
    }
})
