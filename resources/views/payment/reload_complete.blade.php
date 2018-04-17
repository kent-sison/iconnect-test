@extends('common.master')

@section('page-content')

<section class="blue-gradient padded-top">

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="text-center well">

                    <h2>Thank you for purchasing</h2>
                    <h3> {{ $card }} </h3>
                    <img src="{{ route('card_gen') }}?t={{$card_type}}&s={{$card_details['serial_number']}}&p={{$card_details['pin']}}" alt="Card Details"/>
                
                    <h5>Serial Number: {{ $card_details['serial_number'] }}</h5>
                    <h5>Pin: {{ $card_details['pin'] }}</h5>
        
                </div>
            </div>

        </div>
    </div>

</section>

@endsection