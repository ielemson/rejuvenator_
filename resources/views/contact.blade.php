@extends('layouts.app')

@section('content')
@section('title', 'Contact Us')
@include('partials.page-nav')
@include('partials.page-header', ['header_1' => 'Contact', 'header_2' => 'Contact Us'])

<!--Contact Three Start-->
<section class="contact-three">
    <div class="contact-three-shape" style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Contact with us</span>
            <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
        </div>
        <div class="contact-page__form-box">
            <form class="contact-page__form" id="contactForm" data-parsley-validate>
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Name" name="name" id="name" class="form-control"
                                required data-parsley-trigger="change"
                                data-parsley-required-message="Please enter your name">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="email" placeholder="Email Address" name="email" id="email"
                                class="form-control" required data-parsley-type="email" data-parsley-trigger="change"
                                data-parsley-required-message="Please enter a valid email address">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Phone" name="phone" id="phone" class="form-control"
                                required data-parsley-trigger="change"
                                data-parsley-required-message="Please enter your phone number">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Subject" name="subject" id="subject"
                                class="form-control" required data-parsley-trigger="change"
                                data-parsley-required-message="Please enter the subject">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label for="captcha">Captcha</label>
                            <div class="contact-form__input-box captcha">
                                <span> {!! captcha_img('flat') !!}</span>
                                <button type="button" class="btn btn-success btn-refresh">Refresh Captcha</button>

                            </div>
                            <input type="text" placeholder="Enter Captcha" name="captcha" id="captcha"
                                class="form-control" required data-parsley-trigger="change"
                                data-parsley-required-message="Please enter the captcha">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact-form__input-box text-message-box">
                            <textarea name="contact" id="contact" class="form-control" required data-parsley-trigger="change"
                                data-parsley-required-message="Please enter your message">Write Message</textarea>
                        </div>
                        <div class="contact-form__btn-box">
                            <button type="submit" class="thm-btn contact-form__btn">Send a message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Contact Three End-->
<!--Contact One Start-->
<section class="contact-one">
    <div class="container">
        <div class="contact-one__inne">
            <ul class="list-unstyled contact-one__list">
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Helpline</p>
                        <h3 class="contact-one__number"><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                        </h3>
                    </div>
                </li>
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-message"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Send email</p>
                        <h3 class="contact-one__number"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                        </h3>
                    </div>
                </li>
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-location"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">{{ $setting->address }}</p>
                        {{-- <h3 class="contact-one__number">Melbourne, Australia</h3> --}}
                    </div>
                </li>
            </ul>

        </div>
    </div>
</section>
<!--Contact One End-->

<!--Google Map Start-->
<section class="google-map google-map-two">
    <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.480959759234!2d7.435303065647842!3d9.066738431343733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b2b04b38daf%3A0x95497a76106074bd!2sb11%2C%2026%20A.E.%20Ekukinam%20St%2C%20Utako%20900108%2C%20Abuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1697760519665!5m2!1sen!2sng"
    class="google-map__one" allowfullscreen></iframe>
    
    </section>
    <!--Google Map End-->
@endsection

@push('customStyles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
@endpush

@push('customScripts')
<script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Initialize Parsley for form validation
        $('#contactForm').parsley();
        $('.btn-refresh').click(function() {

            $.ajax({
                type: 'GET',
                url: 'refresh-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Validate the form before submitting
            if ($('#contactForm').parsley().isValid()) {
                $.ajax({
                    url: "{{ route('contact.send') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Message Sent!',
                                text: 'Thank you for contacting us. We will get back to you shortly.',
                            });
                            $('#contactForm')[0].reset();
                            $('#contactForm').parsley().reset();
                            $('.btn-refresh').click();
                        } else {
                            let errorMessages = '';
                            if (response.errors) {
                                // Loop through errors and concatenate them into a string
                                for (let field in response.errors) {
                                    errorMessages += response.errors[field].join('<br>') +
                                        '<br>';
                                }
                            } else {
                                errorMessages = response.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                html: errorMessages,
                            });
                            $('.btn-refresh').click();
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again later.',
                        });
                        $('.btn-refresh').click();
                    }
                });
            }
        });
    });
</script>
@endpush()
