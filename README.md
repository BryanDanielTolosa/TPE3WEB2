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

Tenemos el filtro: esta echo por raza y localidad

http://localhost/TPE3WEB2/api/criadero?order_by=Nombre&localidad=Tandil&raza=Dalmata

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

Ordenado se hace con [nombre] asc
http://localhost/TPE3WEB2-main/api/perro?orderBy=nombre&order=asc
