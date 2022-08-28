<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.header')
    <title>Edit Profile</title>
</head>

<body class="bg-background">
    <nav>
        @include('component.admin-navigation')
    </nav>

    <div class="flex flex-col lg:flex-row">

        <!-- Lg Screen Sidebar -->
        @include('component.sidebar-admin')

        <main class="flex-1 lg:ml-64 mt-5 ">
            <div class="mt-5">
                <form action="{{ route('admin_update_profile') }}" method="POST">
                    @csrf
                    <div class="mx-5 lg:ml-0">
                        <h2 class="font-RobotoSlab text-2xl">Profile</h2>
                        <div class="m-5 ml-0">
                            @if ($errors->any())
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <div class="border border-error text-error p-3">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="mt-5">
                            <h4>Profile Information</h4>
                            <div class="mx-5 grid grid-cols-2 md:grid-cols-4 my-2 gap-y-3">
                                <div class="grid gap-y-3">
                                    <h5 class="font-bold font-Roboto">Name:</h5>
                                    <h5 class="font-bold font-Roboto">Birth:</h5>
                                </div>
                                <div class="md:col-span-3 grid gap-y-3">
                                    <div>
                                        <input type="text" class="input input-primary w-full max-w-xs"
                                            value="{{ $admin->name }}" name="name" />
                                    </div>
                                    <div>
                                        <input type="date" class="input input-primary w-full max-w-xs"
                                            value="{{ $admin->birthdate }}" name="dob" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-5">
                            <h4>Contact Information</h4>
                            <div class="mx-5 grid grid-cols-2 md:grid-cols-4 my-2 gap-y-3">
                                <div class="grid gap-y-3">
                                    <h5 class="font-bold font-Roboto">Phone</h5>
                                    <h5 class="font-bold font-Roboto">Email</h5>
                                </div>
                                <div class="md:col-span-3 grid gap-y-3">
                                    <div>
                                        <input type="number" class="input input-primary w-full max-w-xs"
                                            value="{{ $admin->contact_number }}" name="contact_number" />
                                    </div>
                                    <div>
                                        <input type="email" class="input input-primary w-full max-w-xs"
                                            value="{{ $admin->email }}" name="email" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mx-5 grid grid-cols-2 md:grid-cols-4 my-2 gap-y-3">
                            <div class="grid gap-y-3">
                                <h5 class="font-bold font-Roboto">Address</h5>
                            </div>
                            <div class="md:col-span-3 grid gap-y-3">
                                <textarea style="resize: none" maxlength="150" name="address" rows="5"
                                    class="textarea textarea-primary w-full
                                            max-w-xs overflow-hidden text-left">{{ $admin->address }}</textarea>
                            </div>
                        </div>
                        <div class="flex justify-end mt-5 mx-5">
                            <div>
                                <a href="{{ route('profile') }}">
                                    <button class="btn-sm btn-error ">
                                        Cancel
                                    </button>
                                </a>

                                <button type="submit" class="btn-sm btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>
