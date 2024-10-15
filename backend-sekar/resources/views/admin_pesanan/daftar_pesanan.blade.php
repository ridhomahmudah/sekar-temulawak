<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Pesanan masuk</h2>

                    <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                        <div>
                            <label for="order-type"
                                class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Select order
                                type</label>
                            <select id="order-type"
                                class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                <option selected>Baru</option>
                                <option value="pre-order">Belum Dibayar</option>
                                <option value="pre-order">Dibayar</option>
                                <option value="transit">Diproses</option>
                                <option value="confirmed">Sedang dikirim</option>
                                <option value="cancelled">Selesai</option>
                            </select>
                        </div>

                        <span class="inline-block text-gray-500 dark:text-gray-400"> dari </span>

                        <div>
                            <label for="duration"
                                class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Waktu</label>
                            <select id="duration"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                <option selected>Hari ini</option>
                                <option value="this month">Minggu ini</option>
                                <option value="last 3 months">Bulan ini</option>
                                <option value="lats 6 months">3 Bulan terakhir</option>
                                <option value="this year">Tahun ini</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flow-root sm:mt-8">
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="flex flex-wrap items-center gap-y-4 py-6">
                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">#FWB127364372</a>
                                </dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">20.12.2023</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">50.000 IDR</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                <dd
                                    class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">

                                    Diproses
                                </dd>
                            </dl>

                            <div
                                class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">

                                <a href="admin-detail-pesanan"
                                    class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Detail
                                    pesanan</a>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-y-4 py-6">
                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">#FWB127364372</a>
                                </dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">20.12.2023</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">50.000 IDR</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                <dd
                                    class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                    Sedang dikirim
                                </dd>
                            </dl>

                            <div
                                class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">

                                <a href="#"
                                    class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Detail
                                    pesanan</a>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-y-4 py-6">
                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">#FWB127364372</a>
                                </dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">20.12.2023</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">50.000 IDR</dd>
                            </dl>

                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                <dd
                                    class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                    Dibayar
                                </dd>
                            </dl>

                            <div
                                class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">

                                <a href="#"
                                    class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Detail
                                    pesanan</a>
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-wrap items-center gap-y-4 py-6">
                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                <a href="#" class="hover:underline">#FWB127364372</a>
                            </dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">20.12.2023</dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">50.000 IDR</dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                            <dd
                                class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                Selesai
                            </dd>
                        </dl>

                        <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">

                            <a href="#"
                                class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Detail
                                pesanan</a>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-y-4 py-6">
                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Order ID:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                <a href="#" class="hover:underline">#FWB125467980</a>
                            </dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">11.12.2023</dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                            <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">50.000 IDR</dd>
                        </dl>

                        <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                            <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                            <dd
                                class="me-2 mt-1.5 inline-flex items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">

                                Belum dibayar
                            </dd>
                        </dl>

                        <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">

                            <a href="#"
                                class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Detail
                                pesanan</a>
                        </div>
                    </div>


                </div>
            </div>

            //pagination aja
        </div>
        </div>
    </section>
</x-admin_layout>
