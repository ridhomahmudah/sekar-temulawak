<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <x-modal_side_profile></x-modal_side_profile> --}}

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-gray-500 font-semibold mb-4">Pesanan #ID 5567</h2>
                    <div class="flex space-x-4 mb-6">
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            Joko Santosa abadi
                        </div>
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            24 - 9 - 2024
                        </div>
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            Telah Terkirim
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-700 font-semibold">Nama Penerima :</span>
                        <span class="ml-2">Joko Santoso</span>
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-700 font-semibold">Alamat Penerima :</span>
                        <span class="ml-2">Jl. Kutuk Barat gg. Sekolahan No 1 Sidokare, Sidoarjo – Jawa Timur</span>
                    </div>
                    <div>
                        <span class="text-gray-700 font-semibold">Metode Pembayaran :</span>
                        <span class="ml-2">Transfer BRI</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-green-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Produk</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Jumlah</th>
                                <th scope="col" class="px-4 py-3">Kemasan</th>
                                <th scope="col" class="px-4 py-3">Total</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Sari
                                    temulawak</th>
                                <td class="px-4 py-3">50000</td>
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">cup
                                </td>
                                <td class="px-4 py-3">50000</td>

                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>


    <div class="space-y-4 bg-gray-50 p-6 dark:bg-gray-800">
        <div class="space-y-2">
            <dl class="flex items-center justify-between gap-4">
                <dt class="font-normal text-gray-500 dark:text-gray-400">TOtal pembayaran</dt>
                <dd class="font-medium text-gray-900 dark:text-white">50000</dd>
            </dl>

            <dl class="flex items-center justify-between gap-4">
                <dt class="font-normal text-gray-500 dark:text-gray-400">Status pembayaran</dt>
                <dd class="text-base font-medium text-green-500">False</dd>
            </dl>

        </div>

        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
            <dd class="text-lg font-bold text-gray-900 dark:text-white">50000</dd>
        </dl>
    </div>

    <div class="p-4 flex justify-center items-center">
        <div class="p-4 ">
            <label class="block text-gray-600 font-semibold mb-2">Bukti Pembayaran :</label>
            <div class="w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('img/Sekar_Temulawak_logo.png') }}" alt="Bukti Pembayaran"
                    class="w-full h-auto object-cover">
            </div>
        </div>
    </div>




</x-admin_layout>
