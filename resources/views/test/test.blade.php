<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuma test doank</title>
</head>

<body>
    <form action="{{ route('midtrans.topup') }}" method="post">
        @csrf

        <input type="number" name="amount" id="amount">
        <input type="submit" value="submit">
    </form>
</body>

</html>
