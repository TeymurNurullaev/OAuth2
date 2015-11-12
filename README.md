# OAuth2
Модуль авторизации через социальные сети. PHP5. 

# Описание
Описал скилет. Модуль полностью рабочий. Дальше можно дописывать логику.
Как работает модуль.
1.	Папку apiAuth в корень вашего сайта
2.	Создаем приложения для авторизации в соц. Сетях (много примеров в сети)
3.	Настраиваем файл config.app.php (свой домен, ID, Key). 
4.	Полностью рабочие соц. Сети: Facebook, Google, VK, Yandex
5.	Вызываем необходимый файл для авторизации
6.	После авторизации  данные сохраняются в сессию  $_SESSION["authAPIinfo"]
7.	Переадресация на указанный url (token_url )


# Пример вызова из приложения

<a href="/apiAuth/?system=facebook&token_url=/myurl/">facebook</a>
<a href="/apiAuth/?system=vk&token_url=/myurl/">vk</a>
<a href="/apiAuth/?system=google&token_url=/myurl/">google</a>
<a href="/apiAuth/?system=yandex&token_url=/myurl/">yandex</a>

system=facebook //авторизация через facebook 
token_url=/myurl/  //после авторизации редирект на /myurl/ с $_SESSION["authAPIinfo"]
