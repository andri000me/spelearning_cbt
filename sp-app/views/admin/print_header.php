<!DOCTYPE html>
<html>
<head>
  <title>CETAK</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url("sp-plugin/cetak.min.css"); ?>">
</head>
<style>
@media print {
    .page {page-break-after: always;}
}
.row {
  box-sizing: border-box;
  width: 100%;
  position: relative;
  clear: both;
  overflow: hidden;
}
.col {
  display: inline-block;
  margin: 0;
  float: left;
}
.col.m6 {
  width: 50%
}

</style>


<body style="" onload="window.print()">
