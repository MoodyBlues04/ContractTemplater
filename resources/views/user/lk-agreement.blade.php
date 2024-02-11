<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Sol Ring</title>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/style-lk.css">
    <link rel="stylesheet" href="/styles/adaptive.css">
    <link rel="icon" href="/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--  fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
<header class="header-lk">
    <div class="container container-lk">
        <div class="header-container">
            <a href="/" class="header-container-logo">
                Logo
            </a>
            <div class="header-container-right">
                <button type="button" class="btn-log-in">Выход</button>
            </div>
        </div>
    </div>
</header>
<div class="left-menu-lk">
    <div class="left-menu-lk-burger">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span class="span-burger"></span>
            </label>
            <ul class="menu__box">
                <li class="content-burger">
                    <ul class="list-header">
                        <li>
                            <a href="/#news">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="/calendar/">
                                БЛОГ
                            </a>
                        </li>
                        <li>
                            <a href="/events/">
                                КОНТАКТЫ
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="left-menu-lk-content">
        <a href="" class="left-menu-lk-content-link left-menu-lk-content-link-active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18.1399 21.62C17.2599 21.88 16.2199 22 14.9999 22H8.99986C7.77986 22 6.73986 21.88 5.85986 21.62C6.07986 19.02 8.74986 16.97 11.9999 16.97C15.2499 16.97 17.9199 19.02 18.1399 21.62Z" stroke="#192126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 2H9C4 2 2 4 2 9V15C2 18.78 3.14 20.85 5.86 21.62C6.08 19.02 8.75 16.97 12 16.97C15.25 16.97 17.92 19.02 18.14 21.62C20.86 20.85 22 18.78 22 15V9C22 4 20 2 15 2ZM12 14.17C10.02 14.17 8.42 12.56 8.42 10.58C8.42 8.60002 10.02 7 12 7C13.98 7 15.58 8.60002 15.58 10.58C15.58 12.56 13.98 14.17 12 14.17Z" stroke="#192126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.5799 10.58C15.5799 12.56 13.9799 14.17 11.9999 14.17C10.0199 14.17 8.41992 12.56 8.41992 10.58C8.41992 8.60002 10.0199 7 11.9999 7C13.9799 7 15.5799 8.60002 15.5799 10.58Z" stroke="#192126" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <a href="" class="left-menu-lk-content-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M17 13.4V16.4C17 20.4 15.4 22 11.4 22H7.6C3.6 22 2 20.4 2 16.4V12.6C2 8.6 3.6 7 7.6 7H10.6" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17.0001 13.4H13.8001C11.4001 13.4 10.6001 12.6 10.6001 10.2V7L17.0001 13.4Z" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.6001 2H15.6001" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7 5C7 3.34 8.34 2 10 2H12.62" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.9999 8V14.19C21.9999 15.74 20.7399 17 19.1899 17" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 8H19C16.75 8 16 7.25 16 5V2L22 8Z" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <a href="" class="left-menu-lk-content-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.5 4.5V6.5C14.5 7.6 15.4 8.5 16.5 8.5H18.5" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 13H12" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 17H16" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <a href="" class="left-menu-lk-content-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M3.92969 15.8792L15.8797 3.9292" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.1011 18.279L12.3011 17.079" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.793 15.5887L16.183 13.1987" stroke="#9EA3AE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.60127 10.239L10.2413 3.599C12.3613 1.479 13.4213 1.469 15.5213 3.569L20.4313 8.479C22.5313 10.579 22.5213 11.639 20.4013 13.759L13.7613 20.399C11.6413 22.519 10.5813 22.529 8.48127 20.429L3.57127 15.519C1.47127 13.419 1.47127 12.369 3.60127 10.239Z" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 21.9985H22" stroke="#9EA3AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</div>
