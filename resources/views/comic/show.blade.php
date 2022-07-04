<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
@include('comic.partials.header')
<body>
        <div class="container">
            <h2><a href="{{ route('comics.show', ['comic' => $comic->id]) }}">{{$comic->title}}</a></h2>
            <img src="{{$comic->thumb}}" alt="">
            <ul>
                <li><strong>Series:</strong> {{$comic->series}}</li>
                <li>{{$comic->type}}</li>
                <li><strong>Price $</strong> {{$comic->price}}</li>
                <li><strong>Publication date:</strong> {{$comic->sale_date}}</li>
                <li><strong>Description:</strong> {{$comic->description}}</li>
            </ul>
            <a class="btn btn-primary" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica</a>

            <form action="{{ route('comics.destroy', [ 'comic' => $comic->id ]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onClick="return confirm('You sure??');">Cancella</button>
            </form>
        </div>
</body>
</html>