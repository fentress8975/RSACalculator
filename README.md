# Скрипт расчета RSA значений

Простой скрипт для вычисления основных значений, такие как: p, q, n, (tot), e, d
И шифрования/дешифрования значения.

Репозиторий идет с docker-composer файлом с 3 контейнерами: php, nginx, proxy.
Нужно собрать прокси контейнер(proxy/docker-compose.yml), потом основной файл(docker-compose.yml). После этого будет доступна страница с возможностью ввода значений.

![страница](page.jpg "Скриншот страницы")

## Методы

- `static function calculateEulAndN(int $p, int $q): array`

        Вычисляет модуль числа p и q. (n = p × q)

        Вычисляет функцию Эйлера по числам p и q. (φ = (p - 1) × (q - 1))

        Возвращает массив вида: 
        ['n' => $n, 'eul' => $eul]

        Возвращает ошибку, если числа не простые. 
        ['error' => 'Числа не простые']


- `static function calculateE(int $eul): array`

        Выбирает число e по значению функции Эйлера.

        Возвращает массив вида: 
        ['e' => $e]

        Возвращает ошибку, если не удалось найти значение. Такое может быть, если нету значений либо закончились простые числа в массиве PRIME 
        ['error' => 'Невозможно посчитать значение']

- `static function calculateD(int $e, int $n): array`

        Вычисляет число d по расширенному алгоритму Евклида.

        Возвращает массив вида:
        ['d' => d];

- `static function encryptM(int $m, int $n, int $e) : array`

        Шифрует число по алгоритму быстрого возведения степени по модулю, схема «справа налево».

        Необходимые данные: само число(m), n, e.

        Возвращает массив вида:
        ['с' => с];

        Возвращает ошибку, если m не удволетворяет диапозону 1 < m < n. 
        ['error' => 'm не удволетворяет диапозону 1 < m < n ']


- `static function decryptC(int $c, int $d, int $n) : array`

        Дешифрует число по алгоритму быстрого возведения степени по модулю, схема «справа налево».

        Необходимые данные: само число(c), d, n.

        Возвращает массив вида: 
        ['m' => m];

        Возвращает ошибку, если c не удволетворяет диапозону 1 < c < n. 
        ['error' => 'c не удволетворяет диапозону 1 < c < n ']
