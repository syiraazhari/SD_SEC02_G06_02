@component('mail::message')
<h1 style="text-align: center; font-weight:700; font-family:'Poppins', sans-serif; color:#57210B; font-size: 24px;"> Hello {{ $name }} </h1>
<h3 style="text-align: center; font-weight:500; font-family:'Poppins', sans-serif; font-size: 18px; color:black">Welcome to OldTown White Coffee!</h3>
<hr style="margin-left:10em; margin-right:10em">
<p style="text-align: center; font-weight:400; color:black">We're happy you're joining our family!</p>

<div style="margin: 2em 0">
<p style="font-weight:700; color:black; margin: 0;padding: 0;">Email Address: {{ $email }}</p>
<p style="font-weight:700; color:black; margin: 0;padding: 0;">Temporary password: oldtown@123</p>
</div>

<p>Here's what to do next:</p>
<p>·Click Login link below:</p>
<p>·Once you logged in with the temporary password</p>
<p>·Change your password at the profile setting page.</p>

@component('mail::button', ['url' => route('login')])
Log In
@endcomponent

@endcomponent
