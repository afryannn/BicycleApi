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
  <div class="row">
    <div class="col">
    <div class="table-responsive">
    <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">email</th>
                <th scope="col">merk</th>
                <th scope="col">gambar</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach($data as $value)
            <td>{{$value->count()}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->merk}}</td>
            <td><img src="http://192.168.43.237:8000/api/image/1604203783.jpg" class="img-thumbnail" alt="{{ $value->gambar }}" /></td>
            <td>{{$value->tanggaltransaksi}}</td>
            <td>{{$value->status}}</td>
            @endforeach
            </tbody>
            </table>

    </div>
    </div>
  </div>
</div>
    
</div>
</body>
<style>
.img-thumbnail{
    width:80px;
    height: 80px;
}
</style>
</html>