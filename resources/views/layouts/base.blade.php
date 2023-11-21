<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>магазин по продаже ювелирных украшений ручной работы</title>

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/style.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="header">
      <div class="header-2">
        <section class="flex">
          <a href="https://github.com/Ksonra" class="logo">
            Nik<i class="fa fa-circle"></i>laevA</a
          >

          <form action="" class="search-bar-container">
            <input
              type="search"
              id="search-bar"
              placeholder="Что будем искать?.."
            />
            <label for="search-bar" class="fas fa-search"></label>
          </form>
        </section>
      </div>

      <div class="header-3">
        <section class="flex">
          <div id="menu-bar" class="fas fa-bars"></div>

          <nav class="navbar">
            <a href="#home">Домой</a>
            <a href="#category">Категории</a>
            <a href="/products"><span class="hot">SALE</span></a>
            <a href="#deal">Сделка недели</a>
            <a href="/blog">Блог</a>
            <a href="#contact">Контакты</a>

          </nav>

          <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-user-circle"></a>
          </div>
        </section>
      </div>
    </header>
    @yield('content')


    <footer class="footer">
      <section class="box-container">
        <div class="box">
          <h3>О нас</h3>
          <p>Украшения ручной работы</p>
          <p>+37529641-19-79</p>
          <p>Ksonra@mail.ru</p>
        </div>
        <div class="box">
          <h3>Зона доставки</h3>
          <a href="#">USA</a>
          <a href="#">Беларусь</a>
          <a href="#">Европа</a>
        </div>
        <div class="box">
          <h3>Быстрые ссылки:</h3>
          <a href="#">Домой</a>
          <a href="#">Категории</a>
          <a href="#product"><span class="hot">SALE</span></a>
          <a href="#">Сделка недели</a>
          <a href="#">Контакты</a>
        </div>
        <div class="box">
          <h3>Следи за мной:</h3>
          <a href="https://ru-ru.facebook.com/" target="_blank"
            ><i class="fab fa-facebook-f"></i> Facebook
          </a>
          <a href="https://twitter.com/?lang=ru" target="_blank"
            ><i class="fab fa-twitter"></i> Twitter
          </a>
          <a href="https://www.instagram.com/accounts/login/" target="_blank"
            ><i class="fab fa-instagram"></i> Instagram
          </a>
        </div>
      </section>

      <h1 class="credit">
        created by <span> Nik<i class="fa fa-circle"></i>laevA </span> |
        Приятных покупок!
      </h1>
    </footer>

    <!-- scroll top button  -->
    <br />
    <div class="scroll-top fas fa-angle-up"></div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
