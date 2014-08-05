jQuery(document).ready( function(){
    var sortInfo = new Array();
    var state;
    checkURL();
    $('.sortable').on("click", function(){
        var sort, sortobj, data, url;
        sortobj = $(this).attr("id");
        $(this).find("p").removeClass(sortInfo[sortobj]);
        sort = sortInfo[sortobj];
        if(sort == "ASC") {
            sort = "DESC";
        } else {
            sort = "ASC";
        }
        $(this).find("p").addClass(sort);
        url = $(this).parents('table').data('url');
        data = sortobj+' '+sort;
        $.post( url,{ data:data}, function( data ) {
            $("#result").html( data );
            sortInfo[sortobj]= sort;
        });
    });
    function checkURL() {
        var url = location.pathname;
        $("nav").find("li").each(function(){
            if($(this).find('a').attr('href') == url) {
                $(this).addClass('active');
            }
        });

    }
    $('.back-office-block').on('click', "input[type='checkbox']", function(){
            var state = $(this).prop("checked");
            $(this).closest('ul').find("input").each(function() {
                if(state) {
                    $(this).prop("checked", true) ;
                } else {
                    $(this).prop("checked", false);
                }
            });
    });

    $('.state-check').on('click', function(e){
        e.preventDefault();
        var stateHtml = $(this).html();
        if(stateHtml == 'Активный') {
            state = "0";
            console.log('мы там где состояние 1 и оно будет ровнятся 0'+state);
            $(this).attr('data-state', state).html('Отключен').removeClass('btn-success').addClass('btn-primary');
        } else {

            state = "1";
            console.log('мы там где состояние 0 и оно будет ровнятся 1'+state);
            $(this).attr('data-state', state).html('Активный').removeClass('btn-primary').addClass('btn-success');
        }
        var data = {
            state :state
        };
        var id = $(this).data('id');
        var str = JSON.stringify(data);
        $.post( '/update_parser',{ data:str, id:id}, function(data) {


        });
    });
    $('.delete-state').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.post( '/delete_parser',{ id:id}, function(data) {
        });
        $(this).closest('tr').remove();
    });
    $('.update-state').on('click', function(e){
        e.preventDefault();
       var id =  $(this).data('id');
       $(this).closest('tr').find('input[type="text"]').each(function(){
           var  data = {};
           var name = $(this).attr('name');
           var valu = $(this).val();
           data[name] = valu;
           var str = JSON.stringify(data);

           $.post( '/update_parser',{ data:str, id:id}, function(data) {
           });
        });




    });
    $('.add-state').on('click', function(e) {
        e.preventDefault();
        $.post( '/add_parser',{}, function(data) {
            $('#result').append(data);
        });
    });


});