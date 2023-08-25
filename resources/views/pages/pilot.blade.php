@extends('layouts.default')
@section('content')
<div id="wrapper" class="pilot-page">
@include('includes.header')
<div class="banner p-banner text-center text-lg-start overflow-hidden position-relative mb-5 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="content-container text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                            <h1 class="banner-heading w-75 d-none d-md-block position-relative">Publish Your Trading Strategy</h1>
                            <h1 class="w-75 d-block d-md-none">Interpret Your Trade Analytics</h1>
                            <p class="w-75">Integrate a combination of brokerages, social platforms, memberships, and analytics all in one place to create your own hedge-fund
								style community!</p>
                            <a class="btn custom-btn" href="#">See how it works</a>
                        </div>
                    </div>
                    <div class="banner-image-container col-12 col-md-6 col-lg-6 ">
                        <div class="banner-image py-5">
                            <img src="images/pilot-banner-vector.png" class="img-fluid">
                        </div>
                        <div class="corner1 corner">
                            <span>Brokerages</span>
                            <p>Connect your personal trader and subscriber brokerage accounts from trusted firms.</p>
                        </div>
                        <div class="corner2 corner">
                            <span>Socials</span>
                            <p>Create a sense of inclusion by adding an online social community for collaboration and camaraderie.</p>
                        </div>
                        <div class="corner3 corner">
                            <span>Memberships</span>
                            <p> Directly manage subscriptions and member access to your service.</p>                                     
                        </div>
                        <div class="corner4 corner">
                            <span>Analytics</span>
                            <p>Give subscribers a sense of confidence with an on-platform performance ranking.</p>                 
                        </div>
                    </div> 
                </div> 
            </div>
        </div>

        <div class="strategy-performance-section mb-5 py-lg-5">
            <div class="container">
                <div class="strategy-performance-container">
                    <div class="row">    
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center text-md-start">
                            <h2 class="d-none d-md-block"> What’s a Pilot?</h2>
                            <h2 class="d-block d-md-none">Explore Our <br>Pilot</h2>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/pilot-section-main.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">
                                    Learn more about being a Pilot ( or registered strategy on the platform ) with the video to the right. We’ll give an overview of what
                                    types of Pilots are qualified, how strategy performance is tracked, and how rankings are determined for publishing on the Strategies page
                                </p>    
                            </div>
                            <div>
                                <a class="btn custom-btn" href="#">See Demo</a>
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

        <div class="dealing-section pilot-dealing-section mb-5 py-lg-5">
            <div class="container">
                <div class="dealing-section-container">
                    <div class="row">
                        <div class="col-12 dealing-section-header d-flex flex-column align-items-center text-center">
                            <h2 class="d-none d-md-block">Registering as a Pilot</h2>
                            <h2 class="d-block d-md-none">How Pilot deal with your <span>Analytics</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="col-12  col-md-5 d-flex flex-column justify-content-center">
                            <div class="dealing-img-container">
                                <img src="images/dealing-section-vector.png" alt="image1" class="d-none d-md-block img-fluid mx-auto"/>
                                <img src="images/dealing-section-img1.png" alt="image2"  class="d-block d-md-none img-fluid mx-auto"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 text-left p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="py-3 position-relative">Pre-Flight Ranking</h3>
                                    <p>When new traders register with the Stock Pilot platform, they are prompted to upload a copy of their personal transaction history data provided by their brokerage. </p>
                                    <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg> </a>
                                </div>
                                <div class="col-12 col-lg-6 p-3">
                                    <div class="dealing-card p-4">
                                        <span class="rounded-circle">2</span>
                                        <h4 class="mt-2">Platform Ranking</h4>
                                        <p>We use the Platform Ranking System to rank each Pilot.</p>
                                        <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                          </svg> </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 p-3">
                                    <div class="dealing-card p-4">
                                        <span class="rounded-circle">3</span>
                                        <h4 class="mt-2">Pilot Analytics</h4>
                                        <p>We use the Platform Ranking System to rank each Pilot.</p>
                                        <a href="#">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                          </svg> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pilot-features-section d-none d-lg-block">
            <div class="text-center mb-5 py-lg-5">
                <h2>Pilot Features</h2>
            </div>
            
            <div class="strategy-performance-seection mb-5 px-lg-5">
                <div class="container">
                    <div class="strategy-performance-container">
                        <div class="row">    
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                                <h3>Strategy Performance</h3>
                                <div class="d-block d-md-none how-it-work-img mb-4">
                                    <img src="images/pilot-strategy-performance-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <p class="w-7">The strategies page will provide a high level overview, including current rankings and overall strategy performance metrics for easy
                                        comparison against competing strategies. Additionally, you are able to view detailed views of strategy performance over time and across
                                         subscribed accounts, resembling the voluntary Global Investment Performance Standards ( GIPS ) used for firm comparison.                                    
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
                                    <img src="images/pilot-strategy-performance-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div> 
    
            <div class="dashboard-section mb-5 px-lg-5">
                <div class="container">
                    <div class="dashboard-container">
                        <div class="row"> 
                            <div class="col-12 col-md-6 ">
                                <div class="d-none d-md-block how-it-work-img">
                                    <img src="images/strategy-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                            </div>     
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                                <h3>Dashboard</h3>
                                <div class="d-block d-md-none how-it-work-img mb-4">
                                    <img src="images/strategy-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <p class="w-7">Easily submit simple to complex Equity, Options, and Futures trades, including up to 4 legged Options, with support for Single,
                                        Trigger, and One-Cancels-Other order types. Any orders placed on the platform are automatically fit to our structured alert templates and
                                        published to your members via SMS and social integrations automatically.
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
    
            <div class="positionsorders-section mb-5 px-lg-5">
                <div class="container">
                    <div class="positionsorders-container">
                        <div class="row">      
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                                <h3>Positions & Orders</h3>
                                <div class="d-block d-md-none how-it-work-img mb-4">
                                    <img src="images/pilot-strategy-performance-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <p class="w-7"> View subscriber-weighted calculations across all of the selected strategy's subscribed accounts, giving insight into costs,
                                        profit/losses, and quantities held, at both the instrument and subscribed account levels.                                    
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
                                    <img src="images/pilot-strategy-performance-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
      
        </div> 

        <div class="hedge-fund pilot-hedge-fund mb-5 py-lg-5 d-none d-lg-block">
            <div class="container">
                <div class="hedge-fund-container">
                    <div class="row py-5 justify-content-center">
                        <div class="col-12 col-md-10 text-center d-flex gap-4 flex-column align-items-center">
                            <h2>Create your own hedge fund style community!</h2>
                            <p> 
                                Book a call today to schedule a demo. Our community partners representative will walk you through the full platform from access link
                                to trade automation to alert post, where you can ask questions and even try out the trading simulator with subscribed accounts attached.
                            </p>
                            <a class="btn custom-btn">Book a call today !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="social-integrations-section pilot-social-section mb-5 py-lg-5 d-none d-lg-block">
            <div class="container">
                <div class="social-integrations-container">
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/social-integration-vector-pilot.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3>Social Integrations</h3>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/social-integration-vector-pilot.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">Connect with new or existing social communities on common platforms like Discord, Telegram, Twitter, and Facebook. Alerts from the
                                    auto-traded strategies will automatically post to the group via our AlertBot, and your members will build new friends and connections from
                                    their newly favorite online hangout.
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

        <div class="notification-system-seection mb-5 py-lg-5 d-none d-lg-block">
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

        <div class="Memberships-section pilot-mambership-section mb-5 py-lg-5 d-none d-lg-block">
            <div class="container">
                <div class="Memberships-container">
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/pilot-membership.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3>Memberships</h3>
                            <div class="d-block d-md-none how-it-work-img">
                                <img src="images/pilot-membership.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">
                                    The memberships tab is where you can manage your subscribers access, generate new access links, cancel subscriptions, and view
                                    contact details. We additionally offer API access to our subscription management services, enabling direct integration of third party website
                                    payment portals and payment processors to synchronize payment and subscription events, along with creation of newly subscribed access
                                    links.
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

        <div class="Subscription-seection pilot-subscription-section mb-5 py-lg-5 d-none d-lg-block">
            <div class="container">
                <div class="subscription-container">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3>Subscription</h3>
                            <div class="d-block d-md-none how-it-work-img mb-4">
                                <img src="images/pilot-subscription.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="w-7">Each subscribed account can connect to multiple of your published strategies. Simply toggle the access on if the given member has
                                    subscribed to the strategy. The emailed link will provide them unique access to only those strategies.
                                </p>    
                            </div>
                            <div>
                                <a href="#">Learn More<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                  </svg> 
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="d-none d-md-block how-it-work-img">
                                <img src="images/pilot-subscription.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="browse-our-section pilot-browse mb-5 py-lg-5 d-none d-lg-block">
            <div class="container">
                <div class="browse-our-container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-start d-flex flex-column justify-content-center">
                            <h3>Want to see how other communities have succeed?</h3>
                            <div class="d-flex justify-content-start center">
                                <p class="w-7">
                                    Check out our Strategies & Performance page to find an alternative investment best suited for you.
                                </p>    
                            </div>
                            <div class="d-block d-md-none how-it-work-img mb-5">
                                <img src="images/browse-vector.png" alt="image" class="img-fluid mx-auto d-block"/>
                            </div>
                            <div>
                                <a class="btn custom-btn" href="#">Check out our case studies !</a>
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

        <div class="hear-more-section pilot-hear mb-5 d-none d-lg-block py-lg-5">
            <div class="hear-more-container">
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <div class="d-none d-md-block how-it-work-img">
                            <img src="images/hearmore.png" alt="image" class="img-fluid mx-auto d-block"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start d-flex flex-column justify-content-center">
                        <h3 class="position-relative pt-5">Want to Hear More About the Subscriber Experience?</h3>
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