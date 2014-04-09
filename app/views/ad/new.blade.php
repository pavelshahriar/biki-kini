@extends('layouts.main')


@section('top_menu')
@foreach (Config::get('view.top_menu_items') as $tmi)
<li @if ($tmi == $data['active_menu']) class="menu-item current-menu-item" @else class="menu-item" @endif>
<a href="{{{ Config::get('view.site_url') }}}/{{{ $tmi }}}">{{{ ucfirst($tmi) }}}</a>
</li>
@endforeach
@stop

@section('content')

<div class="main_wrapper">
    <h1><strong>Add</strong> Post</h1>

    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::open(array('url'=>'ad/new', 'files'=>true)) }}

        <div class="sell_box step_1">
            <div class="col_1">
                <div class="input_wrapper">
                    <label><span>*</span><strong>Title:</strong></label>
                    {{ Form::text('title', null, array('class'=>'text', 'placeholder'=>'Title')) }}
                </div>

                <div class="select_wrapper">
                    <label><span>*</span><strong>Vehicle Category:</strong></label>
                    {{ Form::select('category', $data['form_elements']['category'], 0 , array('class' => 'text', 'id' => 'category')) }}
                </div>

                <div class="select_wrapper">
                    <label><span>* </span><strong>Manufacturer:</strong></label>
                    {{ Form::select('manufacturer', $data['form_elements']['manufacturer'], 0 , array('class' => 'text')) }}
                </div>
            </div>

            <div class="col_2">
                <div class="select_wrapper">
                    <label><span>* </span><strong>Location:</strong></label>
                    {{ Form::select('location', $data['form_elements']['location'], 0 , array('class' => 'text')) }}
                </div>
                <div class="input_wrapper price">
                    <label><span>* </span><strong>Price:</strong></label>
                    {{ Form::text('price', null, array('class'=>'text', 'style'=>'width: 140px !important')) }}
                    {{ Form::checkbox('price_negotiable', 1, true) }}
                    <label style="width: 95px; display: inline">Negotiable</label>
                </div>
                <div class="select_wrapper">
                    <label><span>*</span><strong>Condition: </strong></label>
                    {{ Form::select('condition', $data['form_elements']['condition'], 0 , array('class' => 'text')) }}
                </div>
            </div>

            <script type="text/javascript">
                var cats = <?php echo json_encode($data['form_elements']['category']); ?>;
                document.getElementById('category').onchange = function(){
                    for (var cat in cats) {
                        if(cat == this.value){
                            document.getElementById('extended_'+cat).style.display = "block";
                        }
                        else{
                            document.getElementById('extended_'+cat).style.display = "none";
                        }
                    }
                };
            </script>

            @foreach($data['form_elements']['category'] as $id => $name)
            <div class="col_3" id="extended_{{{ $id }}}" @if($id == 1) style = 'display: inline' @else style = 'display: none' @endif>
                @foreach($data['form_elements']['extended'][$id] as $id => $name)


                <div class="select_wrapper">
                    <label><span> </span><strong>{{{ ucfirst(str_replace('_', ' ', $name)) }}}:</strong></label>
                    {{ Form::text($name, null, array('class'=>'text', 'style' => 'width: 260px !important', 'placeholder'=> ucfirst(str_replace('_', ' ', $name)))) }}
                </div>

                @endforeach
            </div>


            @endforeach



            <div class="clear"></div>

            <div class="input_wrapper fullwidth">
                <label><span> </span><strong>Description: </strong></label>
                {{ Form::textarea('description', null, array('class'=>'text','style' => 'width: 66% !important')) }}
            </div>
            <br/>
            <div class="input_wrapper fullwidth">
                <label><span> </span><strong>Upload Photo: </strong></label>
                {{ Form::file('image', array('class' => 'upload')) }}
            </div>

            <h1></h1>
            <div class="btn-next">
                {{ Form::submit('Add', array('class'=>'btn1'))}}
            </div>
        </div>

    {{ Form::close() }}
</div>

@stop