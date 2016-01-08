Пример работы с базой данных (MVC)

Последовательность обработки запроса относительно пути /example/site/, подробнее см. ниже
Запрос приходит по настройкам .htaccess на index.php
index.php включает автозагрузку классов, вызывает контроллер -  controller.php
контроллер по адресу запроса вызывает нужную модель - forum/forum_model.php
модель извлекает данные из базы
далее контроллер вызывает view (forum/forum_view.php)
Если запрос (add,edit) требует отображения формы, подгружается forum_viewForm
для отображения нужной формы
Теперь forum_view подключает (include) нужный шаблон из папки forum/view
который формирует выводит страницу в браузер.

В папке Lib находятся классы библиотеки

db - подключение к базе данных (PDO)

table - родительский класс для описания таблиц,
классы-потомки для конкретных таблиц можно посмотреть в папке site/table,
содержит основные данные структуры таблиц - поля и типы данных,
поля ввода с указанием типа элементов форм для для автоматического создания форм
правила валидации (в примере пока не определяются, нужно доработать)

form - для генерации html-кода формы ввода и редактирования данных таблиц базы

control - элементы формы (text, textarea и т.д.), добавляются в объект класса form
в соответствии со структурой таблиц

query - класс для конструирования и выполнения основных типов запросов
(select, update, insert, delete) в соответствии с полученными от пользователя
данными и структуры таблиц
------------------------------------

В файле .htaccess все запросы, кроме css, js и графических фалов перенаправляются
на site/index.php, который их обрабатывает. Для использования .htaccess проверьте
установку их использования, это в основном файле конфигурации Apache - httpd.conf
должно быть примерно так (путь может быть другой, главное DocumentRoot и опция
AllowOverride All которая разрешит использование файлов .htaccess.
Но если что-то изменили, не забудьте перезапустить Apache)

DocumentRoot "c:/WebServer/Apache24/htdocs"
<Directory "c:/WebServer/Apache24/htdocs">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Require all granted
</Directory>

!!! НО ИЗМЕНЕНИЯ В ФАЙЛЕ .htaccess НЕ ТРЕБУЮТ ПЕРЕЗАПУСКА APACHE, РАБОТАЮТ СРАЗУ !!!

forum.sql содержит дамп базы forum для тестирования.
---------------------------------------------

Папка site содержит сам сайт

Файл config.php в примере содержит константы корневой папки сайта, в примере это /example/
(т.е. на localhost это будет по адресу http://localhost/example/) и данные лля подключения
к базе (можно будет класс создать и расширить список параметров). Подключается в index.php

error.php выводит сообщения об ошибках, в примере все исключения просто обрабатываются в
в последних строках index.php с выводом сообщения (контроль ошибок требует доработки)

user.php - объект user для данных сессии, авторизация в примере не реализована, в файле
controller.php создается просто admin

router.php - класс хранит данные о текущем адресе запроса и функции получения адреса для
добавления, изменения и т.д. (примеры в forum/view)

controller.php - объект controller управляет процессом. Анализирует запрос пользователя
 и подключает нужную модель, которая обрабатывает данные.

В нашем примере в папке forum модель находится в файле forum_model.php.
Модель выполняет запросы к базе по обработке данных с использованием объектов библиотеки.

Далее контроллер вызывает view, передавая данные модели - класс forum_view (forum_view.php)
При создании формы (добавление, изменение) подключается класс forum_viewForm.php

После этого вызывается шаблон нужной страницы в папке forum/view, в котором генерируется
окончательный html код страницы (user.php, topic.php, message.php). В данном примере
с вставкой PHP-кода в шаблон.





