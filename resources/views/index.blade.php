@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Welcome to EzConvert</h1>
            <p class="lead">Your one-stop solution for converting images to various formats.</p>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="upload-box text-center">
                <h2>Upload Image</h2>
                <p class="mb-4">Choose an image to start the conversion process.</p>
                <button class="btn btn-primary upload-button">Upload</button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-body">
                    <h3 class="card-title text-primary mb-5 text-center">Conversion Process</h3>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-cloud-upload-alt fa-3x mb-4"></i>
                                <p>Step 1: Upload Image</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-file-image fa-3x mb-4"></i>
                                <p>Step 2: Choose Format</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-download fa-3x mb-4"></i>
                                <p>Step 3: Download Converted Image</p>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h3 class="card-title text-primary mb-5 text-center">Why to choose ezconvert</h3>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-star fa-3x mb-4"></i>
                                <h4>Best Image Converter</h4>
                                <p class = "info-text">EzConvert is the best image converter, offering support for various formats like JPEG, PNG, GIF, AVIF, BMP, and WebP. It ensures high-quality conversions while maintaining the original image's clarity. Fast and efficient, EzConvert saves you time with quick processing, making it the go-to solution for all your image conversion needs.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-shield-alt fa-3x mb-4"></i>
                                <h4>Fast and Secure</h4>
                                <p class = "info-text">EzConvert guarantees fast and secure image conversions. Your uploaded images are processed quickly to save you time. For security, all images are encoded and securely stored, then automatically deleted one hour after upload, ensuring your data is protected.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-image fa-3x mb-4"></i>
                                <h4>Support any type</h4>
                                <p class = "info-text">EzConvert supports any image type, ensuring flexibility and convenience. Whether you have JPEG, PNG, GIF, WebP, AVIF, BMP, or other formats, our converter handles them all with ease. Enjoy seamless conversions without worrying about compatibility issues.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/upload.js') }}"></script>
@endsection
