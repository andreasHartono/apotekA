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
        <h2>LIST MEDICINE</h2>
        <table class="table table-hover">
            <thead>
               <tr>
                  <th>Nama</th>
                  <th>Bentuk</th>
                  <th>Formula</th>
                  <th>Harga</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $d)
               <tr>
                  <td>{{ $d->generic_name }}</td>
                  <td>{{ $d->form }}</td>
                  <td>{{ $d->restriction_formula }}</td>
                  <td>{{ $d->price }}</td>
               </tr>
               @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>
