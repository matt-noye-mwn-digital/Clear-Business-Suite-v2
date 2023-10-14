@if($errors->any())
    <section class="errorsBanner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
