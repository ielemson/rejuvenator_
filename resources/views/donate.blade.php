@extends("layouts.app")

@section("content")
@section("title","Donate Now")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"Donate","header_2"=>"Donate Now"])

<!--Donate Now Start-->
<section class="donate-now">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="donate-now__left">
                    <form class="donate-now__personal-info-form" data-parsley-validate id="donateForm">
                        @csrf
                    <div class="donate-now__enter-donation">
                        <h3 class="donate-now__title">Enter your donation</h3>
                        <div class="donate-now__enter-donation-input">
                            <input type="text"  name="amount" id="amount" required placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="donate-now__personal-info-box">
                        <h3 class="donate-now__title">Personal info</h3>
                        
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" placeholder="First name" name="fname" id="fname" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" placeholder="Last name" name="lname" id="lname" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="email" placeholder="Email address" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" placeholder="Phone" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" placeholder="Address" name="address" id="address" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" placeholder="Country" name="country" id="country" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="donate-now__payment-info-btn-box mt-2">
                                <button type="submit" class="thm-btn donate-now__payment-info-btn">Donate
                                    now</button>
                            </div>
                        
                    </div>
                    </form>
               
        </div>
    </div>
</section>
<!--Donate Now End-->
@endsection

@push("customScripts")
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Parsley.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<!-- Parsley CSS for better validation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.css" />

<script>
    $(document).ready(function() {
        $('#donateForm').parsley(); // Initialize Parsley validation

        $('#donateForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            // Validate form before Ajax submission
            if ($(this).parsley().isValid()) {
                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: "{{ route('donate.submit') }}", // Replace with your form submission route
                    data: formData,
                    success: function(response) {
                        // Success alert
                        Swal.fire({
                            title: 'Form Submitted!',
                            text:"Coming Soon",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr) {
                        // Error alert
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was a problem submitting the form.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });
</script>

@endpush

@push("customStyles")
   <style>
    .parsley-errors-list {
        list-style-type:none;
        color: red;
        font-size:0.9rem;
        font-weight: 700
    }
    </style> 
@endpush