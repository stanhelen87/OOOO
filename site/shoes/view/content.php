<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 02.12.2014
 * Time: 11:46
 */
?>

<div class="center">
    <!-- Nav tabs -->
    <p  style="color: darkmagenta;font-style: italic; font-size: 5em" >Shoes.by</p>
    <ul id="myTab2" class="nav nav-tabs">
        <li><a data-toggle="tab" href="#panely1">Главная</a></li>
        <li><a data-toggle="tab" href="#panely2">Доставка</a></li>
        <li><a data-toggle="tab" href="#panely3">Корзина</a></li>
        <li><a data-toggle="tab" href="#panely4">Каталог</a></li>
    </ul>
    <div class="tab-content">
        <div id="panely1" class="tab-pane fade">
            <h2>Shoes.by</h2>
            <p> Shoes.by — это один из крупнейших интернет-магазинов модной одежды, обуви и аксессуаров в Республике Беларусь. Ассортимент Lamoda.by насчитывает более 2 000 000 товаров для всей семьи, которые можно приобрести с доставкой на дом.
                Являясь частью глобального интернет-проекта Lamoda, ведущего интернет-ритейлера модных товаров в странах СНГ, Lamoda.by гарантирует своим клиентам европейский уровень сервиса. Интернет-магазин предлагает бесплатную доставку по всей территории Республики Беларусь, удобные условия оплаты и возврата товаров.
                Стартовав в декабре 2010 г. при поддержке международных инвесторов Rocket Internet, Tengelmann Group, Holtzbrinck Ventures, Investment AB Kinnevik, JP Morgan Asset Management и PPR Group, Lamoda быстро заняла лидирующие позиции на рынке России, Казахстана и Украины и продолжает развиваться, расширяя географию присутствия.
                Сегодня Shoes.by доверяют более 2 000 000 клиентов. Компания входит в холдинг  Global Fashion Group и использует опыт мировых онлайн-ритейлеров, чтобы сделать интернет-шопинг максимально простым и удобным для покупателей.
            <h3>ВСЕ МОДНЫЕ БРЕНДЫ В ДВА КЛИКА</h3>
            Представьте себе гардероб, в котором собрано более 2 000 000 модных товаров: мужская, женская и детская одежда, обувь и аксессуары. Вы можете заглянуть в него в любое время и заказать с бесплатной доставкой всё, что понравится. Это так просто!

            Shoes.by — крупнейший в Беларуси интернет-магазин одежды, обуви и аксессуаров, в котором представлено свыше 1000 известных марок: Nike, Adidas, DKNY и многих других. Мы сотрудничаем только с официальными дистрибьюторами и гарантируем подлинность всех товаров, представленных на нашем сайте.</p>
        </div>
        <div id="panely2" class="tab-pane fade">
            <h3> Курьерская служба</h3>
            <p>— Ожидайте торгового представителя на протяжении выбранного интервала времени, он свяжется с вами перед доставкой.</p>
            <p> — Примерка возможна при заказе не более 10 позиций.</p>
            <p>  — Время для проверки и примерки перед покупкой составляет — 15 минут.</p>
            <p>   — Оплата наличными и банковской картой в момент доставки.</p>
            <p>    — Стоимость доставки:
                С примеркой и частичным выкупом: 50 000 рублей, при выкупе товаров на сумму 350 000 рублей и более — бесплатно.
                Без примерки и частичного выкупа — бесплатно.</p>
            <p>    — Cрок хранения заказа: 5 дней..</p>
        </div>
        <div id="panely3" class="tab-pane fade">
            <h3>Корзина</h3>
            <div class="row">
                <?php
                $cost=0;
                //   For ($i=0;$i<=count($_SESSION['id_product']); $i++) {
                // foreach ($_SESSION['product']['product'] as $record) {
                //  foreach ($_SESSION['product']['product'] as $record) {
                //  var_dump($_SESSION);
                For ($i=1;$i<=$_SESSION['num_inkind']; $i++){

                    If (!empty($_SESSION["in_$i"])) {
                        For ($j=0;$j<count($_SESSION["in_$i"]); $j++) {
                            // var_dump($_SESSION["in_$i"]);
                            // var_dump($_SESSION["id_inkind_$i"]);
                            //var_dump( $_SESSION["id_inkind_$i"]['product']['id_product']);
                            //  var_dump($_SESSION["in_$i"][$j]);
                            //  var_dump($_SESSION["id_inkind_$i"]['product'] );
                            foreach ($_SESSION["id_inkind_$i"]['product'] as $record) {
                                If ($record['id_product'] ==$_SESSION["in_$i"][$j]) {
                                    //  var_dump($i);
                                    //   var_dump($j);
                                    ?>
                                    <div class="col-sm-3 col-md-4">
                                        <div class="thumbnail">
                                            <img src="
                                                 <?php
                                            echo $record['img']; ?>"alt="Обувь">

                                            <div>
                                                <H5>
                                                    <?php
                                                    echo $record['name_product']; ?></H5>

                                                <p>
                                                    <?php
                                                    echo $record['cost']; ?> у.е.</p>

                                                <?php $cost = $cost + $record['cost']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                };
                            };
                        };
                    };
                };
                //   var_dump($_SESSION['post']);
                //  $surname=$_SESSION['post']['surname'];
                //  $name=$_SESSION['post']['name'];
                //  $middlename=$_SESSION['post']['middlename'];
                $login=$_SESSION['post']['login'];
                $password=$_SESSION['post']['password'];
                //  var_dump($login);
                // var_dump($password);
                // var_dump($middlename);
                ?>
            </div>
            <p> <?php echo "Сумма всех товаров составляет  $cost у.е.";?> </p>
            <?php If (isset($_SESSION['id_buyer'])){ ?>

                <p><a href="<?php echo SITEBASE. 'shoes/buyer/edit'.'/id_buyer/'.$_SESSION['id_buyer'];?>" class="btn btn-default" role="button">Добавить данные по доставке</a></p>
                <?php echo  $html;}?>
            <?php if  (!isset($_SESSION['id_buyer'])) { ?>
             <p> Корзина пуста </p>

            </br>
            </br>
            </br>
            </br>
                <p style="color: red; font-size: 2em">ЗАРЕГИСТРИРУЙТЕСЬ и ВОЙДИТЕ НА САЙТ</p>
           <h2>Затем кликните ссылку <a style="color: red; font-size: 1em" href="<?php  echo SITEBASE.'shoes/buyer/select/login/'. $login.'/password/'.$password;?> ">Оформить заказ</a> </h2>
            <?php };?>
        </div>
        <div id="panely4" class="tab-pane fade  ">
            <h3>Каталог</h3>

            <!--ПАГИНАТОР-->

            <?php
            $n = 100;
            //$x=array();
            // for ($i=0; $i<$n; $i++) $x[] = 'Сообщение '.$i;
            $x=$_SESSION["id_inkind_$id_inkind"]['product'];
            // var_dump($x);
            $data_per_page=9;
            $data_count=count($x);
            if (!$data_count) echo("Извините, данные для отображения на данный момент отсутствуют");
            $pages_count=ceil($data_count/$data_per_page);
            //    var_dump( $pages_count);
            $current_page=isset($_GET['page'])?$_GET['page']:1;
            $current_page=intval($current_page);
            if ($current_page<1||$current_page>$pages_count) echo("Запрошенная Вами страница не найдена");
            $first_element=($current_page-1)*$data_per_page;
            $page_data=array_slice($x, $first_element, $data_per_page);
            // var_dump($page_data);

            ?>
            <div class="row">
                <?php
                foreach ( $page_data as $record) {
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $record['img'] ?>" alt="Обувь">
                            <div>
                                <H2> <?php echo $record['name_product']?></H2>
                                <p> <?php echo $record['cost']?> у.е. </p>
                                <?php
                                $id_product=$record['id_product'];
                                $id_buyer=$_SESSION['id_buyer'];
                                // $_POST['id_product']=$record['id_product'];
                                //$_POST['id_buyer']= $id_buyer;
                                //var_dump($_POST['id_buyer']);
                                // var_dump($_POST['id_product']);
                                $data['id_product']=$record['id_product'];
                                $data['id_buyer']= $id_buyer;
                                $data['post']['id_product']=$record['id_product'];
                                $data['post']['id_buyer']= $id_buyer;
                                $_SESSION['post']=$data['post'];
                                // var_dump( $_SESSION['post']);?>
                                <p><a href="<?php echo SITEBASE. 'shoes/import/add/'.'id_product/'.$record['id_product'].'/id_buyer/'.$id_buyer;?>" class="btn btn-primary" role="button">Купить</a> <a href="#" class="btn btn-default" role="button">Обзор</a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                };
                // $_SESSION["in_$id_inkind"][count($_SESSION["in_$id_inkind"])-1]='';
                // var_dump($_SESSION["in_$id_inkind"][count($_SESSION["in_$id_inkind"])-1]);
                // var_dump($_SESSION["in_$id_inkind"]);
                ?>
            </div>
            <?php
            $str=3;
            $start=$current_page-$str;
            if ($start<1) $start=1;
            $end=$current_page+$str;

            for ($i=$start; $i<=$end; $i++)
            {
            if ($i==$current_page) { ?>
            <div> <?php echo $i.'&nbsp;&nbsp;';}
                if ($i!=$current_page) { ?>

                    <a href="<?php echo SITEBASE . 'shoes/product/select/id_inkind/' . $_SESSION['id_inkind'] . '?page=' . $i; ?>"><?php echo '&nbsp;&nbsp;'.$i.'&nbsp;&nbsp;'; ?></a>


                    <?php
                }
                }
                ?>

            </div>
    </div>
</div>
</div>


