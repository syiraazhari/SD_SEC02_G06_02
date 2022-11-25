@component('mail::message')
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');
</style>

<div style="display:flex;  justify-content: center; align-items:center;">
<img src="{{ asset('storage/images/OldTownBG.png') }}" alt="image"
width="600px" style="max-width: 100%;">
</div>

<div style="text-align: center; font-family: 'Roboto Condensed', sans-serif;">
<h3 style="color: #FFC426; text-align: center; margin-top:10px; font-size: 28px;">Old Town White Coffee</h3>
<h4 style="color: #800000; text-align: center">Hello {{$name}}</h4>
</div>
<div style="text-align:center; font-family: sans-serif;">
<p>Welcome to OldTown White Coffee!</p>
<p>We're happy that you're joining our family!</p>
<p><strong>Email Address: {{$email}}</strong></p>
<p><strong>Temporary Password: oldtown@123</strong></p>
<p>Here's what to do next:</p>
<p>Click on the login button below,</p>
<p>Once you've login with the temporary password, change you're password at the profile
setting page.</p>
</div>

@component('mail::button', ['url' => route('login')])
LOGIN HERE
@endcomponent

@endcomponent
