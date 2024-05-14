const openButtons = document.querySelectorAll('.open-button');
const closeButtons = document.querySelectorAll('.close-button');

openButtons.forEach(button => {
    const modalId = button.dataset.modalId;
    const modal = document.querySelector(`#${modalId}`);
    button.addEventListener('click', () => {
        modal.showModal();
    });
});
closeButtons.forEach(button => {
    const modalId = button.dataset.modalId;
    const modal = document.querySelector(`#${modalId}`);
    button.addEventListener('click', () => {
        modal.close();
    });
});