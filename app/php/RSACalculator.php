<?php

class RSACalculator
{
    const PRIM =    [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 
                    71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 
                    151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 
                    233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293];

    //рассчет функции Эйлера и модуля
    static function calculateEulAndN(int $p, int $q): array
    {
        //eul=(p-1)*(q-1)
        //n=p*q
        if (RSACalculator::isPrime($p) && RSACalculator::isPrime($q)) {
            $n = $p * $q;
            $eul = ($p - 1) * ($q - 1);
            return ['n' => $n, 'eul' => $eul];
        } else {
            return ['error' => 'Числа не простые'];
        }
    }

    //Генерация числа е. Ограниченна массивом простых чисел PRIM
    static function calculateE(int $eul): array
    {
        $dividers = RSACalculator::find_dividers($eul);
        foreach (RSACalculator::PRIM as $value) {
            if (in_array($value, $dividers)) {
                continue;
            } elseif ($value >= $eul) {
                return ['error' => 'Невозможно посчитать значение'];
            } else {
                return ['e' => $value];
            }
        }
    }

    //Число простое?
    private static function isPrime(int $x): bool
    {
        for ($i = 2; $i <= sqrt($x); $i++) {
            if ($x % $i == 0) {
                return false;
            }
        }
        return true;
    }

    //Найти все делители
    private static function find_dividers(int $x): array
    {
        $dividers = array();
        for ($i = 1; $i <= sqrt($x); $i++) {
            if ($x % $i == 0) {
                $dividers[] = $i;
                if ($i * $i !== $x) {
                    $dividers[] = $x / $i;
                }
            }
        }
        return $dividers;
    }

    //Расчет d по Расширенному алгоритму Евклида
    static function calculateD(int $e, int $n): array
    {
        return ['d' => RSACalculator::modMultInv($e, $n)];
    }

    static private function modMultInv(int $x, int $y): int
    {
        $oldR = gmp_add(0, $x);
        $r = gmp_add(0, $y);
        $oldS = gmp_add(0, 1);
        $s = gmp_add(0, 0);

        while (gmp_cmp($r, 0)) {
            $quot = gmp_div_q($oldR, $r);

            $tempR = $r;
            $r = gmp_sub($oldR, gmp_mul($quot, $r));
            $oldR = $tempR;

            $tempS = $s;
            $s = gmp_sub($oldS, gmp_mul($quot, $s));
            $oldS = $tempS;
        }

        if (gmp_cmp($oldS, 0) === -1)
            $oldS = gmp_add($oldS, $y);
        return gmp_strval($oldS);
    }

    //Шифровка и дешифровка. Делается по алгоритму быстрого возведения степени по модулю схема «справа налево»
    static function encryptM(int $m, int $n, int $e)
    {
        //m^e mod n
        return ['c' => RSACalculator::modExp($m, $e, $n)];
    }

    static function decryptC(int $c, int $d, int $n)
    {
        //c^d mod n
        return ['m' => RSACalculator::modExp($c, $d, $n)];
    }

    static private function modExp(int $x, int $y, int $z)
    {
        $res = new GMP(1);
        $x = gmp_mod($x, $z);
        while (gmp_cmp($y, 0) === 1) {
            if (gmp_strval(gmp_mod($y, 2)) === '1')
                $res = gmp_mod((gmp_mul($res, $x)), $z);
            $y = $y >> 1;
            $x = gmp_mod(gmp_mul($x, $x), $z);
        }
        return gmp_strval($res);
    }
}
