@extends('layouts.base')
@section('content')
<section class="home" id="home">
    <div class="swiper home-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="box" style="background: url(images/11.jpg);">
            <div class="content">
              <span>Скидка 75% </span>
              <h3>Знойный сентябрь</h3>
              <a href="#" class="btn">Читать подробнее</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="box" style="background: url(images/4.jpg);">
            <div class="content">
              <span>Скидка до 45% </span>
              <h3>Больше-дешевле</h3>
              <a href="#" class="btn">Читать подробнее</a>
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
              <a href="#" class="btn">Читать подробнее</a>
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
        <span>Новинка</span>
        <h3>Кольца</h3>
        <a href="#" class="btn">Купить</a>
      </div>
    </div>
    <div class="banner">
      <img src="images/002.jpg" alt="" />
      <div class="content">
        <span>Новинка</span>
        <h3>Браслеты 2024</h3>
        <a href="#" class="btn">Купить</a>
      </div>
    </div>
  </section>

  <section class="category" id="category">
    <h1 class="heading">Покупки по категориям</h1>

    <div class="box-container">
        @foreach ($products as $product)


      <div class="box">
        <img src="/storage/{{$product->picture}}" alt="" />{{-- <img src="images/Броши.png" alt="" /> --}}
        <div class="content">
          <h3>{{$product->catalog->name}}</h3>
          <a href="{{asset('catalog/'.$product->catalog_id)}}" class="btn">Подробнее</a>
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
    <h1 class="heading">Сделка недели</h1>

    <div class="row">
      <div class="content">
        <h3 class="title">Спецпредложение: 3 по цене 1</h3>
        <p>
          Уникальное торговое предложение на самый популярный товар месяца.
          Предложение ограничено!
        </p>
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
        <a href="#" class="btn">Забирай меня!</a>
      </div>

      <div class="image">
        <img src="images/22.webp" alt="" />
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <h1 class="heading">Связь со мной</h1>

    <div class="row">
      <iframe
        class="map"
        src="https://www.google.com/maps/place/Minsk,+Belarus/@53.8846118,27.5109689,12z/data=!3m1!4b1!4m6!3m5!1s0x46dbcfd35b1e6ad3:0xb61b853ddb570d9!8m2!3d53.9006011!4d27.558972!16zL20vMGRseGo?hl=en&entry=ttu"
        allowfullscreen=""
        loading="lazy"
      ></iframe>

      <form action="">
        <div class="inputBox">
          <input type="text" required />
          <label>Имя</label>
        </div>
        <div class="inputBox">
          <input type="email" required />
          <label>email</label>
        </div>
        <div class="inputBox">
          <input type="number" required />
          <label>Номер</label>
        </div>
        <div class="inputBox">
          <textarea required name="" id="" cols="30" rows="10"></textarea>
          <label>Сообщение</label>
        </div>

        <input type="submit" value="Отправить" class="btn" />
      </form>
    </div>
  </section>
@endsection
