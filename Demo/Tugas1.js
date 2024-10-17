let display = document.getElementById('display');
let currentExpression = '';

function appendNumber(number) {
    currentExpression += number;
    display.value = currentExpression;
}

function appendOperator(operator) {
    currentExpression += operator;
    display.value = currentExpression;
}

function clearDisplay() {
    currentExpression = '';
    display.value = '';
}

function calculate() {
    try {
        display.value = eval(currentExpression);
        currentExpression = display.value;
    } catch (error) {
        display.value = 'Error';
        currentExpression = '';
    }
}