<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Repository - Lux</title>
</head>
<body>
    <div class="container">
        <div>
            <h3>Repositorio Laravel & S3</h3>
        </div>
        <br>
        <div class="row">
            <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" id="" class="form-control">
                <button class="btn btn-success" type="submit">Cargar</button>
            </form>
        </div>
        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="row">
            @foreach($data as $item)
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $item->url }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('delete.image',['id'=>$item->id])}}" class="btn btn-primary">eliminar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>