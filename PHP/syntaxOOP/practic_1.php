<?php
class Matematic {
    public $S_rectangle;
    public $perimeter;
    public $V_cube;
    public $discriminant;
    public $S_circle;

    public function S_rectangle(int $a, int $b){
        $s = $a*$b;
        $this->S_rectangle=$s;
        return $s;
    }

    public function perimeter(int $a, int $b){
        $p = 2*($a+$b);
        $this->perimeter=$p;
        return $p;
    }

    public function V_cube(int $a){
        $v = pow($a, 3);
        $this->V_cube = $v;
            return $v;
    }

    public function discriminant(int $a, int $b, int $c){
        $d = pow($b, 2) - 4 * $a * $c;
        $this->discriminant=$d;

        if ($d == 0){
            $x_1 = (-$b)/(2*$a);
            echo 'Уравнение имеет один корень: '.$x_1.'<br>';
        }
        elseif ($d>0){
            $x_1 = (-$b+sqrt($d))/(2*$a);
            $x_2 = (-$b-sqrt($d))/(2*$a);
            echo 'Уравнение имеет два корня х1 = '.$x_1.' х2 = '.$x_2.'<br>';
        }
        else{
            echo 'Уравнение корней не имеет'.'<br>';
        }

}

    public function S_circle($r){
        $s=pi()*pow($r, 2);
        $this->S_circle=$s;
        return $s;
    }
}
$mathematical = new Matematic;

echo 'Площадь прямоугольника = '.$mathematical->S_rectangle(2,3).'<br>';
//echo $mathematical->S_rectangle.'<br>';
echo 'Периметр прямоугольника = '.$mathematical->perimeter(2,2).'<br>';
echo 'Объем куба = '.$mathematical->V_cube(5).'<br>'.'<br>';


$mathematical->discriminant(5,5,5);
echo 'Дискрименант равен: '.$mathematical->discriminant.'<br>'.'<br>';
echo 'Площадь круга = '.$mathematical->S_circle(2);