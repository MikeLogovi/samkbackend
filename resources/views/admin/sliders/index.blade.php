@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Sliders</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 mb-4">
                        <h5 class="section-semi-title">Hover Table</h5>

                        <p>To use this just apply
                            <mark>.table</mark>
                            ,
                            <mark>.table-hover</mark>
                            classes to your table element to make it hoverable.
                        </p>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>MRP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Colgate Toothpaste</td>
                                <td><span class="label label-success">in stock</span></td>
                                <td>$5</td>
                                <td>$6</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pink T-Shirt</td>
                                <td><span class="label label-danger">out of stock</span></td>
                                <td>$20</td>
                                <td>$40</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nike Running Shoes</td>
                                <td><span class="label label-success">in stock</span></td>
                                <td>$100</td>
                                <td>$120</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Reebok Casual Shoes</td>
                                <td><span class="label label-danger">out of stock</span></td>
                                <td>$70</td>
                                <td>$80</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Titan Raga Premium Watch</td>
                                <td><span class="label label-success">in stock</span></td>
                                <td>$100</td>
                                <td>$120</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Philips Hair Remover</td>
                                <td><span class="label label-danger">out of stock</span></td>
                                <td>$50</td>
                                <td>$70</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
