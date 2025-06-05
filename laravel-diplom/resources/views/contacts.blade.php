@extends('layouts.app')
@section('content')
        <div class="center">
                <h1>Контакты</h1>
                <div class="contact_block">
                        <div class="contact_left">
                                <p>Телефон клиники:</p>
                                <p class="telephone_nomber telephone_nomber1">
                                        <a class="tel" href="tel:84812315115">8 (4812) 315-115</a>
                                </p>
                                <p class="telephone_nomber telephone_nomber2">
                                        <a class="tel" href="tel:89107104824">8 (910) 710-48-24</a>
                                </p>
                                <p class="telephone_nomber telephone_nomber1">
                                        <a class="tel" href="tel:84812357557">8 (4812) 35-75-57</a>
                                </p>
                                <p class="button button_grey">
                                        <a href="#dialog" name="modal">Заказать обратный звонок</a>
                                </p>
                                <div class="adress_contactblock">
                                        <p>Наш адрес:</p>
                                        <p class="adress">г. Смоленск, ул. Кирова, д. 29</p>
                                        <p class="time">по будням с 8:30 до 21:00 <br>в выходные с 9:00 до 18:00</p>
                                </div>
                                <div class="question_contactblock">
                                        <p>Мы в мессенджерах:</p>
                                        <p class="viber"><a href="tel:89107104824" class="tel">8 (910) 710-48-24</a><noscript><img src="https://www.cstom.ru/wp-content/themes/cstom/images/whatsapp.png" alt="" /></noscript><img class=" lazyloaded" src="https://www.cstom.ru/wp-content/themes/cstom/images/whatsapp.png" data-src="https://www.cstom.ru/wp-content/themes/cstom/images/whatsapp.png" alt=""></p>
                                        <p class="email">Email: <a class="email" href="mailto:info@cstom.ru">info@cstom.ru</a></p>
                                </div>
                        </div>
                        <div class="contact_right">
                                <div class="map" id="map1" style="display: block;">
                                        <p><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Afa85d39b265c2e2c34653d58abe24780df295892fe74eb5d0b8d645c3e1f8c25" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe></p>
                                </div>
                                <div class="map" id="map2" style="display: none;">
                                        <p><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A7c0948dcadeedf394025d353bea34b2d9f8f6622223c7a3a96fe025b9d499614" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe></p>
                                </div>
                                <div class="map" id="map3" style="display: none;">
                                        <p><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Ae7c36c760cd381ff4cb349165ab96d4bd0a0a2aed78443067279318d6ca3bdad" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe></p>
                                </div>
                                <div class="map" id="map4" style="display: none;">
                                        <p><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3A7bba966b26b8fb640b797f9ddf95b6919346c94f4d300d2897e25619b1cd2ab1" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe></p>
                                </div>
                                <div class="map" id="map5" style="display: none;">
                                        <p><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Aff3aac2249d0e5b8d26cec086fb157e5e51649a90e773876d7e5945dee6271a3" frameborder="0" allowfullscreen="true" width="100%" height="400px" style="display: block;"></iframe></p>
                                </div>
                                <p class="navigation_map">Добраться <span class="after"><span class="list active" id="list1" onclick="ShowMap('infoblock1','map1','list1');">без маршрута</span></span> <span class="after"><span class="list" id="list2" onclick="ShowMap('infoblock2','map2','list2');">пл. Победы</span></span> <span class="after"><span class="list" id="list3" onclick="ShowMap('infoblock3','map3','list3');">от автовокзала</span></span> <span class="after"><span class="list" id="list4" onclick="ShowMap('infoblock4','map4','list4');">с Киселёвки</span></span> <span class="after"><span class="list" id="list5" onclick="ShowMap('infoblock5','map5','list5');">с Кловки</span></span></p>
                                <div class="post_one infoblock" id="infoblock1" style="display: block;">
                                        <p>Собственная парковка рядом с клиникой, удобное расположение в 30 метрах от остановки «Физдиспансер». Яркая зелёная вывеска «Центр семейной стоматологии» на фасаде, рядом аптека, второй этаж.</p>
                                </div>
                                <div class="post_one infoblock" id="infoblock2" style="display: none;">
                                        <p>От пл. Победы можно добраться на маршрутке до ул. Кирова (остановка «Физдиспансер»), в 30 метрах справа вы увидите вывеску «Центр семейной стоматологии» на фасаде, второй этаж.</p>
                                </div>
                                <div class="post_one infoblock" id="infoblock3" style="display: none;">
                                        <p>От автовокзала до ул. Кирова (остановка «Физдиспансер») можно добраться автобусами №50 и №10, на маршрутке №37Н, а также на трамваях №3 и №4 (дольше всего). В 30 метрах от остановки справа вы увидите вывеску «Центр семейной стоматологии» на фасаде, второй этаж.</p>
                                </div>
                                <div class="post_one infoblock" id="infoblock4" style="display: none;">
                                        <p>С микрорайона Киселёвка до ул. Кирова (остановка «Физдиспансер») можно доехать на троллейбусе №3, маршрутках №20Н и 35Н (уточняйте). В 30 метрах справа от остановки вы увидите вывеску «Центр семейной стоматологии» на фасаде, второй этаж.</p>
                                </div>
                                <div class="post_one infoblock" id="infoblock5" style="display: none;">
                                        <p>С ул. Кловская до ул. Кирова (остановка «Физдиспансер») идут маршрутки №45Н, 55Н и 6Н, а также автобус №10 (уточняйте). В 30 метрах справа от остановки вы увидите вывеску «Центр Семейной стоматологии» на фасаде, второй этаж.</p>
                                </div>
                        </div>
                       
                </div>
                <div id="social_widgets">
                        <p class="h3">Присоединяйтесь к нам в соцсетях</p>
                        <div class="one_socialwidgets">
                                <script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>
                                <div id="vk_groups" style="width: 310px; height: 206px; background: none;"><iframe name="fXD4f83c" frameborder="0" src="https://vk.com/widget_community.php?app=6430948&amp;width=310px&amp;_ver=1&amp;gid=87193288&amp;mode=3&amp;color1=&amp;color2=&amp;color3=&amp;class_name=&amp;height=300&amp;url=https%3A%2F%2Fwww.cstom.ru%2Fcontact&amp;referrer=https%3A%2F%2Fwww.cstom.ru%2Fcategory%2Fsale&amp;title=%D0%9A%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B%20%D1%81%D1%82%D0%BE%D0%BC%D0%B0%D1%82%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D0%B8%20%D0%B2%20%D0%A1%D0%BC%D0%BE%D0%BB%D0%B5%D0%BD%D1%81%D0%BA%D0%B5%20%E2%80%94%20%D0%A6%D0%B5%D0%BD%D1%82%D1%80%20%D0%A1%D0%B5%D0%BC%D0%B5%D0%B9%D0%BD%D0%BE%D0%B9%20%D0%A1%D1%82%D0%BE%D0%BC%D0%B0%D1%82%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D0%B8&amp;1973fbc9e13" width="310" height="185" scrolling="no" id="vkwidget1" style="overflow: hidden; height: 206px;"></iframe></div>
                        </div>
                        <div class="one_socialwidgets">
                                <div id="ok_group_widget"><iframe id="__okGroup0" scrolling="no" frameborder="0" src="https://connect.ok.ru/dk?st.cmd=WidgetGroup&amp;st.groupId=54850511896605&amp;st.fid=__okGroup0&amp;st.hoster=https%3A%2F%2Fwww.cstom.ru%2Fcontact&amp;st.settings=%7B%22width%22%3A310%2C%22height%22%3A224%7D" allowfullscreen="" style="border: 0px; width: 310px; height: 224px;"></iframe></div>
                        </div>
                        <div class="clear"></div>
                </div>
        </div>
@endsection