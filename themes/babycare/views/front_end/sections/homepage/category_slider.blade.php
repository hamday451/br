
@foreach ($best_seller_category as $category)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="best-toy-card text-center">
                <img src="{{ get_file($category->icon_path , $themeId) }}" alt="category-icon">
                <div class="best-toy-text">
                    {{-- <p>CATEGORIES</p> --}}
                    <h4>{{$category->name}}</h4>
                </div>
                <a href="{{ route('page.product-list', [$slug, 'main_category' => $category->id]) }}" class="btn theme-btn">
                    {{ __('Go to category') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.22466 5.62411C8.87997 5.64249 8.58565 5.37796 8.56728 5.03327C8.5422 4.56284 8.51152 4.19025 8.48081 3.89909C8.43958 3.50807 8.19939 3.27049 7.85391 3.23099C7.35787 3.17429 6.60723 3.125 5.49957 3.125C4.39192 3.125 3.64128 3.17429 3.14524 3.23099C2.79917 3.27055 2.55966 3.50754 2.51845 3.89797C2.44629 4.58174 2.37457 5.71203 2.37457 7.5C2.37457 9.28797 2.44629 10.4183 2.51845 11.102C2.55966 11.4925 2.79917 11.7294 3.14524 11.769C3.64128 11.8257 4.39192 11.875 5.49957 11.875C6.60723 11.875 7.35787 11.8257 7.85391 11.769C8.19939 11.7295 8.43958 11.4919 8.48081 11.1009C8.51152 10.8098 8.5422 10.4372 8.56728 9.96673C8.58565 9.62204 8.87997 9.35751 9.22466 9.37589C9.56935 9.39426 9.83388 9.68858 9.8155 10.0333C9.78942 10.5225 9.75716 10.9168 9.72392 11.232C9.62607 12.1598 8.96789 12.8998 7.99588 13.0109C7.4419 13.0742 6.64237 13.125 5.49957 13.125C4.35677 13.125 3.55725 13.0742 3.00327 13.0109C2.03184 12.8999 1.37333 12.1616 1.27536 11.2332C1.19744 10.495 1.12457 9.31924 1.12457 7.5C1.12457 5.68076 1.19744 4.50504 1.27536 3.76677C1.37333 2.83844 2.03184 2.10013 3.00327 1.98908C3.55725 1.92575 4.35677 1.875 5.49957 1.875C6.64237 1.875 7.4419 1.92575 7.99588 1.98908C8.96789 2.1002 9.62607 2.84023 9.72392 3.76798C9.75716 4.08316 9.78942 4.47745 9.8155 4.96673C9.83388 5.31142 9.56935 5.60574 9.22466 5.62411Z" fill="black"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6206 5.75444C11.3765 5.51036 11.3765 5.11464 11.6206 4.87056C11.8646 4.62648 12.2604 4.62648 12.5044 4.87056L14.6919 7.05806C14.936 7.30214 14.936 7.69786 14.6919 7.94194L12.5044 10.1294C12.2604 10.3735 11.8646 10.3735 11.6206 10.1294C11.3765 9.88536 11.3765 9.48964 11.6206 9.24556L12.7411 8.125L6.75 8.125C6.40482 8.125 6.125 7.84518 6.125 7.5C6.125 7.15482 6.40482 6.875 6.75 6.875L12.7411 6.875L11.6206 5.75444Z" fill="black"></path>
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
