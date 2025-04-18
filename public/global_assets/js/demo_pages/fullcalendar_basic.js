/* ------------------------------------------------------------------------------
 *
 *  # Fullcalendar basic options
 *
 *  Demo JS code for extra_fullcalendar_views.html and extra_fullcalendar_styling.html pages
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var FullCalendarBasic = function() {


    //
    // Setup module components
    //

    // Basic calendar
    var _componentFullCalendarBasic = function() {
        if (!$().fullCalendar) {
            console.warn('Warning - fullcalendar.min.js is not loaded.');
            return;
        }

        // Add demo events
        // ------------------------------

        // Default events
        var events = [
            {
                title: 'All Day Event',
                start: '2025-04-01'
            },
            {
                title: 'Long Event',
                start: '2025-04-07',
                end: '2025-04-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2025-04-11',
                end: '2025-04-13'
            },
            {
                title: 'Meeting',
                start: '2025-04-12T10:30:00',
                end: '2025-04-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2025-04-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2025-04-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2025-04-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2025-04-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2025-04-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2025-04-28'
            }
        ];

        // Event colors
        var eventColors = [
            {
                title: 'All Day Event',
                start: '2025-04-01',
                color: '#EF5350'
            },
            {
                title: 'Long Event',
                start: '2025-04-07',
                end: '2025-04-10',
                color: '#26A69A'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-09T16:00:00',
                color: '#26A69A'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-16T16:00:00',
                color: '#5C6BC0'
            },
            {
                title: 'Conference',
                start: '2025-04-11',
                end: '2025-04-13',
                color: '#546E7A'
            },
            {
                title: 'Meeting',
                start: '2025-04-12T10:30:00',
                end: '2025-04-12T12:30:00',
                color: '#546E7A'
            },
            {
                title: 'Lunch',
                start: '2025-04-12T12:00:00',
                color: '#546E7A'
            },
            {
                title: 'Meeting',
                start: '2025-04-12T14:30:00',
                color: '#546E7A'
            },
            {
                title: 'Happy Hour',
                start: '2025-04-12T17:30:00',
                color: '#546E7A'
            },
            {
                title: 'Dinner',
                start: '2025-04-12T20:00:00',
                color: '#546E7A'
            },
            {
                title: 'Birthday Party',
                start: '2025-04-13T07:00:00',
                color: '#546E7A'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2025-04-28',
                color: '#FF7043'
            }
        ];

        // Event background colors
        var eventBackgroundColors = [
            {
                title: 'All Day Event',
                start: '2025-04-01'
            },
            {
                title: 'Long Event',
                start: '2025-04-07',
                end: '2025-04-10',
                color: '#DCEDC8',
                rendering: 'background'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-06T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2025-04-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2025-04-11',
                end: '2025-04-13'
            },
            {
                title: 'Meeting',
                start: '2025-04-12T10:30:00',
                end: '2025-04-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2025-04-12T12:00:00'
            },
            {
                title: 'Happy Hour',
                start: '2025-04-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2025-04-24T20:00:00'
            },
            {
                title: 'Meeting',
                start: '2025-04-03T10:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2025-04-13T07:00:00'
            },
            {
                title: 'Vacation',
                start: '2025-04-27',
                end: '2025-04-30',
                color: '#FFCCBC',
                rendering: 'background'
            }
        ];


        // Initialization
        // ------------------------------

        // Basic view
        $('.fullcalendar-basic').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            // defaultDate: 'today',
            // editable: true,
            // events: events,
            // eventLimit: true,
            // isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });

        // Agenda view
        $('.fullcalendar-agenda').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2025-04-12',
            defaultView: 'agendaWeek',
            editable: true,
            businessHours: true,
            events: events,
            isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });

        // List view
        $('.fullcalendar-list').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'listDay,listWeek,listMonth'
            },
            views: {
                listDay: { buttonText: 'Day' },
                listWeek: { buttonText: 'Week' },
                listMonth: { buttonText: 'Month' }
            },
            defaultView: 'listMonth',
            defaultDate: '2025-04-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: events,
            isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });

        // Event colors
        $('.fullcalendar-event-colors').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2025-04-12',
            editable: true,
            events: eventColors,
            isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });

        // Event background colors
        $('.fullcalendar-background-colors').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2025-04-12',
            editable: true,
            events: eventBackgroundColors,
            isRTL: $('html').attr('dir') == 'rtl' ? true : false
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentFullCalendarBasic();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    FullCalendarBasic.init();
});
