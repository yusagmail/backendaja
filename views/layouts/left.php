<?php
/* @var $this \yii\web\View */

/* @var $content string */

use common\uicomponent\CpanelLeftmenuDB;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => CpanelLeftmenuDB::getListLeftMenu(),
                /*'items' => [
                    ['label' => 'Menu ', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'user', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Content Management',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'News', 'icon' => 'book', 'url' => ['/gii'],],
                            ['label' => 'Product', 'icon' => 'cubes', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],
                ],*/
            ]
        ) ?>

    </section>

</aside>
