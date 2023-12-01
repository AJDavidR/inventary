<p>
    <h1 align="center">Proyecto Inventary</hi>
</p>

<p align="center">
    En este proyecto la meta es crear un crud de productos y categorias en tablas diferentes y unidas

    paquetes que se usan JetStream, Livewire y Tailwind

    nesesario:
    Laravel Framework 10.33.0
    PHP 8.2.12 (cli) (built: Oct 24 2023 21:15:35) (NTS Visual C++ 2019 x64)
    mysql  Ver 8.0.30 for Win64 on x86_64 (MySQL Community Server - GPL)
    realizar migraciones para la base de datos

    detalles:
    En productos se pueden agregar
    -codigo
    -nombre
    -precio
    -imagen
    -categoria

    en categoria
    -nombre

    cada tabla tiene su respectivo id y esta conectada por categoria
     de productos al id de la tabla categoria
    ademas de tener una Api relacionada al proyecto

    probremas y souluciones

    En caso de problemas con "livewire file upload Path cannot be empty"
	https://github.com/livewire/livewire/discussions/4329
	Uncomment upload_tmp_dir  and set value to "C:/laragon/tmp" inside php.ini

    


</p>
