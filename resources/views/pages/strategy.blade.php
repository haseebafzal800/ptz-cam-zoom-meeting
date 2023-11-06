@extends('layouts.default')
@section('content')
<div id="wrapper strategy-page" class="strategy-page">
@include('includes.header')
<div class="strategy-page-section mb-5 px-lg-5">
            <div class="container">
                <div class="strategy-page-inside">        
                    <div class="row ">
                        <div class="col-12 col-md-6 col-lg-6 d-flex flex-column justify-content-center">
                            <div class="mb-3 strategy-page-1 text-center text-md-start mb-5 mb-md-0">
                                <div class="strategy-us-text text-center text-md-start">
                                    <h1>Strategies <span>and</span> Performance</h1> 
                                </div>
                                <p>We offer a unique set of automated Equity, Options, and Futures trading strategies to help the common investor realize the value of
                                    diversification. These strategies are represented along with their associated performance metrics, helping investors like you choose confidently when considering alternative investment options.
                                    </p>
                                <a class="btn custom-btn" href="#">See how it works</a>
                                <a class="btn custom-btn strategy-button " href="#">Join us <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> </a>
                            </div>
                        </div> 
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="strategy-us-image mb-3">
                                <div class="strategy-us-image-section mb-3">
                                    <img src="images/strategy-page-vector.png" alt="image" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <div class="counter-section mb-5 pt-5 px-lg-5">
            <div class="container">
                <div class="counter-container">
                    <div class="row py-lg-5 text-center">
                        <div class="col-12 col-md-4  border-bottom">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="2265" data-speed="1500"></h2>
                                <p class="count-text ">Total Trades <br> Sent</p>
                              </div>
                        </div>
                        <div class="col-12 col-md-4  border-bottom border-custom">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="1459" data-speed="1500"></h2>
                                <p class="count-text ">Brokerage Accounts <br> Linked</p>
                              </div>
                        </div>
                        <div class="col-12 col-md-4 border-custom1">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="41602" data-speed="1500"></h2>
                                <p class="count-text ">Assets Under <br> Management</p>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="how-to-section mb-5 px-lg-5">
            <div class="container">
                <div class="how-to-container">
                    <div class="row py-5">
                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-12 mb-5 col-md-6 d-flex flex-column text-center justify-content-center text-md-start">
                                    <h2 class="mb-3">How to Sign-Up</h2>
                                    <p class="mb-5">We partner with a variety of individuals, organizations, and communities in providing the auto-trading services you see below. The subscriptions to these services are managed solely through our third-party partners. When browsing strategies and their associated
                                        performance metrics, if you find a strategy that is appealing, you may click on the ‘Subscribe’ link to get started. This will ultimately redirect you to the third-party’s website, where you can learn more about the particular partner, and ultimately establish a recurring subscription plan with the given Pilot.         
                                        <br>Please note: The subscription packages you will see advertised on these third-party sites do include both the membership fee, and the associated Stock Pilot automation fee. You will only be charged once by the third party, covering the cost of both service and automation fees. Stock Pilot will then later collect the automation fee via a monthly billing schedule with the provider.</p>
                                    <div>
                                        <a class="btn custom-btn w-50" href="#">Register Now</a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <img src="images/how-to-vector.png" class="img-fluid mx-auto d-block"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="review-section mb-5 px-lg-5">
            <div class="container">
                <div class="review-container">
                    <div class="row text-center">
                        <div class="col-12 mb-2">
                            <h2>How to <span> Review </span> Strategy</h2>
                        </div>
                        <div class="col-12 mb-2">
                            <img src="images/review-strategy-vector.png" alt="review" class="img-fluid mx-auto d-block"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-strategy mb-5 px-lg-5">
            <div class="container">
                <div class="featured-strategy-container">
                    <div class="row text-center">
                        <div class="col-12 mb-5">
                            <h2>Featured Strategies</h2>
                            <p>Browse our diverse set of equity, options, and futures trading strategies. Each published strategy will include a platform ranking, associated performance metrics, a blurb from the Pilot themselves, and a detailed view of the underlying performance data collected by the platform. Click the subscribe button to sign up on the third-party partner’s website. ( note may reword this on actual site once can click around/view but should get us started )</p>
                        </div>
                        <div class="col-12 p-0">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mb-4">
                                    <h2 class="accordion-header bg-transparent" id="headingOne">
                                        <button class="accordion-button p-3 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="row w-100 d-flex align-items-center">
                                                <div class="col-8">
                                                    <h4 class="mb-0">Stock Pilot Demo</h4>
                                                    <p class="mb-0 text-light">18 Subscribers</p>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <a class="btn custom-btn" href="#">Subscribe</a>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show border-top" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="text-light text-start">loren iosn adc us usdbic </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-4">
                                    <h2 class="accordion-header bg-transparent" id="headingTwo">
                                        <button class="accordion-button collapsed p-3 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <div class="row w-100 d-flex align-items-center">
                                                <div class="col-8">
                                                    <h4 class="mb-0">Market MastersTrading Fund</h4>
                                                    <p class="mb-0 text-light">18 Subscribers</p>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <a class="btn custom-btn" href="#">Subscribe</a>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse border-top" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="text-light text-start">loren iosn adc us usdbic </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-4">
                                    <h2 class="accordion-header bg-transparent" id="headingThree">
                                        <button class="accordion-button collapsed p-3 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <div class="row w-100 d-flex align-items-center">
                                                <div class="col-8">
                                                    <h4 class="mb-0">Saddlebrook Funds</h4>
                                                    <p class="mb-0 text-light">18 Subscribers</p>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <a class="btn custom-btn" href="#">Subscribe</a>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse border-top" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="text-light text-start">loren iosn adc us usdbic </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-4">
                                    <h2 class="accordion-header bg-transparent" id="headingfour">
                                        <button class="accordion-button collapsed p-3 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                            <div class="row w-100 d-flex align-items-center">
                                                <div class="col-8">
                                                    <h4 class="mb-0">RipTrade</h4>
                                                    <p class="mb-0 text-light">18 Subscribers</p>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <a class="btn custom-btn" href="#">Subscribe</a>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapsefour" class="accordion-collapse collapse border-top" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="text-light text-start">loren iosn adc us usdbic </p>
                                        </div>
                                    </div>
                                </div>
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
                            <h2>How are <span>Strategies</span> Ranked?</h2>
                            <b>Want to learn more about how investment performance is tracked and ranked on the platform?</b>
                            <p> Download the whitepaper to learn more about the pre-flight & platform rankings, how these rankings are derived from the Global Investment Performance Standards ( GIPS ), and how trade data is collected on the platform.</p>
                            <a class="btn custom-btn">Download White Paper PDF</a>
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