<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize inputs
        $name = htmlspecialchars($_POST["name"]);
        $age = (int) $_POST["age"];
        $gender = htmlspecialchars($_POST["gender"]);
        $height_ft = (int) $_POST["height_ft"];
        $height_in = (int) $_POST["height_in"];
        $weight = (float) $_POST["weight"];

        // Calculate total height in inches
        $total_inches = ($height_ft * 12) + $height_in;

        // Calculate BMI
        $bmi = round((703 * $weight) / ($total_inches * $total_inches), 1);

        // Determine BMI meaning
        if ($bmi < 18.5) {
            $meaning = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $meaning = "Normal weight";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $meaning = "Overweight";
        } else {
            $meaning = "Obese";
        }

        // Display results
        echo "<h2>Hi $name,</h2>";
        echo "<p>You are a $gender. You are $age years old.</p>";
        echo "<p>Your height is {$height_ft}ft {$height_in}in and your weight is $weight pounds.</p>";
        echo "<p>Your BMI is <strong>$bmi</strong>, which is considered <strong>$meaning</strong>.</p>";
        echo "<p>Thank you for using the BMI Calculator!</p>";
    } else {
    ?>
    <!-- Display the form -->
    <h1>BMI Calculator</h1>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br><br>
        <label>Age: <input type="number" name="age" required></label><br><br>
        <label>Gender: 
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </label><br><br>
        <label>Height (feet): <input type="number" name="height_ft" required></label><br><br>
        <label>Height (inches): <input type="number" name="height_in" required></label><br><br>
        <label>Weight (pounds): <input type="number" step="any" name="weight" required></label><br><br>
        <input type="submit" value="Calculate BMI">
    </form>
    <?php } ?>
</body>
</html>
