document.getElementById("calculate").addEventListener("click", function() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const result = num1 + num2;
    document.getElementById("result").textContent = result;

    if (!num1 && !num2) {
        window.alert("Please enter")
    } 
});

document.getElementById("reset").addEventListener("click", function() {
    document.getElementById("num1").value = '';
    document.getElementById("num2").value = '';
    document.getElementById("result").textContent = '';
});

