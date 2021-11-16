<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    <div class="col-lg-6">
       
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="{{ $name }}" class="custom-file-input">
                <label class="custom-file-label">Choose file</label>
            </div>
            
        </div>    
        
        @error($name)
        <p class="text-danger"> {{ $message }} </p>
        @enderror
        
       
    
    </div>
   
</div>
 
