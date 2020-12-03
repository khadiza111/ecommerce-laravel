<div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Shop By Category</span>
                        </div>
                        <ul>
                        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent_cat)    
                            <li>
                                <a href="#main-{{ $parent_cat->id }}" style="font-size: 16px; text-transform: uppercase; text-shadow: 1px;" class="list-group-item list-group-item-action parent" data-toggle="collapse">
                                    <img src="{{ asset('public/images/categories/'. $parent_cat->image) }}" style="border-radius: 100px;" width="50" height="40">&nbsp;&nbsp;&nbsp;
                                    {{ $parent_cat->name }}
                                </a>
                            </li>
                        <div class="collapse
                                    @if (Route::is('categories.show'))
                                        @if (App\Models\Category::ParentOrNotCategory($parent_cat->id, $category->id))
                                            show
                                        @endif
                                    @endif
                            " id="main-{{ $parent_cat->id }}">
                            <div class="child-rows">
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent_cat->id)->get() as $child)
                                    <a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action child
                                        @if (Route::is('categories.show'))
                                            @if ($child->id == $category->id)
                                                active
                                            @endif
                                        @endif
                                    ">  
                                        <img src="{{ asset('public/images/categories/'. $child->image) }}" width="40" height="26">&nbsp;&nbsp;&nbsp;
                                        {{ $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach    
                        </ul>
</div>