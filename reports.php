<?php
require_once "connection.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en" style="background-color: #1c1c1c">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/81c2c05f29.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <title>Reports</title>
</head>
<body>
<style>
    body{
        background-color: #1c1c1c;
    }
    h1{
        text-align: center;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color:#FFFFFF;
  }

    table {
      border-collapse: collapse;
      width: 100%;
      margin: 20px auto;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 12px 15px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
      color: #555;
    }
    tr:nth-child(even) {
      background-color: #f7f7f7;
    }
    
  </style>
</head>
<body>
  
  <table>
    <tr>
      <th>State</th>
      <th>Non-Profit Organizations</th>
    </tr>
    <?php include('states-report.php'); ?>
    <h1>State Report</h1>
  </table>
  <table>
    <tr>
      <th>Type</th>
      <th>Non-Profit Organizations</th>
    </tr>
    <?php include('types-report.php'); ?>
    <h1>Type Report</h1>
  </table>


</body>
</html>