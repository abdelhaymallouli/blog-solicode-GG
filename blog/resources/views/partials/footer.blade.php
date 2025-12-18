<footer class="bg-white border-t border-gray-200 mt-16">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- Top --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">

            {{-- Brand --}}
            <div>
                <h3 class="text-xl font-bold text-blue-600 mb-3">
                    SoliCode<span class="text-gray-900">Blog</span>
                </h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Le blog tech dédié aux développeurs Solicode.
                    Tutoriels, articles et veille technologique.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="text-xs font-semibold uppercase text-gray-900 mb-3">
                    Ressources
                </h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-gray-800">Articles</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-800">Tutoriels</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-800">Documentation</a></li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h4 class="text-xs font-semibold uppercase text-gray-900 mb-3">
                    Légal
                </h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-500 hover:text-gray-800">Mentions légales</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-800">Confidentialité</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-800">Contact</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="border-t border-gray-200 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-500">
                © {{ date('Y') }} SoliCode. Tous droits réservés.
            </p>

            <div class="flex items-center gap-4 text-gray-500">
                <a href="#" class="hover:text-gray-800">GitHub</a>
                <a href="#" class="hover:text-gray-800">Twitter</a>
                <a href="#" class="hover:text-gray-800">Facebook</a>
            </div>
        </div>

    </div>
</footer>
