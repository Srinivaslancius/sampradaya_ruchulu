$(document).ready(function() {

    var table =  $('#example').DataTable({
        language: {
            searchPlaceholder: 'Search records',
            sSearch: '',
            sLengthMenu: 'Show _MENU_',
            sLength: 'dataTables_length',
            oPaginate: {
                sFirst: '<i class="material-icons">chevron_left</i>',
                sPrevious: '<i class="material-icons">chevron_left</i>',
                sNext: '<i class="material-icons">chevron_right</i>',
                sLast: '<i class="material-icons">chevron_right</i>' 
            }
        }
    });
    //Filters for country Satate and city
    $('#select-country').on('change', function () {
        table.columns(1).search( this.value ).draw();
    } );
    $('#select-state').on('change', function () {
        table.columns(2).search( this.value ).draw();
    } );
    $('#select-cities').on('change', function () {
        table.columns(3).search( this.value ).draw();
    } );
    
    $('.dataTables_length select').addClass('browser-default');
});

//Filters for Active and inactive checkbox
$(function() {
  otable = $('#example').dataTable();
})
function filterme() {
  //build a regex filter string with an or(|) condition
  var types = $('input:checkbox[name="type"]:checked').map(function() {
    return '^' + this.value + '\$';
  }).get().join('|');
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(types, 5, true, false, false, false);  
}