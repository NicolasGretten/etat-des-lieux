<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <form action="{{route('create')}}" method="post" enctype="multipart/form-data">
        <h3 class="text-center mb-5">Upload File in Laravel</h3>
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <input class="form-control" type="text" name="titre" />
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <select class="form-control" name="type_id" id="type">
                <option value="">--Please choose an option--</option>
                <option value="1">Appartement</option>
                <option value="2">Maison</option>
                <option value="3">Villa</option>
                <option value="4">Studio</option>
            </select>
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <select class="form-control" name="ville_id" id="ville">
                <option value="">--Please choose an option--</option>
                <option value="1">Paris</option>
                <option value="2">Lyon</option>
                <option value="3">Marseille</option>
                <option value="4">Nancy</option>
                <option value="5">Strasbourg</option>
            </select>
            <label for="nbPieces" class="col-sm-6 col-form-label">Nombre de pièces</label>
            <input class="form-control" type="text" name="nbPieces" />
            <label for="surface" class="col-sm-2 col-form-label">Surface</label>
            <input class="form-control" type="number" name="surface" />
            <label for="photo" class="col-sm-2 col-form-label">Image</label>
            <input type="file" name="photo" class="form-control-file" id="photo">
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Files
        </button>
    </form>
</div>

</body>
</html>
