@extends('common.master')

@section('page-content')

<section class="blue-gradient padded-top">

    <div class="container">
        @include ('payment.partial_reload_head')
        
        

        <div class="row">
            
            <div class="col-md-5 col-md-offset-1 text-center">
                <figure>
                    <img src="/assets/img/reload/stacked.png" class="reload-card-1">
                </figure>
            </div>

            <div class="col-md-5 text-center">
                <figure>
                    <img src="/assets/img/reload/stacked-lte.png" class="reload-card-1" style="width:80%">
                </figure>
            </div>
            
            <div class="col-md-8 col-md-offset-2 padded-top">
                
                <div class="text-center well">
                    <div class="alert alert-warning">
                        All prepaid PIN purchases are <b>FINAL</b> and <b>NON-REFUNDABLE</b>.
                    </div>

                    @include('payment.partial_credit_card')
                    
                    <form name="confirmation_form" id="confirmation_form" method="post" action="reload" class="ws-validate">
                        @csrf
                        <div class="row form-row">
                            <div class="form-group col-md-8 col-md-offset-2">
                                <select form="confirmation_form" id="card_select" name="card_select" required class="form-control">
                                    <option value="">Please select a Reload Card...</option>
                                    @foreach($cards as $card)
                                        <option value="{{ $card->card_code }}">{{ $card->card_desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="checkbox_confirm">
                            <div class="alert alert-info"></div>
                            <div class="row form-row">
                                <div class="form-group checkbox">
                                    <label for="confirm_user"><input type="checkbox" required name="confirm_user"><span></span></label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-row padded-top">
                            <div class="form-group col-md-6 col-md-offset-3">
                                <input type="submit" name="confirm_submit" value="Confirm" class="btn btn-info btn-lg btn-block">
                            </div>
                        </div>
                    </form>

                    <p class="content-small-text text-center"><em>For instructions on how to use your reload card, click <a href="how-to-reload" class="orange-text" target="_blank">here</a>.</em></p>

                    @include('common.error')

                </div>
            </div>

        </div>

    </div>

    <div class="hidden" style="visibility:hidden;">
    
        <input type="hidden" id="c_a_10" value="{{ $c_a_10 }}" />
        <input type="hidden" id="c_a_20" value="{{ $c_a_20 }}" />
        <input type="hidden" id="c_l_20" value="{{ $c_l_20 }}" />

    </div>

    <script type="text/javascript" src="/assets/js/reload/reload.js"></script>

</section>

@endsection