(function($){
        
    "use strict";

    //active
    $('#profile').addClass('active');
    
    //remove the general validation and assign a new validation for the profile form
    $('#profile_form').removeData('validator');
    $('#profile_form').validate({
        rules:{
            name:{
                required:true,
            },
            email:{
                required:true,
                email:true
            },
            password:{
                required:function(){
                    return $('#password_confirmation').val()!="";
                },
            },
            password_confirmation:{
                required:function(){
                    return $('#password').val()!="";
                },
                equalTo:"#password"
            }
        },
        messages:{
            password_confirmation:{
                equalTo:trans("Password confirmation does not match password")
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
    });


    $('#gender').select2({
        width:"100%",
        placeholder:trans("Gender"),
        ajax: {
           beforeSend:function()
           {
              $('.preloader').show();
              $('.loader').show();
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
              $('.preloader').show();
              $('.loader').show();
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
              $('.preloader').show();
              $('.loader').show();
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
              $('.preloader').show();
              $('.loader').show();
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
               $('.preloader').show();
               $('.loader').show();
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

       
      $('#status').select2({
         width:"100%",
         placeholder:trans("Status"),
         ajax: {
            beforeSend:function()
            {
               $('.preloader').show();
               $('.loader').show();
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

})(jQuery);
