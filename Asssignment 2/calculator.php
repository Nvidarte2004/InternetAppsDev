<!DOCTYPE html>
<html>
<head>
    <title>PHP Basic Math Calculator</title>
</head>
<body>
    <h1>Welcome to the PHP Basic Math Calculator!</h1>
    <form method="post">
        <label>First Number:</label><br>
        <input type="number" step="any" name="num1" required><br><br>

        <label>Operation (e.g., +, -, sin, sqrt, log10, etc):</label><br>
        <input type="text" name="operation" required><br><br>

        <label>Second Number (if needed):</label><br>
        <input type="number" step="any" name="num2"><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = floatval($_POST["num1"]);
        $operation = strtolower(trim($_POST["operation"]));
        $num2 = isset($_POST["num2"]) && $_POST["num2"] !== '' ? floatval($_POST["num2"]) : null;

        $result = "Invalid operation or input.";

        switch ($operation) {
            case "+": $result = $num1 + $num2; break;
            case "-": $result = $num1 - $num2; break;
            case "*": $result = $num1 * $num2; break;
            case "/": $result = $num2 != 0 ? $num1 / $num2 : "Error: Divide by zero"; break;
            case "%": $result = $num1 % $num2; break;
            case "^": $result = pow($num1, $num2); break;
            case "sin": $result = sin($num1); break;
            case "cos": $result = cos($num1); break;
            case "tan": $result = tan($num1); break;
            case "asin": $result = asin($num1); break;
            case "acos": $result = acos($num1); break;
            case "atan": $result = atan($num1); break;
            case "atan2": $result = atan2($num1, $num2); break;
            case "sqrt": $result = $num1 >= 0 ? sqrt($num1) : "Error: Negative input"; break;
            case "ceil": $result = ceil($num1); break;
            case "abs": $result = abs($num1); break;
            case "floor": $result = floor($num1); break;
            case "max": $result = max($num1, $num2); break;
            case "min": $result = min($num1, $num2); break;
            case "log": $result = $num1 > 0 ? log($num1) : "Error: Invalid log input"; break;
            case "log10": $result = $num1 > 0 ? log10($num1) : "Error: Invalid log10 input"; break;
            case "log2": $result = $num1 > 0 ? log($num1, 2) : "Error: Invalid log2 input"; break;
            case "round": $result = round($num1); break;
        }

        echo "<h3>Result: $result</h3>";
    }
    ?>
</body>
</html>
