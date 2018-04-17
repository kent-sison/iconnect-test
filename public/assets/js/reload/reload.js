/* Card Arrays */
var prepaid = ['5', '10', '20'];
var lte = ['3', '7'];

var error = 0;
var card_value = "";

$('#checkbox_confirm').hide();
$('#card_select').val("");

$('#confirmation_form').on('submit', function(e) {
    if (!$(this).InStock() && $(this).val() != "") {
        e.preventDefault();
        $("#card_select").focus();
        if (!error) {
            $("#card_select").next("p").slideUp("slow");
            $("#card_select").after('<p style="display:none;color:#a94442;">This reload card is out of stock! Please check again later.</p>');
            $("#card_select").next("p").slideDown("slow");
            error = 1;
        }
    }

    var input = document.createElement("input");

    $(input).attr({
        "type":"hidden",
        "name":"card_value"
    }).val(card_value);
    
    $("select").after(input);

    return;
});

$('#card_select').change(function() {

    if (!$(this).InStock() && $(this).val() != "")
    {
        $('#checkbox_confirm').slideUp("slow");

        $(this).next("p").slideUp("slow");
        $(this).after('<p style="display:none;color:#a94442;">This reload card is out of stock! Please check again later.</p>');
        $(this).next("p").slideDown("slow");
        error = 1;
        return;
    }
    else {
        $(this).next("p").slideUp("slow");
        error = 0;
    }

    $('#checkbox_confirm div label input').attr('checked', false);

    if (jQuery.inArray($(this).val(), prepaid) > -1) {
        $('#checkbox_confirm div label span').text("I am an iConnect Advanced Prepaid Subscriber");
        $('#checkbox_confirm div.alert').html("iConnect Advanced Prepaid Reload Cards are only for <a href='advanced_prepaid-plans' target='_blank' class='link'>Prepaid</a> SIMs. If you are subscribed to our <a href='advanced_postpaid-plans' target='_blank' class='link'>Postpaid</a> Plans, these reload cards are not applicable for your SIM.");
        $('#checkbox_confirm').slideDown("slow");
    }
    else if (jQuery.inArray($(this).val(), lte) > -1) {
        $('#checkbox_confirm div label span').text("I am an iConnect 4G LTE Subscriber");
        $('#checkbox_confirm div.alert').html("iConnect 4G LTE Reload Cards are only for LTE SIMs. If you are subscribed to our <a href='advanced_postpaid-plans' target='_blank' class='link'>Postpaid</a> Plans, these reload cards are not applicable for your SIM.");
        $('#checkbox_confirm').slideDown("slow");
    }
    else {
        $('#checkbox_confirm').slideUp("slow");
    }
});

$('#exp_date').MonthPicker({ 
    Button: false,
    MinMonth: 0
});

$("#exp_date").MonthPicker('option', 'MonthFormat', 'mm/y');

/*  Customized functions part */
jQuery.fn.extend({
    InStock : function() {
        var objVal = $(this).val();
        
        if(jQuery.inArray(objVal, prepaid) > -1 || jQuery.inArray(objVal, lte) > -1) 
        {
            switch(objVal) 
            {
                case "10":
                    if($("#c_a_10").val() == "0") {
                        error = 1;
                        return false;
                    }
                    break;
                case "20":
                    if($("#c_a_20").val() == "0") {
                        error = 1;
                        return false;
                    }
                    break;
                case "7":
                    if($("#c_l_20").val() == "0") {
                        error = 1;
                        return false;
                    }
                    break;
                default:
                break;
            }

            card_value = $("option[value='" + $(this).val() + "']").text();

            return true;
        }

    }
});

