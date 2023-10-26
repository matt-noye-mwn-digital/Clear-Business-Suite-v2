@if($errors->any())
    <div class="text-danger errorsWrap">
        <ul>
            @foreach($errors->all() as $error) <!-- Add ->all() here -->
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
