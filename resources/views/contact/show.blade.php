<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
</head>
<body>

    <div>
        <form action="/contact" method="POST">
            @csrf
            <label> Enter your Email</label>

            <div>
                <input type="email" name="email">
                @error('email')
                    <div class="text-red-500-xs">{{$message}}</div>
                @enderror
            </div>

            <button type="submit">Submit</button>

            <div>
                @if(session('message'))
                    {{session('message')}}
                @endif
            </div>

        </form>
    </div>

</body>
</html>
