<?php
session_start();
include "cartInit.php";
include "customerMenu.php"; 
?>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=hAM_U4bJfTaA7W3MmpBNDSGZTpuLKG8iwjsci_zLE3QRf2X6FC1MMZNWFfeNYOLoZlGjtkDjtSI9ZDs2maS8oOdFLlSYqNeLu36uiqH__GT6-OWA5rBDmmdDmNSklhB6l29k0iRIcx58KCrc7QcyJ-I1Bu4OW5s1M2moJx5rxOY" charset="UTF-8"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Products</title><script src="js/productSearch.js"></script>
    <style type="text/css">
      img {
        width: 150px;
        height: 150px;
      }
      .tooltips {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
      }

      .tooltips .tooltiptexts {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: -5px;
        left: 105%;
      }
      .tooltip .tooltiptext {

}

      .tooltips:hover .tooltiptexts {
        visibility: visible;
      }
    </style>
  </head>
<body onload="showProducts()">
    <h1>Products</h1>
    <div id="error"></div>
    <a href="checkout">My Cart</a>
    <label for=""></label> <input type="text" name="searchBar" id="searchBar" class="form" oninput="showProducts()">
    <select name="searchBy" id="searchBy" class="form" onchange="selectChange()">
      <option value="Name" >Name</option>
      <option value="Price" >Price</option>
    </select>
    <label for="" style="display:none;" name="label" id="label">Price Range</label>
    <input type="text" name="range1" style="display:none;" id="range1" class="form" oninput="showOrders()">
    <input type="text" name="range2" style="display:none;" id="range2" class="form" oninput="showOrders()">

    <table width="100%" class="table table-hover">
      <thead>
        <tr>
          <th><strong></strong></th>
          <th><strong>Name</strong></th>
          <th><strong>Price</strong></th>
          <th><strong>Stock</strong></th>
          <th><strong>Rating</strong></th>
        </tr>
      </thead>
      <tbody id="rTable">
      </tbody>
    </table>
  </body>
</html>

<style media="screen">

a{
    font-size: 25px;
    color:blue;
}

*{
  margin:0;
  padding:0;
  font-family: Century Gothic;
}

  body{
    background-image:linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(pics/bg.jpg);
    height:100vh;
    background-size: cover;
    background-position:center;
    background-repeat: no-repeat;
  }
</style>
