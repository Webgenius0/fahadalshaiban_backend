@extends('client.app', ['title' => 'Home'])
@section('content')
<div class="main-content">
    <div class="campaign-header">
        <div>
            <h4 class="campaign-header-title">Cart</h4>
            <p class="campaign-subtitle">All your selected signage</p>
        </div>
    </div>

    <div class="table-container">
        <div class="responsive-table-wrapper">
            <table class="signage-table">
                <thead>
                    <tr>
                        <!-- <th>Image</th> -->
                        <th>Signage Name</th>
                        <th>Signage ID</th>
                        <th>Signage Location</th>
                        <th>Signage Type</th>
                        <th>Price per day</th>
                        <th>Rotation Time</th>
                        <th>Total Views</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <div class="total-box">
            <div class="total-row">
                <span>Sub total</span>
                <span id="subTotal"></span>
            </div>
            <div class="total-row">
                <span>Dispatch Fee</span>
                <span id="dispatchFee"></span>
            </div>
            <div class="total-row total">
                <strong >Total</strong>
                <strong id="total">R</strong>
            </div>
        </div>

        <div class="d-flex justify-content-center w-100">
            <a href="{{ route('page.billing') }}" class="btn-common">
                Proceed to checkout
            </a>
        </div>
    </div>
</div>
@endsection
@push('script')

<script>
// On your other route/page (when the page loads):
$(document).ready(function() {
    var selectedSignageIds = JSON.parse(localStorage.getItem('selectedSignageIds')) || [];
    console.log("Retrieved Signage IDs: ", selectedSignageIds);

    // Initialize an empty orderData object
    let orderData = {
        items: [],
        subtotal: 0,
        despatchFee: 0,
        total: 0
    };


    selectedSignageIds.forEach(function(id) {
        $('#selectedIdsList').append('<li>Signage ID: ' + id + '</li>');
        fetchDataForSignage(id); 
    });
});

let totalPrice = 0;
function fetchDataForSignage(id) {
    $.ajax({
        url: '/get-signage-location/' + id,  
        type: 'GET',  
        success: function(response) {
            console.log("Response for Signage ID: ", response);
            const despatchFee = "{{ env('DESPATCH_FEE') }}";
            $("#dispatchFee").text("RS " + despatchFee+"%");
            let perSignageFee= response.price_per_day;
            //console.log("Per Signage Fee: ", perSignageFee);

            totalPrice += perSignageFee;
            $("#subTotal").text("RS " + totalPrice);
            let TotalwithDespatchFee = totalPrice + ((despatchFee/100)*totalPrice);
            $("#total").text("RS " + TotalwithDespatchFee);
            //console.log("Total with Despatch Fee: ", TotalwithDespatchFee);
            let row = `
                <tr>
                  
                    <td>${response.name}</td>
                    <td>#${response.signage_id}</td>
                    <td>${response.location}</td>
                    <td>${response.category_name}</td>
                    <td>SR ${response.price_per_day}</td>
                    <td>${response.rotation_time}</td>
                    <td>${response.avg_daily_views}</td>
                </tr>
            `;
            $('.signage-table tbody').append(row);
            if (response.image) {
                $('#uploaded-image-preview').attr('src', response.image); 
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", error);
        }
    });
}



</script>
@endpush