<section class="section1__lk-agreement">
    <div class="container container-lk">
        <h1 class="section1-title__lk-documents">Договоры</h1>
        <div class="section1-top__lk-agreement">
            <div data-tab-agreement="#agreement1" class="section1-top-block__lk-agreement section1-top-block-active__lk-agreement">
                Создание договора
            </div>
            <div data-tab-agreement="#agreement2" class="section1-top-block__lk-agreement">
                Просмотр и редактирование договора
            </div>
        </div>
        <div id="agreement1" class="section1-container__lk-agreement section1-container-active__lk-agreement">
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
            <div class="section1-container-block__lk-agreement">
                <div class="section1-container-block-img__lk-agreement">
                    <img src="/img/image 10.png" alt="">
                </div>
                <div class="section1-container-block-text__lk-agreement">
                    <h3>Название договора</h3>
                    <p>
                        Our membership management software provides full automation of membership renewals and payments
                    </p>
                </div>
                <button type="button" class="openModal">Выбрать</button>
            </div>
        </div>
        <div class="section1-container__lk-agreement" id="agreement2">
            <div class="section1-container-blur__lk-agreement">
                <p>
                    Доступ откроется после оплаты подписки на нашем сервисе
                </p>
                <a href="#!">
                   Выбрать тариф для оплаты
                </a>
            </div>
            <embed src="/img/Договор_об_оказании_услуг (5).pdf" type="application/pdf" width="100%" height="100%">
            <div class="section1-container-btns__lk-agreement">
                <a href="#!" class="redact-data-btn">Редактировать данные</a>
                <a href="#!" class="download-pdf-btn">Скачать pdf договор</a>
            </div>
        </div>

    </div>
