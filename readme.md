# Prueba de programación

Desarrolla el programa descrito debajo usando PHP y MySQL.

El objetivo es ver cómo gestionarías tu tiempo y cómo estructurarías el problema. Así que lo importante es que lo hagas de manera natural, sin forzar.


## El programa a desarrollar:


Crear interfaz web que acepte subida de archivos, normalización de la info y lo guarde en una base de datos.

#### Crear una tabla que guarde la siguiente info

* Title
* Description (from a WYSIWYG editor)
* Price
* Init Date
* Expiry Date
* Status
* _And all other columns that you consider important_

#### La aplicación debe:

Aceptar a través de un formulario un fichero delimitado por tabulaciones con las siguientes columnas: item title, item description, item price, item init date, item expiry date, merchant address, and merchant name.

Debes tener en cuenta que siempre habrá info en todas las columnas y que siempre habrá una fila para el header. (fichero .tab incluido en el repositorio)

Una vez subido el fichero y normalizado debes mostrar en otro apartado un contador de:

- Productos por mes.
- Productos por merchant.

##### Información importante
> Las llamadas a la base de datos deben hacerse sin usar ningún tipo de librería o ORM, deben ser _plain queries_


##### Extra points (si te sobra tiempo):

* Desarróllalo usando el framework Laravel o otro framework.
* Auth (Login user + password).
* Estéticamente agradable a la vista.


## Instrucciones para enviar la prueba

1. Fork de este proyecto en GitHub. Tendrás que crear una cuenta si no dispones de una.
1. Completa la prueba y usa el flow de git para hacer el fork.
1. Finalmente, haz push de tus cambios en el fork y haz un pull request. No olvides decirnos cuál es tu usuario de Github para que podamos encontrarte.

### Alternativa

1. Clona el repositorio en local.
2. Completa el proyecto en tu repositorio local
1. Envía un [patch file](https://git-scm.com/docs/git-format-patch) de tu respositorio a it@thestorytailors.info.