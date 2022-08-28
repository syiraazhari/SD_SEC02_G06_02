<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.header')
    <title>View Profile</title>
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
                <div class="mx-5 lg:ml-0">
                    <div class="flex justify-between">
                        <h2 class="font-RobotoSlab text-2xl">Profile</h2>
                        <div>
                            <a href="{{ route('admin_edit_profile') }}">
                                <button class="btn-sm btn-primary ">
                                    Edit Profile
                                </button>
                            </a>

                            <a href="{{ route('admin_view_change_password') }}">
                                <button class="btn-sm btn-primary ">
                                    Change Password
                                </button>
                            </a>

                        </div>
                    </div>
                    <div>
                        <div class="mt-5">
                            @if (session('status'))
                                <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)"
                                    class="border border-success text-success p-3 my-3">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h4>Profile Information</h4>
                            <div class="mx-5 grid grid-cols-2 md:grid-cols-4 my-2 gap-y-3">
                                <div class="">
                                    <h5 class="font-bold font-Roboto">Name:</h5>
                                    <h5 class="font-bold font-Roboto">Birth:</h5>
                                </div>
                                <div class="md:col-span-3">
                                    <p class="font-normal">{{ $admin->name }}</p>
                                    <p class="font-normal">{{ $admin->birthdate }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-5">
                            <h4>Contact Information</h4>
                            <div class="mx-5 grid grid-cols-2 md:grid-cols-4 my-2 gap-y-3">
                                <div class="">
                                    <h5 class="font-bold font-Roboto">Phone:</h5>
                                    <h5 class="font-bold font-Roboto">Email:</h5>
                                    <h5 class="font-bold font-Roboto">Address:</h5>
                                </div>
                                <div class="md:col-span-3">
                                    <p class="font-normal">{{ $admin->contact_number }}</p>
                                    <p class="font-normal">{{ $admin->email }}</p>
                                    <p class="font-normal">{{ $admin->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
