<div>
    <h1>Personal Information</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('profile-information') }}" method="POST">
        @csrf

        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" />
            @error('first_name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" />
            @error('last_name')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
        <label for="sex">Sex</label><br>
        <input type="radio" id="male" name="sex" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }}>
        <label for="male">Male</label>
        <input type="radio" id="female" name="sex" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }}>
        <label for="female">Female</label>
        @error('sex')
                <span style="color:red">{{ $message }}</span>
        @enderror
        </div><br>


        <div>
            <label for="mobile_phone">Mobile Phone</label>
            <input type="text" name="mobile_phone" value="{{ old('mobile_phone') }}" placeholder="0993-XXX-XXX" />
            @error('mobile_phone')
                 <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="tel_no">Tel No.</label>
            <input type="text" name="tel_no" value="{{ old('tel_no') }}" />
            @error('tel_no')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" />
            @error('birth_date')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ old('address') }}" />
            @error('address')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" />
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <div>
            <label for="website">Website</label>
            <input type="text" name="website" value="{{ old('website') }}" />
            @error('website')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div><br>

        <button type="submit">Submit</button>
    </form>
</div>
