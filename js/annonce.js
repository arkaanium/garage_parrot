function scrollToForm() {
    const formElement = document.getElementById('contactus');
    const rect = formElement.getBoundingClientRect();
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const targetTop = rect.top + scrollTop - 80; // Ajustez la valeur du décalage ici

    window.scrollTo({
        top: targetTop,
        behavior: 'smooth',
    });
}