<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kementrian Kesehatan Republik Indonesia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://isoman.kemkes.go.id/images/kemkes.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
   <div class="container">
      <h2>DAFTAR OBAT</h2>
       <table class="table table-hover">
          <thead>
             <tr>
               <th>Nama</th>
               <th>Form</th>
               <th>Formula</th>
               <th>Category Name</th>
               <th>Foto</th>
               <th>Price</th>
             </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
               <td>{{ $d->generic_name }}</td>
               <td>{{ $d->form }}</td>
               <td>{{ $d->restriction_formula }}</td>
               <td>{{ $d->category->name }}</td>
               <td><img src="{{ asset('assets/images/'.$d->image ) }}" height="150px"/></td>
               <td>{{ $d->price }}</td>
            </tr>
            @endforeach
          </tbody>
         
       </table>
   </div>
    <div class="container">
        <h2>DAFTAR OBAT</h2>
         <div class="row">
            @foreach ($data as $d)
            <div class="col-md-3"
               style="text-align:center;border:1px solid #999;margin:2px;padding:5px;border-radius:10px">
               <img src="{{ asset('assets/images/'.$d->image ) }}" height="150px"/><br>
               <a href="/medicines/{{ $d->id }}"><b>{{ $d->generic_name }}</b><br>{{ $d->form }}<br></a>
            </div>
            @endforeach
         </div>
    </div>
</body>

</html>
