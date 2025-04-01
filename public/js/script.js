document.addEventListener('DOMContentLoaded', () => {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const closeLightbox = document.getElementById('close-lightbox');
    const photoItems = document.querySelectorAll('.photo-item');
    let currentIndex = -1; // Изначально не выбрано ни одно фото
    const totalPhotos = 15; // Общее количество фото

    // Убедимся, что модальное окно изначально скрыто
    lightbox.style.display = 'none';

    // Открытие модального окна при клике на фото
    photoItems.forEach(item => {
        item.addEventListener('click', () => {
            currentIndex = parseInt(item.getAttribute('data-index'));
            updateLightbox();
            lightbox.style.display = 'block';
            console.log('Modal opened, currentIndex:', currentIndex); // Отладка
        });
    });

    // Закрытие модального окна
    closeLightbox.addEventListener('click', () => {
        lightbox.style.display = 'none';
        currentIndex = -1; // Сбрасываем индекс при закрытии
        console.log('Modal closed'); // Отладка
    });

    // Закрытие при клике вне изображения
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
            currentIndex = -1; // Сбрасываем индекс при закрытии
            console.log('Modal closed by background click'); // Отладка
        }
    });

    // Листание стрелками
    document.addEventListener('keydown', (e) => {
        if (lightbox.style.display === 'block' && currentIndex !== -1) {
            if (e.key === 'ArrowLeft' && currentIndex > 0) {
                currentIndex--;
                updateLightbox();
                console.log('Left arrow, currentIndex:', currentIndex); // Отладка
            } else if (e.key === 'ArrowRight' && currentIndex < totalPhotos - 1) {
                currentIndex++;
                updateLightbox();
                console.log('Right arrow, currentIndex:', currentIndex); // Отладка
            }
        }
    });

    // Обновление содержимого модального окна
    function updateLightbox() {
        if (currentIndex >= 0) {
            const file = `photo${currentIndex + 1}.jpg`;
            const caption = `Фото №${currentIndex + 1}`;
            lightboxImage.src = `/myproject/public/images/${file}`;
            lightboxCaption.textContent = caption;
        }
    }
});