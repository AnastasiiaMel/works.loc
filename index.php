<?php
$number_1 = 5;
$number_2 = 6;
$summ = $number_1 + $number_2;
echo "Сумма двух чисел равна " . $summ;
$country = ["Иордания", "Ливан", "Вьетнам", "Испания"];
$friends = [
    ["name" => "Регина",
        "age" => "27",
        "city" => "Санкт-Петербург"],
    ["name" => "Александр",
        "age" => "38",
        "city" => "Самара"],
    ["name" => "Иван",
        "age" => "28",
        "city" => "Краснодар"],
];

$pet = [
    "name" => "Ева",
    "type" => "Кошка",
    "breed" => "Scottish fold"
];
echo "<br>" . "<br>";
echo "Страны которые я бы хотела посетить: " . $country[0] . ", " . $country[1] . ", " . $country[2] . ", " . $country[3];
echo "<br>";
echo "Мои друзья: " . $friends[0]["name"] . " ей " . $friends[0]["age"] . " лет и она из города " . $friends[0]["city"] . ", " . "<br>"
    . $friends[1]["name"] . " ему " . $friends[1]["age"] . " лет и он из города " . $friends[1]["city"] . ", " . "<br>"
    . $friends[2]["name"] . " ему " . $friends[2]["age"] . " лет и он из города " . $friends[2]["city"] . ", " . "<br>";
echo "Мое домашнее животное: " . $pet["name"] . " это " . $pet["type"] . " породы " . $pet["breed"];
echo "<br>" . "<br>";
foreach ($country as $countries) {
    echo $countries . PHP_EOL;
};
echo "<br>";
foreach ($friends as $friend) {
    foreach ($friend as $one) {
        echo $one . PHP_EOL;
    }
};
echo "<br>";
foreach ($pet as $key => $value) {
    echo $value . PHP_EOL;
};
echo "<br>" . "<br>";
for ($i = 0; $i < count($country); $i++) {
    echo $country[$i] . PHP_EOL;
};
echo "<br>" . "<br>";
$i = 0;
while ($i <= 10) {
    echo $i;
    $i++;
};

echo "<br>" . "<br>";
$i = 0;
do {
    echo $i;
    $i++;
} while ($i <= 10);
echo "<br>" . "<br>";
$age = 78;
if ($age >= 65) {

    echo "Я пожилой человек";
} elseif ($age >= 18) {
    echo "Я совершеннолетний";
} else {
    echo "Я несовершеннолетний";
};

echo "<br>" . "<br>";
$b = -6;
$a = 1;
$c = 9;
$diskrim = pow($b, 2) - 4 * $a * $c;
echo "Дискриминант равен ".$diskrim." найдем его корни"."<br>";
if ($diskrim > 0) {
    echo "Уровнение имеет два корня" . "<br>";
    $x1 = (-$b + sqrt($diskrim) )/ (2 * $a);
    $x2 = (-$b - sqrt($diskrim) )/ (2 * $a);
    echo "Первый корень равен: " . $x1 . "<br>";
    echo "Второй корень равен: " . $x2 . "<br>";
} elseif ($diskrim == 0) {
    echo "Уравнение имеет один корень" . "<br>";
    $x1 = (-$b) / (2 * $a);
    echo "Корень равен: " . $x1 . "<br>";
} else {
    echo "Так как дискриминант меньше нуля, то уравнение корней не имеет";
};

echo "<br>" . "<br>";

function discrim($a, $b, $c){
    $diskrim = pow($b, 2) - 4 * $a * $c;
    echo "Дискриминант равен ".$diskrim." найдем его корни"."<br>";
    if ($diskrim > 0) {
        echo "Уровнение имеет два корня" . "<br>";
        $x1 = (-$b + sqrt($diskrim) )/ (2 * $a);
        $x2 = (-$b - sqrt($diskrim) )/ (2 * $a);
        echo "Первый корень равен: " . $x1 . "<br>";
        echo "Второй корень равен: " . $x2 . "<br>";
    } elseif ($diskrim == 0) {
        echo "Уравнение имеет один корень" . "<br>";
        $x1 = (-$b) / (2 * $a);
        echo "Корень равен: " . $x1 . "<br>";
    } else {
        echo "Так как дискриминант меньше нуля, то уравнение корней не имеет";
    }
}
discrim(1,-6,9);
echo "<br>" . "<br>";
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form method="get">
    <div class="a_and_b_value">
        <input  type="text" id="a" name="a" placeholder='Введите значение "a"'>
        <input type="text" id="b" name="b"  placeholder='Введите значение "b"'>
        <input  type="text" id="c" name="c" placeholder='Введите значение "c"'>
    </div>

    <div class="button">
        <button type="submit" id='button'>Решить</button>
    </div>
</form>
<?php
echo $_GET['a']." ";
echo $_GET['b']." ";
echo $_GET['c']."<br>";
function discrim2($a, $b, $c){
    $diskrim = pow($b, 2) - 4 * $a * $c;
    echo "Дискриминант равен ".$diskrim." найдем его корни"."<br>";
    if ($diskrim > 0) {
        echo "Уровнение имеет два корня" . "<br>";
        $x1 = (-$b + sqrt($diskrim) )/ (2 * $a);
        $x2 = (-$b - sqrt($diskrim) )/ (2 * $a);
        echo "Первый корень равен: " . $x1 . "<br>";
        echo "Второй корень равен: " . $x2 . "<br>";
    } elseif ($diskrim == 0) {
        echo "Уравнение имеет один корень" . "<br>";
        $x1 = (-$b) / (2 * $a);
        echo "Корень равен: " . $x1 . "<br>";
    } else {
        echo "Так как дискриминант меньше нуля, то уравнение корней не имеет";
    }
};

discrim2($_GET['a'],$_GET['b'], $_GET['c']);

?>
</body>
</html>