</section>
<footer>
    <div class="container">
        <div class="footer-container">
            <div class="footer-container-left">
                <a href="" class="footer-logo">
                    Logo
                </a>
                <div class="footer-container-left-content">
                    <p>
                        Copyright © 2020 NameCompany.
                    </p>
                    <p>
                        All rights reserved
                    </p>
                    <a href="">
                        <img src="/img/Vector.svg" alt="">
                        dragotech.info
                    </a>
                </div>
                <div class="footer-social">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0009 7.46655C13.6834 7.46655 13.3925 7.47669 12.4823 7.51811C11.5739 7.55971 10.9538 7.70353 10.4112 7.91456C9.84993 8.13252 9.37384 8.42407 8.89952 8.89857C8.42485 9.37288 8.13329 9.84898 7.91462 10.41C7.70307 10.9528 7.55906 11.5731 7.51818 12.4812C7.47746 13.3914 7.4668 13.6824 7.4668 16C7.4668 18.3175 7.47711 18.6075 7.51835 19.5177C7.56013 20.4262 7.70395 21.0462 7.9148 21.5888C8.13294 22.1501 8.4245 22.6262 8.89899 23.1005C9.37313 23.5752 9.84922 23.8674 10.4101 24.0854C10.9531 24.2964 11.5733 24.4402 12.4816 24.4818C13.3918 24.5233 13.6825 24.5334 15.9999 24.5334C18.3176 24.5334 18.6075 24.5233 19.5178 24.4818C20.4262 24.4402 21.047 24.2964 21.59 24.0854C22.151 23.8674 22.6264 23.5752 23.1006 23.1005C23.5752 22.6262 23.8668 22.1501 24.0855 21.589C24.2952 21.0462 24.4392 20.426 24.4819 19.5179C24.5228 18.6076 24.5335 18.3175 24.5335 16C24.5335 13.6824 24.5228 13.3916 24.4819 12.4814C24.4392 11.5729 24.2952 10.9528 24.0855 10.4102C23.8668 9.84898 23.5752 9.37288 23.1006 8.89857C22.6259 8.4239 22.1512 8.13234 21.5894 7.91456C21.0454 7.70353 20.425 7.55971 19.5165 7.51811C18.6063 7.47669 18.3165 7.46655 15.9983 7.46655H16.0009ZM15.2354 9.00432C15.4626 9.00397 15.7161 9.00432 16.0009 9.00432C18.2793 9.00432 18.5494 9.0125 19.4491 9.05339C20.2811 9.09143 20.7327 9.23046 21.0335 9.34726C21.4317 9.50193 21.7156 9.68682 22.0141 9.98549C22.3128 10.2842 22.4977 10.5686 22.6527 10.9668C22.7695 11.2673 22.9087 11.7188 22.9466 12.5508C22.9875 13.4504 22.9963 13.7206 22.9963 15.998C22.9963 18.2754 22.9875 18.5456 22.9466 19.4451C22.9085 20.2772 22.7695 20.7287 22.6527 21.0292C22.498 21.4274 22.3128 21.7109 22.0141 22.0094C21.7154 22.3081 21.4319 22.493 21.0335 22.6477C20.733 22.765 20.2811 22.9037 19.4491 22.9417C18.5495 22.9826 18.2793 22.9915 16.0009 22.9915C13.7223 22.9915 13.4522 22.9826 12.5527 22.9417C11.7207 22.9033 11.2691 22.7643 10.9681 22.6475C10.5699 22.4928 10.2855 22.3079 9.98679 22.0093C9.68812 21.7106 9.50323 21.4269 9.3482 21.0284C9.2314 20.728 9.0922 20.2764 9.05433 19.4444C9.01344 18.5449 9.00527 18.2746 9.00527 15.9959C9.00527 13.7171 9.01344 13.4483 9.05433 12.5487C9.09238 11.7167 9.2314 11.2651 9.3482 10.9643C9.50287 10.5661 9.68812 10.2817 9.98679 9.983C10.2855 9.68433 10.5699 9.49944 10.9681 9.34441C11.2689 9.22708 11.7207 9.08841 12.5527 9.05019C13.3399 9.01463 13.645 9.00397 15.2354 9.00219V9.00432ZM20.556 10.4212C19.9906 10.4212 19.532 10.8794 19.532 11.4449C19.532 12.0102 19.9906 12.4689 20.556 12.4689C21.1213 12.4689 21.58 12.0102 21.58 11.4449C21.58 10.8795 21.1213 10.4212 20.556 10.4212ZM16.0009 11.6177C13.5808 11.6177 11.6187 13.5798 11.6187 16C11.6187 18.4201 13.5808 20.3813 16.0009 20.3813C18.4211 20.3813 20.3825 18.4201 20.3825 16C20.3825 13.5798 18.4211 11.6177 16.0009 11.6177ZM16.0009 13.1555C17.5718 13.1555 18.8454 14.4289 18.8454 16C18.8454 17.5708 17.5718 18.8444 16.0009 18.8444C14.4299 18.8444 13.1564 17.5708 13.1564 16C13.1564 14.4289 14.4299 13.1555 16.0009 13.1555Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.5335 15.9881C24.5335 16.5651 24.4747 17.1414 24.3593 17.7032C24.2468 18.2516 24.0801 18.79 23.8618 19.3047C23.6485 19.8103 23.3839 20.2975 23.0747 20.7518C22.7701 21.2033 22.4192 21.6269 22.0338 22.013C21.6475 22.3975 21.2225 22.7474 20.7712 23.0532C20.3154 23.3603 19.8275 23.6245 19.3216 23.8388C18.8061 24.056 18.2665 24.2224 17.7186 24.3348C17.1561 24.4505 16.5777 24.5095 15.9997 24.5095C15.4214 24.5095 14.843 24.4505 14.2813 24.3348C13.7326 24.2224 13.1929 24.056 12.6779 23.8388C12.1721 23.6245 11.6837 23.3603 11.2278 23.0532C10.7766 22.7474 10.3516 22.3975 9.96611 22.013C9.58027 21.6269 9.2294 21.2033 8.92439 20.7518C8.61687 20.2975 8.35184 19.8102 8.13768 19.3047C7.9193 18.79 7.75224 18.2516 7.63931 17.7032C7.52515 17.1414 7.4668 16.5651 7.4668 15.9881C7.4668 15.4105 7.52511 14.833 7.63934 14.2725C7.75227 13.7241 7.91934 13.1848 8.13771 12.671C8.35187 12.165 8.6169 11.6774 8.92442 11.223C9.22943 10.7711 9.5803 10.3484 9.96614 9.96183C10.3516 9.57734 10.7766 9.22828 11.2279 8.92287C11.6837 8.61453 12.1721 8.35035 12.6779 8.13563C13.193 7.91797 13.7326 7.75115 14.2814 7.63965C14.8431 7.52482 15.4214 7.46655 15.9998 7.46655C16.5777 7.46655 17.1561 7.52482 17.7186 7.63965C18.2665 7.75118 18.8061 7.91801 19.3216 8.13563C19.8275 8.35032 20.3154 8.61453 20.7713 8.92287C21.2225 9.22828 21.6476 9.57734 22.0338 9.96183C22.4193 10.3484 22.7701 10.7711 23.0747 11.223C23.3839 11.6774 23.6485 12.1651 23.8618 12.671C24.0801 13.1848 24.2468 13.7241 24.3593 14.2725C24.4747 14.833 24.5335 15.4105 24.5335 15.9881ZM12.8904 9.40593C10.8582 10.3642 9.34143 12.2341 8.86848 14.4876C9.0606 14.4893 12.0974 14.5276 15.5963 13.5993C14.335 11.3615 12.9875 9.53537 12.8904 9.40593ZM16.2001 14.7198C12.4479 15.8416 8.84724 15.7609 8.71808 15.7559C8.71597 15.8341 8.71223 15.9098 8.71223 15.988C8.71223 17.8575 9.41851 19.5618 10.5794 20.8505C10.5769 20.8467 12.5712 17.3137 16.5039 16.0438C16.5989 16.0122 16.6956 15.9839 16.7914 15.9564C16.6085 15.5429 16.4089 15.1284 16.2001 14.7198ZM20.8125 10.5265C19.5295 9.39677 17.8448 8.71152 15.9997 8.71152C15.4076 8.71152 14.833 8.78309 14.2825 8.9154C14.3917 9.06188 15.7605 10.8752 17.0068 13.1603C19.7566 12.1309 20.7945 10.5531 20.8125 10.5265ZM17.2882 17.1622C17.2719 17.1676 17.2557 17.1723 17.2398 17.1781C12.9401 18.6748 11.536 21.6913 11.5208 21.7242C12.7579 22.685 14.3097 23.2646 15.9998 23.2646C17.009 23.2646 17.9703 23.0594 18.8449 22.6879C18.737 22.0521 18.3136 19.8235 17.2882 17.1622ZM20.072 22.023C21.7083 20.9204 22.8705 19.1695 23.1946 17.1414C23.0446 17.0931 21.0058 16.4486 18.6536 16.8252C19.6095 19.4482 19.9978 21.5844 20.072 22.023ZM17.5678 14.2446C17.7369 14.5917 17.9007 14.9449 18.0519 15.2998C18.1057 15.4272 18.1582 15.552 18.2095 15.6768C20.7129 15.3622 23.1793 15.8915 23.2847 15.9131C23.2681 14.188 22.6501 12.6048 21.6276 11.3653C21.6138 11.3848 20.445 13.0712 17.5678 14.2446Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5208 13.0051L15.5544 13.5587L14.9948 13.4909C12.9579 13.2311 11.1784 12.3498 9.66756 10.8696L8.92891 10.1352L8.73865 10.6776C8.33575 11.8865 8.59316 13.1633 9.43253 14.022C9.8802 14.4965 9.77948 14.5643 9.00725 14.2819C8.73865 14.1915 8.50363 14.1237 8.48124 14.1576C8.4029 14.2367 8.6715 15.2648 8.88414 15.6716C9.17513 16.2365 9.76828 16.7902 10.4174 17.1178L10.9658 17.3777L10.3167 17.389C9.68994 17.389 9.66756 17.4003 9.73471 17.6376C9.95854 18.372 10.8427 19.1516 11.8276 19.4906L12.5214 19.7278L11.9171 20.0894C11.0218 20.6091 9.96973 20.9029 8.91772 20.9255C8.41409 20.9368 8 20.982 8 21.0159C8 21.1289 9.36538 21.7616 10.16 22.0102C12.5438 22.7446 15.3753 22.4282 17.5017 21.1741C19.0126 20.2815 20.5235 18.5076 21.2286 16.7902C21.6091 15.875 21.9896 14.2028 21.9896 13.4006C21.9896 12.8808 22.0232 12.813 22.6499 12.1916C23.0192 11.83 23.3662 11.4346 23.4333 11.3216C23.5452 11.1069 23.534 11.1069 22.9633 11.299C22.012 11.638 21.8777 11.5928 22.3477 11.0843C22.6947 10.7228 23.1088 10.0674 23.1088 9.87536C23.1088 9.84146 22.9409 9.89796 22.7506 9.99964C22.5492 10.1126 22.1015 10.2821 21.7658 10.3838L21.1614 10.5759L20.613 10.203C20.3108 9.99964 19.8856 9.77367 19.6617 9.70588C19.0909 9.5477 18.218 9.57029 17.7032 9.75107C16.3042 10.2595 15.4201 11.5702 15.5208 13.0051Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.6679 10.4995C23.4022 10.701 23.9805 11.2948 24.1768 12.0488C24.5335 13.4153 24.5335 16.2666 24.5335 16.2666C24.5335 16.2666 24.5335 19.1178 24.1768 20.4845C23.9805 21.2385 23.4022 21.8322 22.6679 22.0338C21.3371 22.4 16.0001 22.4 16.0001 22.4C16.0001 22.4 10.6632 22.4 9.3323 22.0338C8.59795 21.8322 8.01962 21.2385 7.82335 20.4845C7.4668 19.1178 7.4668 16.2666 7.4668 16.2666C7.4668 16.2666 7.4668 13.4153 7.82335 12.0488C8.01962 11.2948 8.59795 10.701 9.3323 10.4995C10.6632 10.1333 16.0001 10.1333 16.0001 10.1333C16.0001 10.1333 21.3371 10.1333 22.6679 10.4995ZM14.4001 13.8666V19.1999L18.6668 16.5333L14.4001 13.8666Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-container-right">
                <div class="footer-container-right-block">
                    <h4>Меню сайта</h4>
                    <ul>
                        <li>
                            <a href="">About us</a>
                        </li>
                        <li>
                            <a href="">Blog</a>
                        </li>
                        <li>
                            <a href="">Contact us</a>
                        </li>
                        <li>
                            <a href="">Pricing</a>
                        </li>
                        <li>
                            <a href="">Testimonials</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-container-right-block">
                    <h4>Информация</h4>
                    <ul>
                        <li>
                            <a href="">Help center</a>
                        </li>
                        <li>
                            <a href="">Terms of service</a>
                        </li>
                        <li>
                            <a href="">Legal</a>
                        </li>
                        <li>
                            <a href="">Privacy policy</a>
                        </li>
                        <li>
                            <a href="">Status</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-container-right-block footer-container-right-block-input">
                    <h4>Получайте новости!</h4>
                    <div class="footer-container-right-block-input">
                        <input type="email" placeholder="Ваша почта">
                        <img src="/img/send.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/scripts/app.js"></script>
