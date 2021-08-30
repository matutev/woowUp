# woowUp
Ejercicios del Test

developed PHP 7.4.0 | Apache 2.4 | PHPUnit 9.5.8

1- install composer
2- composer require --dev phpunit/phpunit ^9 


Ejercicio 1: Subir la escalera

Estás subiendo una escalera que tiene n escalones. En cada paso podés elegir subir 1 escalón o subir 2.

Programar una solución que, dada una escalera de n escalones, encuentre de cuántas formas distintas se puede subir para llegar al final.

Ejemplo:

Para una escalera de 2 escalones, el resultado es 2 porque las posibilidades son:

Subir 1 escalón + subir 1 escalón
Subir 2 escalones
Para una escalera de 3 escalones, el resultado es 3, porque las posibilidades son:

Subir 1 escalón + subir 1 escalón + subir 1 escalón
Subir 1 escalón + subir 2 escalones
Subir 2 escalones + subir 1 escalón
Ejercicio 2: Reaprovisionamiento de productos

Deberás escribir un programa que lea el archivo JSon (click aquí para descargarlo) donde se encuentran las compras de un cliente y calcule la fecha de posible recompra de los productos que compró (solo los que compró al menos 2 veces).

Para obtener la fecha de recompra de un producto: hay que analizar cada cuanto tiempo vuelve a comprar ese producto. Luego sumarle ese tiempo a la fecha de última compra del producto. Vas a tener una fecha de recompra por producto.

2.1. Extra

¿Se te ocurre alguna forma de solucionar el problema de los valores atípicos? Ej: Un cliente que siempre compra el mismo producto una vez por semana, excepto por una única vez que se tomó 8 semanas en volver a comprar. ¿Qué se puede hacer para que ese valor atípico, 8 semanas, no distorsione el cálculo de su frecuencia de compra habitual?
