@props(['title', 'action', 'method' => 'POST', 'enctype' => false])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-luxury fade-in">
                <div class="card-header">
                    <h5 class="mb-0 luxury-font">{{ $title }}</h5>
                </div>

                <div class="card-body">
                    <form method="{{ $method }}" action="{{ $action }}" {{ $enctype ? 'enctype="multipart/form-data"' : '' }}>
                        @csrf
                        @if($method !== 'POST')
                            @method($method)
                        @endif

                        {{ $slot }}

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ $title }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 