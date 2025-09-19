<div class="container" style="margin-top: 80px"> 
    @error('email')
    <div class="alert alert-warning" role="alert"> 
        {{ $message }}
    </div>
    @enderror
    @error('password')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('error')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('success')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('edition_id')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('wear_coefficient')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('del')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('edit')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
    @error('lend')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
    @enderror
</div>