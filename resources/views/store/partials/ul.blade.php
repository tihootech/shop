<li>
    <span class="d-inline-block my-1 @if($main_category->id == $cat->id) text-danger @endif">
        <a href="{{url("shop/$main_category->id")}}" title="مشاهده همه محصولات این دسته بندی" data-toggle="tooltip">
            <i class="fa fa-list ml-1 @if($main_category->id == $cat->id) text-danger @endif"></i>
        </a>
        @if ($main_category->subcats->count())
            <a href="#" @if($main_category->id == $cat->id) class="text-danger" @endif>
                <span data-toggle="collapse" data-target="#cat-{{$main_category->id}}">
                    {{$main_category->title}}
                    <i class="fa @if( in_array($main_category->id, $cat->parents_id()) ) fa-chevron-down @else fa-chevron-left @endif mr-1"></i>
                </span>
            </a>
        @endif
    </span>

    @if ($main_category->subcats->count())
        <ul class="sub-menu pr-2 collapse @if( in_array($main_category->id, $cat->parents_id()) ) show @endif" id="cat-{{$main_category->id}}">
            @foreach ($main_category->subcats as $subcategory)
                <li>
                    @if ($subcategory->subcats->count())
                        @include('store.partials.ul', ['main_category' => $subcategory])
                    @else
                        <a href="{{url("shop/$subcategory->id")}}" @if($subcategory->id == $cat->id) class="text-danger" @endif>
                            {{$subcategory->title}}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

</li>
