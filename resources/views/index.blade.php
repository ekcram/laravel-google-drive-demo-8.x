<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class=" container row">
                <div class="col-md-12">
                    <form action="/put" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="file" name="thing" id="thing" class="form-control">
                        <br><br>
                        <input type="submit" class="btn btn-info" value="Subir archivo">
                    </form>
                </div>
            </div>
            <br><br>
            <div class="container row">
                <div class="col-12 md">
                    @foreach($projects as $project)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$project->name}}</h5>
                            <h5 class="card-title">{{$project->file_path}}</h5>
                            <p class="card-text">{{$project->description}}</p>
                            <p class="card-text">{{$project->user_id}}</p>
                            <a href="/get/{{$project->id}}" class="btn btn-primary">Descargar</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
