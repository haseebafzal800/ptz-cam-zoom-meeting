@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')
<!-- body -->
<script>
    jQuery(window).on("load", function () {
        // $('#zmmtg-root').css('display', 'none');
    });
</script>
<style>
    #zmmtg-root{
        display: none !important;
    }
</style>
<?php //var_dump($meeting); ?>
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
                    <button type="submit" class="btn btn-primary btn-block" id="join_meeting"> Proceed </button>
                    <button type="submit" class="btn btn-primary" id="clear_all">Clear</button>
                    <button type="button" link="" onclick="window.copyJoinLink('#copy_join_link')"
                        class="btn btn-primary" id="copy_join_link">Copy Direct join link</button>


                </form>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>
@include('includes.admin.scripts')


<script src="https://source.zoom.us/2.18.0/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/2.18.0/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-2.18.0.min.js"></script>
<script src="{{@url('/zoom/js/tool.js')}}"></script>
<script src="{{@url('/zoom/js/vconsole.min.js')}}"></script>
<!-- <script src="{{@url('/zoom/js/index.js')}}"></script> -->

<script>
    window.addEventListener('DOMContentLoaded', function(event) {
  console.log('DOM fully loaded and parsed');
  websdkready();
});

function websdkready() {
  var testTool = window.testTool;
  if (testTool.isMobileDevice()) {
    vConsole = new VConsole();
  }
  console.log("checkSystemRequirements");
  console.log(JSON.stringify(ZoomMtg.checkSystemRequirements()));

  // it's option if you want to change the WebSDK dependency link resources. setZoomJSLib must be run at first
  // if (!china) ZoomMtg.setZoomJSLib('https://source.zoom.us/2.18.0/lib', '/av'); // CDN version default
  // else ZoomMtg.setZoomJSLib('https://jssdk.zoomus.cn/2.18.0/lib', '/av'); // china cdn option
  // ZoomMtg.setZoomJSLib('http://localhost:9999/node_modules/@zoomus/websdk/dist/lib', '/av'); // Local version default, Angular Project change to use cdn version
  ZoomMtg.preLoadWasm(); // pre download wasm file to save time.

//   var CLIENT_ID = "W6A4yNhTX2Zf44O2XGXjg";
  // var CLIENT_ID = "sGFjygBQhm24fxvP7XrXg";
  /**
   * NEVER PUT YOUR ACTUAL SDK SECRET OR CLIENT SECRET IN CLIENT SIDE CODE, THIS IS JUST FOR QUICK PROTOTYPING
   * The below generateSignature should be done server side as not to expose your SDK SECRET in public
   * You can find an example in here: https://developers.zoom.us/docs/meeting-sdk/auth/#signature
   */
//   var CLIENT_SECRET = "3pz8EyWHpPxWy9XvUZ06hWae5Xtdp2Bd";
  var CLIENT_ID = "<?=($zoomCreds->video_sdk_client_id??'')?>";
  var CLIENT_SECRET = "<?=($zoomCreds->video_sdk_client_secret??'')?>";

  // var CLIENT_SECRET = "XTY2FR4Rb4QeimcvU1ZaEAc1SSQ2ICQ4";

  // some help code, remember mn, pwd, lang to cookie, and autofill.
//   document.getElementById("display_name").value =
//     "CDN" +
//     ZoomMtg.getWebSDKVersion()[0] +
//     testTool.detectOS() +
//     "#" +
//     testTool.getBrowserInfo();
//   document.getElementById("meeting_number").value = testTool.getCookie(
//     "meeting_number"
//   );
//   document.getElementById("meeting_pwd").value = testTool.getCookie(
//     "meeting_pwd"
//   );
//   if (testTool.getCookie("meeting_lang"))
//     document.getElementById("meeting_lang").value = testTool.getCookie(
//       "meeting_lang"
//     );

  document
    .getElementById("meeting_lang")
    .addEventListener("change", function (e) {
      testTool.setCookie(
        "meeting_lang",
        document.getElementById("meeting_lang").value
      );
      testTool.setCookie(
        "_zm_lang",
        document.getElementById("meeting_lang").value
      );
    });
  // copy zoom invite link to mn, autofill mn and pwd.
  document
    .getElementById("meeting_number")
    .addEventListener("input", function (e) {
      var tmpMn = e.target.value.replace(/([^0-9])+/i, "");
      if (tmpMn.match(/([0-9]{9,11})/)) {
        tmpMn = tmpMn.match(/([0-9]{9,11})/)[1];
      }
      var tmpPwd = e.target.value.match(/pwd=([\d,\w]+)/);
      if (tmpPwd) {
        document.getElementById("meeting_pwd").value = tmpPwd[1];
        testTool.setCookie("meeting_pwd", tmpPwd[1]);
      }
      document.getElementById("meeting_number").value = tmpMn;
      testTool.setCookie(
        "meeting_number",
        document.getElementById("meeting_number").value
      );
    });

  document.getElementById("clear_all").addEventListener("click", function (e) {
    testTool.deleteAllCookies();
    document.getElementById("display_name").value = "";
    document.getElementById("meeting_number").value = "";
    document.getElementById("meeting_pwd").value = "";
    document.getElementById("meeting_lang").value = "en-US";
    document.getElementById("meeting_role").value = 0;
    window.location.href = "/index.html";
  });

  // click join meeting button
  document
    .getElementById("join_meeting")
    .addEventListener("click", function (e) {
      e.preventDefault();
      var meetingConfig = testTool.getMeetingConfig();
      if (!meetingConfig.mn || !meetingConfig.name) {
        alert("Meeting number or username is empty");
        return false;
      }

      
      testTool.setCookie("meeting_number", meetingConfig.mn);
      testTool.setCookie("meeting_pwd", meetingConfig.pwd);

      var signature = ZoomMtg.generateSDKSignature({
        meetingNumber: meetingConfig.mn,
        sdkKey: CLIENT_ID,
        sdkSecret: CLIENT_SECRET,
        role: meetingConfig.role,
        success: function (res) {
          console.log(res.result);
          meetingConfig.signature = res.result;
          meetingConfig.sdkKey = CLIENT_ID;
          var joinUrl = "/camera-settings?" + testTool.serialize(meetingConfig);
          // var joinUrl = "/meeting.html?" + testTool.serialize(meetingConfig);
          console.log(joinUrl);
          window.location.href = joinUrl;
        },
      });
    });

  function copyToClipboard(elementId) {
    var aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById(elementId).getAttribute('link'));
    document.body.appendChild(aux);  
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
  }
    
  // click copy jon link button
  window.copyJoinLink = function (element) {
    var meetingConfig = testTool.getMeetingConfig();
    if (!meetingConfig.mn || !meetingConfig.name) {
      alert("Meeting number or username is empty");
      return false;
    }
    var signature = ZoomMtg.generateSDKSignature({
      meetingNumber: meetingConfig.mn,
      sdkKey: CLIENT_ID,
      sdkSecret: CLIENT_SECRET,
      role: meetingConfig.role,
      success: function (res) {
        console.log(res.result);
        meetingConfig.signature = res.result;
        meetingConfig.sdkKey = CLIENT_ID;
        var joinUrl =
          testTool.getCurrentDomain() +
          "/meeting.html?" +
          testTool.serialize(meetingConfig);
        document.getElementById('copy_link_value').setAttribute('link', joinUrl);
        copyToClipboard('copy_link_value');
        
      },
    });
  };

}
</script>
  
@stop
