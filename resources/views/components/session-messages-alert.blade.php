<section class="section1__main">
    <div class="container">
        <div class="section1-container__main">
            <div class="section1-container-top__main">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('success') }}</strong>
                                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                                   style="text-decoration: none; position: absolute; right: 6px;">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-error">
                                <strong>{{ session()->get('error') }}</strong>
                                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                                   style="text-decoration: none; position: absolute; right: 6px;">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                        @elseif ($errors->any())
                            <div class="alert alert-error">
                                @foreach ($errors->all() as $errorMessage)
                                    <strong>{{ $errorMessage }}</strong>
                                @endforeach
                                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                                   style="text-decoration: none; position: absolute; right: 6px;">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
