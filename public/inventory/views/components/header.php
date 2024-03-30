<!-- Start: Header -->

<div id="header" class="py-4 px-7 bg-header flex items-center shadow-md sticky">

    <!-- Start: Active Menu -->

    <button type="button" class="text-lg sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>

    <ul class="flex items-center text-md ml-4">

        <li class="mr-2">
            <a class="text-black font-medium">Inventory</a>
        </li>

    </ul>

    <!-- End: Active Menu -->

    <!-- Start: Profile -->

    <ul class="ml-auto flex items-center">
        <div class="text-black font-medium">Sample User</div>
        <li class="dropdown ml-3">
            <i class="ri-arrow-down-s-line"></i>
        </li>
    </ul>

    <!-- End: Profile -->

</div>

<!-- End: Header -->


<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>

<script>
    document.querySelector('.sidebar-toggle').addEventListener('click', function () {
        document.getElementById('sidebar-menu').classList.toggle('hidden');
        document.getElementById('sidebar-menu').classList.toggle('transform');
        document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
        document.getElementById('mainContent').classList.toggle('md:w-full');
        document.getElementById('mainContent').classList.toggle('md:ml-64');

        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');
    });
</script>