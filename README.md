# Proyecto Inventario
Aplicacion web para almacenar y  gestionar el inventario de productos.

Desarrallado en PHP nativo bajo la estructura MVC (Modelo-Vista-Controlador).

Motor de base de datos: MySQL.

## Instalación
1. Importar la base de datos inventario, que se encuentra en el directorio script. 
3. Configurar las credenciales en el archivo db.php que esta en el directorio config.
2. Clonar el repositorio con: git clone https://github.com/jhonnyrave/proyecto-inventario.git


## Consultas

``
* Producto que más stock tiene:
SELECT max(stock) as stock, nombre FROM `productos` GROUP by nombre ORDER by stock desc limit 1;

* Producto más vendido:
SELECT sum(v.cantidad) as venta_producto, p.nombre FROM venta v INNER join productos p on(v.id_producto = p.id) group by p.nombre order by sum(v.cantidad) desc limit 1;
``