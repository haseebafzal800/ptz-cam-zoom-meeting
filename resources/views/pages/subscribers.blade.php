@extends('layouts.default')
@section('content')
<div class="subscriber-page" id="subscriber-page wrapper">
@include('includes.header')
        <div class="subscriber-page-section mb-5 px-lg-5">
            <div class="container">
                <div class="subscriber-page-inside py-lg-5">        
                    <div class="row ">
                        <div class="col-12 col-md-6 col-lg-6r">
                            <div class="mb-3 subscriber-page-1 text-center text-md-start mb-5 mb-md-0">
                                <div class="subscriber-us-text text-center text-md-start">
                                    <h1>Add Alternative Investment Strategies to Your Portfolio!</h1> 
                                </div>
                                <p> Choose from various automated trading strategies to help you diversify your portfolio.</p>
                                <a class="btn custom-btn" href="#">Get Started</a>
                            </div>
                        </div> 
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="subscriber-us-image mb-3">
                                <div class="subscriber-us-image-section mb-3 mt-5">
                                    <img src="images/Subscription_banner_vector.png" alt="image" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <div class="how-it-work-section mb-5 px-lg-5">
            <div class="container">
                <div class="how-it-work-container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-start d-flex flex-column justify-content-center">
                            <h2>How it Works</h2>
                            <div class="d-flex justify-content-start center">
                                <p class="w-7">Watch a short video to learn more about the platform, how strategies are registered and ranked, and how you are able to subscribe
                                    your personal accounts to these strategies.</p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/pilot-section-main.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a class="btn custom-btn w-50">See Demo</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/pilot-section-main.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="get-started-section mb-5 px-lg-5">
            <div class="container">
                <div class="get-started-container">
                    <div class="row container_max">
                        <div class="col-12 text-center mb-5">
                            <h3>How to Get Started</h3>
                        </div>
                        <div class="col-12 d-flex flex-column justify-content-center">
                            <div class="slider slider-for get-started-slider">
                                <div class="card_ card1">
                                    <div class="card-heading">
                                        <h3><span>1. </span>Community and Membership:</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Browse a diverse set of strategies on our Strategies page, using the performance and rankings to help
                                            you make an informed decision. After you’ve subscribed to your chosen strategy, you will receive an access link used for registration via email from access@stockpilot.app.
                                        </p>
                                    </div>
                                </div>
                                <div class="card_ card2">
                                    <div class="card-heading">
                                        <h3><span>2. </span>Brokerages And Approvals</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Choose from one of our supported brokerages ( found here [link to partners page] ), where you can create and fund a new personal brokerage or retirement account. Be sure to verify and apply for the proper level of Options trading approval required
                                            for the strategy. This information can be found via the Pilot’s third-party website, or by contacting Stock Pilot customer support.
                                        </p>
                                    </div>
                                </div>
                                <div class="card_ card3">
                                    <div class="card-heading">
                                        <h3><span>3. </span>Registeration</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Now equipped with a newly funded brokerage account and Stock Pilot access link, registration is a simple three step
                                            process: Terms of Service, confirming your subscribed strategies, and authorizing Stock Pilot to interact with your brokerage account on
                                            your behalf.    
                                        </p>
                                    </div>
                                </div>
                                <div class="card_ card4">
                                    <div class="card-heading">
                                        <h3><span>4. </span>Automation Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Once registration is complete, you are able to configure your automation settings, sit back, and enjoy the many
                                            benefits of autotrading!   
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="subscriber-features-section mb-5 px-lg-5">
            <div class="container">
                <div class="subscriber-features-container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2>Subscriber Features</h2>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center mb-5">
                            <h3>Strategies & Performance</h3>
                            <div class="d-flex justify-content-start">
                                <p class="w-7"> Subscribe to alternative investments with confidence by knowing the historical performance and derived performance ranking of
                                    available strategies on the platform. These rankings are loosely based on the Global Investment Performance Standards ( GIPS ), used for
                                    comparison of investment performance around the world. If the higher level rankings are not enough, you can view the detailed strategy
                                    performance by viewing the detailed view, viewing the actual metrics used in comparisons by firms globally.</p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/strategies-performance-mobile.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/strategies-performance-ventor.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 col-md-6">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/possition-sizing-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center mb-5">
                            <h3>Position Sizing</h3>
                            <div class="d-flex justify-content-start">
                                <p class="w-7"> Subscribers may utilize one of three position sizing features: CopyDirect, AutoScale, or TradeOverride. These features allow position sizing to be based on a direct 1-1 copy from the model account, scaled proportionally to varying account size values to utilize additionally available capital, or to override and use a discrete trading amount in each trade order that is placed, respectively. We think the autoscaling feature is neat.
                                </p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/possition-sizing-mobile.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center mb-5">
                            <h3>Strategy Amounts</h3>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">Once a Position Sizing function is selected, users may additionally allocate a certain portion of their personal account, depending on
                                    the scaling function selected. This may include no strategy amounts for CopyDirect, either one of ‘full account’ or ‘account percentage’ ( e.g.
                                    50% of account dedicated to the strategy ) for the AutoScale feature, or one TradeOverride amount, represented in dollars ( $ )</p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/strategy-amount-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/strategy-amount-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 col-md-6 mb-5 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/possitionOrder-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3> Positions and Orders</h3>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">  Easily view positions and orders placed by the automation in real-time by switching between the positions and orders tab in your
                                    alternative strategy portfolio.
                                    </p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/possitionOrder-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="strategy-ranked mb-5 px-lg-5">
            <div class="container">
                <div class="ranked-container">
                    <div class="row py-5 justify-content-center">
                        <div class="col-12 col-md-10 text-center d-flex gap-4 flex-column align-items-center">
                            <h2>Want to Learn More About Active Options and Futures Trading?</h2>
                            <p>Check out our educational section, where we help new investors learn about how these <span>alternative strategies may compare to what is</span>>
                                typically provided by financial institutions</p>
                            <a class="btn custom-btn">Download PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="notification-system-seection mb-5 px-lg-5">
            <div class="container">
                <div class="notification-system-container">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3>Notification System</h3>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/notification-system-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">Your favorite Discord, Telegram, Twitter, and Facebook communities will automatically be updated of events on the autotraded
                                    accounts via AlertBot, and subscribers may also receives notifications directly to their mobile device via the SMS network.
                                </p>    
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/notification-system-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sms-configuration-section mb-5 px-lg-5">
            <div class="container">
                <div class="sms-configuration-container">
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/sms-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-start d-flex flex-column justify-content-center">
                            <h3>SMS Confirmation</h3>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/sms-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">
                                    We optionally provide an SMS trade confirmation mechanism, which if enabled, requires the subscriber to approve of each
                                    automated trade order, via a unique SMS authorization link that is sent to the subscriber directly via the SMS network. Subscribers may opt
                                    out of this confirmation mechanism by toggling the feature to off in the ‘Advanced Settings’ tab found with their strategy automation settings.
                                    Please note: Orders staged with the trade confirmation mechanism will have an associated trade expiry that will render the specific order
                                    invalid after the configured period of time, so users must be attentive in order to respond to confirmation links
                                </p>    
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="socials-section mb-5 px-lg-5">
            <div class="container">
                <div class="socials-container">
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/social-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3>Socials</h3>
                            <div class="d-block d-md-none how-it-work-img">
                                <img src="images/social-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">
                                    Take part in online discussions with connected social communities, allowing you to collaborate and find a new sense of inclusion.
                                </p>    
                            </div>
                            <div>
                                <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="browse-our-section mb-5 px-lg-5">
            <div class="container">
                <div class="browse-our-container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-start d-flex flex-column justify-content-center">
                            <h3>Browse our Strategies and Get Started Today!</h3>
                            <div class="d-flex justify-content-start center">
                                <p class="w-7">
                                    Check out our Strategies & Performance page to find an alternative investment best suited for you.
                                </p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-5">
                                <img src="images/browse-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a class="btn custom-btn" href="#">Get Started</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/browse-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hear-more-section mb-5">
            <div class="hear-more-container">
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="d-none d-md-block how-it-work-img">
                            <img src="images/hearmore.png" alt="image" class="img-fluid mx-auto d-block"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start d-flex flex-column justify-content-center">
                        <h3 class="px-4">Want to Hear More About the Subscriber Experience?</h3>
                        <div class="d-flex justify-content-start center">
                            <p class="w-7">
                                Check out this quick video to get an overview of how to choose a strategy and get started with social auto-trading
                            </p>    
                        </div>
                        <div class="d-block d-md-none how-it-work-img mb-5">
                            <img src="images/hearmore.png" alt="image" class="img-fluid mx-auto d-block"/>
                        </div>
                        <div>
                            <a class="btn custom-btn" href="#">Download Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
    @stop