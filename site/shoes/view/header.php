<?php
/**
 * Created by PhpStorm.
 * User: ys
 * Date: 02.12.2014
 * Time: 10:05
 */
?>
<!DOCTYPE html>
<!-- saved from url=(0035)file:///D:/work/Stanul/sprite2.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Shop</title>
    <script type="text/javascript">
        $(document).ready(function(){
            // Отображается 1 вкладка,
            // т.к. отсчёт начинается с нуля
            $("#myTab2 li:eq(0) a").tab('show');
        });
    </script>
    <link href="http://localhost/shop/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/shop/js/jquery.js" ></script>
    <script src="http://localhost/shop/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
            type="text/javascript"></script>

    <style type="text/css">
        @import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");

        #feedControl {
            margin-top : 10px;
            margin-left: auto;
            margin-right: auto;
            width : 180px;
            font-size: 12px;
            color: #9CADD0;
        }
    </style>
    <script type="text/javascript">
        function load() {
            var feed ="http://feeds.bbci.co.uk/news/world/rss.xml";
            new GFdynamicFeedControl(feed, "feedControl");

        }
        google.load("feeds", "1");
        google.setOnLoadCallback(load);
    </script>


    <style type="text/css">

        body{ background-color: rgba(50,50,250,0.2);}
        .left{

            float: left;

        }
        .right{
         float: left;
        }

        .center{
            width: 60%;

            background-color: rgba(250,50,50,0.1);
            float: left;
        }
        .footer
        { background-color: rgba(100,200,100,0);;
            clear:both;
        }



    </style>
</head>
<body>

