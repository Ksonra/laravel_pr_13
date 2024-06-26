@extends('layouts.base')
@section('content')
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box" style="background: url(images/11.jpg);">
                        <div class="content">
                            {{-- <span>Скидка 75% </span> --}}
                            <h3>Солнечный март</h3>
                            <a href="/blog/5" class="btn">Читать подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box" style="background: url(images/4.jpg);">
                        <div class="content">
                            <span>Скидка до 45% </span>
                            <h3>Больше-дешевле</h3>
                            <a href="/blog/4" class="btn">Читать подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box" style="background: url(images/9.jpg);">
                        <div class="content">
                            <span>Новинки от Иринки</span>
                            <h3>Скидки</h3>
                            <h3>за</h3>
                            <h3>идеи</h3>
                            <a href="/blog/5" class="btn">Читать подробнее</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="banner-container">
        <div class="banner">
            <img src="images/5.jpg" alt="" />
            <div class="content">
                {{-- <span>Новинка</span> --}}
                <h3>Новинки от Иринки</h3>
                <a href="/feed" class="btn">Подробнее</a>
            </div>
        </div>
        {{-- <div class="banner">
      <img src="images/002.jpg" alt="" />
      <div class="content">
        <span>Новинка</span>
        <h3>Браслеты 2024</h3>
        <a href="#" class="btn">Купить</a>
      </div>
    </div> --}}
    </section>

    <section class="category" id="category">
        <h1 class="heading">Покупки по категориям</h1>

        <div class="box-container">
            @foreach ($products as $product)
                <div class="box">
                    <img src="/storage/{{ $product->picture }}" alt="" />{{-- <img src="images/Броши.png" alt="" /> --}}
                    <div class="content">
                        <h3>{{ $product->catalog->name }}</h3>
                        <a href="{{ asset('catalog/' . $product->catalog_id) }}" class="btn">Подробнее</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>



    <div class="icons-container">
        <section class="flex">
            <div class="icon">
                <img src="images/icon1.png" alt="" />
                <div class="content">
                    <h3>Доставка</h3>
                    <p>Бесплатная при заказе свыше 50$</p>
                </div>
            </div>
            <div class="icon">
                <img src="images/icon2.png" alt="" />
                <div class="content">
                    <h3>Возврат средств</h3>
                    <p>3 дня для отмены заказа и возврата средств</p>
                </div>
            </div>
            <div class="icon">
                <img src="images/icon3.png" alt="" />
                <div class="content">
                    <h3>Оплата без риска</h3>
                    <p>100% безопасность платежей</p>
                </div>
            </div>
            <div class="icon">
                <img src="images/icon4.png" alt="" />
                <div class="content">
                    <h3>Поддержка 24/7</h3>
                    <p>Свяжись в любое время!</p>
                </div>
            </div>
        </section>
    </div>

    <section class="deal" id="deal">
        <h3 class="heading">Черный ящик</h3>
        <a name="deal"></a>
        <div class="row">
            <div class="content">
                <h3 class="title">Cлучайный товар по специальной цене.</h3>
                    <p> Риск бывает оправдан! </p>
                <div class="count-down">
                    <div class="box">
                        <h3 id="day">00</h3>
                        <span>день</span>
                    </div>
                    <div class="box">
                        <h3 id="hour">00</h3>
                        <span>часов</span>
                    </div>
                    <div class="box">
                        <h3 id="minute">00</h3>
                        <span>минут</span>
                    </div>
                    <div class="box">
                        <h3 id="second">00</h3>
                        <span>секунд</span>
                    </div>
                </div>
                <a href="black_box" class="btn">Забирай меня!</a>
            </div>

            <div class="image">
                <img src="images/blackbox.png" alt="" />
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h1 class="heading">Связь со мной</h1>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11179.649980306218!2d27.61505455041154!3d53.909854980191525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbce5a0f73205d%3A0x39d298f7806ee9f2!2sDruhi%20zavulak%20Bahracijona%2C%20Minsk!5e0!3m2!1sen!2sby!4v1701275520665!5m2!1sen!2sby"
                width="600" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="/contact" method="POST">
                @csrf
                <div class="inputBox">
                    <input type="text" name="name" class="p-l-5" required />
                    <label> Имя</label>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" required />
                    <label> email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="phone"  placeholder="+375(__) ___ __ __"/>
                    <label> </label>
                </div>
                <div class="inputBox">
                    <textarea required name="comment" id="" cols="30" rows="10"></textarea>
                    <label> Сообщение</label>
                </div>

                <input type="submit" value="Отправить" class="btn" />
            </form>
        </div>
    </section>
@endsection
