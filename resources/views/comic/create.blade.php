<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Enter new comic</h1>
        <form action="{{ route('comics.store') }}" method="post">
            @csrf
            <div>
                <label for="thumb" class="form-label">Image</label>
                <input type="text" class="form-control" id="thumb" name="thumb">
            
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div>
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>
            <div>
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <div>
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div>
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
            </div>
    
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>