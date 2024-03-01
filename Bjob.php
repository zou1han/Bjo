<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>โปรแกรมแปลงหน่วยวัด</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 50%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
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
        .result {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
            color: #4CAF50;
        }
        select:hover, input[type="number"]:hover {
            background-color: #f2f2f2;
        }
        select:active, input[type="number"]:active {
            background-color: #e6e6e6;
        }
        .unit-info {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        #swap_units {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        #swap_units:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>0โปรแกรมแปลงหน่วยวัด</h2>
    <form>
        <input type="number" id="value" placeholder="ป้อนค่า" step="any">
        <select id="from_unit">
            <option value="เมตร">เมตร</option>
            <option value="กิโลเมตร">กิโลเมตร</option>
            <option value="เซนติเมตร">เซนติเมตร</option>
            <option value="นิ้ว">นิ้ว</option>
            <option value="ฟุต">ฟุต</option>
            <option value="หลา">หลา</option>
            <option value="ไมล์">ไมล์</option>
        </select>
        <select id="to_unit">
            <option value="เมตร">เมตร</option>
            <option value="กิโลเมตร">กิโลเมตร</option>
            <option value="เซนติเมตร">เซนติเมตร</option>
            <option value="นิ้ว">นิ้ว</option>
            <option value="ฟุต">ฟุต</option>
            <option value="หลา">หลา</option>
            <option value="ไมล์">ไมล์</option>
        </select>
        <button type="button" id="swap_units">สลับหน่วย</button>
    </form>
    <div class="result" id="result"></div>

    <div class="unit-info">
        หน่วยวัดแต่ละหน่วยแปลงออกมาได้เป็นเมตรดังนี้:<br>
        เมตร: 1 เมตร<br>
        กิโลเมตร: 1,000 เมตร<br>
        เซนติเมตร: 0.01 เมตร<br>
        นิ้ว: 0.0254 เมตร<br>
        ฟุต: 0.3048 เมตร<br>
        หลา: 0.9144 เมตร<br>
        ไมล์: 1,609.34 เมตร<br>
    </div>

    <script>
        const valueInput = document.getElementById('value');
        const fromUnitSelect = document.getElementById('from_unit');
        const toUnitSelect = document.getElementById('to_unit');
        const resultDiv = document.getElementById('result');
        const swapUnitsButton = document.getElementById('swap_units');

        function convert() {
            const value = parseFloat(valueInput.value);
            const fromUnit = fromUnitSelect.value;
            const toUnit = toUnitSelect.value;

            let meterValue;
            switch (fromUnit) {
                case 'เมตร':
                    meterValue = value;
                    break;
                case 'กิโลเมตร':
                    meterValue = value * 1000;
                    break;
                case 'เซนติเมตร':
                    meterValue = value / 100;
                    break;
                case 'นิ้ว':
                    meterValue = value * 0.0254;
                    break;
                case 'ฟุต':
                    meterValue = value * 0.3048;
                    break;
                case 'หลา':
                    meterValue = value * 0.9144;
                    break;
                case 'ไมล์':
                    meterValue = value * 1609.34;
                    break;
                default:
                    meterValue = 0;
            }

            let result;
            switch (toUnit) {
                case 'เมตร':
                    result = meterValue;
                    break;
                case 'กิโลเมตร':
                    result = meterValue / 1000;
                    break;
                case 'เซนติเมตร':
                    result = meterValue * 100;
                    break;
                case 'นิ้ว':
                    result = meterValue / 0.0254;
                    break;
                case 'ฟุต':
                    result = meterValue / 0.3048;
                    break;
                case 'หลา':
                    result = meterValue / 0.9144;
                    break;
                case 'ไมล์':
                    result = meterValue / 1609.34;
                    break;
            }

            resultDiv.textContent = `${value} ${fromUnit} = ${result.toFixed(2)} ${toUnit}`;
        }

        function swapUnits() {
            const tempUnit = fromUnitSelect.value;
            fromUnitSelect.value = toUnitSelect.value;
            toUnitSelect.value = tempUnit;
            convert();
        }

        valueInput.addEventListener('input', convert);
        fromUnitSelect.addEventListener('change', convert);
        toUnitSelect.addEventListener('change', convert);
        swapUnitsButton.addEventListener('click', swapUnits);

        // คำนวณค่าเมื่อหน่วยหรือค่าเริ่มต้นเปลี่ยนแปลง
        convert();
    </script>
</div>

</body>
</html>
