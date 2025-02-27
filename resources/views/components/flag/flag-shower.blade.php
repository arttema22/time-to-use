<x-flag.flag>
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="-47.56 -47.56 570.68 570.68">
        <path
            d="M259.988,404.297c0,14.408,11.67,26.079,26.078,26.079s26.078-11.671,26.078-26.079 c0-9.43-9.647-20.494-17.311-31.621c-4.198-6.094-13.164-6.092-17.368-0.001C269.8,383.78,259.988,394.887,259.988,404.297z" />
        <path
            d="M331.95,343.465c0,14.408,11.67,26.077,26.078,26.077s26.078-11.669,26.078-26.077 c0-9.425-9.646-20.491-17.312-31.619c-4.198-6.095-13.165-6.093-17.369-0.002C341.761,322.951,331.95,334.06,331.95,343.465z" />
        <path
            d="M188.026,343.465c0,14.408,11.67,26.077,26.078,26.077c14.408,0,26.078-11.669,26.078-26.077 c0-9.425-9.646-20.491-17.311-31.619c-4.198-6.095-13.166-6.093-17.369-0.002C197.838,322.951,188.026,334.06,188.026,343.465z" />
        <path
            d="M258.763,111.628c-54.178,9.808-95.189,48.058-97.801,94.514c-0.063,1.226,0.365,2.428,1.211,3.319 c0.843,0.892,2.021,1.4,3.247,1.4h241.294c1.225,0,2.404-0.509,3.23-1.4c0.845-0.892,1.29-2.093,1.227-3.319 c-2.69-47.77-45.932-86.887-102.401-95.294C298.931,48.16,244.722,0,179.304,0c-72.36,0-131.22,58.868-131.22,131.219v319.884 c0,13.51,10.954,24.454,24.454,24.454c13.502,0,24.454-10.944,24.454-24.454V131.219c0-45.39,36.921-82.311,82.311-82.311 C217.624,48.908,249.64,75.361,258.763,111.628z" />
        <path
            d="M411.171,234.001H160.962c-9.012,0-16.302,7.3-16.302,16.302c0,9.005,7.29,16.303,16.302,16.303h250.209 c9.012,0,16.303-7.298,16.303-16.303C427.474,241.302,420.183,234.001,411.171,234.001z" />
    </svg>
    <button data-popover-target="popover-default" type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Default
        popover
    </button>

    <div data-popover id="popover-default" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Popover title</h3>
        </div>
        <div class="px-3 py-2">
            <p>And here's some amazing content. It's very engaging. Right?</p>
        </div>
        <div data-popper-arrow></div>
    </div>
</x-flag.flag>