# TPE3WEB2

Ejemplos de endpoints y como usarlos:
----------------------------------------------- CRIADERO ---------------------------------------------------
http://localhost/TPE3WEB2/api/criadero

Con este endpoint, usando el metodo GET, trae todos los criaderos

http://localhost/TPE3WEB2/api/criadero

Con este endpoint, usando el metodo POST, crea un criadero

http://localhost/TPE3WEB2/api/criadero/22

Con este endpoint, usando el metodo PUT, edita el criadero con el id 22

http://localhost/TPE3WEB2/api/criadero/22

Con este endpoint, usando el metodo GET, trae el criadero con el id 22

http://localhost/TPE3WEB2/api/criadero/22

Con este endpoint, usando el metodo DELETE, elimina el criadero con el id 22

Tenemos el filtro: esta echo por raza y localidad, este por ejemplo

http://localhost/TPE3WEB2/api/criadero?order_by=Nombre&localidad=Tandil&raza=Dalmata
esta no existe 
http://localhost/TPE3WEB2-main/api/criadero?order_by=Nombre&localidad=Tandil&raza=Boyero de Berna
esta si nos las devuelve por que existe

----------------------------------------------- PERRO ---------------------------------------------------

http://localhost/TPE3WEB2/api/perro

Con este endpoint, usando el metodo GET, trae todos los perros

http://localhost/TPE3WEB2/api/perro

Con este endpoint, usando el metodo POST, crea un perro

http://localhost/TPE3WEB2/api/perro/22

Con este endpoint, usando el metodo PUT, edita el perro con el id 22

http://localhost/TPE3WEB2/api/perro/22

Con este endpoint, usando el metodo GET, trae el perro con el id 22

http://localhost/TPE3WEB2/api/perro/22
Con este endpoint, usando el metodo DELETE, elimina el perro con el id 22

## Buscar y Ordenar Perros en Postman

Para buscar y ordenar la lista de perros utilizando la API, puedes seguir los siguientes pasos en Postman:

### 1. Configurar la Solicitud GET
- **Método**: GET
- **URL**: `http://localhost/TPE3WEB2-main/api/perro/`

### 2. Añadir Parámetros de Consulta
Añade los parámetros de consulta para ordenar los resultados.

#### Ordenar por Nombre Ascendente
- **Key**: `orderBy`
- **Value**: `nombre`
- **Key**: `order`
- **Value**: `asc`

#### Ordenar por Nombre Descendente
- **Key**: `orderBy`
- **Value**: `nombre`
- **Key**: `order`
- **Value**: `desc`

```plaintext
GET http://localhost/TPE3WEB2-main/api/perro?orderBy=nombre&order=asc

GET http://localhost/TPE3WEB2-main/api/perros?orderBy=nombre&order=desc



