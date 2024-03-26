<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>магазин по продаже изделий ручной работы</title>
    <meta name="description"
        content="Магазин эксклюзивных изделий ручной работы. Драгоценные и полудрагоценные материалы.">
    <meta name="keywords" content="Украшения ручной работы, эксклюзивные украшения, индивидуальный дизайн, ручная работа">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- custom css file link  -->

    <link rel="stylesheet" href="/css/style.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <header class="header">
        <div class="header-1">

            <section class="flex">

                <div class="text-3xl share">
                    {{-- <span> Следи за нашим творчеством : </span> --}}
                    <a href="https://ru-ru.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/?lang=ru" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                </div>

                <div class="call text-3xl">
                    <span><i class='fas fa-phone-alt' style='font-size:24px'></i></span>
                    <a href="/#contact">+375296411979</a>
                </div>

            </section>

        </div>
        <div class="header-2">
            <section class="flex">
                <a href="https://github.com/Ksonra" class="logo">
                    Nik<i class="fa fa-circle"></i>laevA</a>

                <form action="{{ asset('allproducts') }}" class="search-bar-container">
                    @csrf
                    <input name="search" type="search" class="border-none" id="search-bar"
                        placeholder="Что будем искать?.." />
                </form>
            </section>
        </div>

        <div class="header-3">
            <section class="flex">
                <div id="menu-bar" class="fas fa-bars"></div>

                <nav class="navbar">
                    <a href="/">Домой</a>
                    <a href="/#category">Категории</a>
                    <a href="/products"><span class="hot">SALE</span></a>
                    <a href="/#deal">Ящик пандоры</a>
                    <a href="/blog">Блог</a>
                    <a href="/#contact">Контакты</a>
                </nav>

                <div class="icons">
                    <a href="/cart"
                        class="fas fa-shopping-cart"><span>{{ isset($_COOKIE['order']) ? count(explode(',', $_COOKIE['order'])) : 0 }}</span></a>

                    @guest()
                        <a href="/login" class="far fa-hand-point-right"></a>
                        <a href="/register" class="fas fa-user-circle"></a>
                    @else
                        <a href="/favorite"
                            class="fas fa-heart">{{ App\Models\Favorite::where('user_id', auth()->user()->id)->count() }}</a>
                        <a href="/profile" class="fas fa-user-circle"></a>
                        <a href="{{ route('logout') }}" class="far fa-hand-point-left"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest

                </div>
            </section>
        </div>
    </header>
    @yield('content')


    <footer class="footer  fix_bottom">
        <section class="box-container">
            <div class="box">
                <h3>О нас</h3>
                <p><a href="https://github.com/Ksonra" class="logo">
                        Nik<i class="fa fa-circle"></i>laevA</a>
                </p>
                <p>Украшения ручной работы</p>
                <p>+37529641-19-79</p>
                <p>Ksonra@mail.ru</p>
            </div>
            <div class="box">
                <h3>Зона доставки</h3>
                <p>USA</p>
                <p>Беларусь</p>
                <p>Европа</p>
            </div>
            <div class="box">
                <h3>Быстрые ссылки:</h3>
                <a href="/">Домой</a>
                <a href="/#category">Категории</a>
                <a href="/products"><span class="hot">SALE</span></a>
                <a href="/blog">Блог</a>
                <a href="/#deal">Ящик пандоры</a>

            </div>
            <div class="box">
                <h3>Следи за мной:</h3>
                <a href="https://ru-ru.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://twitter.com/?lang=ru" target="_blank"><i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram"></i>
                    Instagram
                </a>
            </div>
        </section>

        <h1 class="credit">
            {{-- <span>Создатель</span>
            <span> Nik<i class="fa fa-circle"></i>laevA </span> --}}
            <span>Приятных покупок!</span>
        </h1>
    </footer>

    <!-- scroll top button  -->
    <br />
    <div class="scroll-top fas fa-angle-up"></div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')

</body>

</html>
