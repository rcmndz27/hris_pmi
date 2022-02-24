document.addEventListener('DOMContentLoaded', function() {

    var date = new Date();

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    // headerToolbar: {
    //     left: 'prev,next today',
    //     center: 'title',
    //     right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    // },
    initialDate: new Date(),
    navLinks: true, // can click day/week names to navigate views
    nowIndicator: true,

    weekNumbers: false,
    weekNumberCalculation: 'ISO',

    editable: true,
    selectable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    // events: [
    //     {
    //     title: 'All Day Event',
    //     start: '2020-09-01'
    //     },
    //     {
    //     title: 'Long Event',
    //     start: '2020-09-07',
    //     end: '2020-09-10'
    //     },
    //     {
    //     groupId: 999,
    //     title: 'Repeating Event',
    //     start: '2020-09-09T16:00:00'
    //     },
    //     {
    //     groupId: 999,
    //     title: 'Repeating Event',
    //     start: '2020-09-16T16:00:00'
    //     },
    //     {
    //     title: 'Conference',
    //     start: '2020-09-11',
    //     end: '2020-09-13'
    //     },
    //     {
    //     title: 'Meeting',
    //     start: '2020-09-12T10:30:00',
    //     end: '2020-09-12T12:30:00'
    //     },
    //     {
    //     title: 'Lunch',
    //     start: '2020-09-12T12:00:00'
    //     },
    //     {
    //     title: 'Meeting',
    //     start: '2020-09-12T14:30:00'
    //     },
    //     {
    //     title: 'Happy Hour',
    //     start: '2020-09-12T17:30:00'
    //     },
    //     {
    //     title: 'Dinner',
    //     start: '2020-09-12T20:00:00'
    //     },
    //     {
    //     title: 'Birthday Party',
    //     start: '2020-09-13T07:00:00'
    //     },
    //     {
    //     title: 'Click for Google',
    //     url: 'http://google.com/',
    //     start: '2020-09-28'
    //     }
    // ]
    });

    calendar.render();

  });