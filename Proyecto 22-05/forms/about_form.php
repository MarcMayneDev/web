<?php  
    /**
    * ABOUT FORM
    * Autor: Marc Martínez Mayné
    * Fecha: 21-12-2018
    * Descripción: Formulario que muestra información sobre el creador de la página.
    */        

    // Requeriremos que se abran los siguientes documentos
    require_once "../forms/vars/rutas.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . $rutas["template_master"];
?>
<!-- Título -->
<?php startblock('titulo') ?>About<?php endblock() ?>
<!-- CSS -->
<?php startblock('own_css') ?>
    <link rel="stylesheet" href="<?php echo $rutas["css_web"] ?>">
<?php endblock() ?>
<!-- HTML -->
<?php startblock('principal') ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body text-white">
                <!-- Imagen About -->
                <img class="rounded-circle mx-auto d-block" src="<?php echo $rutas["img_marc"] ?>" height=150 with=150>
                <!-- About Marc Martínez Mayné -->
                <h2 class="card-title text-center">Marc Martínez Mayné</h2>
                <div class="col-8 mx-auto">
                <hr class="bg-white">
                </div>
                <!-- Conocimientos sobre Informática -->
                <h3 class="text-left">Informática</h3>
                <p class="text-justify">Lenguajes de Programación: PHP, Javascript<br>
                                        Frameworks: Bootstrap 4<br>
                                        Entornos de Desarrollo: Visual Studio Code<br>
                                        Ofimática: Microsoft Office Suite<br>
                                        Sistemas Operativos: iOS, Windows 7, Windows 10, Android<br>
                                        Otros: HTML5, CSS, MySQL
                </p>
                <div class="col-8 mx-auto"><hr class="bg-white"></div>
                <!-- Educación -->
                <h3 class="text-left">Educación</h3>
                <p class="text-justify">Cursando Grado Medio de Sistemas Microinformáticos y Redes (2017 - Presente). Centre d’Estudis STUCOM, Barcelona<br>
                                        Educación Secundaria Obligatoria (2009-2013). Liceo Politècnic, Rubí
                </p>
                <div class="col-8 mx-auto"><hr class="bg-white"></div>
                <!-- Idiomas -->
                <h3 class="text-left">Idiomas</h3>
                <p class="text-justify">Castellano – Nativo<br>
                                        Català – Nativo. Certificado de nivel de suficiencia C1<br>
                                        Inglés – First Certificate in English (2018)<br>
                                        Alemán – Nivel inicial. Lectura, escritura y habla
                </p>
                <div class="col-8 mx-auto"><hr class="bg-white"></div>
                <!-- Experiencia Laboral -->
                <h3 class="text-left">Experiencia</h3>
                <p class="text-justify">De Mayo de 2018 a Junio de 2018. Ayudante de cocina en Casa Consolat (100 horas). Marsella, Francia<br>
                                        De Enero de 2019 a Marzo de 2019. Ayudante de Informática en Life Informática (170 horas). Barcelona<br>
                                        De Marzo de 2019 a Abril de 2019. Desarrollador web Wordpress en Be Ready. Londres (130 horas), Reino Unido
                </p>
            </div>
        </div>
    </div>
<?php endblock() ?>