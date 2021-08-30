# woowUp
Ejercicios del Test

developed PHP 7.4.0 | Apache 2.4 | PHPUnit 9.5.8

RUN

# endava-thrive Take-Home
> This is a solution for the problem planted on the Take-Home Document provided by Thrive
## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Usage](#usage)
* [Project Status](#project-status)
<!-- * [License](#license) -->
## General Information
- Objective:
- The develop of a recently viewed product feature.  

## Technologies Used
- Php 7.3
- Docker (From php:7.3-apache)
- MySql
- Composer
- PhpUnit
- Bootstrap 5.0

## Features
In this app you can:
- Create 100 new Rand Products
- Create 1 new Rand Products
- See the list of All Products
- Add one product to the user recently viewed product list
- See the list of the recently viewed product list for the current loggued user
- Remove one product from the recently viewed product list for the current loggued user


## Screenshots
![Screenshot 1](https://raw.githubusercontent.com/morimartin14/endava-thrive/master/assets/img/screenshots/1.png)

![Screenshot 2](https://raw.githubusercontent.com/morimartin14/endava-thrive/master/assets/img/screenshots/2.png)

## Setup
Dockerfile and docker-compose.yml could by provided if needed, but basicaly, just need any developmen environmet with Apache, MySql and composer will work.
After the enviroment is working, you will need to run a composer install comand in order to get the PHPunit dependensies, then you can run all the unit
test by running this command "./vendor/bin/phpunit tests"

Last thing will be to run the sql script "myDb.sql" in order to create the tables.

Tables are empty, so, a good start point will be to add 100 rand products by clicking on this option in the index.php file.

## Test
Here are the test that are going to run when you execute the PHPunit command:
- testGetProductById
- testSaveRecentlyViewedProduct
- testGetRecentlyViewedProductForUser
- testUpdateRecentlyViewedProduct
- testRemoveRecentlyViewedProduct
- testGetAllRecentlyViewedProduct

## Usage
Once the server es running you will be able to see the index.php page (find scheenshot 1)
There you will see the list of actions that you can do.
* [Features](#features)

For example, to remove one product from the recently viewed product list for the current loggued user, you need to go to the Recently viewed Product screen by
clicking on the "Recently viewed Product" link, there you will see the "Remove from this list" button.


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
