<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

    
    <form action="/create" method="post">
    @csrf
    <label for="stud_name"></label>
        <input type="text" name="stud_name">
        <button type="submit">Submit</button>
    </form>
</body>
</html>