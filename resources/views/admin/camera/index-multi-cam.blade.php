@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
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

    </style>
    <div id="camera-main" class="wrapper">
        <div class="container">
            <div class="camera-main-contaienr py-3">
                <div class="row main-heading-bar mb-2 py-4">
                    <div class="col-11 d-flex justify-content-end align-items-center">
                        <button class="reset-button border-0 bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                              </svg>
                        </button>
                        <button class="setting-button border-0 bg-transparent ml-2"
                                data-toggle="modal" 
                                data-target="#basicModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                            </svg>
                        </button>
                        

<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Camera Settings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #1</label>
                        <input type="text" class=" form-control form-input border ipv4 camera1" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #2</label>
                        <input type="text" class="form-input form-control border ipv4 camera2" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #3</label>
                        <input type="text" class="form-input form-control  border ipv4 camera3" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #4</label>
                        <input type="text" class="form-input form-control  border ipv4 camera4" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #5</label>
                        <input type="text" class="form-input form-control  border ipv4 camera5" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #6</label>
                        <input type="text" class="form-input form-control  border ipv4 camera6" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #7 </label>
                        <input type="text" class="form-input form-control  border ipv4 camera7" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Camera #8</label>
                        <input type="text" class="form-input form-control  border ipv4 camera8" id="ipv4" name="ipv4" 
                        placeholder="xxx.xxx.xxx.xxx"/>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


                    </div>
                </div>
                <div class="row camera-button-bar">
                    <div class="col-12 d-flex justify-content-center flex-wrap camera-button-bar-container">
                        <button class="camera-changing-button">Cam1</button>
                        <button class="camera-changing-button">Cam2</button>
                        <button class="camera-changing-button">Cam3</button>
                        <button class="camera-changing-button">Cam4</button>
                        <button class="camera-changing-button">Cam5</button>
                        <button class="camera-changing-button">Cam6</button>
                        <button class="camera-changing-button">Cam7</button>
                        <button class="camera-changing-button">Cam8</button>
                    </div>
                </div>
                <div class="row camera-controls-container py-4">
                    <div class="col-12 d-flex flex-row flex-wrap justify-content-center">
                        <div class="camera-control-button">
                            <button class="plus-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="up-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="minus-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-dash" viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="camera-control-button">
                            <button class="left-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="camera-control-button">
                            <button class="home-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="right-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="zoom-in-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000" class="bi bi-zoom-in" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="down-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>
                        <div class=" camera-control-button">
                            <button class="zoom-out-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#000" class="bi bi-zoom-out" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                    <path fill-rule="evenodd" d="M3 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row select-items-bar py-4">
                    <div class="col-12">
                        <form>
                            <div class="row d-flex justify-content-center text-center text-dark">
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
                            </div>
                            <div class="row d-flex justify-content-center flex-wrap py-4">
                                <div class="col-6 col-md-4 col-lg-2">
                                    <div class="form-group text-center ">
                                        <label class="text-dark" for="exampleFormControlSelect1">Pan Speed</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2">
                                    <div class="form-group text-center ">
                                        <label class="text-dark" for="exampleFormControlSelect1">Tilt Speed</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2">
                                    <div class="form-group text-center ">
                                        <label class="text-dark" for="exampleFormControlSelect1">Zoom Speed</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2">
                                    <div class="form-group text-center ">
                                        <label class="text-dark" for="exampleFormControlSelect1">Focus Speed</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2">
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
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>
    @include('includes.admin.footer')
  @include('includes.admin.scripts')
  <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js">
    </script>
    <script>
    var ipv4_address = $('.ipv4');
    ipv4_address.inputmask({
        alias: "ip",
        greedy: false //The initial mask shown will be "" instead of "-____".
    });

$(document).ready(function () {
    $('body').addClass('sidebar-collapse');
});
  </script>
  @stop




<!-- basic modal -->

