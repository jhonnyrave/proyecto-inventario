# Proyecto Inventario
Aplicacion web para almacenar y  gestionar el inventario de productos.

Desarrallado en PHP nativo bajo la estructura MVC (Modelo-Vista-Controlador).

Motor de base de datos: MySQL.

## Consultas

`
* Producto que más stock tiene:
SELECT max(stock) as stock, nombre FROM `productos` GROUP by nombre ORDER by stock desc limit 1;

* Producto más vendido:
SELECT sum(v.cantidad) as venta_producto, p.nombre FROM venta v INNER join productos p on(v.id_producto = p.id) group by p.nombre order by sum(v.cantidad) desc limit 1;
`