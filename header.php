<!DOCTYPE html>
<html lang="ru">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title("", true); ?></title>
</head>

<body>
	<header class="header">
        <div class="wrapper">
            <div class="logo">
                <a class="logo__link" href="<?php echo site_url(); ?>">
                    <img class="logo__img" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="На Главную">
                </a>
            </div>
            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list__items">
                        <a href="<?php echo site_url(); ?>" class="menu__link">Главная</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo site_url(); ?>/products/radiators/" class="menu__link">Радиатор</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo site_url(); ?>/products/warm-floor/" class="menu__link">Теплый пол</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo site_url(); ?>/products/boilers/" class="menu__link">Бойлеры</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo get_page_link(160)?>" class="menu__link">История бренда</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo get_page_link(140)?>" class="menu__link">Новости</a>
                    </li>
                    <li class="menu__list__items">
                        <a href="<?php echo get_page_link(153)?>" class="menu__link">Контакты</a>
                    </li>
                </ul>
                <?php $phone = str_replace([' ', '(', ')', '-'], '', get_field('contacts_phone', 153));?>
                <a class="menu__phone" href="tel:<?echo $phone;?>">
                    <div class="menu__phone__circle">
                        <svg class="menu__phone__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <image  x="0px" y="0px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfmBB0MGwD7FklDAAACDklEQVRIx5WVS0iVQRTH/7cn0i7EyKwoyohArolR2zbVplUQRAtL6EFZ1MYsI1EIKSoo6EHUqpDaCL2gaBG0EHpcoiKkaFFaIAhBD7ymfj8X93vPN3e8ZzYz58z5fd95zEwOOaRXa/VAjzRiseMajwGYYoATLDLtbsBpvhHICNtsgFouUaCV2ZmQPGcoAOBxkXkmYBVD/jfuWBBCbGcUgAL1SUDk7kLU8hyAP6yLAAtjMWYh9tMYW+Vo5z/wkaoAcBNTbscc/gHfOceCUHcUgOsBYIgsWe9vrmHK1wyGOvEQgB0lwGgmoD3cXEMrLwAYp8XXVfMD+MUSJL5kuI8ZLdPGGDAe5mMzHnAKiaeGu8eejAo0UwQGw1wMAO9QkJK4+15LEQ8B0O2vjgNQL1aEaSpJV5m2fgl89ufL8IBOIe4nAFfLAPYBkI8F8V6IBrxECJusgGpecYtmf7WRLSwtTfsT//CBuc4zmjpMTalEnq0UIG6kEIcrBVTxKVXMXZUBRAPFBGKC3anNdXSwwQ4QbUZPXmN+aD3ABAB9zLEBxBUD8YaVCHEwVup78fsiHdN5A1HkMr2JToG+CGGmpYeZyN0AkZXZkzNCtNgB4hiTTsDbcgDRyGsH4EJ5gJjFEX5b3YdZ7AKUWqc/0/0nq+1VSI+tPEldOV9ZE9lzzuddkpZrp5qUV52G9Uwd+huZpgGzWUO4wRc1GwAAAABJRU5ErkJggg==" />
                        </svg>
                    </div>
                    <p class="menu__phone__content">375 29 586 - 90 - 90</p>
                </a>
            </nav>
        </div>
    </header>
