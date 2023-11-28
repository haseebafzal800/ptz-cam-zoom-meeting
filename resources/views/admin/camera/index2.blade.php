@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
<!-- body -->
<script>
    jQuery(window).on("load", function () {
        $('#zmmtg-root').css('display', 'none');
        alert('page is loaded');
        setTimeout(function () {
            // document.getElementById("join_meeting").click();
        //     alert('page is loaded and 1 minute has passed');   
        }, 10000);

    });
    // $dunction()
    // document.getElementById("join_meeting").click();
</script>
<style>
    #zmmtg-root{
        display: none !important;
    }
</style>
<?php var_dump($meeting); ?>

@include('includes.admin.scripts')

<script src="https://source.zoom.us/2.18.0/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-2.18.0.min.js"></script>
<script src="{{@url('/zoom/js/tool.js')}}"></script>
<script src="{{@url('/zoom/js/vconsole.min.js')}}"></script>
<script src="{{@url('/zoom/js/index.js')}}"></script>

<script>
    jQuery(window).on("load", function () {
        alert('page is loaded');
        setTimeout(function () {
            // document.getElementById("join_meeting").click();
        //     alert('page is loaded and 1 minute has passed');   
        }, 10000);

    });
    // $dunction()
    // document.getElementById("join_meeting").click();
</script>
<!-- <script src="{{@url('/zoom/js/joinMeeting.js')}}"></script> -->
  
@stop
