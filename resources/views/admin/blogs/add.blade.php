@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/blogs"}}" class="breadcrumb-item"> Blogs</a>
                <span class="breadcrumb-item active">Create</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            @if (session('danger'))
                <div class="alert alert-danger text-center col-md-6 mx-auto">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-xl-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form class="form-validate-jquery" method="post" action="{{route('blog.create')}}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">New Blog</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input value="{{old('title')}}"  type="text" class="form-control" placeholder="Enter Title" name="title">
                                        @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Sub-Description </label>
                                    <div class="col-lg-10">
                                        <input value="{{old('subdesc')}}"  type="text" class="form-control" placeholder="Enter Sub-Description" name="subdesc">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Category <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="exampleSelectGender" name="category_id">
                                            <option class="form-control" value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Description <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea id="summary-ckeditor" name="content" cols="30" rows="5" class="form-control">{{old('content')}}</textarea>
                                        @error('content')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Galery</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="images[]" class="custom-file-input" style="height: 44px !important;" multiple>
                                        <span class="custom-file-label">Choose File </span>
                                        @error('images')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Featured Image <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="file" name="image" class="custom-file-input" style="height: 44px !important;" >
                                        <span class="custom-file-label">Choose File</span>
                                        @error('image')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Tags </label>
                                    <div class="col-lg-10">
                                        <style>
                                            .tags-input-wrapper{
                                                background: transparent;
                                                padding: 10px;
                                                border-radius: 4px;
                                                max-width: 400px;
                                                border: 1px solid #ccc;
                                            }
                                            .tags-input-wrapper input{
                                                border: none;
                                                background: transparent;
                                                outline: none;
                                                width: 140px;
                                                margin-left: 8px;
                                            }
                                            .tags-input-wrapper .tag{
                                                display: inline-block;
                                                background-color: #252b36;
                                                color: white;
                                                border-radius: 50px;
                                                padding: 0px 3px 0px 7px;
                                                margin-right: 5px;
                                                margin-bottom:5px;
                                            }
                                            .tags-input-wrapper .tag a {
                                                margin: 0 7px 3px;
                                                display: inline-block;
                                                cursor: pointer;
                                            }
                                            body{
                                                font-family:'Segoe UI', Roboto, Oxygen, Ubuntu,   Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
                                            }
                                        </style>
                                        <textarea name="tags" type="text" id="tag-input1" placeholder="Enter Tags"></textarea>
                                    </div>
                                </div>
                                <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo Fields</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input value="{{old('seo_title')}}"  type="text" class="form-control"  name="seo_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Keyword</label>
                                    <div class="col-lg-10">
                                        <input value="{{old('seo_keyword')}}"  type="text" class="form-control"  name="seo_keyword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Keyword </label>
                                    <div class="col-lg-10">
                                        <textarea name="seo_description" cols="30" rows="5" class="form-control">{{old('seo_description')}}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{url('/dashboard/blogs/add')}}" type="reset" class="btn btn-light" >Reset <i class="icon-reload-alt ml-2"></i></a>
                                <button type="submit" class="btn btn-primary ml-3">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function(){

                "use strict"

                // Plugin Constructor
                var TagsInput = function(opts){
                    this.options = Object.assign(TagsInput.defaults , opts);
                    this.init();
                }

                // Initialize the plugin
                TagsInput.prototype.init = function(opts){
                    this.options = opts ? Object.assign(this.options, opts) : this.options;

                    if(this.initialized)
                        this.destroy();

                    if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
                        console.error("tags-input couldn't find an element with the specified ID");
                        return this;
                    }

                    this.arr = [];
                    this.wrapper = document.createElement('div');
                    this.input = document.createElement('input');
                    init(this);
                    initEvents(this);

                    this.initialized =  true;
                    return this;
                }

                // Add Tags
                TagsInput.prototype.addTag = function(string){

                    if(this.anyErrors(string))
                        return ;

                    this.arr.push(string);
                    var tagInput = this;

                    var tag = document.createElement('span');
                    tag.className = this.options.tagClass;
                    tag.innerText = string;

                    var closeIcon = document.createElement('a');
                    closeIcon.innerHTML = '&times;';

                    // delete the tag when icon is clicked
                    closeIcon.addEventListener('click' , function(e){
                        e.preventDefault();
                        var tag = this.parentNode;

                        for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
                            if(tagInput.wrapper.childNodes[i] == tag)
                                tagInput.deleteTag(tag , i);
                        }
                    })


                    tag.appendChild(closeIcon);
                    this.wrapper.insertBefore(tag , this.input);
                    this.orignal_input.value = this.arr.join(',');

                    return this;
                }

                // Delete Tags
                TagsInput.prototype.deleteTag = function(tag , i){
                    tag.remove();
                    this.arr.splice( i , 1);
                    this.orignal_input.value =  this.arr.join(',');
                    return this;
                }

                // Make sure input string have no error with the plugin
                TagsInput.prototype.anyErrors = function(string){
                    if( this.options.max != null && this.arr.length >= this.options.max ){
                        console.log('max tags limit reached');
                        return true;
                    }

                    if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
                        console.log('duplicate found " '+string+' " ')
                        return true;
                    }

                    return false;
                }

                // Add tags programmatically
                TagsInput.prototype.addData = function(array){
                    var plugin = this;

                    array.forEach(function(string){
                        plugin.addTag(string);
                    })
                    return this;
                }

                // Get the Input String
                TagsInput.prototype.getInputString = function(){
                    return this.arr.join(',');
                }


                // destroy the plugin
                TagsInput.prototype.destroy = function(){
                    this.orignal_input.removeAttribute('hidden');

                    delete this.orignal_input;
                    var self = this;

                    Object.keys(this).forEach(function(key){
                        if(self[key] instanceof HTMLElement)
                            self[key].remove();

                        if(key != 'options')
                            delete self[key];
                    });

                    this.initialized = false;
                }

                // Private function to initialize the tag input plugin
                function init(tags){
                    tags.wrapper.append(tags.input);
                    tags.wrapper.classList.add(tags.options.wrapperClass);
                    tags.orignal_input.setAttribute('hidden' , 'true');
                    tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
                }

                // initialize the Events
                function initEvents(tags){
                    tags.wrapper.addEventListener('click' ,function(){
                        tags.input.focus();
                    });


                    tags.input.addEventListener('keydown' , function(e){
                        var str = tags.input.value.trim();

                        if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
                        {
                            e.preventDefault();
                            tags.input.value = "";
                            if(str != "")
                                tags.addTag(str);
                        }

                    });
                }


                // Set All the Default Values
                TagsInput.defaults = {
                    selector : '',
                    wrapperClass : 'tags-input-wrapper',
                    tagClass : 'tag',
                    max : null,
                    duplicate: false
                }

                window.TagsInput = TagsInput;

            })();

            var tagInput1 = new TagsInput({
                selector: 'tag-input1',
                duplicate : false,
                max : 20
            });

        </script>
    </div>
@endsection
