(function($){
    
    "use strict";

    //datatable
    var table=$('#reports_table').DataTable( {
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
              url:url("admin/get_users")
          },
          // orderCellsTop: true,
          fixedHeader: true,
          "columns": [
              {data:"id"},
              {data:"pic_emp", name:"pic_emp", sortable: false, searchable: false,
                render: function( data, type, full, meta ) {
     
     
                         if (data === '' || data === null) {
                            return '<img src="/img/no-image.png" style="width:50px" />'
     
                        }
                        else
                        {
     
                         return "<img  src=\"/uploads/signature/"  + data + "\" height=\"50\"/  class=\"img-circle elevation-2\" />";
                        }
     
     
     
                } },
     
              {data:"id_number"},
              {data: 'FullName', render:function ( data, type, row ) {                        
                return row.last_name+ ', ' +row.first_name+ ' ' +row.middle_name;
            }},
            
              {data:"roles"},
              {data:"action",sortable:false,searchable:false,orderable:false}
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
    
    //active
    $('#users').addClass('active');
    $('#users_roles_link').addClass('active');
    $('#users_roles').addClass('menu-open');

    //prepare edit user page
    var user_roles=$('#user_roles').val();

    if(user_roles!=null)
    {
        var user_roles= JSON.parse(user_roles);
        var roles=[];
        console.log('yes');
        user_roles.forEach(function(role){
            roles.push(parseInt(role.role_id));
        });
        console.log(roles);

        $('#roles_assign').val(roles).trigger('change');
    }

    $('.select2').select2();

    
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

      $('#birthcountry').select2({
        width:"100%",
        placeholder:trans("Birth Country"),
        ajax: {
           beforeSend:function()
           {
            //   $('.preloader').show();
            //   $('.loader').show();
           },
           url: ajax_url('get_birthcountries'),
           processResults: function (data) {
                 return {
                       results: $.map(data, function (item) {
                          return {
                             text: item.birth_name,
                             id: item.birth_id
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

      $('#category').select2({
         width:"100%",
         placeholder:trans("Category"),
         ajax: {
            beforeSend:function()
            {
               // $('.preloader').show();
               // $('.loader').show();
            },
            url: ajax_url('get_categories'),
            processResults: function (data) {
                  return {
                        results: $.map(data, function (item) {
                           return {
                              text: item.cat_desc,
                              id: item.cat_id
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

   //get folder select2 intialize
   $('#status').select2({
    width:"100%",
    placeholder:trans("Status"),
    ajax: {
       beforeSend:function()
       {
         //  $('.preloader').show();
         //  $('.loader').show();
       },
       url: ajax_url('get_statuses'),
       processResults: function (data) {
             return {
                   results: $.map(data, function (item) {
                      return {
                         text: item.stat_desc,
                         id: item.stat_id
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


    //delete user
    $(document).on('click','.delete_user',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
            title: trans("Are you sure to delete user ?"),
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
