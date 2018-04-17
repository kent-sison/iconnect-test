<div id="contact" class="offset">

    <div class="row">

        <div class="col-md-12">
        
            <header class="main-heading">
                <h2 class="text-center text-uppercase">Contact Us</h2>
            </header>
        
        </div>

    </div>

    <div class="row padded-bottom">

        <div class="col-lg-12">

            @include("common.error")

            <form class="shake" role="form" id="cont">
                @csrf
                @if(session('holder') != NULL)
                    
                    <div class="alert alert-success">
                        <div style="text-align:center;">
                            {{ session('holder') }}
                        </div>
                    </div>
                
                @endif

                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="message" rows="5" name="message" required placeholder="Enter your message"></textarea>
                    <div class="help-block with-errors"></div>
                </div>

                <div style="text-align:center;margin-bottom: 20px;">
                    <div class="g-recaptcha" data-sitekey="6LcQaFEUAAAAANAHYxjcTuP7LB-KDGnhLX-0iWXd" style="display:inline-block;"></div> 
                    <noscript> 
                        <div style="width: 302px; height: 352px;"> 
                            <div style="width: 302px; height: 352px; position: relative;"> 
                                <div style="width: 302px; height: 352px; position: absolute;"> 
                                    <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcQaFEUAAAAANAHYxjcTuP7LB-KDGnhLX-0iWXd" frameborder="0" scrolling="no" style="width: 302px; height:352px; border-style: none;"> 
                                    </iframe> 
                                </div> 
                                <div style="width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0; padding: 0; right: 25px;"> 
                                    <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0; padding: 0; resize: none;"></textarea> 
                                </div> 
                            </div> 
                        </div> 
                    </noscript>
                    <input type="submit" class="orange-button" value="Submit" id="form-submit" />
                    <script type="text/javascript">
                        $("form").submit(function() {
                            $(this).attr({
                                "action":"contactus",
                                "method":"POST"
                            });
                        });
                        $(document).on('opening', '#modal')
                    </script>
                </div>

            </form>

        </div>

    </div>
    
    <div id="modal">
    </div>

</div>