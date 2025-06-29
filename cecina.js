document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll('.container');
  
    containers.forEach(container => {
      const quantity = container.querySelector('.quantity');
      const doneButton = container.querySelector('.done');
      const amountElement = quantity.querySelector('.amount');
      const calculatedPriceElement = container.querySelector('.calculated-price');
  
      quantity.addEventListener('click', (event) => {
        const target = event.target;
        let amount = parseInt(amountElement.innerText);
  
        if (target.classList.contains('plus')) {
          amount++;
        } else if (target.classList.contains('minus')) {
          if (amount > 0) {
            amount--;
          }
        }
        amountElement.innerText = amount.toString();
      });
  
      doneButton.addEventListener('click', () => {
        const amount = parseInt(amountElement.innerText); //El perro valor se almacena (no sé si jala)
        precio=amount*190;
        calculatedPriceElement.innerText = `Precio Total: $${precio.toFixed(2)}`;
      });
    });
  });
  