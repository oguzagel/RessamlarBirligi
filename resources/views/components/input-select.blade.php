<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    <div class="col-lg-6">
        <select name="{{ $name }}" multiple class="form-control default-select {{ $errors->has($name) ? 'is-invalid' : ''  }}" value="{{ $value ?? old($name) }}">
            @foreach ($list as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>    
            @endforeach
        </select>
        
        @error($name)
        <div class="invalid-feedback animated fadeInUp"> {{ $message }} </div>
        @enderror

    </div>
   
</div>
 




