document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll('.container');

    containers.forEach(container => {
        const doneButton = container.querySelector('.done');
        const amountElement = container.querySelector('.quantity .amount');
        const hiddenAmountInput = document.getElementById('hiddenAmount');
        const hiddenForm = document.getElementById('hiddenForm');

        doneButton.addEventListener('click', () => {
            const amount = parseInt(amountElement.innerText);

            // Asignar el valor de amount al campo oculto del formulario
            hiddenAmountInput.value = amount;
            hiddenForm.submit(); // Enviar el formulario
        });
    });
});
