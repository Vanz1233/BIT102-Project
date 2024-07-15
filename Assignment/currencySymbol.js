document.addEventListener('DOMContentLoaded', (event) => {
    const amountInput = document.getElementById('amount');
    const currencySelect = document.getElementById('currency-select');

    function updateCurrencySymbol() {
        const selectedSymbol = currencySelect.value;
        const currentValue = amountInput.value.replace(/[^0-9]/g, '');
        amountInput.value = selectedSymbol + currentValue;
    }

    function enforceNumericInput(event) {
        const char = String.fromCharCode(event.which);
        if (!(/[0-9]/.test(char))) {
            event.preventDefault();
        }
    }

    currencySelect.addEventListener('change', updateCurrencySymbol);

    amountInput.addEventListener('keypress', enforceNumericInput);

    amountInput.addEventListener('input', function() {
        const selectedSymbol = currencySelect.value;
        const numericValue = amountInput.value.replace(/[^0-9]/g, '');
        amountInput.value = selectedSymbol + numericValue;
    });
});
