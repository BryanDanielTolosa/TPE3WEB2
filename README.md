# TPE3WEB2

API para la gestión de criaderos y perros, que incluye operaciones CRUD y funcionalidad de filtrado y ordenamiento. A continuación, se describen los principales endpoints y cómo utilizarlos.

---

## Tabla de Contenidos
- [Introducción](#introducción)
- [Endpoints de Criadero](#endpoints-de-criadero)
- [Endpoints de Perro](#endpoints-de-perro)
- [Filtrado y Ordenamiento](#filtrado-y-ordenamiento)
  - [Filtrar Criaderos](#filtrar-criaderos)
  - [Ordenar Perros](#ordenar-perros)
- [Uso en Postman](#uso-en-postman)
- [Contribución](#contribución)
- [Licencia](#licencia)

---

## Introducción

Esta API permite interactuar con una base de datos de criaderos y perros mediante endpoints RESTful. Proporciona operaciones de creación, lectura, actualización y eliminación (CRUD), así como opciones avanzadas de filtrado y ordenamiento para facilitar las consultas.

---

## Endpoints de Criadero

### Operaciones CRUD para Criaderos

- **GET** `http://localhost/TPE3WEB2/api/criadero`  
  Obtiene una lista de todos los criaderos.

- **POST** `http://localhost/TPE3WEB2/api/criadero`  
  Crea un nuevo criadero.

- **PUT** `http://localhost/TPE3WEB2/api/criadero/{id}`  
  Actualiza los datos del criadero con el ID especificado.

- **GET** `http://localhost/TPE3WEB2/api/criadero/{id}`  
  Obtiene los detalles del criadero con el ID especificado.

- **DELETE** `http://localhost/TPE3WEB2/api/criadero/{id}`  
  Elimina el criadero con el ID especificado.

### Filtrar Criaderos

Puedes filtrar criaderos utilizando parámetros como **localidad** y **raza**. Ejemplo:

- **Ejemplo válido**  
  `http://localhost/TPE3WEB2/api/criadero?order_by=Nombre&localidad=Tandil&raza=Dalmata`

- **Ejemplo inválido (sin resultados)**  
  `http://localhost/TPE3WEB2/api/criadero?order_by=Nombre&localidad=Tandil&raza=Boyero de Berna`

---

## Endpoints de Perro

### Operaciones CRUD para Perros

- **GET** `http://localhost/TPE3WEB2/api/perro`  
  Obtiene una lista de todos los perros.

- **POST** `http://localhost/TPE3WEB2/api/perro`  
  Crea un nuevo perro.

- **PUT** `http://localhost/TPE3WEB2/api/perro/{id}`  
  Actualiza los datos del perro con el ID especificado.

- **GET** `http://localhost/TPE3WEB2/api/perro/{id}`  
  Obtiene los detalles del perro con el ID especificado.

- **DELETE** `http://localhost/TPE3WEB2/api/perro/{id}`  
  Elimina el perro con el ID especificado.

### Ordenar Perros

Puedes ordenar perros utilizando parámetros de consulta para organizar los resultados por nombre. Los parámetros disponibles son:

- **`orderBy`**: Campo por el cual ordenar (actualmente solo `nombre`).
- **`order`**: Tipo de orden (`asc` para ascendente, `desc` para descendente).

#### Ejemplos:

- **Orden Ascendente por Nombre**  
  `http://localhost/TPE3WEB2/api/perro?orderBy=nombre&order=asc`

- **Orden Descendente por Nombre**  
  `http://localhost/TPE3WEB2/api/perro?orderBy=nombre&order=desc`

---

## Filtrado y Ordenamiento

### Filtrar Criaderos

Puedes filtrar criaderos utilizando parámetros como **localidad** y **raza**. Ejemplo:

```plaintext
GET http://localhost/TPE3WEB2/api/criadero?order_by=Nombre&localidad=Tandil&raza=Dalmata
GET http://localhost/TPE3WEB2-main/api/criadero?order_by=Nombre&localidad=Tandil&raza=Boyero de Berna


