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
                        <th>Image</th>
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
                    <tr>
                        <td>
                            <img
                                src="{{ asset('frontend') }}/images/cart-image.png"
                                class="cart-table-img"
                                alt="billboard image" />
                        </td>
                        <td>Dammam, Ohh</td>
                        <td>#14156</td>
                        <td>Dammam City</td>
                        <td>Billboard</td>
                        <td>SR 5</td>
                        <td>5 Seconds</td>
                        <td>8k</td>
                    </tr>
                    <tr>
                        <td>
                            <img
                                src="{{ asset('frontend') }}/images/cart-image.png"
                                class="cart-table-img"
                                alt="billboard image" />
                        </td>
                        <td>Dammam, Ohh</td>
                        <td>#14156</td>
                        <td>Dammam City</td>
                        <td>Billboard</td>
                        <td>SR 5</td>
                        <td>5 Seconds</td>
                        <td>8k</td>
                    </tr>
                    <tr>
                        <td>
                            <img
                                src="{{ asset('frontend') }}/images/cart-image.png"
                                class="cart-table-img"
                                alt="billboard image" />
                        </td>
                        <td>Dammam, Ohh</td>
                        <td>#14156</td>
                        <td>Dammam City</td>
                        <td>Billboard</td>
                        <td>SR 5</td>
                        <td>5 Seconds</td>
                        <td>8k</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total-box">
            <div class="total-row">
                <span>Sub total</span>
                <span>15 SR</span>
            </div>
            <div class="total-row">
                <span>Dispatch Fee</span>
                <span>5 SR</span>
            </div>
            <div class="total-row total">
                <strong>Total</strong>
                <strong>20 SR</strong>
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