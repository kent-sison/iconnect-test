        <header id="main-header">
            <div class="container">
                <div class="top-header clearfix">
                    <h1 id="page-logo"><a href="/"><img src="{{ URL::to('/assets/img/iconnect-logo.png') }}" alt="Page Logo"></a></h1>
                    <ul class="primary-menu">
                        <!-- <li><a href="/">Home</a></li> -->
                        <li><a href="{{ route('home') }}"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
                        <li class="reload-nav"><a href="{{ route('reload') }}"><span>Buy Load</span></a></li>
                        <li><a target="_blank" href="https://iconnectmobile.co">My Mobile Account</a></li>
                        <li><a target="_blank" href="https://selfcare.iconnectguam.com:8443/SelfCare/pages/login/login.faces">My LTE Account</a></li>
                        <li><a href="{{ route('contact') }}">Connect With Us</a></li>
                        <!-- <li><a href="about-us">About Us</a></li> -->
                    </ul>
                    <div id="secondary-menu-toggle" class="nav-menu-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <a href="#" class="user-icon hidden-lg hidden-md"><i class="fa fa-user fa-fw fa-2x"></i></a>

                    <ul class="mylte-dropdown hidden-lg hidden-md">
                        <li><a target="_blank" href="https://iconnectmobile.co">My Mobile Account</a></li>
                        <li><a target="_blank" href="https://selfcare.iconnectguam.com:8443/SelfCare/pages/login/login.faces">My LTE Account</a></li>
                    </ul>

                    <div id="mobile-menu-toggle" class="mobile-menu-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>                   
                </div>
            </div>
            <nav class="page-nav" role="navigation">
                <div class="top-menu menu-collapse">
                    <div class="container">
                        <ul class="secondary-menu">
                            <li class="has-dropdown">
                                <a href="https://www.valuemobileguam.com" target="_blank">Value Mobile</a>
                                <ul class="dropdown">
                                    <li><a href="apps">Mobile App</a></li>
                                    <li><a href="https://www.valuemobileguam.com/my_account" target="_blank">My Account</a></li>
                                    <li><a href="https://www.valuemobileguam.com/my_account/signup" target="_blank">Sign Up Now</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="iphone_x"><span>i</span>Phone</a>
                                <ul class="dropdown">
                                    <li><a href="iphone_weborder">Buy iPhone X</a></li>
                                    <li><a href="iphone_x">iPhone X</a></li>
                                    <li><a href="iphone_8">iPhone 8 and 8 Plus</a></li>
                                    <li><a href="iphone_comparison">iPhone Comparison</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="lte-true-4g">MIFI</a>
                                <ul class="dropdown">
                                    <li><a target="_blank" href="https://selfcare.iconnectguam.com:8443/SelfCare/pages/login/login.faces">My LTE Account</a></li>
                                    <li><a href="lte-true-4g">About iConnect LTE True 4G</a></li>
                                    <li><a href="/reload">iConnect E-Load</a></li>
                                    <li><a href="lte-true-4g_postpaid-plans">LTE Postpaid Plans</a></li>
                                    <li><a href="lte-true-4g_coverage-map">Coverage Map</a></li>
                                    <li><a href="lte-true-4g_faq">FAQs</a></li>
                                    <li><a href="how-to-reload_lte-prepaid">How to Reload LTE Prepaid</a></li>                                    
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="advanced">Mobile</a>
                                <ul class="dropdown">
                                    <li><a target="_blank" href="https://iconnectmobile.co">My Mobile Account</a></li>
                                    <li><a href="apps">Mobile App</a></li>
                                    <li><a href="devices">Advanced Phones</a></li>
                                    <li><a href="advanced">About iConnect Advanced</a></li>
                                    <li><a href="reload">iConnect E-Load</a></li>
                                    <li><a href="advanced_postpaid-plans">Postpaid Plans</a></li>
                                    <li><a href="advanced_prepaid-plans">Prepaid Plans</a></li>
                                    <li><a href="advanced_coverage-map">Coverage Map</a></li>
                                    <li><a href="how-to-reload_advanced-prepaid">How to Reload Advanced Prepaid</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="push-to-talk">2-Way Radios</a>
                                <ul class="dropdown">
                                    <li><a href="push-to-talk">About iConnect Push-To-Talk</a></li>
                                    <li><a href="push-to-talk_postpaid-plans">PTT Postpaid Plans</a></li>
                                    <li><a href="long-distance-rates">Long Distance Rates</a></li>
                                    <li><a href="push-to-talk_coverage-map">Coverage Map</a></li>
                                    <li><a href="push-to-talk_faq">FAQs</a></li>
                                </ul>
                            </li>
                            <li><a href="apps">Mobile App</a></li>
                            <li><a href="events-and-promos">Events &amp; Promos</a></li>
                            <li><a href="support">Support</a></li>
                            <!-- <li><a href="work-with-us">Work With Us</a></li> -->
                            <li><a href="http://www.iconnectsaipan.com" target="_blank">Saipan</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>