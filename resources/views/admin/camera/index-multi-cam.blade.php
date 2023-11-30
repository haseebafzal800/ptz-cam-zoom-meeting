@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
<link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.18.0/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.18.0/css/react-select.css" />
    
    <style>
        .content-header{
        display: none;
    }
        #camera-main{
            background-color: #e9e9e9;
        }
        
        button:focus{
            outline: none;
        }
        .camera-changing-button{
            color: #000;
            background-color: lightgray;
            padding: 10px 60px;
            border: none;
        }
        .camera-changing-button:hover{
            background-color: darkgray;
            color: #fff;
        }
        .camera-control-button{
            width: 33%;
            text-align: center;
        }
        .camera-control-button button{
            background-color: transparent;
            border: 1px solid transparent;
            padding: 20px 0px;
        }
        .camera-control-button button:focus{
            border: 1px solid transparent;
            outline: none;
        }
        .camera-control-button button:hover svg{
            fill: lightgray;
        }
        .form-control:focus{
            border-color: transparent;
            box-shadow: none;
        }
        input:checked{
            color: red;
            background-color: red;
        }
        .camera-button-bar-container{
            gap: 20px;
        }
        .camera-changing-button:active{
            background-color: #6e6969 !important;
        }
        @media only screen and (min-width: 991.98px){
            .camera-changing-button {
                padding: 10px 40px;
            }
        }
        @media only screen and (min-width: 1219.98px){
            .camera-button-bar-container{
                gap: 0px;
            }
        }
        
        .camera-button-bar-container .active{
            background-color: #6e6969;
            color: #fff;

        }
        /* #zmmtg-root{
            width: 50% !important;
        } */

 /* new code by frontend dev  */

.main-sidebar .sidebar{
    width: 100%;
}
.sidebar-collapse{
    position: relative;
}
.wrapper{
    position: unset;
}
#camera-main{
    display: none;
}
#camera-main .container{
    width: 100%;
}
.content-wrapper{
    position: absolute;
    z-index: 1;
    background-color: transparent !important;
}
.showcontrol
{
    position: fixed;
    z-index: 64;
    display: block !important;
    top: 50px;
    right: 0;
    min-height: 85%;
    overflow-y: scroll;
    overflow-x: hidden;
    width: 170px;
}
.camera-control-button button{
    padding: 0px;
}
.camera-control
{
    position: fixed;
    top: 60px;
    left: 10px;
    background-color: #e9e9e940;
    border-radius: 50%;
    color: #000;
    z-index: 999;
    width: 50px;
    height: 50px;
}
.camera-control:hover{
    background-color: #e9e9e9;
}
#camera-main ,
.camera-changing-button {
    background-color: transparent !important;
}
.camera-button-bar-container
{
    flex-direction: column !important;
    flex-wrap: nowrap !important;
}
.camera-button-bar{
    display: flex !important;
    justify-content: end !important;
    position: absolute;
    right: 0px;
    top: 0px;
    background-color: #000;
    z-index: 9;
    width: 160px;
    height: 50%;
    overflow-y: scroll;
}
.camera-button-bar button{
    background-color: #000 !important;
    color: #fff !important;
}
.camera-controls-container{
    position: fixed;
    bottom: 50px;
    left: 0;
    right: 0;
    width: 350px;
    margin: 0 auto;
    background-color: #0000005c;
    color: #fff;
    border-radius: 10px 10px 0px 0px;
    padding: 10px 20px;
    z-index: 2;
}
.camera-controls-container svg{
    color: #fff;
    fill: #fff;
}
.camera-zoom-control{
    flex-direction: column;
    width: max-content;
    padding: 10px 0px;
}
.select-items-bar
{
    position: absolute;
    right: 0;
    top: 50%;
    background-color: #000;
    height: 50%;
    overflow-y: scroll;
    width: 160px;
}
.setting-button
{
    position: fixed;
    top: 120px;
    left: 5px;
    background-color: #e9e9e940 !important;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.setting-button:hover{
    background-color: #e9e9e9 !important;
}
.video-avatar__avatar-footer , .modal-backdrop{
    display: none !important;
}
#zmmtg-root .more-button__pop-menu{
    left: -200px !important;
}
#whiteboardWindow{
    height: 540px !important;
    overflow: hidden !important;
}
#zmmtg-root .meeting-client #wc-container-right{
    height: 95% !important;
    top: 50px !important;
}
.meeting-info-container--left-side{
    left: 90px !important;
    top: 60px !important;
}
#notificationManager{
    top: 60px !important;
}
.camera-button-bar-container .active {
    background-color: #6e6969 !important;
    color: #fff !important;
}
.hide1 {
  display: none !important;
}

    </style>
    <script>
        $("button.footer-button-base__button").click(function(){
            $("#camera-main").removeClass("showcontrol");
        });
    </script>   
    <script>
        function myFunction() {
            var element = document.getElementById("camera-main");
            element.classList.toggle("showcontrol");
        }
    </script>
