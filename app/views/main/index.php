<link rel="stylesheet" href="./app/views/public/includes/sendtotelegram/css/style.css">
<script defer src="./app/views/public/scripts/index.js"></script>
</head>
<body>

<h3>Главная страница</h3>

<h4>Конфигуратор входной двери</h4>
<div class="main flex">
    <div class="doors flex">
        <div class="door">
            <div class="door_left flex">
                <div class="left-handle"></div>
            </div>
            <p class="door__description">Вид снаружи</p>
        </div>
        <div class="door">
            <div class="door_right flex opening-active">
                <div class="right-handle"></div>
            </div>
            <p class="door__description">Вид изнутри</p>
        </div>
    </div>
    <div class="params">
        <h4 class="params-title">Параметры</h4>
        <form action="sendform" class="form-control" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="color" class="col-form-label">Цвет покраски</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Default select example" name="color" id="color" required>
                        <option selected disabled></option>
                        <option value="red">Красный</option>
                        <option value="green">Зеленый</option>
                        <option value="blue">Синий</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="skin_color" class="col-form-label">Цвет пленки</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Default select example" name="skin_color" id="skin_color">
                        <option selected disabled></option>
                        <option value="red">Красный</option>
                        <option value="green">Зеленый</option>
                        <option value="blue">Синий</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="handle_color" class="col-form-label">Цвет ручки</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Default select example" name="handle_color" id="handle_color">
                        <option selected disabled></option>
                        <option value="red">Красный</option>
                        <option value="green">Зеленый</option>
                        <option value="blue">Синий</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="handle_color" class="col-form-label">Ширина двери</label>
                </div>
                <div class="col-auto">
                    <input type="number" min="100" max="1500" step="10" id="width" name="width">
                    <span>мм</span>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="handle_color" class="col-form-label">Высота двери</label>
                </div>
                <div class="col-auto">
                    <input type="number" min="100" max="2500" step="10" id="height" name="height">
                    <span>мм</span>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="handle_color" class="col-form-label">Открывание</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Default select example" name="opening" id="opening">
                        <option selected disabled></option>
                        <option value="left-opening">Левое</option>
                        <option value="right-opening">Правое</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="handle_color" class="col-form-label">Аксессуары</label>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="accessories[]" value="A1">
                        <label class="btn btn-outline-primary" for="btncheck1">A1</label>

                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" name="accessories[]" value="A2">
                        <label class="btn btn-outline-primary" for="btncheck2">A2</label>

                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" name="accessories[]" value="A3">
                        <label class="btn btn-outline-primary" for="btncheck3">A3</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Отправить комплектацию</button>
        </form>
        <form action="getpdf" method="post">
            <button type="submit" class="btn btn-primary">Создать pdf</button>
        </form>
        <h2 class="params-title">Написать боту</h2>
        <form id="form-contact" method="POST" class="contact-form" autocomplete="off" enctype="multipart/form-data">
            <p class="contact-form__title">Закажите обратный звонок и наш консультант свяжется с вами</p>
            <div class="preloader"></div>
            <p class="contact-form__message"></p>
            <!-- Поле с именем -->
            <div class="contact-form__input-wrapper contact-form__input-wrapper_name">
                <input name="name" type="text" class="contact-form__input contact-form__input_name"
                       placeholder="Введите ваше имя">
            </div>
            <!-- Поле с телефоном -->
            <div class="contact-form__input-wrapper contact-form__input-wrapper_phone">
                <input name="phone" type="tel" class="contact-form__input contact-form__input_phone"
                       placeholder="Введите ваш телефон">
            </div>
            <!-- Поле с выбором файла -->
            <div class="contact-form__input-wrapper">
                <input type="file" name="files[]" id="contact-form__input_file"
                       class="contact-form__input contact-form__input_file" multiple>
                <label for="contact-form__input_file" class="contact-form__file-button">
                    <span class="contact-form__file-text">Выберите файл</span>
                </label>
            </div>
            <!--Поле с темой в письме-->
            <input name="theme" type="hidden" class="contact-form__input contact-form__input_theme"
                   value="Заявка с сайта dverifalko.ru">
            <!--Кнопка отправки формы-->
            <button type="submit" class="contact-form__button">Отправить</button>
        </form>
    </div>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./app/views/public/includes/sendtotelegram/telegramform/js/telegramform.js"></script>
    <script>
        // Кастомизация поля с файлом.
        let inputs = document.querySelectorAll('.contact-form__input_file');
        Array.prototype.forEach.call(inputs, function (input) {
            let label = input.nextElementSibling,
                labelVal = label.querySelector('.contact-form__file-text').innerText;

            input.addEventListener('change', function (e) {
                let countFiles = '';
                if (this.files && this.files.length >= 1)
                    countFiles = this.files.length;

                if (countFiles)
                    label.querySelector('.contact-form__file-text').innerText = 'Выбрано файлов: ' + countFiles;
                else
                    label.querySelector('.contact-form__file-text').innerText = labelVal;
            });
        });

    </script>

    <script>
        // Маска ввода номера телефона.
        $(function () {
            $('input[type="tel"]').mask('+7(000)000-00-00');
        });
    </script>
</div>

</body>
</html>