<div  id="modal__project" class="modal" data-modal="one">
    <div class="modal-content">
        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M10.6663 10.6668L21.3328 21.3333" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10.667 21.3333L21.3335 10.6668" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p class="titleModal">
            Выберите данные для заполнения
        </p>
        <div class="modal-container">
            <div class="modal-container-block">
                <div class="radio">
                    <input class="custom-radio" type="radio" id="color-1" name="color" value="indigo">
                    <label for="color-1">
                        <span class="radio-content">
                             <span class="radio-title">Документ - 1</span>
                        <span class="radio-text">Петров Олег Олегович
21.03.2000</span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="modal-container-block">
                <div class="radio">
                    <input class="custom-radio" type="radio" id="color-2" name="color" value="indigo">
                    <label for="color-2">
                        <span class="radio-content">
                             <span class="radio-title">Документ - 1</span>
                        <span class="radio-text">Петров Олег Олегович
21.03.2000</span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="modal-container-block">
                <div class="radio">
                    <input class="custom-radio" type="radio" id="color-3" name="color" value="indigo">
                    <label for="color-3">
                        <span class="radio-content">
                             <span class="radio-title">Документ - 1</span>
                        <span class="radio-text">Петров Олег Олегович
21.03.2000</span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="modal-container-block">
                <div class="radio">
                    <input class="custom-radio" type="radio" id="color-4" name="color" value="indigo">
                    <label for="color-4">
                        <span class="radio-content">
                             <span class="radio-title">Документ - 1</span>
                        <span class="radio-text">Петров Олег Олегович
21.03.2000</span>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <script>
        let modal = document.getElementById("modal__project");
        // Get the button that opens the modal
        let btn = document.getElementsByClassName("openModal");
        console.log()
        // Get the <span> element that closes the modal
        let span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal
        for(let i = 0;i < btn.length; i++)
        {
            let v = btn[i]
            v.onclick = function() {
                modal.style.display = "flex";
            }
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</div>
</body>
</html>