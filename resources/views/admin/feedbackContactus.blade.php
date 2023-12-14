@extends('layouts.main')
@section('content')
    <div class="m-0 p-0 mb-5" style="background-color: white">
        <section id="con-me">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="display-6">How can we Help? Contact <strong>Rental PS</strong></h2>
                        <p class="lead">Send us feedback and criticism, so we can continue to develop to be even
                            better</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="form" class="py-3">
            <div class="container">
                <h4 class="display-6 text-dark"><strong>Contact Us</strong></h4>
                <form action="/contactus" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="my-1 mr-2" for="reason">Select a Contact Reason</label>
                        <span class="formLabel-required">*</span>
                        <select class="form-control my-2 mr-sm-2 text-muted" id="reason" name="reason" required>
                            <option>- Select -</option>
                            <option>Question</option>
                            <option>Comment</option>
                            <option>Complaint</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="my-1 mr-2" for="message">Enter Your Message</label>
                        <span class="formLabel-required">*</span>
                        <textarea class="form-control my-2" id="message" name="message" rows="3" placeholder="Enter Message"
                            required></textarea>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Enter your message (Maximum 5000 characters)
                        </small>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="my-1 mr-2" for="fname">First Name</label>
                            <span class="formLabel-required">*</span>
                            <input type="text" class="form-control my-2" id="fname" name="fname" placeholder="First name"
                                required>
                        </div>
                        <div class="col">
                            <label class="my-1 mr-2" for="lname">Last Name</label>
                            <span class="formLabel-required">*</span>
                            <input type="text" class="form-control my-2" id="lname" name="lname" placeholder="Last name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="my-1 mr-2" for="email">Email</label>
                        <span class="formLabel-required">*</span>
                        <input type="email" class="form-control my-2" placeholder="Email" id="email" name="email" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="my-1 mr-2" for="phonenum">Phone Number</label>
                                <input type="tel" class="form-control my-2" placeholder="Phone Number" id="phonenum"
                                    name="phonenum" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-control custom-radio custom-control-inline">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="rate">Rate Us</label>
                                    <select class="form-control my-2 mr-sm-2 text-muted" id="rate" name="rate" required>
                                        <option>- Select -</option>
                                        <option>Excellent</option>
                                        <option>Very Good</option>
                                        <option>Good</option>
                                        <option>Average</option>
                                        <option>Poor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3 align-self-center">
                        <small>By clicking submit I certify that I am at least 18 years of age and have read and agree with
                            the
                            Terms & Conditions, Privacy Policy and About Our Ads.</small><br><br>
                        <input id="btn-sub" class="btn btn-primary" type="submit" value="Submit">
                    </div>

                </form>
            </div>
        </section>
    </div>
@endsection
