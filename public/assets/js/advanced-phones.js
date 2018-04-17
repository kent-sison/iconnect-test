$("#brand_select").change(function(e) {
    $("#phone_search").val("");

    var brand = $("#brand_select option:selected").val();
    var sort = $("#sort_select option:selected").val();

    var $loading = $('.page-loader');
    
    $.ajax({
        type: "POST",
        url: "fetch-devices.php",
        data: "brand=" + brand + "&sort=" + sort,
        success: function(data) {
            $loading.fadeIn('slow', function() {
                $('#devices-body').html(data);
            });
            $loading.fadeOut('slow');   

        },
    });
});

$("#phone_filter").submit(function(e) {
    e.preventDefault();

    $("#brand_select").prop('selectedIndex', 0);

    var search_keyword = $("#phone_search").val();
    var sort = $("#sort_select option:selected").val();

    var $loading = $('.page-loader');
    
    $.ajax({
        type: "POST",
        url: "fetch-devices.php",
        data: "keyword=" + search_keyword + "&sort=" + sort,
        success: function(data) {
            $loading.fadeIn('slow', function() {
                $('#devices-body').html(data);
            });
            $loading.fadeOut('slow');   
        },
    });
});

$("#sort_select").change(function(e) {
    var brand = $("#brand_select option:selected").val();
    var sort = $("#sort_select option:selected").val();
    var search_keyword = $("#phone_search").val();

    var $loading = $('.page-loader');
    
    $.ajax({
        type: "POST",
        url: "fetch-devices.php",
        data: "brand=" + brand + "&sort=" + sort + "&keyword=" + search_keyword,
        success: function(data) {
            $loading.fadeIn('slow', function() {
                $('#devices-body').html(data);
            });
            $loading.fadeOut('slow');    
        },
    });
});