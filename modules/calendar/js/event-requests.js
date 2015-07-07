function persistToFalse(id) {

  $.ajax({
      url: 'modules/calendar/event_update.php',
      method: 'POST',
      data: {
        id: id,
        action: 'persistToFalse'
      },
      dataType: 'json'
    });
}

function addEvent(event) {
   $.ajax({
      url: 'modules/calendar/event_update.php',
      method: 'POST',
      data: {
        title: event[0].textContent,
        color: event[0].style.backgroundColor,
        // persist: '1',
        action: 'add'
      },
      dataType: 'json'
  })
   .done(function(result){
    var last_id = result;
    event.attr('id', last_id);
   });
}

function eventResize(event, end){
  $.ajax({
      url: 'modules/calendar/event_update.php',
      method: 'POST',
      data: {
        title: event.title,
        color: event.color,
        end: end,
        // end: event._end._d,
        id: event.id,
        // persist: '1',
        action: 'resize'
      },
      dataType: 'json'
  });
}

function updateEvent(event){
  var date = event.start;
      d = new Date(date);
  var start = (d.getTime()-(2*3600*1000)) / 1000;
  var id = event.id;
  var allDay = event.allDay;
  if (allDay === true) {
    allDay = 1;
  } else {
    allDay = 0;
  }
  $.ajax({
   url: 'modules/calendar/event_update.php',
   method: 'POST',
   data: {
    id : id,
    allDay: allDay,
    start: start,
    action: 'update'
   },
   dataType: 'json'
  });
}

function dropEvent(event, start){
  var id = event.id;
  allDay = event.allDay;
  $.ajax({
   url: 'modules/calendar/event_update.php',
   method: 'POST',
   data: {
    id : id,
    start : start,
    allDay: allDay,
    action: 'dropevent'
   },
   dataType: 'json'
  });
 }
