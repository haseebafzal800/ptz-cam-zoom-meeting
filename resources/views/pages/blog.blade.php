@extends('layouts.default')
@section('content')
<div class="blog-page" id="blog-page wrapper">
@include('includes.header')
<div class="blog-banner mb-5 py-lg-5 position-relative">
    <div class="container">
        <div class="row p-5">
            <div class="col-12 col-md-6 text-center text-md-start mb-5">
                <h1 class="position-relative mb-5 pb-4">Inside knowledge from our experts</h1>
                <p>We are a software-as-a-service company that provides an auto-trading platform for common investors.</p>
                <a class="btn custom-btn" href="#">See more below</a>
            </div>
            <div class="col-12 col-md-6">
                <div class="image-container">
                    <img src="images/blog-banner-vector.png" alt="vector" class="img-fluid mx-auto d-block"/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recents-items p-4 py-lg-5" >
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="item d-flex flex-row justify-content-center align-items-center mb-4">
                    <div class="img-container">
                        <img src="images/blog-item1.png" alt="items" class="img-fluid mx-auto d-block"/>
                    </div>
                    <div class="item-data">
                        <h3>Words of industry wisdom, from our</h3>
                        <span>28 September, 2022</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="item d-flex flex-row justify-content-center align-items-center mb-4">
                    <div class="img-container">
                        <img src="images/blog-item2.png" alt="items" class="img-fluid mx-auto d-block"/>
                    </div>
                    <div class="item-data">
                        <h3>Words of industry wisdom, from our </h3>
                        <span>28 September, 2022</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="item d-flex flex-row justify-content-center align-items-center mb-4">
                    <div class="img-container">
                        <img src="images/blog-item3.png" alt="items" class="img-fluid mx-auto d-block"/>
                    </div>
                    <div class="item-data">
                        <h3>Words of industry wisdom, from our</h3>
                        <span>28 September, 2022</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recent-post py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2>
                    Recent Posts
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                    </svg>
                </h2>
            </div>
            <div class="col-12 d-none d-lg-block mb-5">
                <div class="card card1 d-flex justify-content-between p-4">
                    <div class="card-text">
                        <span>Featured Post</span>
                        <p class="pt-4">Google Data Studio: <br> Everything You Need to <br>Know</p>
                    </div>
                    <div class="text-start text-white">
                        <a>Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="card card1 d-flex justify-content-between p-4">
                    <div class="card-text">
                        <span>Featured Post</span>
                        <p class="pt-4">Google Data Studio: <br> Everything You Need to <br>Know</p>
                    </div>
                    <div class="text-start text-white">
                        <a>Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="card card1 d-flex justify-content-between p-4">
                    <div class="card-text">
                        <span>Featured Post</span>
                        <p class="pt-4">Google Data Studio: <br> Everything You Need to <br>Know</p>
                    </div>
                    <div class="text-start text-white">
                        <a>Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="card card1 d-flex justify-content-between p-4">
                    <div class="card-text">
                        <span>Featured Post</span>
                        <p class="pt-4">Google Data Studio: <br> Everything You Need to <br>Know</p>
                    </div>
                    <div class="text-start text-white">
                        <a>Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="trending-blogs py-lg-5">
    <div class="container">
        <div class="row mb-5 d-none d-md-flex">
            <div class="col-12 col-md-6">
                <h2>Directory of Trending Blogs</h2>
            </div>
        </div>
        <div class="row mb-5 d-none d-md-flex">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs1.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs2.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs3.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="mb-4 text-center weekly-newsletter d-flex flex-column justify-content-center py-5 px-4">
                    <h3 class="mb-4 pt-4">Subscribe to our Weekly Newsletter</h3>
                    <p class="mb-5">The Blog Will give you information The Blog Will give you Blog Will give </p>
                    <a class="btn custom-btn mb-4" href="#">See more below</a>
                    <a class="btn custom-btn mb-4" href="#">See more below</a>
                </div>
            </div>
            <div class="col-12 col-lg-8 d-none d-lg-flex">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/blog-subscribe-vector.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>BLOCKCHAIN</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech <br> Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5 d-none d-md-flex">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs1.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs2.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card1 mb-4">
                    <img class="card-img" src="images/trending-blogs3.png"/>
                    <div>
                        <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                            <div class="button">
                                <a>WEB</a>
                            </div>
                            <div class="author d-flex flex-row gap-4">
                                <p>Lorem 12</p>
                                <p>8 min read</p>
                            </div>
                        </div>
                        <div class="card-text px-4">
                            <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                            <p>The Blog Will give you information about Launch Your Next Big FinTech Empire With The Guide Inside</p>
                        </div>
                    </div>
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