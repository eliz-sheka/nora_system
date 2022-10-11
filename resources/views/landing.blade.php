<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Creative - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Cormorant:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/common.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/landing/css/main.min.css') }}" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light absolute-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('logo_white.png') }}" width="70px" alt="">
        </a>
{{--        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarResponsive">--}}
{{--            <ul class="navbar-nav ms-auto my-2 my-lg-0">--}}
{{--                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Найзатишніше місце для ваших посиденьок</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Скоро відкриття антикафе у Вінниці</p>
                <a class="btn btn-primary btn-xl" href="#about">Детальніше</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Ми ще, на жаль, не працюємо, але наполегливо наближаємо цей день!</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Підписуйся на наш <a href="" class="text-warning">інстаграм</a>, щоб не пропустити відкриття та різноманітні акції)</p>
{{--                <a class="btn btn-light btn-xl" href="#services">Get Started!</a>--}}
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Що ми пропонуємо?</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-dice-5 fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Настільні ігри</h3>
                    <p class="text-muted mb-0">Наша колекція налічує понад 30 назв і постійно поповнюється. Також можна приходити зі своїми)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi bi-cup-hot fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Смаколики</h3>
                    <p class="text-muted mb-0">Чай, печивко, цукерки, сезонні фрукти... Можна приносити їжу з собою або замовити доставку до закладу</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-book fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Книги</h3>
                    <p class="text-muted mb-0">Маємо невеличку бібліотеку, де знайдете всяке цікавеньке)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-palette fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Малювання</h3>
                    <p class="text-muted mb-0">У нас є все необхідне, щоб зробити ваше дозвілля більш творчим</p>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-calendar-event fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Заходи</h3>
                    <p class="text-muted mb-0">Організовуємо цікавенькі турніри, клуби та просто збираємося на настілочки</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-house fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Можливість оренди</h3>
                    <p class="text-muted mb-0">Можете влаштувати у нас своє свято або орендувати приміщення для лекцій, майстер-класів та подібного</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-emoji-smile-upside-down fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Зона, вільна від алкоголю та куріння</h3>
                    <p class="text-muted mb-0">У нас досягають розслаблення та веселості без додаткових стимуляторів)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Затишок і тепло</h3>
                    <p class="text-muted mb-0">Це наша сімейна справа і ми робимо все можливе, щоб вам у нас сподобалося)</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-->
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                    <div class="portfolio-box-caption">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">Тут буде детальніше про нас</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                    <div class="portfolio-box-caption">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">Тут можна буде ознайомитися з каталогом наших настілок</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                    <div class="portfolio-box-caption">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">Тут можна буде глянути наші тарифи та послуги</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                    <div class="portfolio-box-caption">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">Тут будуть наші акції</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                    <div class="portfolio-box-caption">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">Тут скоро будуть гарненькі фоточки</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                    <div class="portfolio-box-caption p-3">
{{--                        <div class="project-category text-white-50">Category</div>--}}
                        <div class="project-name m-5">А тут буде детальніше про те, де нас знайти</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Call to action-->
<section class="page-section bg-dark text-white">
    <div class="container px-4 px-lg-5 text-center">
        <h2 class="mb-4">Підписуйся на наш інстаграмчик)</h2>
        <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">
            <div class="d-flex align-items-center"><i class="bi bi-instagram fs-4 text-primary me-2"></i>Перейти</div>
        </a>
    </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">&copy; 2022 - Кроляча нора</div></div>
</footer>

<!-- Core theme JS-->
<script src="{{ asset('assets/js/common.min.js') }}"></script>
<script src="{{ asset('assets/landing/js/main.min.js') }}"></script>

</body>
</html>
