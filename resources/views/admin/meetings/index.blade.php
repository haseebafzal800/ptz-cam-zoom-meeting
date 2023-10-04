@extends('layouts.admin.default')
@section('content')
@include('includes.admin.breadcrumb')

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div id='calendar'></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('includes.admin.footer')
  @include('includes.admin.scripts')
  @include('includes.admin.fullcalander')
  <style>
    .content-header{
        display: none;
    }
    nav.main-header{
        /* display: none; */
    }
  </style>
<script>
$(document).ready(function () {
$('body').addClass('sidebar-collapse');
   
var SITEURL = "{{ url('/') }}";
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/meetings",
                    displayEventTime: false,
                    editable: true,
                    slotDuration: '00:30:00',
                    // defaultView: "agendaWeek",
                    // header: {
                    //     left: "prev,next",
                    //     center: "title",
                    //     right: "month,agendaDay,agendaWeek,dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                    // },
                    eventLimit: true,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    selectable: true,
                    allDayDefault: false,

                    selectHelper: true,
                    select: function (start, end, allDay) {
                        /*if(start.isBefore(moment())) {
                            $('#calendar').fullCalendar('unselect');
                            displayError('Operation not allowed in previous dates', 'Error !');
                            return false;
                        }*/
                        var title = prompt('Event Title:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    displayMessage("Event Created Successfully");
  
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        },true);
  
                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
 
                });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 

function displayError(message) {
    toastr.error(message, 'Error!');
} 
  
</script>
  
@stop
