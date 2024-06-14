@extends('layouts.base')


@section('content')



<x-breadcrumb>
    {{ __('menu.policy') }}
</x-breadcrumb>



<section class="privacy">
    <div class="container">

        <div class="document">

            <h2 class="document__title title-h2">Політика конфіденційності</h2>

            <div class="document-clause">

                <p class="document-clause__subtitle text-min">
                    Команда BLANK.NUMBERS турбується про безпеку даних своїх відвідувачів. Саме тому ми склали цю Політику
                    конфіденційності. Ця Політика конфіденційності персональних даних (далі – Політика конфіденційності) діє
                    щодо всієї інформації, яку сайт, розташований за адресою url — https://blank-numbers.com/, може отримати про
                    Користувача під час використання сайту.
                </p>

                <h6 class="document-clause__title title-h6">ВИЗНАЧЕННЯ ТЕРМІНІВ</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            У цій Політиці конфіденційності використовуються такі терміни:
                        </p>
                        <ul class="document-clause__item-list-counter">
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    «Адміністрація сайту» – уповноважені співробітники компанії, які займаються організацією та
                                    здійснюють обробку персональних даних, а також визначають цілі обробки персональних даних,
                                    склад
                                    персональних даних, що підлягають обробці, дії чи операції, що здійснюються з персональними
                                    даними.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    "Персональні дані" - будь-яка інформація, що відноситься прямо або опосередковано до певної
                                    або
                                    фізичній особі (суб'єкту персональних даних).
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    "Обробка персональних даних" - будь-яка дія (операція) або сукупність дій (операцій), що
                                    здійснюються з використанням засобів автоматизації або без використання таких засобів з
                                    персональними даними, включаючи збирання, запис, систематизацію, накопичення, зберігання,
                                    уточнення (оновлення, зміна), вилучення, використання, передачу (поширення, надання,
                                    доступ),
                                    знеособлення, блокування, видалення, знищення персональних даних.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    «Конфіденційність персональних даних» — обов'язкова для дотримання Адміністратором або іншою
                                    особою, яка отримала доступ до персональних даних, вимога не допускати їх розповсюдження без
                                    згоди суб'єкта персональних даних або наявності іншої законної підстави.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    «Користувач сайту blank-numbers.com» – особа, яка має доступ до Сайту, через мережу Інтернет
                                    та
                                    використовує Сайт.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    IP-адреса — унікальна мережна адреса вузла в комп'ютерній мережі, побудованій за протоколом
                                    IP.
                                </p>
                            </li>
                        </ul>
                    </li>


                </ul>

            </div>
            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ЗАГАЛЬНІ ПОЛОЖЕННЯ</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Використання Користувачем сайту https://blank-numbers.com/ означає згоду з цією Політикою
                            конфіденційності та умовами обробки персональних даних Користувача.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            У разі незгоди з умовами Політики конфіденційності Користувач повинен припинити використання сайту
                            компанії.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Ця Політика конфіденційності застосовується лише до сайту https://blank-numbers.com/. Компанія не
                            контролює та не несе відповідальності за сайти третіх осіб, на які Користувач може перейти за
                            посиланнями, доступними на сайті.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Адміністрація сайту не перевіряє достовірність персональних даних, які надає Користувач сайту.
                        </p>
                    </li>
                </ul>
            </div>



            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ПРЕДМЕТ ПОЛІТИКИ КОНФІДЕНЦІЙНОСТІ</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Ця Політика конфіденційності встановлює зобов'язання Адміністрації сайту щодо нерозголошення та
                            забезпечення режиму захисту конфіденційності персональних та знеособлених даних, які Користувач
                            залишає на Сайті.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Персональні дані, дозволені для обробки в рамках цієї Політики конфіденційності, надаються
                            Користувачем шляхом заповнення форми на сайті та включають таку інформацію:
                        </p>
                        <ul class="document-clause__item-list">
                            <li>
                                <p class="document-clause__item-text text-min">
                                    - прізвище, ім'я Користувача;
                                </p>
                            </li>
                            <li>
                                <p class="document-clause__item-text text-min">
                                    - контактний телефон Користувача;
                                </p>
                            </li>
                            <li>
                                <p class="document-clause__item-text text-min">
                                    - адресу електронної пошти (e-mail);
                                </p>
                            </li>
                            <li>
                                <p class="document-clause__item-text text-min">
                                    - дата народження Користувача.
                                </p>
                            </li>
                        </ul>
                    </li>

                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Також на сайті відбувається збір та обробка знеособлених даних про відвідувачів (в т.ч. файлів
                            cookie) за допомогою сервісів інтернет-статистики (Google Analytics та ін.), якщо це дозволено в
                            налаштуваннях браузера Користувача (включено збереження файлів cookie) та/або використання
                            технології JavaScript).
                        </p>
                    </li>

                </ul>
            </div>

            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ЦІЛІ ЗБОРУ ПЕРСОНАЛЬНОЇ ІНФОРМАЦІЇ КОРИСТУВАЧА</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Персональні дані Користувача Адміністрація сайту може використовуватись з метою:
                        </p>
                        <ul class="document-clause__item-list-counter">
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Ідентифікації Користувача, який залишив заявку на сайті, для консультування дистанційним
                                    способом.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Надання Користувачу доступу до освітніх ресурсів сайту.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Встановлення з Користувачу зворотного зв'язку, включаючи направлення повідомлень, запитів
                                    щодо консультацій та участі у відкритих заходах, надання послуг, обробки запитів та заявок
                                    від Користувача.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Підтвердження достовірності та повноти персональних даних, наданих Користувачем.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Надання Користувачу ефективної клієнтської та технічної підтримки при виникненні проблем,
                                    пов'язаних із консультацією.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Надання Користувачу за його згодою спеціальних пропозицій, інформації про ціни, розсилки
                                    новин та інших відомостей. Користувач завжди може відмовитися від отримання інформаційних
                                    повідомлень, надіславши Адміністрації сайту лист на адресу електронної пошти
                                    tatyana.blank@gmail.com з позначкою «Відмова від повідомлень про нові продукти, послуги та
                                    спеціальні пропозиції».
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Знеособлені дані Користувачів, які збираються за допомогою сервісів інтернет-статистики,
                                    служать для збору інформації про дії Користувачів на сайті, покращення якості сайту та його
                                    змісту.
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ЗАСОБИ ТА ТЕРМІНИ ОБРОБКИ ПЕРСОНАЛЬНОЇ ІНФОРМАЦІЇ</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Обробка персональних даних Користувача здійснюється без обмеження строку будь-яким законним способом
                            на території України, в тому числі в інформаційних системах персональних даних з використанням
                            засобів автоматизації або без використання таких засобів.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Адміністрація сайту вживає необхідних організаційних та технічних заходів для захисту персональної
                            інформації Користувача від неправомірного або випадкового доступу, знищення, зміни, блокування,
                            копіювання, розповсюдження, а також від інших неправомірних дій третіх осіб.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Персональні дані Користувача можуть бути передані третім особам лише у разі виконання чинного
                            законодавства на запит органів державної влади, на підставах та в порядку, встановленому
                            законодавством України.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            При втраті або розголошенні персональних даних Адміністрація сайту інформує Користувача про втрату
                            або розголошення персональних даних, а також вживає всіх можливих заходів щодо запобігання
                            наслідкам, спричиненим втратою або розголошенням персональних даних Користувача.
                        </p>
                    </li>
                </ul>
            </div>


            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ОБОВ'ЯЗКИ СТОРІН</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Користувач зобов'язаний:
                        </p>
                        <ul class="document-clause__item-list-counter">
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Надати інформацію про персональні дані, необхідну для здійснення контакту з питань
                                    консультування.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Оновити, доповнити надану інформацію про персональні дані у разі зміни даної інформації.
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Адміністрація сайту зобов'язана:
                        </p>
                        <ul class="document-clause__item-list-counter">
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Використовувати отриману інформацію виключно для цілей, зазначених у пункті 4 цієї Політики
                                    конфіденційності.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Забезпечити зберігання конфіденційної інформації в таємниці, не розголошувати без
                                    попереднього дозволу Користувача, а також не здійснювати продаж, обмін, опублікування або
                                    розголошення іншими можливими способами переданих персональних даних Користувача, за
                                    винятком пп. 5.3. цієї Політики Конфіденційності.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Вживати запобіжні заходи для захисту конфіденційності персональних даних Користувача згідно
                                    з порядком, який зазвичай використовується для захисту такого роду інформації в існуючому
                                    діловому обороті.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Здійснити блокування персональних даних, що належать до відповідного Користувача, з моменту
                                    звернення або запиту Користувача або його законного представника або уповноваженого органу
                                    захисту прав суб'єктів персональних даних на період перевірки, у разі виявлення
                                    недостовірних персональних даних або неправомірних дій.
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>



            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ВІДПОВІДАЛЬНІСТЬ СТОРІН</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Адміністрація сайту, яка не виконала своїх зобов'язань, несе відповідальність за збитки, завдані
                            Користувачем у зв'язку з неправомірним використанням персональних даних відповідно до законодавства
                            України, за винятком випадків, передбачених п.п. 5.2. та 7.2. цієї Політики Конфіденційності.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            У разі втрати або розголошення Конфіденційної інформації Адміністрація сайту не несе
                            відповідальності, якщо ця конфіденційна інформація:
                        </p>
                        <ul class="document-clause__item-list-counter">
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Стала громадським надбанням до її втрати чи розголошення.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Була отримана від третьої сторони до її отримання Адміністрацією сайту.
                                </p>
                            </li>
                            <li class="document-clause__item-counter-li">
                                <p class="document-clause__item-text text-min">
                                    Була розголошена за згодою Користувача.
                                </p>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="document-clause">

                <h6 class="document-clause__title title-h6">Вирішення суперечок</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            До звернення до суду зі позовом щодо спорів, що виникають із відносин між Користувачем сайту та
                            Адміністрацією сайту, обов'язковим є пред'явлення претензії (письмової пропозиції щодо добровільного
                            врегулювання спору).
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Одержувач претензії протягом 30 календарних днів з дня отримання претензії письмово повідомляє
                            заявника претензії про результати розгляду претензії.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            У разі недосягнення угоди спір буде передано на розгляд до суду відповідно до чинного законодавства
                            України.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            До цієї Політики конфіденційності та відносин між Користувачем та Адміністрацією сайту
                            застосовується чинне законодавство України.
                        </p>
                    </li>
                </ul>
            </div>

            <div class="document-clause">

                <h6 class="document-clause__title title-h6">ДОДАТКОВІ УМОВИ</h6>

                <ul class="document-clause__list">
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Адміністрація сайту має право вносити зміни до цієї Політики конфіденційності без згоди Користувача.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Нова Політика конфіденційності набирає чинності з моменту її розміщення на Сайті, якщо інше не
                            передбачено новою редакцією Політики конфіденційності.
                        </p>
                    </li>
                    <li class="document-clause__item">
                        <p class="document-clause__item-text text-min">
                            Чинна Політика конфіденційності розміщена на сторінці за адресою
                            https://blank-numbers.com/privacy_policy
                        </p>
                    </li>
                </ul>
            </div>






        </div>



    </div>
</section>







@endsection