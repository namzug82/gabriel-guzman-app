# Aplicación: gabriel-guzman-app


### Instalación:

1. Clonar Repositorio:
> git clone https://github.com/namzug82/gabriel-guzman-app.git

2. Composer Update:
> gabriel-guzman-app# php composer.phar update

3. Crear Virtual Host a través del Manifest de Puppet (mpwar.pp):
> apache::vhost { 'gabriel.app':
>     port          => '80',
>     docroot       => '/www/example-folder/gabriel-guzman-app/web',
> }

4. Aprovisionar Vagrant para aplicar los nuevos cambios:
> vagrant provision 

5. Editar el fichero etc/hosts para que apunte al nuevo Virtual Host:
> vim etc/hosts
> 192.168.33.15 gabriel.app


### Funcionamiento:

> Una vez instalada la aplicación siguiendo los pasos anteriores, ya podemos utilizarla poniendo
> "http://gabriel.app/" en el navegador.
> 
> La aplicación es muy sencilla. Con la url "http://gabriel.app/" ó "/index.php" nos devolverá una 
> lista de tareas (vacía inicialmente) y las opciones de añadir tarea o eliminar tarea.
>
> No es necesario importar ninguna base de datos, ni tabla, ya que la aplicación la crea
> automáticamente:
>
>   public function __construct($db, $host, $user, $password)
>   {
>       try {
>            $dbBuilder = new \PDO("mysql:host=$host", $user, $password);
>            $dbBuilder->exec("CREATE DATABASE IF NOT EXISTS " . 
>                            $db . 
>                            ";
>                        USE " . 
>                            $db .
>                            ";
>                        ")
>   ...
>
> Esto ocurre en la clase PDO del Framework y los parámetros que recibe están definidos en el fichero 
> de configuración del contenedor de servicios, que se encuentra en 
> "App/Resources/config/services/yaml/services.yml".
>
> Para insertar una nueva tarea se ha utilizado el método "POST" y para borrar, "GET".


### Conclusiones:

La aplicación es sencilla, pero trata de utilizar todos los componentes del Framework. Volviendo a repasar lo que se pedía en el enunciado, podemos encontrar los resultados siguientes:

- Día 1: introducción, creación de los repos, front controller básico y Application básico

> Resultado: Ok


- Día 2: sistema de rutas, dispatcher de http y ejecución de un controlador

> Resultado: Ok


- Día 3: objetos request, response, sistema de plantillas y base de datos

> Resultado: Ok


- Día 4: entornos de producción y desarrollo ( nota: no intentéis modificar el tema del vHost ya que no acaba de funcionar y os puede hacer perder mucho tiempo ), contenedor de dependencias, I18N y debugger

> Entornos de Producción y Desarrollo: 
> Creado "index.php" con la opción "display_erros" en "off" y "index_dev.php" en "on".

> Contenedor de Dependencias:
> Creado componente "Container" en el Framework y fichero de configuración de servicios (services.yml)
> en la Aplicación.

> I18N: No implementado.
> Debugger: No implementado.
