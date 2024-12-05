<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h1>Calculator</h1>
        <div class="calc">
            <div class="header">
                <input type="text" id="count" value="0" readonly>
            </div>
            <div class="calbody">
                <div class="calbodyleft left">
                    <button class="number" value="1">1</button>
                    <button class="number" value="2">2</button>
                    <button class="number" value="3">3</button>
                    <button class="number" value="4">4</button>
                    <button class="number" value="5">5</button>
                    <button class="number" value="6">6</button>
                    <button class="number" value="7">7</button>
                    <button class="number" value="8">8</button>
                    <button class="number" value="9">9</button>
                    <button style="opacity:0"></button>
                    <button  class="number number0" value="0">0</button>
                    <button style="opacity:0"></button></button>
                </div>
                <div class="calbodyright">
                    <button class="operator" value="+">+</button>
                    <button class="operator" value="-">-</button>
                    <button class="operator" value="*">x</button>
                    <button class="operator" value="/">/</button>
                    <button id="equals">=</button>
                    <button id="clear">C</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let expression = "";

        const countDisplay = document.querySelector('#count');
        const numbers = document.querySelectorAll('.number');
        const operators = document.querySelectorAll('.operator');
        const equalsButton = document.querySelector('#equals');
        const clearButton = document.querySelector('#clear');

        // Handle number button clicks
        numbers.forEach(button => {
            button.addEventListener('click', () => {
                expression += button.value;
                updateDisplay(expression);
            });
        });

        // Handle operator button clicks
        operators.forEach(button => {
            button.addEventListener('click', () => {
                const lastChar = expression.slice(-1);
                if (["+", "-", "*", "/"].includes(lastChar)) return; // Prevent consecutive operators
                expression += button.value;
                updateDisplay(expression);
            });
        });

        // Handle equals button click
        equalsButton.addEventListener('click', () => {
            try {
                // Evaluate the expression
                const result = eval(expression);
                expression = result.toString();
                updateDisplay(expression);
            } catch (error) {
                updateDisplay("Error");
                expression = "";
            }
        });

        // Handle clear button click
        clearButton.addEventListener('click', () => {
            expression = "";
            updateDisplay("0");
        });

        // Update the display
        function updateDisplay(value) {
            countDisplay.value = value;
        }
    </script>
</body>

</html>
