{{--<div class="card-header d-flex">--}}
{{--    <div class="d-flex translation-controls">--}}
{{--        {{  Form::select('translate_language', $allLanguagesArr, $selectedLang, ['class' => 'form-control translateLanguage w-100', 'placeholder' => 'Select Language']) }}--}}
{{--    </div>--}}
{{--    <div class="subFolderFiles ml-3 translation-controls">--}}
{{--        {{  Form::select('file_name', $allFiles, $selectedFile, ['class' => 'form-control w-100 translate-language-files', 'placeholder' => 'Select File','id'=>'subFolderFiles']) }}--}}
{{--    </div>--}}
{{--    <div class="section-header-breadcrumb ml-auto translation-controls">--}}
{{--        <button type="submit" class="btn btn-primary form-btn">--}}
{{--            {{ __('messages.common.save') }}--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="card-body">--}}
{{--    <div class="row">--}}
{{--        @foreach($languages as $key => $value)--}}
{{--            @if(!is_array($value))--}}
{{--                <div class="col-lg-2 col-md-3 mb-4">--}}
{{--                    <label>{{ str_replace('_',' ',ucfirst($key)) }} :</label>--}}
{{--                    <input type="text" class="form-control" name="{{$key}}" value="{{ $value }}"/>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                @foreach($value as $nestedKey => $nestedValue)--}}
{{--                    @if(!is_array($nestedValue))--}}
{{--                        <div class="col-lg-2 col-md-3 mb-4">--}}
{{--                            <label>{{ str_replace('_',' ',ucfirst($nestedKey)) }} :</label>--}}
{{--                            <input type="text" class="form-control" name="{{$key}}[{{$nestedKey}}]"--}}
{{--                                   value="{{ $nestedValue }}"/>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}


<div class="row col-12 mt-5">
    <div class="form-group col-sm-3 mb-5">
        {{Form::select('translate_language', $allLanguagesArr,$selectedLang, ['class' => 'form-select form-select-solid translateLanguage','id'=>'translateLanguage','placeholder' => 'Select Language']) }}
    </div>
    <div class="form-group col-sm-3 mb-5">
        {{Form::select('file_name', $allFiles,$selectedFile, ['class' => 'form-select form-select-solid translate-language-files','placeholder' => 'Select File', 'id'=>'subFolderFiles']) }}
    </div>
    <div class="form-group col-sm-3 mb-5 d-flex justify-content-end offset-3">
        <a class="btn btn-primary addLanguageModal me-2"><i
                    class="fas fa-plus"></i>{{ __('messages.common.add') }}</a> 
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2','name' => 'save', 'id' => 'saveJob']) }}
    </div>
    <hr><br>
    @foreach($languages as $key => $value)
        @if(!is_array($value))
            <div class="form-group col-sm-2 mb-5">
                {{ Form::label('title', str_replace('_',' ',ucfirst($key)).':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                {{ Form::text($key, $value, ['class' => 'form-control form-control-solid','required','placeholder' => str_replace('_',' ',ucfirst($key))]) }}
            </div>
        @else
            @foreach($value as $nestedKey => $nestedValue)
                @if(!is_array($nestedValue))
                    <div class="form-group col-lg-2 col-md-3 mb-4">
                        {{ Form::label('title',  str_replace('_',' ',ucfirst($nestedKey)) .':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <input type="text" class="form-control form-control-solid" name="{{$key}}[{{$nestedKey}}]"
                               value="{{ $nestedValue }}" placeholder="{{str_replace('_',' ',ucfirst($nestedKey))}}"/>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>
