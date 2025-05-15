<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-purple-800 leading-tight mb-6">
            Welcome to Your Dashboard
        </h2>
    </x-slot>

    <div class="p-8 bg-white border border-purple-300 shadow-md rounded-lg max-w-full mx-auto space-y-8">
        <div>
            <p class="text-purple-700 text-lg font-semibold">You're logged in! 🎉</p>
            <p class="mt-2 text-purple-600 text-lg">You can customize this area with charts, stats, or anything you need.</p>
        </div>

        <section>
            <h3 class="text-xl font-semibold text-purple-800 mb-4">Motivational Bible Verses</h3>
            <ul class="space-y-6 text-purple-700 text-base max-w-3xl">
                <li>
                    <blockquote class="italic border-l-4 border-purple-500 pl-4">
                        “I can do all things through Christ who strengthens me.” <br>
                        <span class="font-semibold">— Philippians 4:13</span>
                    </blockquote>
                </li>
                <li>
                    <blockquote class="italic border-l-4 border-purple-500 pl-4">
                        “For I know the plans I have for you, declares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future.” <br>
                        <span class="font-semibold">— Jeremiah 29:11</span>
                    </blockquote>
                </li>
                <li>
                    <blockquote class="italic border-l-4 border-purple-500 pl-4">
                        “Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go.” <br>
                        <span class="font-semibold">— Joshua 1:9</span>
                    </blockquote>
                </li>
                <li>
                    <blockquote class="italic border-l-4 border-purple-500 pl-4">
                        “Trust in the Lord with all your heart and lean not on your own understanding.” <br>
                        <span class="font-semibold">— Proverbs 3:5</span>
                    </blockquote>
                </li>
                <li>
                    <blockquote class="italic border-l-4 border-purple-500 pl-4">
                        “The Lord is my shepherd; I shall not want.” <br>
                        <span class="font-semibold">— Psalm 23:1</span>
                    </blockquote>
                </li>
            </ul>
        </section>
    </div>
</x-app-layout>
