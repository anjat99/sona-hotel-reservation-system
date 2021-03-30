@extends('layouts.template')

@section('title') Contact @endsection

@section('description') Contact info aboout hotel Sona @endsection

@section('keywords') contact, info, contact form @endsection


@section('content')
    <!-- Contact Section Begin -->
    <section class="contact-section spad odvoji">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p>You can contact us at any time if you want to ask us something or suggest something </p>
                        <table>
                            <tbody>
                            <tr>
                                <td class="c-o">Address:</td>
                                <td>Fake Street 356, Belgrade, Serbia</td>
                            </tr>
                            <tr>
                                <td class="c-o">Phone:</td>
                                <td>(+381)60 123-456</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>info.sona@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="c-o">Fax:</td>
                                <td>+(12) 345 67890</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    @include('frontend.partials.contact-form')
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
