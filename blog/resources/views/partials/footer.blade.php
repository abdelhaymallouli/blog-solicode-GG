<footer class="bg-white border-t border-gray-200 mt-auto w-full dark:bg-slate-900 dark:border-gray-700">
    <div class="max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="col-span-1 flex flex-col justify-center">
                <a class="flex-none mb-4 block" href="{{ route('home') }}" aria-label="Brand">
                    <img src="{{ asset('images/solicode-logo.png') }}" alt="SoliCode Logo" class="h-24 w-auto">
                </a>
                <p class="text-gray-500 text-sm dark:text-gray-400">Le blog tech de référence pour les développeurs
                    Solicode. Tutoriels, articles et veilles technologiques.</p>
            </div>
            <!-- <div class="col-span-1 mt-5 mr-3">
                <h4 class="text-xs font-semibold text-gray-900 uppercase tracking-wider mb-3 dark:text-gray-200">
                    Ressources</h4>
                <div class="grid space-y-2">
                    <p><a class="inline-flex gap-x-2 text-gray-500 hover:text-gray-800 text-sm dark:text-gray-400 dark:hover:text-gray-200"
                            href="{{ route('articles.search') }}">Articles</a></p>
                    <p><a class="inline-flex gap-x-2 text-gray-500 hover:text-gray-800 text-sm dark:text-gray-400 dark:hover:text-gray-200"
                            href="#">Tutoriels</a></p>
                </div>
            </div>
            <div class="col-span-1 mt-5">
                <h4 class="text-xs font-semibold text-gray-900 uppercase tracking-wider mb-3 dark:text-gray-200">
                    Légal</h4>
                <div class="grid space-y-2">
                    <p><a class="inline-flex gap-x-2 text-gray-500 hover:text-gray-800 text-sm dark:text-gray-400 dark:hover:text-gray-200"
                            href="#">Mentions légales</a></p>
                    <p><a class="inline-flex gap-x-2 text-gray-500 hover:text-gray-800 text-sm dark:text-gray-400 dark:hover:text-gray-200"
                            href="#">Politique de confidentialité</a></p>
                </div>
            </div> -->
        </div>
        <div class="border-t border-gray-200 pt-5 dark:border-gray-700">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500 dark:text-gray-400">© {{ date('Y') }} SoliCode. Tous droits réservés.
                </div>
                <div class="flex space-x-4">
                    <a class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white transition"
                        href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white transition"
                        href="#">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>