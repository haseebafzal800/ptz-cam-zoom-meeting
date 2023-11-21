@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
<!-- body -->
<nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Zoom WebSDK CDN</a>
            </div>
            <div id="navbar" class="websdktest">
                <form class="navbar-form navbar-right" id="meeting_form">
                    <div class="form-group">
                        <input type="text" name="display_name" id="display_name" value="Insha Jee" maxLength="100"
                            placeholder="Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_number" id="meeting_number" value="{{$meeting->zoom_meeting_id}}" maxLength="200"
                            style="width:150px" placeholder="Meeting Number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_pwd" id="meeting_pwd" value="{{$meeting->meeting_password}}" style="width:150px"
                            maxLength="32" placeholder="Meeting Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="meeting_email" id="meeting_email" value="{{$meeting->host_email}}" style="width:150px"
                            maxLength="32" placeholder="Email option" class="form-control">
                    </div>

                    <div class="form-group">
                        <select id="meeting_role" class="sdk-select">
                            <option value=0>Attendee</option>
                            <option selected value=1>Host</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="meeting_china" class="sdk-select">
                            <option selected value=0>Global</option>
                            <option value=1>China</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="meeting_lang" class="sdk-select">
                            <option selected value="en-US">English</option>
                            <option value="de-DE">German Deutsch</option>
                            <option value="es-ES">Spanish Español</option>
                            <option value="fr-FR">French Français</option>
                            <option value="jp-JP">Japanese 日本語</option>
                            <option value="pt-PT">Portuguese Portuguese</option>
                            <option value="ru-RU">Russian Русский</option>
                            <option value="zh-CN">Chinese 简体中文</option>
                            <option value="zh-TW">Chinese 繁体中文</option>
                            <option value="ko-KO">Korean 한국어</option>
                            <option value="vi-VN">Vietnamese Tiếng Việt</option>
                            <option value="it-IT">Italian italiano</option>
                        </select>
                    </div>

                    <input type="hidden" value="" id="copy_link_value" />
                    <button type="submit" class="btn btn-primary" id="join_meeting">Join</button>
                    <button type="submit" class="btn btn-primary" id="clear_all">Clear</button>
                    <button type="button" link="" onclick="window.copyJoinLink('#copy_join_link')"
                        class="btn btn-primary" id="copy_join_link">Copy Direct join link</button>


                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>
@include('includes.admin.scripts')
<script>
	$(document).ready(function() {
		$('#join_meeting').click();
	})
</script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-2.18.0.min.js"></script>
<script src="{{@url('zoom/js/tool.js')}}"></script>
<script src="{{@url('zoom/js/vconsole.min.js')}}"></script>
<script src="{{@url('zoom/js/index.js')}}"></script>
  
@stop