<button  onclick="myFunction()" class="camera-control">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
    </svg>
</button>
<button class="setting-button border-0 bg-transparent ml-2"
        data-toggle="modal" 
        data-target="#basicModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000" class="bi bi-gear-fill" viewBox="0 0 16 16">
        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
    </svg>
</button>
<div class="row camera-controls-container d-flex justify-content-between hide1">
    <div class="col-2">
        <div class="row border-right" style="height: 100%; display: flex; justify-content: start; align-items: center;">
            <div class="col-12">
                <div class=" camera-control-button">
                    <button data-action="zoomout" class="cameraZoom zoom-out-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM136 184c-13.3 0-24 10.7-24 24s10.7 24 24 24H280c13.3 0 24-10.7 24-24s-10.7-24-24-24H136z"/></svg>
                    </button>
                </div>
            </div>
            <div class="col-12">
                <div class=" camera-control-button">
                    <button data-action="zoomin" class="cameraZoom zoom-in-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM184 296c0 13.3 10.7 24 24 24s24-10.7 24-24V232h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H232V120c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="row" style="height: 100%; display: flex; justify-content: end; align-items: center;">
            <div class="col-12 d-flex justify-content-center camera-control-button">
                <button data-action="up" class="cameraAction up-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 23 24" fill="none" style="transform: rotate(90deg);">
                        <path d="M11.5 22.4474L1.55261 11.9474L11.5 1.44739L11.5 8.07897L21.4473 8.07897L21.4473 15.8158L11.5 15.8158L11.5 22.4474Z" fill="white" stroke="#fff" stroke-width="2.21053" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <div class="col-4 d-flex justify-content-end camera-control-button p-0">
                <button data-action="left" class="cameraAction left-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 23 24" fill="none">
                        <path d="M11.5 22.4474L1.55261 11.9474L11.5 1.44739L11.5 8.07897L21.4473 8.07897L21.4473 15.8158L11.5 15.8158L11.5 22.4474Z" fill="white" stroke="#fff" stroke-width="2.21053" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <div class="col-4 d-flex justify-content-center camera-control-button py-2">
                <button data-action="home" class="cameraAction home-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                        <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                    </svg>
                </button>
            </div>
            <div class="col-4 d-flex justify-content-start camera-control-button p-0">
                <button data-action="right" class="cameraAction right-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 23 24" fill="none">
                        <path d="M11.4999 22.4474L21.4473 11.9474L11.4999 1.44739L11.4999 8.07897L1.55253 8.07897V15.8158H11.4999V22.4474Z" fill="white" stroke="#fff" stroke-width="2.21053" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <div class="col-12 d-flex justify-content-center camera-control-button">
                <button data-action="down" class="cameraAction down-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 25 23" fill="none">
                        <path d="M2 11.9474L12.5 21.8948L23 11.9474H16.3684V2.00004H8.63158V11.9474H2Z" fill="white" stroke="#fff" stroke-width="2.21053" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>    
    </div>
    <div class="col-2">
        <div class="row border-left" style="height: 100%; display: flex; justify-content: end; align-items: center;">
            <div class="col-12 d-flex justify-content-center">
                <div class=" camera-control-button">
                    <button data-action="focusin" class="cameraFocus minus-button">
                        <svg width="30" height="30" viewBox="0 0 40 44" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.7499 18.8174H14.7883C14.3038 18.8174 13.8391 19.0099 13.4965 19.3525C13.1539 19.6951 12.9614 20.1598 12.9614 20.6443C12.9614 21.1288 13.1539 21.5935 13.4965 21.9361C13.8391 22.2787 14.3038 22.4712 14.7883 22.4712H25.7499C26.2344 22.4712 26.6991 22.2787 27.0417 21.9361C27.3843 21.5935 27.5768 21.1288 27.5768 20.6443C27.5768 20.1598 27.3843 19.6951 27.0417 19.3525C26.6991 19.0099 26.2344 18.8174 25.7499 18.8174Z" fill="#fff"/>
                            <line x1="38.5385" y1="17.5385" x2="38.5385" y2="1.46153" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="23.9231" y1="1.46156" x2="40" y2="1.46156" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="18.0769" y1="1.46154" x2="1.99998" y2="1.46154" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="1.99989" y1="17.5385" x2="1.99989" y2="-7.69328e-06" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(0 1 1 0 40 26.3076)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(1 0 0 -1 23.9231 40.923)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(-1 0 0 1 18.0769 43.8462)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="17.5385" y2="-1.46154" transform="matrix(4.37114e-08 1 1 -4.37114e-08 3.46143 26.3076)" stroke="#fff" stroke-width="2.92308"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="camera-control-button">
                    <button data-action="focusin" class="cameraFocus plus-button">
                        <svg width="30" height="30" viewBox="0 0 40 44" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_11_264)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8077 16.8077C18.8077 16.4201 18.9617 16.0484 19.2358 15.7743C19.5099 15.5002 19.8816 15.3462 20.2692 15.3462H21.7308C22.1184 15.3462 22.4902 15.5002 22.7643 15.7743C23.0383 16.0484 23.1923 16.4201 23.1923 16.8077V19.7308H26.1154C26.503 19.7308 26.8748 19.8848 27.1489 20.1589C27.423 20.433 27.5769 20.8047 27.5769 21.1923V22.6539C27.5769 23.0415 27.423 23.4133 27.1489 23.6873C26.8748 23.9614 26.503 24.1154 26.1154 24.1154H23.1923V27.0385C23.1923 27.4261 23.0383 27.7979 22.7643 28.072C22.4902 28.3461 22.1184 28.5 21.7308 28.5H20.2692C19.8816 28.5 19.5099 28.3461 19.2358 28.072C18.9617 27.7979 18.8077 27.4261 18.8077 27.0385V24.1154H15.8846C15.497 24.1154 15.1253 23.9614 14.8512 23.6873C14.5771 23.4133 14.4231 23.0415 14.4231 22.6539V21.1923C14.4231 20.8047 14.5771 20.433 14.8512 20.1589C15.1253 19.8848 15.497 19.7308 15.8846 19.7308H18.8077V16.8077Z" fill="#fff"/>
                            </g>
                            <line x1="38.5385" y1="17.5385" x2="38.5385" y2="1.46153" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="23.9231" y1="1.46156" x2="40" y2="1.46156" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="18.0769" y1="1.46154" x2="1.99998" y2="1.46154" stroke="#fff" stroke-width="2.92308"/>
                            <line x1="1.99989" y1="17.5385" x2="1.99989" y2="-9.60063e-06" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(0 1 1 0 40 26.3077)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(1 0 0 -1 23.9231 40.9231)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="16.0769" y2="-1.46154" transform="matrix(-1 0 0 1 18.0769 43.8462)" stroke="#fff" stroke-width="2.92308"/>
                            <line y1="-1.46154" x2="17.5385" y2="-1.46154" transform="matrix(4.37114e-08 1 1 -4.37114e-08 3.46143 26.3077)" stroke="#fff" stroke-width="2.92308"/>
                            <defs>
                            <clipPath id="clip0_11_264">
                            <rect width="17.5385" height="17.5385" fill="white" transform="translate(12.2307 13.1539)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="camera-main" class="wrapper" style="padding: 0px; overflow: hidden;">
        <div class="container">
            <div class="camera-main-contaienr py-3">
                <div class="row main-heading-bar mb-2">
                    <div class="col-11 d-flex justify-content-end align-items-center">
                        <button class="reset-button border-0 bg-transparent d-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                              </svg>
                        </button>
                    </div>
                </div>
                <div class="row camera-button-bar">
                    <div class="col-12 d-flex justify-content-center flex-wrap camera-button-bar-container p-4">
                        <button class="camera-changing-button camera-changing-button1 active border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam1']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam1
                        </button>
                        <button class="camera-changing-button camera-changing-button2 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam2']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam2
                        </button>
                        <button class="camera-changing-button camera-changing-button3 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam3']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam3
                        </button>
                        <button class="camera-changing-button camera-changing-button4 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam4']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam4
                        </button>
                        <button class="camera-changing-button camera-changing-button5 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam5']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam5
                        </button>
                        <button class="camera-changing-button camera-changing-button6 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam6']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam6
                        </button>
                        <button class="camera-changing-button camera-changing-button7 border-bottom p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam7']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam7
                        </button>
                        <button class="camera-changing-button camera-changing-button8 p-0 d-flex flex-column justify-content-center align-items-center py-2" title="{{$_COOKIE['cam8']??'No Camera'}}">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 51 47" fill="none">
                                <path d="M30.4088 0.00254077C31.4085 0.00246089 32.3909 0.262671 33.2586 0.757388C34.1263 1.25211 34.8492 1.96416 35.3557 2.823L37.4314 6.3473H42.7125C44.91 6.3473 47.0176 7.217 48.5717 8.76514C50.1259 10.3133 50.9993 12.4131 51 14.6029V38.7419C51 39.8264 50.7856 40.9002 50.3692 41.9021C49.9527 42.9041 49.3422 43.8144 48.5726 44.5813C47.8031 45.3481 46.8895 45.9564 45.884 46.3714C44.8785 46.7864 43.8008 47 42.7125 47H8.2875C6.08952 47 3.98156 46.13 2.42735 44.5813C0.873145 43.0326 0 40.9321 0 38.7419V14.6029C0 12.4127 0.873145 10.3122 2.42735 8.7635C3.98156 7.21481 6.08952 6.34476 8.2875 6.34476H13.5915L15.8227 2.72644C16.3358 1.89357 17.0545 1.20564 17.9103 0.728325C18.7661 0.251014 19.7304 0.000258496 20.7111 0L30.4088 0.00254077ZM25.5 13.9676C22.4566 13.9676 19.5379 15.1723 17.386 17.3166C15.234 19.461 14.025 22.3693 14.025 25.4019C14.025 28.4345 15.234 31.3428 17.386 33.4872C19.5379 35.6315 22.4566 36.8362 25.5 36.8362C28.5434 36.8362 31.4621 35.6315 33.614 33.4872C35.766 31.3428 36.975 28.4345 36.975 25.4019C36.975 22.3693 35.766 19.461 33.614 17.3166C31.4621 15.1723 28.5434 13.9676 25.5 13.9676ZM25.5 17.779C26.5046 17.779 27.4994 17.9762 28.4275 18.3593C29.3557 18.7424 30.199 19.3039 30.9094 20.0117C31.6197 20.7196 32.1832 21.5599 32.5677 22.4848C32.9521 23.4096 33.15 24.4009 33.15 25.4019C33.15 26.403 32.9521 27.3942 32.5677 28.319C32.1832 29.2439 31.6197 30.0842 30.9094 30.7921C30.199 31.4999 29.3557 32.0614 28.4275 32.4445C27.4994 32.8276 26.5046 33.0248 25.5 33.0248C23.4711 33.0248 21.5253 32.2216 20.0906 30.7921C18.656 29.3625 17.85 27.4236 17.85 25.4019C17.85 23.3802 18.656 21.4413 20.0906 20.0117C21.5253 18.5822 23.4711 17.779 25.5 17.779Z" fill="#fff"/>
                            </svg>
                            Cam8
                        </button>
                    </div>
                </div>

                <div class="row select-items-bar">
                    <div class="col-12 d-flex justify-content-center">
                        <form>
                            <?php /* <div class="row d-flex justify-content-center text-center text-dark">
                                <div class="col-12 col-lg-8 d-flex flex-row justify-content-center align-items-baseline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label" for="flexRadioDefault1">Set </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked/>
                                        <label class="form-check-label" for="flexRadioDefault2">Recall</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label" for="flexRadioDefault1">Auto Focus</label>
                                    </div>
                                </div>
                                <div class="col-10 col-lg-8 pt-3">
                                    <div class="form-group text-left">
                                        <label class="" for="formControlRange">Zoom In / Out</label>
                                        <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                </div>
                                <div class="col-10 col-lg-8 pt-3">
                                    <div class="form-group text-left">
                                        
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#basicModalLiveStream" data-url="{{ @url('meeting/getLiveStreamInfo/'.request()->segment(2)) }}" id="formControlRangeLiveStream">Live Streaming</a>
                                    </div>
                                </div>
                            </div> */ ?>
                            <div class="row d-flex justify-content-center camera-zoom-control flex-wrap " >
                                <div class="col-12">
                                    <div class="form-group text-center ">
                                        <label class="text-white" for="exampleFormControlSelect1">Pan Speed</label>
                                        <select class="form-control pan-select" id="exampleFormControlSelect1">
                                            @for($pan=1;$pan<=24;$pan++)
                                                <option {{$pan==10?'SELECTED':''}} value="{{$pan}}">{{$pan}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-center ">
                                        <label class="text-white" for="exampleFormControlSelect1">Tilt Speed</label>
                                        <select class="form-control tilt-select" id="exampleFormControlSelect1">
                                            @for($tilt=1;$tilt<=20;$tilt++)
                                                <option {{$tilt==10?'SELECTED':''}} value="{{$tilt}}">{{$tilt}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-center ">
                                        <label class="text-white" for="exampleFormControlSelect1">Zoom Speed</label>
                                        <select class="form-control zoom-select" id="exampleFormControlSelect1">
                                            @for($zoom=1;$zoom<=7;$zoom++)
                                                <option {{$zoom==5?'SELECTED':''}} value="{{$zoom}}">{{$zoom}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-center ">
                                        <label class="text-white" for="exampleFormControlSelect1">Focus Speed</label>
                                        <select class="form-control focus-select" id="exampleFormControlSelect1">
                                        @for($focus=1;$focus<=7;$focus++)
                                            <option {{$focus==5?'SELECTED':''}} value="{{$focus}}">{{$focus}}</option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-6 col-md-4 col-lg-2">
                                    <div class="form-group text-center ">
                                        <label class="text-dark" for="exampleFormControlSelect1">Present Speed</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>
    <!-- model -->
    <div class="modal" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Camera Settings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{@route('add-cam')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #1</label>
                                <input type="text" name="cam1" value="{{$_COOKIE['cam1']??''}}" class=" form-control form-input border ipv4 camera1" id="cam1" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #2</label>
                                <input type="text" name="cam2" value="{{$_COOKIE['cam2']??''}}" class="form-input form-control border ipv4 camera2" id="cam2" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #3</label>
                                <input type="text" name="cam3" value="{{$_COOKIE['cam3']??''}}" class="form-input form-control  border ipv4 camera3" id="cam3" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #4</label>
                                <input type="text" name="cam4" value="{{$_COOKIE['cam4']??''}}" class="form-input form-control  border ipv4 camera4" id="cam4" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #5</label>
                                <input type="text" name="cam5" value="{{$_COOKIE['cam5']??''}}" class="form-input form-control  border ipv4 camera5" id="cam5" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #6</label>
                                <input type="text" name="cam6" value="{{$_COOKIE['cam6']??''}}" class="form-input form-control  border ipv4 camera6" id="cam6" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #7 </label>
                                <input type="text" name="cam7" value="{{$_COOKIE['cam7']??''}}" class="form-input form-control  border ipv4 camera7" id="cam7" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Camera #8</label>
                                <input type="text" name="cam8" value="{{$_COOKIE['cam8']??''}}" class="form-input form-control  border ipv4 camera8" id="cam8" 
                                placeholder="xxx.xxx.xxx.xxx"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- model -->
    <!-- model live streaming -->
    <div class="modal fade" id="basicModalLiveStream" tabindex="-1" role="dialog" aria-labelledby="basicModalLiveStream" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Live Streaming Settings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{@route('live-stream')}}">
                @csrf
                <input type="hidden" name="meeting_id" value="{{request()->segment(2)}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Youtube Streaming Key</label>
                                <input type="text" name="streamingKey" value="" class=" form-control form-input border streamingKey" id="streamingKey" 
                                placeholder="Youtube Streaming Key"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Streaming URL</label>
                                <input type="text" name="streamingUrl" value="" class="form-input form-control border streamingUrl" id="streamingUrl" 
                                placeholder=" Zoom Streaming URL"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Page URL</label>
                                <input type="text" name="pageUrl" value="" class="form-input form-control border pageUrl" id="pageUrl" 
                                placeholder=" Youtube Page URL"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Set Resolution</label>
                                <input type="text" name="streamingResolution" value="" class="form-input form-control border streamingResolution" id="streamingResolution" 
                                placeholder="720p, 1080p etc"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <audio id="audioPlayer" class="hide" src="{{@url('audio/myaudio.mp3')}}"></audio>
    <!-- model -->
    <!-- @include('includes.admin.footer') -->
  @include('includes.admin.scripts')
  <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script>
    var ipv4_address = $('.ipv4');
    ipv4_address.inputmask({
        alias: "ip",
        greedy: false //The initial mask shown will be "" instead of "-____".
    });

    $(document).ready(function () {
        $('body').addClass('sidebar-collapse');
        //live streaming info
        $('#formControlRangeLiveStream').click(function(){
            var url = $(this).data('url');
            $.get(url, {}, function(response){
                resp = response;
                console.log(resp);
            });
        }) // live streaimg info
        $('.camera-changing-button').click(function(){
            $('.camera-changing-button').removeClass('active');
            $(this).addClass('active');
        })

        $('.cameraAction').mousedown(function(){
            let action = $(this).attr('data-action')+'&'+$('.pan-select').val()+'&'+$('.tilt-select').val()
            cameraAction(action);
        })
        $('.cameraZoom').mousedown(function(){
            let action = $(this).attr('data-action')+'&'+$('.zoom-select').val();
            cameraAction(action);
        })
        $('.cameraFocus').mousedown(function(){
            let action = $(this).attr('data-action')+'&'+$('.focus-select').val();
            cameraAction(action);
        })

        $('.cameraAction').mouseup(function(){
            cameraAction('ptzstop')
        })
        $('.cameraZoom').mouseup(function(){
            cameraAction('zoomstop')
        })
        $('.cameraFocus').mouseup(function(){
            cameraAction('focusstop')
        })
        $("#camera-control").on("click", function () {
            // Play the audio
            // $("#audioPlayer")[0].play();
        });

    });
    function displayMessage(message) {
        toastr.success(message, 'Event');
    } 

    function displayError(message) {
        toastr.error(message, 'Error!');
    } 
    function ValidateIPaddress(ipaddress) {  
    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress)) {  
        return (true)  
    }else{
        return (false)  
        }  
    }

    function cameraAction(action){
        var ip = $('button.active').attr('title');

        if(ValidateIPaddress(ip)){
            var APIURL = 'http://'+ip+'/cgi-bin/ptzctrl.cgi?ptzcmd&';
            $.get(APIURL+action, {}, function(){
                
            })
        }else{
            displayError("Camera not found");
        }
        // http://[camera ip]/cgi-bin/ptzctrl.cgi?ptzcmd&[action]&[pan speed]&[tilt speed]
    }
    
</script>

<script src="https://source.zoom.us/2.18.0/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-2.18.0.min.js"></script>
<script src="{{@url('/zoom/js/tool.js')}}"></script>
<script src="{{@url('/zoom/js/vconsole.min.js')}}"></script>
<script src="{{@url('/zoom/js/meeting.js')}}"></script>
<script>
    $(document).ready(function () {
        document.on("click", ".footer-chat-button", function (e) {
            alert('smeg');
        });
    });
</script>
  @stop




<!-- basic modal -->


