<!-- resources/views/components/admin-nav.blade.php -->
<nav class="p-4 ">
    <ul class="flex space-x-4 ">
        <li>
            <a href="{{ route('admin.home') }}" 
               class="{{ request()->routeIs('admin.home') ? 'text-orange-900 border-orange-900   border-b-1' : 'text-gray-700' }} hover:text-blue-500 hover:border-blue-500  border-b-2 pb-2 border-transparent">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dashboard') }}" 
               class="{{ request()->routeIs('admin.dashboard') ? 'text-orange-900 border-orange-900   border-b-1' : 'text-gray-700' }} hover:text-blue-500 hover:border-blue-500  border-b-2 pb-2 border-transparent">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.request') }}" 
               class="{{ request()->routeIs('admin.request') ? 'text-orange-900 border-orange-900   border-b-1' : 'text-gray-700' }} hover:text-blue-500 hover:border-blue-500  border-b-2 pb-2 border-transparent">
                Requests
            </a>
        </li>
    </ul>
</nav>
