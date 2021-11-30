<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    
    @php
        $vals = explode(',',$value);   
        
    @endphp
    <div class="col-lg-6">
        <select name="{{ $name }}" multiple class="form-control default-select {{ $errors->has($name) ? 'is-invalid' : ''  }}" value="{{ $value ?? old($name) }}">
            @foreach ($list as $item)
                <option {{ in_array($item->id,$vals) ? 'selected' : ''  }} value="{{ $item->id }}" >{{ $item }}</option>    
            @endforeach
        </select>
        
        @error($name)
        <div class="invalid-feedback animated fadeInUp"> {{ $message }} </div>
        @enderror

    </div>
   
</div>
 




