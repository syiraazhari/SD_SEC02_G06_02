<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.header')
    <title>Staff Dashboard</title>
</head>

<body class="bg-background">
    <nav>
        @include('component.navigation')
    </nav>

    <div class="flex flex-col lg:flex-row">

        <!-- Lg Screen Sidebar -->
        @include('component.sidebar-staff')

        <main class="flex-1 lg:ml-64 mt-5 ">

            <!-- Card Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mx-5 mb-5">

                <div class="shadow-sm border border-gray-300 rounded-sm p-5">
                    <div>
                        <h3 class="text-lg font-Roboto">Total Order</h3>
                        <span class="text-xl font-bold font-Roboto">20</span>
                        <div class="flex justify-end">
                            <img src="images/order.svg" alt="order">
                        </div>
                    </div>
                </div>

            </div>


            <!-- Card Profile Section -->
            @include('component.card-profile')

            <div class="overflow-x-auto mx-5 shadow-sm rounded-sm border mb-5">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Menu
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Order Number
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Category
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                Nasi Lemuc'k
                            </th>
                            <td class="py-4 px-6">
                                1
                            </td>
                            <td class="py-4 px-6">
                                Food
                            </td>
                            <td class="py-4 px-6">
                                $2999
                            </td>
                            <td class="py-4 px-6">
                                Cooking
                            </td>
                            <td class="py-4 md:px-6 text-center">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="mx-5 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>
