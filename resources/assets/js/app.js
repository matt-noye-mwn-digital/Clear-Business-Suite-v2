import './bootstrap.js';
import DataTable from 'datatables.net-bs5';
import Swal from 'sweetalert2';

$(document).ready(function(){

    //Datatables initial set
    let table = new DataTable('.dataTablesTable', {

    });

    //Setup SWAL
    window.Swal = Swal;

    //SweetAlert Delete confirmation button
    $('.confirm-delete-btn').click(function(event){
        var form = $(this).closest('form');
        var name = $(this).data('name');

        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: 'If you delete this, it will be gone forever',
            icon: 'warning',
            type: 'warning',
            buttons: ['Cancel', 'Yes!'],
            dangerMode: true,
            closeOnEsc: true,
            confirmButtonText: 'Yes, Delete it!'
        }).then((willDelete) => {
            if(willDelete){
                form.submit();
            }
        });
    });

    //Activity log clear confirmation button
    $('.confirm-log-clear-btn').click(function(event){
        var form = $(this).closest('form');
        var name = $(this).data('name');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to clear the log?',
            text: 'If you clear this log, its gone forever',
            icon: 'warning',
            type: 'warning',
            buttons: ['Cancel', 'Yes!'],
            dangerMode: true,
            closeOnEsc: true,
            confirmButtonText: 'Yes, clear it'
        }).then((willDelete) => {
            if(willDelete){
                form.submit();
            }
        });
    });
})
