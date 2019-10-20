
<script src="<?php echo base_url().'assets/terapis/js/jquery.min.js'; ?>"></script>   
<script type="text/javascript" src="<?php echo base_url().'assets/terapis/js/moment.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/terapis/js/bootstrap.min.js'; ?>"></script>      
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/terapis/fullcalendar/fullcalendar.js'; ?>"></script>      
<script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,agendaDay'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    detail(event);
                },
                events: JSON.parse(get_data)
            });
    });


    function detail(event)
    {
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=description]').val(event.description);
        $('#create_modal input[name=telp]').val(event.telp);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }

</script>
</body>
</html>