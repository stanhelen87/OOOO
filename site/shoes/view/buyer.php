<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 02.12.2014
 * Time: 10:08
 */

include __DIR__ . '/header.php';

?>


    <?php

//Смотрим вошел ли пользователь
   //var_dump($_SESSION['post']);
    $parameters= $router->getParameters();
    $this->parameters = $router->getParameters();
    //  var_dump($parameters);

//var_dump($data);
        $_SESSION['id_buyer']=$data['buyer'][0]['id_buyer'];
      //  var_dump($_SESSION['id_buyer']);
If (isset($_SESSION['id_buyer'])) $id_buyer=$_SESSION['id_buyer'];
If (!isset($_SESSION['id_buyer'])) throw new exception('Вас нет в базе данных покупателей');;

   // session_start();}
   // var_dump($id_buyer);

    //Запоминаем id_product для формирования корзины
    $parameters= $router->getParameters();
    //var_dump($parameters);
    $this->parameters = $router->getParameters();
   // $_SESSION['id_product'][] = $parameters['id_product'];
   // var_dump( $_SESSION);
    $id_inkind= $_SESSION['id_inkind'];
       // var_dump($parameters['id_product']);
    $_SESSION["in_$id_inkind"][]=$parameters['id_product'];



    $data1=$_SESSION['kindparent']['kindparent'];
    //var_dump($_SESSION["in_$id_inkind"]);

    //  $k=session_status();
    // echo $k;
    //    $data1=$_SESSION['kindparent'];
 //   var_dump($_SESSION);
  //  var_dump($data1);

    include __DIR__ . '/contentbusket.php';
If(isset($_SESSION['id_buyer'])) include __DIR__ . '/autorizout.php';
If(!isset($_SESSION['id_buyer'])) include __DIR__ . '/autoriz.php';
    include __DIR__ . '/footer.php';

?>
