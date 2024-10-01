const calcSumbit = document.getElementById("submit")

function calculate() {
    const a = parseFloat(document.getElementById("num_1").value);
    const b = parseFloat(document.getElementById("num_2").value);

    if (isNaN(a) || isNaN(b)) {
        alert("Будь ласка, введіть числові значення.");
        return;
    }

    document.write("Сума: " + (a + b) + "<br>");
    document.write("Різниця: " + (a - b) + "<br>");
    alert("Ділення: " + (a / b));
    alert("Множення: " + (a * b));
}

calcSumbit.addEventListener("click", calculate)