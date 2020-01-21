@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" accept-charset="utf-8">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder='Eg. John Doe' required quillpad="disable|hindi" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder='Eg. example@abc.yz' required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                            
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" max="2099-12-01" min="1900-01-01" required >

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            
                            <div class="col-md-6">
                                <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Eg. 1234567890" maxlength="10" required/>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            
                            <div class="col-md-6">
                                <input type='textarea' id="address" class="form-control @error('address') is-invalid @enderror" name='address' maxlength="100" placeholder="Eg. 445 Eden Road, Mount Eden, Auckland" required />
                                <!-- <textarea class="form-control" id='address' rows="4" maxlength='100'></textarea> -->

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Pic') }}</label>
                            
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hindi_name" class="col-md-4 col-form-label text-md-right">{{ __('Hindi Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="hindi_name" type="text" class="keyboard form-control @error('password') is-invalid @enderror" placeholder="Eg. जॉन डो" name="hindi_name" required>

                                @error('hindi_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" pattern="[a-zA-Z0-9]+" placeholder='********' name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" pattern="[a-zA-Z0-9]+" placeholder='********' required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>

                            <div class="col-md-6">
                                <div class="captcha">
                                    <span>{!! captcha_img('flat') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh" id='refresh'> Refresh </button>
                                </div>

                                <input id="captcha" type="text" class="form-control mt-2 @error('captcha') is-invalid @enderror" name="captcha" placeholder="Enter Captcha" required quillpad="disable|hindi" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#refresh').click(function(){
        $.ajax({
            type: 'GET',
            url: '/refresh_captcha',
            success:function(data){
                $(".captcha span").html(data);
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {

        $('.keyboard').keyboard({ 
            layout: 'hi-Deva' , 
            position: {
                of: $(window),  
                my: 'center bottom',
                at: 'center bottom',
                at2: 'center bottom' // used when "usePreview" is false
            },
        })
        // activate the typing extension
        .addTyping({
            showTyping: true,
            delay: 50
        });
    });
</script>
@endsection
