## LOLIPOP
##### Integrantes del grupo: Asier Astorquiza e Iñigo Ozalla
##### Instrucciones:

Antes de realizar ninguna acción debemos asegurarnos de que tenemos todos los archivos necesarios para ello. Esto es:
- La carpeta "app"
- El archivo "database.sql"
- El archivo "docker-compose.yml"
- El archivo "Dockerfile"

Una vez tengamos esos archivos podemos comenzar a desplegar el proyecto mediante Docker.

1. Abrimos la terminal en la carpeta donde se han guardado los archivos anteriores.
2. Ejecutamos el comando '$ sudo docker build -t="web" . '
3. Seguido ejecutamos el comando '$ sudo docker-compose up '
4. Una vez este en marcha el contenedor abrimos un navegador (por ejemplo,  Firefox) y nos dirigimos a la dirección 'localhost:8890'. En esta dirección deberemos iniciar sesión como "admin" con la contraseña "test".
5. Tras iniciar sesión en PHP myAdmin, tendremos que clicar en 'database' para a continuación importar nuestro archivo "database.sql".
6. Finalmente, nos dirigiremos a la dirección 'localhost:81' y accederemos a nuestra página web.

