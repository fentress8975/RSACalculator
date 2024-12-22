<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/javascript.js"></script>
    <title>RSA калькулятор</title>
</head>

<body>
    <div><button>Очистить поля</button></div>
    <div class="border-div">
        <p>Введите два простых числа</p>
        <label for="p">Значение p:</label>
        <input type="number" min="1" name="p" id="p">
        <label for="q">Значение q:</label>
        <input type="number" min="1" name="q" id="q">
        <div><button onclick="calculateEulAndN()">Посчитать</button></div>
    </div>
    <div class="border-div">
        <p>n = p * q</p>
        <label for="n">Значение n:</label>
        <input type="number" name="n" id="n" >
        <p>φ=(p-1)×(q-1)</p>
        <label for="eul">Значение φ:</label>
        <input type="number" name="eul" id="eul" >
    </div>
    <div class="border-div">
        <p>Рассчитаем число e, оно должно быть:</p>
        <ul>
            <li>простым</li>
            <li>меньше φ</li>
            <li>взаимно простое с φ</li>
        </ul>
        <label for="e">Значение e:</label>
        <input type="number" min="1" name="e" id="e">
        <div><button onclick="calculateE()">Посчитать</button></div>
    </div>
    <div class="border-div">
        <p>(d×е)%φ=1</p>
        <label for="d">Значение d:</label>
        <input type="number" min="1" name="d" id="d">
        <div><button onclick="calculateD()">Посчитать</button></div>
    </div>
    <div class="border-div">
        <p><strong>1 < m < n <span class="calculatedN">(n)</span></strong></p>
        <p><strong>1 < c < n <span class="calculatedN">(n)</span></strong></p>
        <label for="m">Значение m:</label>
        <input type="number" min="1" name="m" id="m">
        <label for="c">Значение c:</label>
        <input type="number" min="1" name="c" id="c">
        <div><button onclick="encryptM()">Зашифровать</button></div>
        <div><button onclick="decryptC()">Дешифровать</button></div>
    </div>
</body>

</html>