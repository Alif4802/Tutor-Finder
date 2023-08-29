<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tutor Finder') }}
            </h2>
            <div>
                <a href="{{ route('sessions') }}" class="btn">Sessions</a>
                <a href="{{ route('search') }}" class="btn">Search</a>
                <a href="{{ route('reviews') }}" class="btn">Reviews</a>
                <a href="{{ route('payment') }}" class="btn">Payment</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Merged TutorFinder Content Starts Here -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <header>
                        <h1>TutorFinder</h1>
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search...">
                            <button type="submit">Search</button>
                        </form>
                    </header>


                    <main>
                        <section class="hero">
                            <h2>Find the Perfect Tutor for Your Learning Needs</h2>
                            <p>Discover qualified tutors for a wide range of subjects and levels. Connect with students looking for your expertise.</p>
                            <a href="{{ route('search') }}" class="btn">Start Searching</a> 
                        </section>

                        <section class="how-it-works">
                            <h3>How It Works</h3>
                            <article>
                                <h4>1. Registration & Authentication</h4>
                                <p>Use our advanced search features to find the perfect tutor or student based on subject, location, availability, and more.</p>
                            </article>
                            <article>
                                <h4>2. Recommendation & Matchmaking </h4>
                                <p>Students & teachers will find each other by their registered priorities.</p>
                            </article>
                            <article>
                                <h4>3. Session Scheduling</h4>
                                <p>Easily booking, getting reminders & notifications, accepting or rejecting offers done here.</p>
                            </article>
                            <article>
                                <h4>4. Payment</h4>
                                <p>Will allow paying in multiple methods & transaction records will be kept.</p>
                            </article>
                            <article>
                                <h5>5. Reviews</h5>
                                <p>Share your experience by leaving reviews & ratings for tutors & help others to make decisions.</p>
                            </article>
                        </section>
                    </main>

                    <footer class="flex justify-end">
                        <ul class="footer-links">
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <!-- Merged TutorFinder Content Ends Here -->
</x-app-layout>





