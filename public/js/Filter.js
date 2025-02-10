// public/js/filters.js
$(document).ready(function() {
    // Listen to changes in filter dropdowns
    $(".signage-filter-dropdown, #signage-date-input").on("change", function() {
        filterSignages();
    });

    function filterSignages() {
        var city = $("#cities").val();
        var category = $(".signage-filter-dropdown:nth-child(2)").val();
        var dailyViews = $(".signage-filter-dropdown:nth-child(3)").val();
        var pricing = $(".signage-filter-dropdown:nth-child(4)").val();
        var date = $("#signage-date-input").val();
        var duration = $(".filter-dropdown").val();

        // Make an AJAX call to fetch filtered data
        $.ajax({
            url: "{{ route('filterSignages') }}",  // Your route to handle filtering
            method: 'GET',
            data: {
                city: location,
                category: category,
                daily_views: dailyViews,
                pricing: pricing,
                date: date,
                duration: duration
            },
            success: function(response) {
                // Update the billboard card container with the filtered data
                $(".billboard-card-container").html(response.html);
            }
        });
    }
});
