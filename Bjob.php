<!DOCTYPE html>
<html>
<head>
    <title>Unit Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            text-align: center;
        }
        input[type="number"] {
            width: 150px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 12px 30px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Unit Converter</h2>
    <form method="post">
        <input type="number" name="value" placeholder="Enter value" required>
        <select name="from_unit" required>
            <option value="kilometer">Kilometer</option>
            <option value="meter">Meter</option>
            <option value="foot">Foot</option>
            <option value="mile">Mile</option>
        </select>
        <select name="to_unit" required>
            <option value="meter">Meter</option>
            <option value="kilometer">Kilometer</option>
            <option value="foot">Foot</option>
            <option value="mile">Mile</option>
        </select>
        <br>
        <button type="submit">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST["value"];
        $from_unit = $_POST["from_unit"];
        $to_unit = $_POST["to_unit"];

        $result = convert($value, $from_unit, $to_unit);
        echo "<div class='result'>$value $from_unit = $result $to_unit</div>";
    }

    function convert($value, $from_unit, $to_unit) {
        // คำนวณจากหน่วยต้นทางไปหน่วยปลายทาง
        switch ($from_unit) {
            case 'kilometer':
                $meter_value = $value * 1000;
                break;
            case 'meter':
                $meter_value = $value;
                break;
            case 'foot':
                $meter_value = $value * 0.3048;
                break;
            case 'mile':
                $meter_value = $value * 1609.34;
                break;
        }

        // คำนวณจากหน่วยเมตรไปหน่วยปลายทาง
        switch ($to_unit) {
            case 'kilometer':
                $result = $meter_value / 1000;
                break;
            case 'meter':
                $result = $meter_value;
                break;
            case 'foot':
                $result = $meter_value / 0.3048;
                break;
            case 'mile':
                $result = $meter_value / 1609.34;
                break;
        }

        return $result;
    }
    ?>

</div>

</body>
</html>
