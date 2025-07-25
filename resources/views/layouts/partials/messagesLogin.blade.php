@if ( isset($errors) && count($errors) > 0 )

    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li><i class="fa-solid fa-circle-exclamation"></i>  {{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif



@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ $message }}
            </div>
        @endforeach
          
        @else
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ $data }}
            </div>
    @endif
@endif