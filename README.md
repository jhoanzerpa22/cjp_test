## Cjp
-- Laravel 5.7
-- Bootstrap 4.0

## Instalacion 

composer install

php artisan migrate --seed

php artisan passport:install

php artisan passport:client --personal

php artisan storage:link

php artisan serve

## Rutas

Categorias:

get -> http://{ruta_proyecto}/api/v1/categorias (Lista de todas las categorias)
get -> http://{ruta_proyecto}/api/v1/categorias/1 (Ver categoria por Id)
post -> http://{ruta_proyecto}/api/v1/categorias (Guardar una Categoria)

Objeto enviado:

{
	"nombre": "Categoria"
}

Marcas:

get -> http://{ruta_proyecto}/api/v1/marcas (Lista de todas las marcas)
get -> http://{ruta_proyecto}/api/v1/marcas/1 (Ver marca por Id)
post -> http://{ruta_proyecto}/api/v1/marcas (Guardar una Marca)

Objeto enviado:

{
	"nombre": "Marca"
}

Productos:

get -> http://{ruta_proyecto}/api/v1/productos (Lista de todas las productos)
get -> http://{ruta_proyecto}/api/v1/productos/1 (Ver producto por Id)
get -> http://{ruta_proyecto}/api/v1/productos/{type}/{search} (Ver producto por Marca o Categoria: Type representa marca o categoria y search la marca o categoria que se desea filtrar del producto)
post -> http://{ruta_proyecto}/api/v1/productos (Guardar un Producto)

Objeto enviado:

{
	"nombre": "Producto",
	"precio": 100,
	"categoria_id": 1,
	"marca_id": 1
}

## Nota

Antes de generar las migraciones se debe tener creado y configurado el archivo .env para su conexión con la bd.
De igual manera en la carpeta raiz se podra encontrar la bd "cjp.sql" con datos de prueba y una colección Postman para identificar las rutas.
