<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 02.12.2014
 * Time: 10:08
 */
include __DIR__ . '/header.php';
?>
<div class="right">
    <img class="picture" src="http://localhost/shop/img/SHOES.gif">
    <?php
  unset($_SESSION['id_buyer']);
  For ($i = 1; $i <= $_SESSION['num_inkind']; $i++){
    //Обнуляем массивы входа в разделы каталога
    $_SESSION["in_$i"]=array();
   };
    // var_dump($_SESSION["in_$i"]);
    $_SESSION['kindparent']=$data;
    //Запоминаем число видов
    // var_dump($data['kindparent'] ) ;
    $_SESSION['num_inkind']=count($data['kindparent']);
    //Создаем пока только пустой массив для сохранения данных по корзине c id_product
   // $_SESSION['id_product'] = array();
//    $k=session_status();
    $j=1;
    $n='';
    $kindparent=[];
//var_dump($data);
    foreach ($data['kindparent'] as $record) {
        if ($record['kindparent']!=$n)
        {
            $kindparent[$j].=$record['kindparent'];
            $n=$record['kindparent'];
            $j=$j+1;
        };
    }
    ?>
    <ul>
        <?php
        $m=count($kindparent);
//Чтобы найти максимум id_inkind
        $max_id_inkind=0;
        for ($i = 1; $i <= $m; $i++)       {
        ?>
        <li ><a  href="#"><?php echo $kindparent[$i] ?> </a>
            <ul class="nav nav-pills nav-stacked" ><?php foreach ($data['kindparent'] as $record) {
                    if ($record['kindparent'] == $kindparent[$i]) {
                        If ($record['id_inkind']>$max_id_inkind) $max_id_inkind=$record['id_inkind']?>
                        <li><a href="<?php echo $router->routeTable('product') . '/id_inkind/' . $record['id_inkind'];?>">  <?php echo $record['inkind'];?> </a></li>

                        <?php
                    }
                    $_SESSION['num_inkind']= $_SESSION['num_inkind']+$num_inkind;

                };
                ?>
        </li>
    </ul>
    </li>
    <?php
  //  var_dump($_SESSION['kindparent']);
   // echo $k;
    }
    ?>
    </ul>
    <?php
    $_SESSION['num_inkind']=$max_id_inkind;
 // var_dump($_SESSION['num_inkind']);
    //Создаем массивы входов в пункты меню
    for ($i = 1; $i <= $_SESSION['num_inkind']; $i++){
        $_SESSION["in_$i"]=array();
       // var_dump($_SESSION["in_$i"]);
    };
    ?>
</div>
<?php
include __DIR__ . '/content.php';
 include __DIR__ . '/autoriz.php';
include __DIR__ . '/footer.php';
//Записываем тестовое значение поля id_buyer в таблицу buyer для резервирования места для покупки
//Искусственно обращаемся к модели минуя автозагрузку
//var_dump($this->route);
//$this->router = new router('localhost/shoes/basket/add');
//$this->route = $this->router->getRoute();
//$route[1] = 'basket';
//$route[2] = 'insert';
//var_dump($route);
//var_dump($_POST);
//$this->data['form'] = $_POST;
//$model = 'shoes_model';
//var_dump($model);
//$this->prepareQuery($this->route[2]);
//$this->query->execute();
//$this->data[$this->route[1]] = $this->query->getData();
//$this->queryText = 'insert into basket';
//$this->queryText .= ' set ' . $this->prepareParameters($this->data, ',');
//$this->parameters = array();
//SITEBASE. 'shoes/basket/add/id_product/'
//$this->shoes_model->prepareTable($this->route[1]);
//$this->shoes_model->prepareQuery($this->route[2]);
//$this->query->execute();
//$this->data[$this->route[1]] = $this->query->getData();
?>
