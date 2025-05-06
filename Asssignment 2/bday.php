<!DOCTYPE html>
<html>
<head>
    <title>Birthday Date Meaning Generator</title>
</head>
<body>
    <?php
    // Default to running the loop unless user chooses not to
    $repeat = true;

    // Check if form is submitted and user does NOT want to repeat
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tryAgain"])) {
        if ($_POST["tryAgain"] === "N" || $_POST["tryAgain"] === "n") {
            echo "<h3>Thanks for playing!</h3>";
            $repeat = false;
        }
    }

    if ($repeat) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["month"])) {
            $month = (int)$_POST["month"];
            $day = (int)$_POST["day"];
            $year = (int)$_POST["year"];

            echo "<h2>Birthday Meaning Results:</h2>";

            // Month meaning
            echo "<p>The month of ";
            switch ($month) {
                case 1: echo "January means Janus</p>"; break;
                case 2: echo "February means Purification</p>"; break;
                case 3: echo "March means Mars</p>"; break;
                case 4: echo "April means Aphrodite</p>"; break;
                case 5: echo "May means Maia</p>"; break;
                case 6: echo "June means Juno</p>"; break;
                case 7: echo "July means Julius Caesar</p>"; break;
                case 8: echo "August means Augustus</p>"; break;
                case 9: echo "September means Seventh (Latin)</p>"; break;
                case 10: echo "October means Eighth (Latin)</p>"; break;
                case 11: echo "November means Ninth (Latin)</p>"; break;
                case 12: echo "December means Tenth (Latin)</p>"; break;
                default: echo "an unknown month.</p>"; break;
            }

            // Day meaning (simplified using example descriptions)
            echo "<p>The $day" . ($day == 1 ? "st" : ($day == 2 ? "nd" : ($day == 3 ? "rd" : "th"))) . " of the month means ";
            if ($day == 1) {
                echo "Self-Starter.</p>";
            } elseif ($day == 2) {
                echo "Peacemaker.</p>";
            } elseif ($day == 3) {
                echo "Creative Communicator.</p>";
            } elseif ($day == 7) {
                echo "Spiritual Thinker.</p>";
            } elseif ($day == 11) {
                echo "Visionary Leader.</p>";
            } else {
                echo "a unique personality.</p>";
            }

            // Year meaning
            echo "<p>The year $year means ";
            if ($year >= 2000 && $year <= 2005) {
                echo "you are a New Millennial.</p>";
            } elseif ($year >= 2006 && $year <= 2015) {
                echo "you are a member of Gen Z.</p>";
            } elseif ($year >= 2016 && $year <= 2023) {
                echo "you are part of the Digital Native era.</p>";
            } else {
                echo "an unknown generation.</p>";
            }
        }

        // Show form
        ?>
        <h1>Birthday Date Meaning Generator</h1>
        <form method="post">
            <label>Month (1-12): <input type="number" name="month" required min="1" max="12"></label><br><br>
            <label>Day (1-31): <input type="number" name="day" required min="1" max="31"></label><br><br>
            <label>Year (2000-2023): <input type="number" name="year" required min="2000" max="2023"></label><br><br>
            <label>Would you like to try another one? (Y/N): <input type="text" name="tryAgain" required></label><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
    }
    ?>
</body>
</html>
