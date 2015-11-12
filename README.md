# OAuth2
Модуль авторизации через социальные сети. PHP5. 

# Описание
Описал скилет. Модуль полностью рабочий. Дальше можно дописывать логику. <br><br>
Как работает модуль. <br>
1.	Папку apiAuth в корень вашего сайта<br>
2.	Создаем приложения для авторизации в соц. Сетях (много примеров в сети) <br>
3.	Настраиваем файл config.app.php (свой домен, ID, Key). <br>
4.	Полностью рабочие соц. Сети: Facebook, Google, VK, Yandex <br>
5.	Вызываем необходимый файл для авторизации <br>
6.	После авторизации  данные сохраняются в сессию  $_SESSION["authAPIinfo"] <br>
7.	Переадресация на указанный url (token_url) <br>


# Пример вызова из приложения
<br><br>
href = /apiAuth/?system=facebook&token_url=/myurl/  = facebook <br>
href = /apiAuth/?system=vk&token_url=/myurl/  = vk <br>
href = /apiAuth/?system=google&token_url=/myurl/  = google <br>
href = /apiAuth/?system=yandex&token_url=/myurl/  = yandex 

<br><br>

system=facebook //авторизация через facebook  <br>
token_url=/myurl/  //после авторизации редирект на /myurl/ с $_SESSION["authAPIinfo"] <br>
