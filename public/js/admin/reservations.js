(function($){

  "use strict";

  //active
  $('#reservations').addClass('active');
  $('#maintenance_link').addClass('active');
  $('#maintenance').addClass('menu-open');

  
  //reservations datatable
  var table=$('#reservations_table').DataTable( {
    dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-4'i><'col-sm-8'p>>",
    buttons: [
      {
          extend:    'copyHtml5',
          text:      '<i class="fas fa-copy"></i> '+trans("Copy"),
          titleAttr: 'Copy'
      },
      {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> '+trans("Excel"),
          titleAttr: 'Excel'
      },
      {
          extend:    'csvHtml5',
          text:      '<i class="fas fa-file-csv"></i> '+trans("CVS"),
          titleAttr: 'CSV'
      },
      {
          extend:    'pdfHtml5',
          text:      '<i class="fas fa-file-pdf"></i> '+trans("PDF"),
          titleAttr: 'PDF'
      },
      {
        extend:    'colvis',
        text:      '<i class="fas fa-eye"></i>',
        titleAttr: 'PDF'
      }
      
    ],
    "processing": true,
    "serverSide": true,
    "bSort" : false,
    "ajax": {
      url: url("admin/get_reservations")
    },
    // orderCellsTop: true,
   //  'fname',
   //      'mname',
   //      'lname',
    fixedHeader: true,
    "columns": [
      {data:"id",  "autoWidth": true},
    
       { "data": null,
         "autoWidth": true,
         "title": "RSVP No.",
         "render": function(date, type, full) {
             return full['reservationno'] + ' - ' +   full['reserve_time'] + ' - ' + full['receiptno'];
         },
     },




         { "data": null,
         "title": "Fullname",
         "autoWidth": true,
         "render": function(data, type, full) {
             return full['lname'] + ' , ' + full['fname']+ ' ' + full['mname'];
         },
         },
         {
            data: "entrolled",
            render: function (data, type, row) {
                if (row.enrolled === 1 && row.cancelled === 1) { return 'Enrollment Cancelled' }
                else if (row.enrolled === 1 && row.cancelled === 0) { return 'Enrolled' }
                else if (row.enrolled === 0 && row.cancelled === 0) { return 'For Follow Up' }
               // else if (row.status === "Reconsideration") { return '<img src="/img/recon.png" style="width:70px" />' }
               else { return 'Stand By' }
                
                
                
             
    
            },sortable:false,searchable:false,orderable:false
        },

       {data:"action",searchable:false,orderable:false,sortable:false}//action
    ],
    "language": {
      "sEmptyTable":     trans("No data available in table"),
      "sInfo":           trans("Showing")+" _START_ "+trans("to")+" _END_ "+trans("of")+" _TOTAL_ "+trans("records"),
      "sInfoEmpty":      trans("Showing")+" 0 "+trans("to")+" 0 "+trans("of")+" 0 "+trans("records"),
      "sInfoFiltered":   "("+trans("filtered")+" "+trans("from")+" _MAX_ "+trans("total")+" "+trans("records")+")",
      "sInfoPostFix":    "",
      "sInfoThousands":  ",",
      "sLengthMenu":     trans("Show")+" _MENU_ "+trans("records"),
      "sLoadingRecords": trans("Loading..."),
      "sProcessing":     trans("Processing..."),
      "sSearch":         trans("Search")+":",
      "sZeroRecords":    trans("No matching records found"),
      "oPaginate": {
          "sFirst":    trans("First"),
          "sLast":     trans("Last"),
          "sNext":     trans("Next"),
          "sPrevious": trans("Previous")
      },
    }
 });


 $('#studenttype').select2({
   width:"100%",
   placeholder:trans("Student Type"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_studenttypes'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.stud_type_desc,
                        id: item.stud_type_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });


 $('#mode').select2({
   width:"100%",
   placeholder:trans("Mode of Learning"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_modes'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.mod_desc,
                        id: item.mod_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });


 $('#numbersibling').select2({
   width:"100%",
   placeholder:trans("Number of Sibling"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_numbersiblings'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.sib_desc,
                        id: item.sib_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });


 $('#location').select2({
   width:"100%",
   placeholder:trans("Location / Area"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_locations'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.loc_desc,
                        id: item.loc_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });

 $('#curriculum').select2({
   width:"100%",
   placeholder:trans("Curriculum"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_curriculums'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.cur_desc,
                        id: item.cur_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });
 $('#motherlanguages').select2({
   width:"100%",
   placeholder:trans("Mode of Learning"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_motherlanguages'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.lang_desc,
                        id: item.lang_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });


 $('#grade').select2({
   width:"100%",
   placeholder:trans("Grade / Level"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_grades'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.grd_desc,
                        id: item.grd_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });


 $('#gender').select2({
  width:"100%",
  placeholder:trans("Gender"),
  ajax: {
     beforeSend:function()
     {
      //   $('.preloader').show();
      //   $('.loader').show();
     },
     url: ajax_url('get_genders'),
     processResults: function (data) {
           return {
                 results: $.map(data, function (item) {
                    return {
                       text: item.gen_desc,
                       id: item.gen_id
                    }
                 })
           };
        },
        complete:function()
        {
           $('.preloader').hide();
           $('.loader').hide();
        }
     }
});

$('#religion').select2({
   width:"100%",
   placeholder:trans("Religion"),
   ajax: {
      beforeSend:function()
      {
       //   $('.preloader').show();
       //   $('.loader').show();
      },
      url: ajax_url('get_religions'),
      processResults: function (data) {
            return {
                  results: $.map(data, function (item) {
                     return {
                        text: item.rel_desc,
                        id: item.rel_id
                     }
                  })
            };
         },
         complete:function()
         {
            $('.preloader').hide();
            $('.loader').hide();
         }
      }
 });
$('#nationality').select2({
  width:"100%",
  placeholder:trans("Nationality"),
  ajax: {
     beforeSend:function()
     {
      //   $('.preloader').show();
      //   $('.loader').show();
     },
     url: ajax_url('get_nationalities'),
     processResults: function (data) {
           return {
                 results: $.map(data, function (item) {
                    return {
                       text: item.nat_desc,
                       id: item.nat_id
                    }
                 })
           };
        },
        complete:function()
        {
           $('.preloader').hide();
           $('.loader').hide();
        }
     }
});
   


  //gender division
  $(document).on('click','.delete_genders',function(e){
      e.preventDefault();
      var el=$(this);
      swal({
        title: trans("Are you sure to delete gender ?"),
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: trans("Delete"),
        cancelButtonText: trans("Cancel"),
        closeOnConfirm: false
      },
      function(){
        $(el).parent().submit();
      });
  });

})(jQuery);

