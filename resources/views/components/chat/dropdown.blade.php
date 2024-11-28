<button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
    class="inline-flex items-center rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white px-5 text-center text-sm focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
    type="button"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 6H12.01M12 12H12.01M12 18H12.01" stroke="currentColor" stroke-width="4" stroke-linecap="round"
            stroke-linejoin="round" />

</button>

<!-- Dropdown menu -->
<div id="dropdownInformation"
    class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
        <div>Bonnie Green</div>
        <div class="truncate font-medium">name@flowbite.com</div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">

        <li>
            <button data-modal-target="crypto-modal" data-modal-toggle="crypto-modal"
                class="block w-full px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</button>
        </li>

    </ul>
    <div class="py-2">
        <a href="#"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Sign
            out</a>
    </div>
</div>

