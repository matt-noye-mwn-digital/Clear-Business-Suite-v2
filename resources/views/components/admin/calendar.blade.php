<div id="calendar"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap5', // important!
            headerToolbar:  {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            events: {!! json_encode($events) !!},
            eventClick: function(event) {
                window.location.href = event.url;
            }
        })
        calendar.render()
    })
</script>
