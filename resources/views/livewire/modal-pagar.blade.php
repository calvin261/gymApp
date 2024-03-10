<div>
    <div class="fixed inset-0 overflow-y-auto"
      >
        <div class="flex items-center justify-center min-h-screen text-center">
            <div class="fixed inset-0 transition-opacity"
                aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden
                 shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Modal content -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-medium text-gray-900"
                                id="modal-title">
                                Pagar
                            </h3>
                            <!-- Your payment form goes here -->
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeModal"
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent
                            shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500
                            sm:ml-3 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
