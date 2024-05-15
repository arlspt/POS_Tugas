<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploaded Image</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Uploaded Image</h2>
        <hr>
        <p>Gambar berhasil diupload ke <a href="{{ $pathPublic }}">{{ $filename }}</a></p>
        <img src="{{ $imageUrl }}" alt="Uploaded Image" width="500px" class="img-fluid">
    </div>
</body>
</html>
