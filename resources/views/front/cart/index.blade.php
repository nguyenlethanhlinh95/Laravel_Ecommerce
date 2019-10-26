@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop


@section('content')
    <div class="section group">
        <div class="row">
            <!-- list item cart -->
            <div class="col-md-7 list_item_cart">
                <table class="table table-responsive">
                    <tbody>

                    @foreach($cartItems as $item)
                        <tr>
                            <td class="image">
                                <img src="{{ asset('images/'. $item->options->img) }}" alt=""></td>
                            <td>
                                <h3 class="pro_title">{{ $item->name }}</h3>
                                <p class="pro_price">{{ $item->price }} VND</p>
                            </td>
                            <td>
                                <div class="pdt-40">
                                    <input type="number" value="{{ $item->qty }}">

                                    <br><br>
                                    <p class=""><a href="{{ route('removeItemCart', ['id'=> $item->rowId]) }}">Remove</a></p>

                                </div>

                            </td>
                            <td>
                                <div class="pdt-40">
                                    <span class="bold">{{ $item->subtotal }} VND</span>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end list item cart -->

            <!-- sidebarcar -->
            <div class="col-md-5 sidebar_item_cart ">
                <div class="wapper_total">
                    <div class="row">

                        <div class="col-md-7">
                                                <span class="label bold">
                                                        Subtotal:
                                                </span>
                        </div>
                        <div class="col-md-5">
                                                <span class="price bold">
                                                        {{ Cart::subtotal() }} VND
                                                </span>
                        </div>






                    </div>

                    <div class="row">
                        <div class="col-md-7">
                                            <span class="label bold">
                                                    Tax:
                                            </span>
                        </div>
                        <div class="col-md-5">

                                            <span class="price bold">

                                                {{ Cart::tax() }} VND
                                            </span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-7">
                                            <span class="label bold">
                                                    Total:
                                            </span>
                        </div>
                        <div class="col-md-5">

                                            <span class="price bold">

                                                {{ Cart::total() }} VND
                                            </span>
                        </div>
                    </div>
                </div>


                <div class="button_wapper mgt-20">
                    <button class="btn btn-warning">Checkout</button>
                </div>
            </div>
            <!-- end sidebarcar -->
        </div>
    </div>
@stop