# Proyecto Inventario

Aplicacion web para almacenar y gestionar el inventario de productos.

Desarrallado en PHP nativo bajo la estructura MVC (Modelo-Vista-Controlador).

Motor de base de datos: MySQL.

## Instalación

1. Importar la base de datos cafeteria, que se encuentra en el directorio [script](./script/).
2. Configurar las credenciales en el archivo Database.php que esta en el directorio [Config](./Config/).
3. Clonar el repositorio con: git clone https://github.com/jhonnyrave/proyecto-inventario

## Consultas

```
* Producto que más stock tiene:
SELECT max(stock) as stock, nombre_producto FROM `productos` GROUP by nombre_producto ORDER by stock desc limit 1;

* Producto más vendido:
SELECT sum(v.cantidad) as venta_producto, p.nombre_producto FROM venta v INNER join productos p on(v.id_producto = p.id) group by p.nombre_producto order by sum(v.cantidad) desc limit 1;
```
