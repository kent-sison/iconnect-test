$(function() {
    isAvailable();
});

$("#price").html("$1,199.00");

$("a.memory").click(function() {

    $("a.memory").removeClass("selected");
    $(this).addClass("selected");

    $("input[name=size]").val($(this).text());

    if ($(this).text() == '64GB') {
        $("#price").html("$1,199.00");
    } else if ($(this).text() == '256GB') {
        $("#price").html("$1,299.00");
    }

    isAvailable();
});

$("div.color").click(function() {
    $("div.color").removeClass("selected");
    $(this).addClass("selected");

    if ($("input[name=color]").val() == 'Space Gray' && $(this).hasClass("silver")) {
        $("input[name=color]").val('Silver');

        $("#phone_select").fadeTo(500, 0.1, function() {
            $("#phone_select").attr('src', 'assets/img/iphonex_preorder/silver.png');
        }).fadeTo(500, 1);
    } else if ($("input[name=color]").val() == 'Silver' && $(this).hasClass("gray")) {
        $("input[name=color]").val('Space Gray');

        $("#phone_select").fadeTo(500, 0.1, function() {
            $("#phone_select").attr('src', 'assets/img/iphonex_preorder/gray.png');
        }).fadeTo(500, 1);
    }

    isAvailable();
});

var isAvailable = function() {
    $.post("helpers/iphonex-checker.php", { color: $("input[name='color']").val(), size: $("input[name='size']").val() })
        .done(function(data) {
            console.log(data);
            if (data == 0) {
                $("#selection-error").slideDown("slow");
                $("#selection_button").prop('disabled', true);
            } else {
                $("#selection-error").slideUp("slow");
                $("#selection_button").prop('disabled', false);
            }
        });
}

$("#selection-error").hide();