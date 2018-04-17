<html>
    <head>
        <style>
            h1, h2, h3, h4, h5, h6 {
                font-family:Arial, sans-serif;
                color:rgb(51,51,51);
            }    
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row">
    
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center well">
    
                        <h2> Thank you for purchasing</h2>
                        <h3> {{ $card }}</h3>
                        <img src="{{ $server_name }}/getCard?t={{$card_type}}&s={{$card_details['serial_number']}}&p={{$card_details['pin']}}" alt="Card Details"/>
                                
                        <h5>Serial Number: {{ $card_details['serial_number'] }}</h5>
                        <h5>Pin: {{ $card_details['pin'] }}</h5>
            
                    </div>
                </div>
    
            </div>
        </div>

    </body>

</html>