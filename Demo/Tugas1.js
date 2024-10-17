const buttons = document.querySelectorAll('.btn');
const resultDisplay = document.getElementById('result');

let currentInput = '';
let operator = '';
let firstValue = '';

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const value = button.textContent;

        if (value === 'AC') {
            currentInput = '';
            operator = '';
            firstValue = '';
            resultDisplay.textContent = '0';
        } else if (value === '%' || value === '÷' || value === '×' || value === '−' || value === '+') {
            if (currentInput !== '') {
                operator = value;
                firstValue = currentInput;
                currentInput = '';
                resultDisplay.textContent = firstValue + ' ' + operator;  // Tampilkan operator di layar
            }
        } else if (value === '=') {
            let result = 0;
            const secondValue = currentInput;

            if (operator === '+') {
                result = parseFloat(firstValue) + parseFloat(secondValue);
            } else if (operator === '−') {
                result = parseFloat(firstValue) - parseFloat(secondValue);
            } else if (operator === '×') {
                result = parseFloat(firstValue) * parseFloat(secondValue);
            } else if (operator === '÷') {
                result = parseFloat(firstValue) / parseFloat(secondValue);
            } else if (operator === '%') {
                result = parseFloat(firstValue) % parseFloat(secondValue);
            }

            currentInput = result.toString();
            operator = '';
            resultDisplay.textContent = result;  // Tampilkan hasil perhitungan
        } else {
            currentInput += value;
            resultDisplay.textContent = firstValue + ' ' + operator + ' ' + currentInput;  // Tampilkan input saat ini
        }
    });
});
