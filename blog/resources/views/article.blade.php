@extends('layouts.public')

@section('title', $article->title)

@section('content')
    <!-- Main Content -->
    <main class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Article Header -->
        <div class="mb-8">
            @if($article->categories->isNotEmpty())
                <a href="{{ route('articles.search', ['category' => $article->categories->first()->slug]) }}"
                    class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors">
                    {{ $article->categories->first()->name }}
                </a>
            @endif
            <h1 class="text-3xl font-bold text-gray-900 md:text-4xl lg:text-5xl my-4 font-heading">{{ $article->title }}
            </h1>

            <div class="flex items-center gap-x-4 mt-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random"
                        alt="{{ $article->user->name }}">
                </div>
                <div class="grow">
                    <div class="font-medium text-gray-800">{{ $article->user->name }}</div>
                    <div class="text-xs text-gray-500">Publié le {{ $article->created_at->isoFormat('D MMM YYYY') }} ·
                        {{ ceil(Str::wordCount($article->content) / 200) }} min de lecture
                    </div>
                </div>
            </div>
        </div>

        <!-- Cover Image -->
        <figure class="mb-10">
            <img class="w-full object-cover rounded-xl h-96 shadow-sm"
                src="{{ $article->image ?? 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80' }}"
                alt="{{ $article->title }}">
        </figure>

        <!-- Content (Prose) -->
        <div class="prose prose-lg prose-blue prose-img:rounded-xl mx-auto text-gray-700 dark:prose-invert">
            {!! Str::markdown($article->content) !!}
        </div>

        <!-- Tags -->
        <div class="mt-10 flex flex-wrap gap-2">
            @foreach($article->tags as $tag)
                <a class="m-0.5 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
                    href="{{ route('articles.search', ['tag' => $tag->slug]) }}">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>

        <!-- Comments Section -->
        <div class="mt-12 bg-white border border-gray-200 rounded-xl p-6 sm:p-8 dark:bg-slate-800 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 dark:text-gray-200">Commentaires
                ({{ $article->comments->count() }})</h3>

            <!-- Comment Form -->
            <form class="mb-8">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Laisser
                        un commentaire</label>
                    <div
                        class="border border-gray-200 rounded-lg overflow-hidden dark:border-gray-700 focus-within:ring-2 focus-within:ring-blue-500 transition-all">
                        <!-- Toolbar -->
                        <div
                            class="flex items-center gap-x-1 p-2 bg-gray-50 border-b border-gray-200 dark:bg-slate-800 dark:border-gray-700 select-none">
                            <button type="button" onclick="document.execCommand('bold', false, null)"
                                class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 transition-colors"
                                title="Gras">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 12h12" />
                                    <path d="M6 20h12" />
                                    <path d="M6 4h12" />
                                    <path d="M6 12v8" />
                                    <path d="M18 12v8" />
                                    <path d="M10 4v8" />
                                    <path d="M14 4v8" />
                                </svg>
                            </button>
                            <button type="button" onclick="document.execCommand('italic', false, null)"
                                class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 transition-colors"
                                title="Italique">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="19" x2="10" y1="4" y2="4" />
                                    <line x1="14" x2="5" y1="20" y2="20" />
                                    <line x1="15" x2="9" y1="4" y2="20" />
                                </svg>
                            </button>
                            <button type="button"
                                onclick="const url = prompt('Entrez l\'URL:'); if(url) document.execCommand('createLink', false, url)"
                                class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 transition-colors"
                                title="Lien">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                                </svg>
                            </button>
                            <div class="w-px h-5 bg-gray-300 mx-1 dark:bg-gray-600"></div>
                            <button type="button" onclick="document.execCommand('insertUnorderedList', false, null)"
                                class="p-1.5 rounded-md text-gray-500 hover:bg-gray-200 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 transition-colors"
                                title="Liste à puces">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="8" x2="21" y1="6" y2="6" />
                                    <line x1="8" x2="21" y1="12" y2="12" />
                                    <line x1="8" x2="21" y1="18" y2="18" />
                                    <line x1="3" x2="3.01" y1="6" y2="6" />
                                    <line x1="3" x2="3.01" y1="12" y2="12" />
                                    <line x1="3" x2="3.01" y1="18" y2="18" />
                                </svg>
                            </button>
                        </div>
                        <!-- Content Editable Area -->
                        <div class="relative bg-white dark:bg-slate-900">
                            <div id="editor-content" contenteditable="true"
                                class="p-4 min-h-[120px] max-h-[200px] overflow-y-auto block w-full text-sm text-gray-800 dark:text-gray-200 focus:outline-none prose prose-sm dark:prose-invert max-w-none">
                                <p>Votre avis nous intéresse...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="py-2.5 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Publier
                    </button>
                </div>
            </form>

            <!-- Comment List -->
            <ul class="space-y-8">
                @forelse($article->comments as $comment)
                    <li>
                        <div class="flex gap-x-4">
                            <img class="flex-shrink-0 w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random"
                                alt="Avatar">
                            <div class="grow">
                                <div class="flex justify-between items-center mb-2">
                                    <div>
                                        <span
                                            class="block font-semibold text-gray-800 dark:text-gray-200">{{ $comment->user->name }}</span>
                                        <span
                                            class="block text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm dark:text-gray-400">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <p class="text-gray-500 text-sm">Soyez le premier à commenter !</p>
                    </li>
                @endforelse
            </ul>
        </div>
    </main>
@endsection