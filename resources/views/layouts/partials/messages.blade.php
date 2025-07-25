@if ( isset($errors) && count($errors) > 0 )
    <ol style="margin: 0px; margin-left: 10px; padding:0px; color: #d62828;"> 
        <i class="fa-solid fa-circle-exclamation"></i>
        {{ $message }}
    </ol>
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