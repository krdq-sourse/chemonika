<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/posts.min.css">
    <title>Панель Адміністратора</title>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="wrapper">
            <div class="header__logo">
                <img src="img/icons/posts/logo.svg" alt="logo">
                <div class="header__plus">
                    ADMIN
                </div>
            </div>
            <div onclick="location.href='{{env("APP_URL")}}/logout'" class="header__button">
                Вихід
                <img src="img/icons/posts/arrow.svg" alt="arrow">
            </div>
        </div>
    </div>
</header>
<section class="post">
    <div class="container">
        <div class="wrapper">
            <div class="post__title">Публікації</div>
            <div class="post__add">
                <span onclick="location.href='{{route('products_admin.create')}}'">Додати</span>
                <img src="img/icons/posts/plus.svg" alt="plus">
            </div>
        </div>
        <div class="post__container">
            @foreach($products as $product)
            <div class="post__block">
                <div class="post__block_img">
                    <img src="{{env("APP_URL").($product->img)}}" alt="lorem">
                </div>
                <div class="post__block_info">
                    <div class="post__block_title">{{ $product->name }} </div>
                    <div class="post__block_wrapper">
                        <div class="post__block_wrapper-type">Група</div>
                        <div class="post__block_wrapper-content">{{ $product->group }}</div>
                    </div>
                    <div class="post__block_wrapper post__block_wrapper-offset">
                        <div class="post__block_wrapper-type">Галузь застосування</div>
                        <div class="post__block_wrapper-content">{{ $product->field_of_usage }}</div>
                    </div>
                </div>
                <div class="post__block_btns">
                    <div onclick="location.href='{{route('products_admin.edit',$product->id)}}'" style="width: 157px" class="post__block_btn post__block_edit">
                        <span >Редагувати</span>
                        <img src="img/icons/posts/edit.svg" alt="edit">
                    </div>
                    <div onclick="location.href=' {{env('APP_URL').'/delete/'.$product->id}}'" class="post__block_btn post__block_close">
                        <span >Видалити</span>
                        <img src="img/icons/posts/close.svg" alt="close">
                    </div>
                    <!-- post__block_btns-togller-active -->
                    <div class="post__block_btns-togller">
                        <div class="post__block_btns-hide_visible">
                            <svg width="25" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.4999 0C6.24794 0 1.43744 5.508 1.43744 5.508L0.991943 6L1.43744 6.492C1.43744 6.492 5.82344 11.493 11.6562 11.9535C11.9344 11.988 12.2127 12 12.4999 12C12.7872 12 13.0654 11.988 13.3437 11.9528C19.1764 11.493 23.5624 6.49275 23.5624 6.49275L24.0079 6L23.5624 5.508C23.5624 5.508 18.7519 0 12.4999 0ZM12.4999 1.5C14.1522 1.5 15.6754 1.9515 16.9999 2.5545C17.4777 3.34575 17.7499 4.257 17.7499 5.25C17.7531 6.54284 17.2788 7.79132 16.418 8.75593C15.5572 9.72053 14.3706 10.3333 13.0857 10.4767C13.0707 10.4797 13.0534 10.4738 13.0392 10.4767C12.8599 10.485 12.6814 10.5 12.4999 10.5C12.3004 10.5 12.1077 10.488 11.9142 10.4767C10.6293 10.3333 9.44267 9.72053 8.58187 8.75593C7.72108 7.79132 7.24677 6.54284 7.24994 5.25C7.24994 4.27125 7.51394 3.36 7.97669 2.57775H7.95344C9.28769 1.96275 10.8297 1.5 12.4999 1.5ZM12.4999 3C11.903 3.0002 11.3306 3.23752 10.9086 3.65976C10.4867 4.082 10.2497 4.65456 10.2499 5.2515C10.2501 5.84844 10.4875 6.42084 10.9097 6.8428C11.3319 7.26476 11.9045 7.5017 12.5014 7.5015C12.797 7.5014 13.0897 7.44309 13.3627 7.32989C13.6357 7.21668 13.8838 7.05081 14.0927 6.84174C14.3017 6.63267 14.4674 6.38449 14.5804 6.11138C14.6934 5.83827 14.7515 5.54557 14.7514 5.25C14.7513 4.95443 14.693 4.66177 14.5798 4.38873C14.4666 4.1157 14.3008 3.86763 14.0917 3.6587C13.8826 3.44977 13.6344 3.28406 13.3613 3.17104C13.0882 3.05802 12.7955 2.9999 12.4999 3ZM5.93744 3.7035C5.81551 4.21004 5.75259 4.72899 5.74994 5.25C5.74994 6.5655 6.12494 7.79625 6.78119 8.83575C5.44979 8.0558 4.22808 7.10218 3.14819 6C3.99829 5.14237 4.93278 4.37272 5.93744 3.70275V3.7035ZM19.0624 3.7035C20.0671 4.37323 21.0016 5.14263 21.8517 6C20.7718 7.10218 19.5501 8.0558 18.2187 8.83575C18.8952 7.76233 19.2528 6.51881 19.2499 5.25C19.2499 4.71375 19.1794 4.2015 19.0624 3.70275V3.7035Z" fill="#FF9900"/>
                            </svg>                                
                            <span>Видимый продукт</span>
                        </div>
                        <div class="post__block_btns-hide_invisible">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.78919 0.710938L1.70994 1.79019L6.37494 6.42969L14.6954 14.7502L16.1249 16.2037L21.2107 21.2887L22.2892 20.2109L17.6249 15.5474C20.8004 13.9739 22.9304 11.6392 23.0624 11.4922L23.5079 11.0002L23.0624 10.5082C22.8599 10.2824 18.0644 5.00019 11.9999 5.00019C10.5322 5.00019 9.14619 5.32269 7.87494 5.79744L2.78919 0.710938ZM11.9999 6.50019C13.6139 6.50019 15.1409 6.95394 16.4999 7.57869C16.9876 8.38469 17.2468 9.30815 17.2499 10.2502C17.2495 11.5617 16.7558 12.8251 15.8669 13.7894L13.7347 11.6564C14.0474 11.2724 14.2499 10.7864 14.2499 10.2502C14.2499 9.65345 14.0129 9.08115 13.5909 8.6592C13.169 8.23724 12.5967 8.00019 11.9999 8.00019C11.4637 8.00019 10.9777 8.20269 10.5937 8.51619L9.07044 6.99219C10.0019 6.70494 10.9777 6.50019 11.9999 6.50019ZM5.01519 7.17969C2.60994 8.65944 1.04844 10.3822 0.937443 10.5082L0.491943 11.0002L0.937443 11.4922C1.13094 11.7097 5.57244 16.5697 11.2972 16.9537C11.5282 16.9762 11.7622 17.0002 11.9999 17.0002C12.2369 17.0002 12.4717 16.9769 12.7034 16.9529C13.3109 16.9157 13.9143 16.8297 14.5079 16.6957L13.1714 15.3592C12.7876 15.4507 12.3945 15.498 11.9999 15.5002C9.10494 15.5002 6.74994 13.1452 6.74994 10.2502C6.74994 9.85194 6.80244 9.46269 6.89094 9.07794L5.01519 7.17969ZM5.43744 8.70294C5.31489 9.20962 5.25196 9.72889 5.24994 10.2502C5.24687 11.5012 5.59621 12.7278 6.25794 13.7894C4.91626 13.0113 3.67287 12.0748 2.55444 11.0002C3.44108 10.1455 4.40635 9.37634 5.43744 8.70294ZM18.5624 8.70294C19.593 9.37711 20.5582 10.1462 21.4454 11.0002C20.7712 11.6504 19.4384 12.8287 17.7187 13.8127C18.3891 12.7451 18.7464 11.5108 18.7499 10.2502C18.7499 9.72519 18.6824 9.20769 18.5624 8.70294Z" fill="#929A9F"/>
                            </svg>                                
                            <span>Невидимый продукт</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__logo">
                <img src="img/icons/posts/logoFooter.svg" alt="logo">
            </div>
            <div class="footer__info">
                <div class="footer__info_social">
                    <div class="footer__info_social-title">Наші соціальні мережі</div>
                    <div class="footer__info_social-btns">
                        <a href="#"><img src="img/icons/posts/tg.svg" alt="tg"></a>
                        <a href="#"><img class="footer__info_social-skype" src="img/icons/posts/skype.svg" alt="tg"></a>
                        <a href="#"><img src="img/icons/posts/fb.svg" alt="tg"></a>
                    </div>
                </div>
                <div class="footer__info_place">
                    <div class="footer__info_social-title">АДРЕСА</div>
                    <div class="footer__info_place-descr">
                        Украина, Киев, ул. Юрия Ильенко 81а
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__separator"></div>
        <div class="footer__bottom">
            <div class="footer__subtitle">2021</div>
            <div class="footer__subtitle footer__subtitle-middle">|</div>
            <div class="footer__subtitle">All rights protected</div>
        </div>
    </div>
</footer>
<script>
    let visibleProduct = document.querySelectorAll('.post__block_btns-togller');
    visibleProduct.forEach(item => {
        item.onclick = (e) => {
            e.currentTarget.classList.toggle('post__block_btns-togller-active');
        }
    })
</script>
</body>
</html>
