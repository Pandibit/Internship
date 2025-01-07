<footer class="bg-gray-100 mt-10" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-24 lg:max-w-full">
        <div class="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
            <div class="grid grid-cols-2 gap-8 xl:col-span-4">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Solutions</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Marketing </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Analytics </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Commerce </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Insights </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Pricing </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Documentation
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Guides </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> API Status </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> About </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Blog </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Jobs </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Press </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Partners </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Claim </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Privacy </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Terms </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="border-t border-gray-200 pt-8 lg:flex lg:items-center lg:justify-between xl:mt-0">
            <div>
                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Subscribe to our newsletter
                </h3>
                <p class="mt-2 text-base text-gray-500">The latest news, articles, and resources, sent to your inbox
                    weekly.</p>
            </div>
            <form class="flex  justify-start items-center space-x-3 pt-4">
                <x-forms.email-input type="email" name="email" placeholderName="Email" :value="old('email')" />
                <button class="outline-none ml-0 flex  items-center text-xs font-md opacity-70"> 
                  <x-icons.chevron-right  />
                   Subscribe </button>
            </form>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <x-footer.footer-icons />
            </div>
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">&copy; 2020 Workflow, Inc. All rights reserved.
            </p>
        </div>
    </div>
</footer>
