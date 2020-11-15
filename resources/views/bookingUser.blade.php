<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
  <div class="card" style="width: 20rem;">
  <div class="card-body">
     <h4>Merk    => {{$datas->merk}}</h4>
     <h4>Transaksi    => {{$datas->tanggaltransaksi}}</h4>
     <h4>Bank         => {{$datas->bank_company}}</h4>
     <h4>Jumlah Bayar => {{$datas->user_price}}</h4>
      <h4>Status => @if($datas->status == '1') 
      <span class="btn btn-primary">Berjalan</span>      
      @elseif($datas->status == '2')
      <td class="btn btn-warning">Selesai</td>  
      @else
      <td>error</td>
      @endif
      </h4>
  </div>
</div>
</div>
</body>
<style>
.topp{
  margin-bottom:50px !important;
}
.img-thumbnail{
    width:70px;
    height: 70px;
}
.card{
    color:white;
 background-color:#28a745;
}
</style>
</html>