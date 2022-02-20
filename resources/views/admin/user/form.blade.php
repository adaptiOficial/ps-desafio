<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name"
                type="text" placeholder="{{ __('Name') }}" value="{{ isset($user) ? $user->name : old('name') }}"
                required="true" aria-required="true" />
            @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>
@if (!isset($user))
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                    id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                    required />
                @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger"
                        for="input-email">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-password">{{ __('Password') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    id="input-password" type="password" placeholder="{{ __('Password') }}" value="" required />
                @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger"
                        for="input-password">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="password_confirmation" id="input-password-confirmation"
                    type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
                @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger"
                        for="input-password">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
    </div>
@endif
