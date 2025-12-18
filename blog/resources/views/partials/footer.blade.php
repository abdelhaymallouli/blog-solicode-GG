<footer class="bg-white border-t border-gray-200 dark:bg-slate-900 dark:border-gray-700 mt-auto">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid md:grid-cols-3 gap-8 mb-8">

            {{-- Brand --}}
            <div>
                <h3 class="text-xl font-semibold text-blue-600">
                    SoliCode<span class="text-gray-900 dark:text-gray-200">Blog</span>
                </h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Plateforme de partage de connaissances pour développeurs Solicode.
                </p>
            </div>

            {{-- Resources --}}
            <div>
                <h4 class="text-xs font-semibold uppercase mb-3 text-gray-900 dark:text-gray-200">
                    Ressources
                </h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('search') }}" class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Articles</a></li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h4 class="text-xs font-semibold uppercase mb-3 text-gray-900 dark:text-gray-200">
                    Légal
                </h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Mentions légales</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Confidentialité</a></li>
                </ul>
            </div>

        </div>

        <div class="border-t pt-4 flex justify-between text-sm text-gray-500 dark:text-gray-400">
            <span>© {{ date('Y') }} SoliCode. Tous droits réservés.</span>
            <span>Made with ❤️ by Solicode</span>
        </div>
    </div>
</footer>
