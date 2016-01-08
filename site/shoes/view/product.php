
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
    //Запоминаем id_inkind для правильного формирования вкладок
    $parameters= $router->getParameters();
   //var_dump($parameters);
    $this->parameters = $router->getParameters();
    //$_SESSION['id_inkind'][] = $parameters['id_product'];
    // var_dump( $_SESSION);
    $id_inkind=$parameters['id_inkind'];
        //Запоминаем id_inkind текущий
    $_SESSION['id_inkind']=$id_inkind;
        //Запоминаем данные по виду
    $_SESSION["id_inkind_$id_inkind"]=$data;
    //var_dump($_SESSION["id_inkind_$id_inkind"]);
   // var_dump($_SESSION["in_$id_inkind"]);
   // var_dump($_SESSION);
   // var_dump( $_SESSION['id_inkind']);
   // var_dump($_SESSION["in_$id_inkind"]);
   // var_dump($_SESSION["id_inkind_$id_inkind"]);
    $data1=$_SESSION['kindparent']['kindparent'];
    //  $k=session_status();
    // echo $k;
    //    $data1=$_SESSION['kindparent'];
  //  var_dump($_SESSION);
  // var_dump($data1);

    include __DIR__ . '/contentcatalog.php';
If(isset($_SESSION['id_buyer'])) include __DIR__ . '/autorizout.php';
If(!isset($_SESSION['id_buyer'])) include __DIR__ . '/autoriz.php';
    include __DIR__ . '/footer.php';

?>
