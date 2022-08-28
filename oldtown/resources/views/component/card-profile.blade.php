<div class="grid grid-cols-1 md:grid-cols-2 mt-5 mx-5 mb-5 gap-5">
    <div class="shadow-sm bg-secondary text-white rounded-sm  p-5">
        <div>
            <h3 class="py-2 text-lg font-RobotoSlab">OldTown White Coffee</h3>
            <span class="py-2 block text-xl font-bold font-RobotoSlab">Residensi Utm Kl</span>
            <p> <span class="font-bold">Address:</span> 1-18 Gurney Mall, Residensi UTMKL, 8, Jalan Maktab,
                54100 Kuala Lumpur
            </p>
        </div>
    </div>

    <div class="shadow-sm bg-primary rounded-sm  p-5">
        <div>
            <h3 class="text-lg font-RobotoSlab">Welcome:
                <span class="font-bold">{{ Auth::user()->name }}</span>
            </h3>
            <span class="py-2 block text-xl font-bold font-RobotoSlab">Roles: {{ Auth::user()->role }}</span>
            <p> <span class="font-bold">Created:</span> {{ Auth::user()->created_at }} </p>
        </div>
    </div>
</div>
