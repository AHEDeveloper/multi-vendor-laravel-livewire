<div class="statebox widget box box-shadow">

    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

       @foreach($features as $feature)
            @foreach($feature->categoryFeatureDetail as $index=>$detail)
                <div class="row">
                    <div class="col-md-2">
                        <h6>{{$detail->name}}</h6>
                    </div>

                    <div class="col-md-6">
                        <select class="form-select mb-3" id="value" name="featureDetailValueId[{{$loop->index}}]">
                            @foreach($detail->featureDetailValue as $value)
                                <option value="{{$feature->id}}_{{$detail->id}}_{{$value->id}}">{{$value->value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
       @endforeach


        <div class="col-sm-12 text-left">
            <button class="btn btn-success _effect--ripple waves-effect waves-light">
                <span wire:loading.remove>ذخیره کردن</span>
                <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
            </button>
        </div>
    </form>
</div>
