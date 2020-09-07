<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>World_Bank</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
  <header class="main-header">
    <div class="info">
      <img class="info__logo" src="img/logo.png" alt="логотип" height="86" width="231">
      <div class="info__phone phone_number">
        <a class="phone_number__link" href="tel:+78001005005">8-800-100-50-05</a>
        <a class="phone_number__link" href="tel:+73452522000">+7(3452)255-000</a>
      </div>
    </div>
    <nav class="main-nav">
      <ul class="main-nav__list nav-list">
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Кредитные карты</a>
        </li>
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Вклады</a>
        </li>
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Дебетовые карты</a>
        </li>
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Страхование</a>
        </li>
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Друзья</a>
        </li>
        <li class="nav-list__item">
          <a class="nav-list__item__link" href="#">Интернет-банк</a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="container">
    <div class="way">
      <a class="way__link" href="#">Главная</a>
      <div>-</div>
      <a class="way__link" href="#">Вклады</a>
      <div>-</div>
      <a class="way__link way__link--active">Калькулятор</a>
    </div>
    <form method="post" id="ajax_form" action="" >
      <legend>Калькулятор</legend>
      <label>Дата формирования вклада <input type="text" name="date" class="date" autocomplete="off" required></label><br><br>
      <div style="display:flex; justify-content: space-between;">
        <label>Сумма вклада <input type="text" class="summ" name="summ" min="1000" max="3000000" pattern="[0-9]{4,7}" required ></label>
        <div class="slider1" id="slider"></div>
      </div><br>
      <label> Срок вклада 
        <select name="term" class="term">
          <option value="1">1 год</option>
          <option value="2">2 года</option>
          <option value="3">3 года</option>
          <option value="4">4 года</option>
          <option value="5">5 лет</option>
        </select>
      </label><br><br>
      <label class="replenishment">Пополнение вклада 
        <input type="radio" name="replenishment" value="true" id='radio1'>Да
        <input type="radio" name="replenishment" value="false" id='radio2' checked>Нет
      </label><br><br>
      <div style="display:flex; justify-content: space-between;">
        <label>Сумма пополнения вклада <input type="text" class="summrep" name="summrep" min="1000" max="3000000" pattern="[0-9]{4,7}"></label>
        <div class="slider2" id="slider"></div>
      </div>
      <button id="btn">Рассчитать</button>
    </form>
    <br>
    <div id="result_form"></div> 
    <br>
  </main>
  <footer class="main-footer">
    <ul class="main-footer__list footer-list">
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Кредитные карты</a>
      </li>
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Вклады</a>
      </li>
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Дебетовые карты</a>
      </li>
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Страхование</a>
      </li>
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Друзья</a>
      </li>
      <li class="footer-list__item">
        <a class="footer-list__item__link" href="#">Интернет-банк</a>
      </li>
    </ul>
  </footer>
  <script src="js/script.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
