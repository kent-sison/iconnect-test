@extends('common.master')

@section('page-content')
    <style>
        h3 {
            font-weight: bold;
        }
    </style>

    @include('contact.about')

    @include('contact.content')
    
    <div id="modal">

    </div>

    <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="trigger"> Modal </a>

    <script> 
        $(function () {
            $("#modal").iziModal({
                overlayClose:false,
                overlayColor: 'rgba(0, 0, 0, 0.6)'
            });


        });
       

        // $(document).on('click', '.trigger', function (event) {
        //     event.preventDefault();

        //     $("#modal").iziModal('open');
        // });
        
    </script>

    @include('contact.maps')

@endsection