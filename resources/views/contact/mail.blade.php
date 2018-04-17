<html>
    <head>
        <style>
            h1, h2, h3, h4, h5, h6, p {
                font-family:Arial, sans-serif;
                color:rgb(51,51,51);
            }    
        </style>
    </head>

    <body>
        <p>New Message from user, {{ $request->name }}

        <br>

        Email: {{ $request->email }}

        <br>

        With Message: {{ $request->message }}
        </p>
    </body>

</html>