<?php
function en_about()
{   
    if($_COOKIE['theme'] == 'dark'){}
    echo '<body>
    <ul>
        <li><a href="/public/catalog.php">Catalog</a></li>
        <li><a href="/protected/users.php">Admin panel</a></li>
        <li><a href="/protected/auth.php">Admins list</a></li>
        <li><a href="/about.php">About us</a></li>
        <li><form action="/public/cookie/changelang.php?language=ru" method="post"><button type="submit">RU</button></form></li>';
        if($_COOKIE['theme'] == 'dark'){
            echo '<li><form action="/public/cookie/changetheme.php?language=light" method="post"><button type="submit">Light theme</button></form></li>';
        }else
        {
            echo '<li><form action="/public/cookie/changetheme.php?language=dark" method="post"><button type="submit">Dark theme</button></form></li>';
        }
        echo 
    '</ul>
    <main>
        <div class="container my-5 px-4">
            <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">
                <div class="col top-cover center-block">
                    <div class="p-5">
                        <h3>Shipping methods</h3>
                        <p><b>Pickup</b><br>
                            Pickup is made at the address Moscow, Vernadsky Ave., 78. Work is carried out from 9:00 - 21:00, daily
                            <br>
                            <b>Delivery by courier</b><br>
                            Delivery by courier is made only in the city of Moscow, within the MKAD. The cost of delivery is 199 rubles, regardless of the order amount. Prepayment is not required
                        <br>
                        <h3>How to contact us</h3>
                        <b>E-mail: </b> toyshop@gmail.com <br>
                        <b>Telephone: </b> +7(495)535-35-35 <br>
                        <b>Whatsapp/Telegram: </b>+7(985)234-42-12 <br>
                        <h3>Legal information</h3>
                        The sale of goods in the toyshop online store is carried out by a Limited Liability Company "toyshop.ru "
                        Legal address: 78 Vernadsky ave., Moscow, 119454 TIN/KPP 222222222/22222222
                        </p>
                    </div>
                </div>
                    <div class="col top-cover center-block">
                        <div class="p-5">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7568.150218052035!2d37.47744829591578!3d55.67117373428238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54dc1d23b51c3%3A0x74763ed59c81ccb6!2z0KDQotCjINCc0JjQoNCt0JA!5e0!3m2!1sru!2sru!4v1652121309873!5m2!1sru!2sru" width="100%" height="500" style="border:solid black;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container">
        <p>&copy; Toyshop &middot; toyshop@gmail.com</p>
      </footer>';
}

function ru_about(){
    echo '<body>
  <ul>
        <li><a href="/public/catalog.php">Каталог</a></li>
        <li><a href="/protected/users.php">Администрирование</a></li>
        <li><a href="/protected/auth.php">Список администраторов</a></li>
        <li><a href="/about.php">О нас</a></li>
        <li><form action="/public/cookie/changelang.php?language=en" method="post"><button type="submit">EN</button></form></li>';
        if($_COOKIE['theme'] == 'dark'){
            echo '<li><form action="/public/cookie/changetheme.php?language=light" method="post"><button type="submit">Светлая тема</button></form></li>';
        }else
        {
            echo '<li><form action="/public/cookie/changetheme.php?language=dark" method="post"><button type="submit">Тёмная тема</button></form></li>';
        }
        echo 
    '</ul>
    <main>
        <div class="container my-5 px-4">
            <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">
                <div class="col top-cover center-block">
                    <div class="p-5">
                        <h3>Способы доставки</h3>
                        <p><b>Самовывоз</b><br>
                            Самовывоз производится по адресу г.Москва, пр. Вернандского, 78. Работа осуществляется с 9:00 - 21:00, ежедневно
                            <br>
                            <b>Доставка курьером</b><br>
                            Доставка курьером производится только в городе Москва, в пределах МКАД. Стоимость доставки 199 рублей, вне зависимостри от суммы заказа. Предоплата не требуется
                        <br>
                        <h3>Как с нами связаться</h3>
                        <b>E-mail: </b> toyshop@gmail.com <br>
                        <b>Телефон: </b> +7(495)535-35-35 <br>
                        <b>Whatsapp/Telegram: </b>+7(985)234-42-12 <br>
                        <h3>Юридическая информация</h3>
                        Продажа товаров в интернет-магазине toyshop осуществляется Обществом с ограниченной ответственностью «toyshop.ru»
                        Юридический адрес: пр. Вернадского, 78, Москва, 119454 ИНН/КПП 222222222/22222222
                        </p>
                    </div>
                </div>
                    <div class="col top-cover center-block">
                        <div class="p-5">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7568.150218052035!2d37.47744829591578!3d55.67117373428238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54dc1d23b51c3%3A0x74763ed59c81ccb6!2z0KDQotCjINCc0JjQoNCt0JA!5e0!3m2!1sru!2sru!4v1652121309873!5m2!1sru!2sru" width="100%" height="500" style="border:solid black;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container">
        <p>&copy; Магазин игрушек &middot; toyshop@gmail.com</p>
      </footer>';
}
?>