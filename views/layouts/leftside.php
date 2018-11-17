<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/logounan.png', ['class' => 'img-circle', 'alt' => 'Logo UNAN']) ?>
            </div>
            <div class="pull-left info">
                <p>Bienvenid@s al Sistema</p>
                <p>Gestión de JUDC</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
            </div>
        </div>
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Inicio', 'icon' => 'fa fa-gg',
                            'url' => Yii::$app->homeUrl
                        ],
                        [
                            'label' => 'Personas',
                            'icon' => 'fa fa-users',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Lista de personas', 'icon' => 'fa fa-list-ol', 'url' => ['/persona/index'],],
                                //['label' => 'Tipos de Personas', 'icon' => 'fa fa-sitemap', 'url' => ['/tipo-persona/index'],],
                                ['label' => 'Alumnos', 'icon' => 'fa fa-child', 'url' => ['/alumno/index'],],
                                ['label' => 'Docentes', 'icon' => 'fa fa-user', 'url' => ['/docente/index'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        [
                            'label' => 'Carreras',
                            'icon' => 'fa fa-book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Departamentos', 'icon' => 'fa fa-list-ol', 'url' => ['/departamento/index'],],
                                ['label' => 'Titulos', 'icon' => 'fa fa-certificate', 'url' => ['/titulo/index'],],
                                ['label' => 'Niveles Academicos', 'icon' => 'fa fa-sitemap', 'url' => ['/nivelacademico/index'],],
                                ['label' => 'Carreras', 'icon' => 'fa fa-suitcase', 'url' => ['/carrera/index'],],
                                ['label' => 'Turnos', 'icon' => 'fa fa-edit', 'url' => ['/turno/index'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        [
                            'label' => 'Trabajos',
                            'icon' => 'fa fa-mortar-board',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Areas', 'icon' => 'fa fa-th-list', 'url' => ['/area/index'],],
                                ['label' => 'Origenes', 'icon' => 'fa fa-sitemap', 'url' => ['/origen/index'],],
                                ['label' => 'Salas', 'icon' => 'fa fa-location-arrow', 'url' => ['/sala/index'],],
                                ['label' => 'Categorias', 'icon' => 'fa fa-sitemap', 'url' => ['/categoria/index'],],
                                ['label' => 'Trabajos', 'icon' => 'fa fa-file-word-o', 'url' => ['/trabajo/index'],]
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        [
                            'label' => 'Evaluaciones',
                            'icon' => 'fa fa-expeditedssl',
                            'url' => '#',
                            'items' => [
                                [
                                'label' => 'Parametros',
                                'icon' => 'fa fa-object-ungroup',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Tipos de Parametros', 'icon' => 'fa fa-sitemap', 'url' => ['/tipoparametro/index'],],
                                    ['label' => 'Parametros', 'icon' => 'fa  fa-star-o', 'url' => ['/parametro/index'],],
                                    ['label' => 'Puntajes', 'icon' => 'fa fa-sort-numeric-asc', 'url' => ['/puntaje/index'],],
                                    ],
                                ],
                                [
                                    'label' => 'Calificacion',
                                    'icon' => 'fa  fa-hand-o-right',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Jurados', 'icon' => 'fa fa-user-secret', 'url' => ['/jurado/index'],],
                                        ['label' => 'Evaluaciones', 'icon' => 'fa fa-check', 'url' => ['/evaluacion/index'],],
                                        ['label' => 'Resultados', 'icon' => 'fa  fa-star', 'url' => ['/resultado/index'],],
                                    ],
                                ],
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        [
                            'label' => 'Administracion',
                            'icon' => 'fa fa fa-gears',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Años de Operacion', 'icon' => 'fa fa-calendar-check-o', 'url' => ['/anio/index'],],
                                ['label' => 'Variables Globales', 'icon' => 'fa fa-code', 'url' => ['/configuracion/index'],],
                                ['label' => 'Administración de Usuarios', 'icon' => 'fa fa-user-plus', 'url' => ['/user/admin'],],
                                ['label' => 'Asignacion de permisos', 'icon' => 'fa fa-key', 'url' => ['/admin/user'],],
                            ],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        ['label' => 'Reportes', 'icon' => 'fa fa-pie-chart', 'url' => ['/Reportes'],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],
                            'visible'=>!Yii::$app->user->isGuest
                        ],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],
                            'visible'=>!Yii::$app->user->isGuest
                            ],
                        ['label' => 'Iniciar Sesión', 'icon' => 'fa  fa-user-plus', 'url' => ['/user/login'],
                            'visible'=>Yii::$app->user->isGuest
                        ],
                    ],
                ]
        )
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
